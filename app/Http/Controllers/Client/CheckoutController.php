<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get cart items
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        // Get user information
        /** @var \App\Models\User $user */
        $user =  Auth::user();

        // Calculate subtotal
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // Apply tax, shipping, and discounts
        $taxRate = 0.10; // 10% tax
        $tax = $subtotal * $taxRate;

        // Shipping is free for orders over $100
        $shipping = ($subtotal > 100) ? 0 : 10;

        // Get discount from session
        $discount = session('discount', 0);

        // Calculate total
        $total = $subtotal - $discount + $tax + $shipping;

        return view('client.checkout.index', compact('cartItems', 'subtotal', 'tax', 'taxRate', 'shipping', 'discount', 'total', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'payment_method' => 'required|in:cod,bank_transfer,credit_card',
            'terms_accepted' => 'required|accepted',
        ]);

        // Get cart items
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Get or create customer for the user
        $user = Auth::user();
        $customer = $user->customer ?? Customer::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->zip_code,
        ]);

        // Update customer info if already exists
        if ($user->customer) {
            $customer->update([
                'phone' => $request->phone,
                'address' => $request->address . ', ' . $request->city . ', ' . $request->state . ' ' . $request->zip_code,
            ]);
        }

        // Calculate totals
        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        $taxRate = 0.10; // 10% tax
        $tax = $subtotal * $taxRate;

        // Shipping is free for orders over $100
        $shipping = ($subtotal > 100) ? 0 : 10;

        // Get discount from session
        $discount = session('discount', 0);

        // Calculate total
        $total = $subtotal - $discount + $tax + $shipping;

        try {
            // Create the order
            $order = new Order();
            $order->customer_id = $customer->id;
            $order->total_amount = $total;
            $order->status = 'pending';
            $order->notes = 'Payment method: ' . $request->payment_method;
            $order->save();

            // Create order items
            foreach ($cartItems as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item->product_id;
                $orderItem->quantity = $item->quantity;
                $orderItem->price = $item->product->price;
                $orderItem->save();

                // Update product stock
                $item->product->decrement('stock', $item->quantity);
            }

            // Clear cart
            Cart::where('user_id', Auth::id())->delete();

            return redirect()->route('orders.confirmation', $order->id)->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error processing your order. Please try again.');
        }
    }
}
