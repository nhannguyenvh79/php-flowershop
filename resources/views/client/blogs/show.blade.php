@extends('layouts.client')

@section('title', $blog->title)

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 dark:bg-gray-800 py-4">
        <div class="container mx-auto px-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400">
                            <i class="fas fa-home mr-2"></i>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <a href="{{ route('blogs.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-pink-600 dark:hover:text-pink-400">
                                Tin tức
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-gray-500 dark:text-gray-400">{{ Str::limit($blog->title, 50) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content with Side Ads -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex gap-6">
            <!-- Left Advertisement - Hidden on mobile/tablet -->
            <div class="hidden xl:block w-40 flex-shrink-0">
                <div class="sticky top-24 space-y-4">
                    <div class="bg-gradient-to-b from-pink-100 to-pink-50 dark:from-pink-900/30 dark:to-pink-800/20 rounded-lg p-4 border border-pink-200 dark:border-pink-800 shadow-sm">
                        <div class="text-center">
                            <i class="fas fa-gift text-3xl text-pink-500 mb-2"></i>
                            <p class="text-sm font-semibold text-pink-700 dark:text-pink-300">Ưu đãi đặc biệt</p>
                            <p class="text-xs text-pink-600 dark:text-pink-400 mt-1">Giảm 20% cho đơn hàng đầu tiên</p>
                            <a href="{{ route('products.index') }}" class="mt-3 inline-block text-xs bg-pink-500 hover:bg-pink-600 text-white px-3 py-1.5 rounded-full transition">
                                Mua ngay
                            </a>
                        </div>
                    </div>
                    <div class="bg-gradient-to-b from-purple-100 to-purple-50 dark:from-purple-900/30 dark:to-purple-800/20 rounded-lg p-4 border border-purple-200 dark:border-purple-800 shadow-sm">
                        <div class="text-center">
                            <i class="fas fa-truck text-3xl text-purple-500 mb-2"></i>
                            <p class="text-sm font-semibold text-purple-700 dark:text-purple-300">Giao hàng miễn phí</p>
                            <p class="text-xs text-purple-600 dark:text-purple-400 mt-1">Cho đơn hàng trên 500K</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-b from-green-100 to-green-50 dark:from-green-900/30 dark:to-green-800/20 rounded-lg p-4 border border-green-200 dark:border-green-800 shadow-sm">
                        <div class="text-center">
                            <i class="fas fa-shield-alt text-3xl text-green-500 mb-2"></i>
                            <p class="text-sm font-semibold text-green-700 dark:text-green-300">Cam kết chất lượng</p>
                            <p class="text-xs text-green-600 dark:text-green-400 mt-1">Hoa tươi 100%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 max-w-4xl mx-auto">
                <!-- Article -->
                <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden mb-8">
                    <!-- Featured Image -->
                    @if($blog->image)
                        <div class="w-full">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                class="w-full h-auto max-h-96 object-cover">
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="p-8">
                        <!-- Meta -->
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            {{ $blog->created_at->format('d/m/Y') }}
                            <span class="mx-3">•</span>
                            <i class="fas fa-clock mr-2"></i>
                            {{ ceil(str_word_count($blog->content) / 200) }} phút đọc
                        </div>

                        <!-- Title -->
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">{{ $blog->title }}</h1>

                        <!-- Content -->
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            <div class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">{{ $blog->content }}</div>
                        </div>

                        <!-- Share Section -->
                        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Chia sẻ bài viết</h3>
                            <div class="flex gap-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blogs.show', $blog)) }}" 
                                    target="_blank"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                                    <i class="fab fa-facebook-f mr-2"></i>
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blogs.show', $blog)) }}&text={{ urlencode($blog->title) }}" 
                                    target="_blank"
                                    class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white rounded-lg transition-colors duration-200">
                                    <i class="fab fa-twitter mr-2"></i>
                                    Twitter
                                </a>
                                <button onclick="copyToClipboard()" 
                                    class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200">
                                    <i class="fas fa-link mr-2"></i>
                                    Sao chép link
                                </button>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Recent Posts -->
                @if($recentBlogs->count() > 0)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Bài viết liên quan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($recentBlogs as $recentBlog)
                                <article class="group">
                                    <a href="{{ route('blogs.show', $recentBlog) }}" class="block">
                                        @if($recentBlog->image)
                                            <div class="overflow-hidden rounded-lg mb-3">
                                                <img src="{{ asset('storage/' . $recentBlog->image) }}" 
                                                    alt="{{ $recentBlog->title }}"
                                                    class="w-full h-40 object-cover group-hover:scale-110 transition-transform duration-300">
                                            </div>
                                        @else
                                            <div class="w-full h-40 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center mb-3">
                                                <i class="fas fa-image text-gray-400 text-3xl"></i>
                                            </div>
                                        @endif
                                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            {{ $recentBlog->created_at->format('d/m/Y') }}
                                        </div>
                                        <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-pink-600 dark:group-hover:text-pink-400 transition-colors duration-200 line-clamp-2">
                                            {{ $recentBlog->title }}
                                        </h3>
                                    </a>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Featured Products Section -->
                @if($featuredProducts->count() > 0)
                    <div class="bg-pink-50 dark:bg-gray-800 rounded-lg shadow-md p-8 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                                <i class="fas fa-star text-yellow-500 mr-2"></i>Hoa nổi bật
                            </h2>
                            <a href="{{ route('products.index', ['featured' => 1]) }}" class="text-pink-600 hover:text-pink-700 dark:text-pink-400 dark:hover:text-pink-300 text-sm font-medium">
                                Xem tất cả <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($featuredProducts as $product)
                                <div class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300">
                                    <a href="{{ route('products.show', $product) }}">
                                        <div class="h-40 overflow-hidden">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-gray-200 dark:bg-gray-600">
                                                    <i class="fas fa-image text-3xl text-gray-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="p-3">
                                        <a href="{{ route('products.show', $product) }}" class="block mb-1">
                                            <h3 class="text-sm font-semibold hover:text-pink-600 text-gray-900 dark:text-white transition duration-300 line-clamp-2">{{ $product->name }}</h3>
                                        </a>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-bold text-pink-600">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white rounded-full w-8 h-8 flex items-center justify-center transition duration-300">
                                                    <i class="fas fa-shopping-basket text-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Latest Products Section -->
                @if($latestProducts->count() > 0)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                                <i class="fas fa-seedling text-green-500 mr-2"></i>Hoa mới nhất
                            </h2>
                            <a href="{{ route('products.index', ['sort' => 'newest']) }}" class="text-pink-600 hover:text-pink-700 dark:text-pink-400 dark:hover:text-pink-300 text-sm font-medium">
                                Xem tất cả <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($latestProducts as $product)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-300 border border-gray-200 dark:border-gray-600">
                                    <a href="{{ route('products.show', $product) }}">
                                        <div class="h-40 overflow-hidden relative">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-110 transition duration-300">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center bg-gray-200 dark:bg-gray-600">
                                                    <i class="fas fa-image text-3xl text-gray-400"></i>
                                                </div>
                                            @endif
                                            <span class="absolute top-2 left-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Mới</span>
                                        </div>
                                    </a>
                                    <div class="p-3">
                                        <a href="{{ route('products.show', $product) }}" class="block mb-1">
                                            <h3 class="text-sm font-semibold hover:text-pink-600 text-gray-900 dark:text-white transition duration-300 line-clamp-2">{{ $product->name }}</h3>
                                        </a>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-bold text-pink-600">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white rounded-full w-8 h-8 flex items-center justify-center transition duration-300">
                                                    <i class="fas fa-shopping-basket text-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Back to Blog List -->
                <div class="text-center">
                    <a href="{{ route('blogs.index') }}"
                        class="inline-flex items-center px-6 py-3 bg-pink-600 hover:bg-pink-700 text-white font-medium rounded-lg transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Quay lại danh sách tin tức
                    </a>
                </div>
            </div>

            <!-- Right Advertisement - Hidden on mobile/tablet -->
            <div class="hidden xl:block w-40 flex-shrink-0">
                <div class="sticky top-24 space-y-4">
                    <div class="bg-gradient-to-b from-orange-100 to-orange-50 dark:from-orange-900/30 dark:to-orange-800/20 rounded-lg p-4 border border-orange-200 dark:border-orange-800 shadow-sm">
                        <div class="text-center">
                            <i class="fas fa-fire text-3xl text-orange-500 mb-2"></i>
                            <p class="text-sm font-semibold text-orange-700 dark:text-orange-300">Hot Sale</p>
                            <p class="text-xs text-orange-600 dark:text-orange-400 mt-1">Giảm đến 50% các loại hoa</p>
                            <a href="{{ route('products.index') }}" class="mt-3 inline-block text-xs bg-orange-500 hover:bg-orange-600 text-white px-3 py-1.5 rounded-full transition">
                                Khám phá
                            </a>
                        </div>
                    </div>
                    <div class="bg-gradient-to-b from-blue-100 to-blue-50 dark:from-blue-900/30 dark:to-blue-800/20 rounded-lg p-4 border border-blue-200 dark:border-blue-800 shadow-sm">
                        <div class="text-center">
                            <i class="fas fa-headset text-3xl text-blue-500 mb-2"></i>
                            <p class="text-sm font-semibold text-blue-700 dark:text-blue-300">Hỗ trợ 24/7</p>
                            <p class="text-xs text-blue-600 dark:text-blue-400 mt-1">Hotline: 1900-xxxx</p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-b from-red-100 to-red-50 dark:from-red-900/30 dark:to-red-800/20 rounded-lg p-4 border border-red-200 dark:border-red-800 shadow-sm">
                        <div class="text-center">
                            <i class="fas fa-heart text-3xl text-red-500 mb-2"></i>
                            <p class="text-sm font-semibold text-red-700 dark:text-red-300">Yêu thích</p>
                            <p class="text-xs text-red-600 dark:text-red-400 mt-1">Lưu hoa yêu thích của bạn</p>
                            <a href="{{ route('wishlist.show') }}" class="mt-3 inline-block text-xs bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-full transition">
                                Xem ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert('Đã sao chép link vào clipboard!');
            }).catch(err => {
                console.error('Lỗi khi sao chép:', err);
            });
        }
    </script>
@endsection
