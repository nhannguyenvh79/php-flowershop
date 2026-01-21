# HỆ THỐNG BÁN HÀNG HOA TƯƠI TRỰC TUYẾN

---

## 1. Mô tả bài toán

### 1.1. Phát biểu bài toán

Trong bối cảnh thương mại điện tử phát triển mạnh mẽ, việc kinh doanh hoa tươi trực tuyến đang trở thành xu hướng phổ biến. Khách hàng có thể dễ dàng tìm kiếm, lựa chọn và đặt mua hoa tươi qua các nền tảng trực tuyến mà không cần đến trực tiếp cửa hàng. Một hệ thống bán hàng hoa tươi hiệu quả cần đáp ứng được nhu cầu quản lý sản phẩm, đơn hàng, khách hàng và cung cấp trải nghiệm mua sắm tốt nhất cho người dùng.

**Bài toán đặt ra:** Xây dựng hệ thống bán hàng hoa tươi trực tuyến cho phép quản lý sản phẩm theo danh mục và thương hiệu, quản lý khách hàng, xử lý giỏ hàng, đơn hàng, danh sách yêu thích, hiển thị banner quảng cáo và chia sẻ nội dung blog về hoa.

### 1.2. Mục tiêu

- Quản lý sản phẩm hoa tươi theo danh mục và thương hiệu
- Quản lý thông tin khách hàng và tài khoản người dùng
- Xử lý giỏ hàng và quy trình đặt hàng trực tuyến
- Quản lý đơn hàng từ lúc tạo đến khi giao hàng
- Hỗ trợ danh sách yêu thích để khách hàng lưu sản phẩm
- Quản lý banner quảng cáo và nội dung marketing
- Chia sẻ kiến thức và tin tức qua blog
- Quản lý kho hàng và tồn kho sản phẩm
- Cấu hình linh hoạt hệ thống qua module settings

### 1.3. Đối tượng sử dụng

| Đối tượng             | Vai trò                                                            |
| --------------------- | ------------------------------------------------------------------ |
| Quản trị viên (Admin) | Quản lý toàn bộ hệ thống, sản phẩm, đơn hàng, khách hàng, nội dung |
| Khách hàng            | Duyệt sản phẩm, thêm vào giỏ hàng, đặt hàng, theo dõi đơn hàng     |
| Khách vãng lai        | Xem sản phẩm, đọc blog (không cần đăng nhập)                       |

### 1.4. Mô tả quy trình trong thực tế (Check lại dự án)

#### Quy trình 1: Mua hàng trực tuyến (Khách đã đăng ký)

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Tìm kiếm   │───▶│  Thêm vào   │───▶│  Xem giỏ    │───▶│  Đặt hàng   │───▶│  Thanh toán │
│  sản phẩm   │    │  giỏ hàng   │    │  hàng       │    │  xác nhận   │    │  hoàn tất   │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Tìm kiếm sản phẩm**: Khách hàng duyệt theo danh mục, thương hiệu hoặc tìm kiếm theo từ khóa
2. **Thêm vào giỏ hàng**: Chọn sản phẩm, số lượng và thêm vào giỏ hàng (Cart)
3. **Xem giỏ hàng**: Kiểm tra lại các sản phẩm đã chọn, điều chỉnh số lượng hoặc xóa
4. **Đặt hàng**: Nhập thông tin khách hàng (Customer), địa chỉ giao hàng, ghi chú
5. **Thanh toán**: Xác nhận đơn hàng, tạo Order và OrderItems, giảm stock sản phẩm

#### Quy trình 2: Quản lý đơn hàng (Admin)

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Nhận đơn   │───▶│  Xử lý đơn  │───▶│  Đóng gói   │───▶│  Vận chuyển │───▶│  Hoàn thành │
│  hàng mới   │    │  (Process)  │    │  (Shipped)  │    │ (Delivered) │    │  đơn hàng   │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Nhận đơn hàng mới**: Đơn hàng ở trạng thái "pending"
2. **Xử lý đơn**: Admin kiểm tra tồn kho, xác nhận và chuyển sang "processing"
3. **Đóng gói**: Chuẩn bị hàng, đóng gói và chuyển sang "shipped"
4. **Vận chuyển**: Giao cho đơn vị vận chuyển, khách hàng nhận hàng
5. **Hoàn thành**: Cập nhật trạng thái "delivered", hoàn tất đơn hàng

#### Quy trình 3: Quản lý nội dung và marketing

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Tạo banner │───▶│  Viết blog  │───▶│  Xuất bản   │
│  quảng cáo  │    │  content    │    │  hiển thị   │
└─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Tạo banner**: Admin tạo banner với hình ảnh, tiêu đề, mô tả, link
2. **Viết blog**: Tạo bài viết về hoa, cách chăm sóc, ý nghĩa hoa
3. **Xuất bản**: Đặt `is_active = true` để hiển thị trên trang chủ

#### Quy trình 4: Đăng ký và đăng nhập

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Đăng ký    │───▶│  Xác thực   │───▶│  Đăng nhập  │───▶│  Sử dụng    │
│  tài khoản  │    │  email      │    │  hệ thống   │    │  dịch vụ    │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Đăng ký tài khoản**: Khách hàng nhập name, email, username, password
2. **Xác thực email**: Hệ thống gửi email xác thực (optional)
3. **Đăng nhập**: Sử dụng email/username và password để đăng nhập
4. **Sử dụng dịch vụ**: Truy cập giỏ hàng, wishlist, lịch sử đơn hàng

#### Quy trình 5: Mua hàng không cần đăng ký (Guest Checkout)

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Chọn sản   │───▶│  Checkout   │───▶│  Nhập thông │───▶│  Xác nhận   │
│  phẩm       │    │  trực tiếp  │    │  tin KH     │    │  đơn hàng   │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Chọn sản phẩm**: Khách vãng lai duyệt và chọn sản phẩm (không cần đăng nhập)
2. **Checkout trực tiếp**: Bấm "Mua ngay" để đặt hàng
3. **Nhập thông tin**: Điền name, phone, email (nullable), address vào form Customer
4. **Xác nhận đơn hàng**: Tạo Customer record (user_id = NULL) và Order

#### Quy trình 6: Quản lý Wishlist

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Thêm vào   │───▶│  Xem danh   │───▶│  Thêm vào   │───▶│  Xóa khỏi   │
│  wishlist   │    │  sách       │    │  giỏ hàng   │    │  wishlist   │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Thêm vào wishlist**: User đăng nhập, click icon ❤️ trên sản phẩm
2. **Xem danh sách**: Truy cập trang "Sản phẩm yêu thích"
3. **Thêm vào giỏ hàng**: Chọn sản phẩm từ wishlist để mua
4. **Xóa khỏi wishlist**: Bỏ yêu thích khi không cần nữa

#### Quy trình 7: Quản lý sản phẩm (Admin)

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Thêm sản   │───▶│  Cập nhật   │───▶│  Quản lý    │───▶│  Ẩn/Hiện    │
│  phẩm mới   │    │  thông tin  │    │  tồn kho    │    │  sản phẩm   │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Thêm sản phẩm mới**: Nhập name, price, description, image, chọn category và brand
2. **Cập nhật thông tin**: Sửa giá, mô tả, hình ảnh khi cần
3. **Quản lý tồn kho**: Cập nhật số lượng `stock` khi nhập hàng hoặc kiểm kê
4. **Ẩn/Hiện sản phẩm**: Đặt `is_active = false` để ẩn sản phẩm hết hàng/ngừng kinh doanh

#### Quy trình 8: Xử lý đơn hàng bị hủy

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Yêu cầu    │───▶│  Kiểm tra   │───▶│  Hoàn stock │───▶│  Cập nhật   │
│  hủy đơn    │    │  trạng thái │    │  sản phẩm   │    │  trạng thái │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Yêu cầu hủy đơn**: Khách hàng hoặc Admin yêu cầu hủy đơn hàng
2. **Kiểm tra trạng thái**: Chỉ cho phép hủy đơn ở trạng thái "pending" hoặc "processing"
3. **Hoàn stock**: Cộng lại số lượng sản phẩm vào `products.stock`
4. **Cập nhật trạng thái**: Đổi `orders.status = 'cancelled'`

#### Quy trình 9: Kiểm kê tồn kho

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Đếm thực   │───▶│  So sánh    │───▶│  Điều chỉnh │───▶│  Báo cáo    │
│  tế kho     │    │  với hệ thg │    │  chênh lệch │    │  kết quả    │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Đếm thực tế**: Nhân viên kho đếm số lượng sản phẩm thực tế
2. **So sánh với hệ thống**: Đối chiếu với giá trị `products.stock` trong database
3. **Điều chỉnh chênh lệch**: Cập nhật lại `stock` nếu có sai khác
4. **Báo cáo kết quả**: Ghi nhận lý do chênh lệch (hư hỏng, mất mát, sai sót)

#### Quy trình 10: Tìm kiếm và lọc sản phẩm

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│  Nhập từ    │───▶│  Lọc theo   │───▶│  Sắp xếp    │───▶│  Hiển thị   │
│  khóa       │    │  tiêu chí   │    │  kết quả    │    │  kết quả    │
└─────────────┘    └─────────────┘    └─────────────┘    └─────────────┘
```

**Các bước chi tiết:**

1. **Nhập từ khóa**: Khách hàng tìm kiếm theo tên sản phẩm
2. **Lọc theo tiêu chí**: Chọn category, brand, khoảng giá
3. **Sắp xếp kết quả**: Theo giá tăng/giảm, mới nhất, bán chạy nhất
4. **Hiển thị kết quả**: Phân trang, hiển thị hình ảnh, giá, tên sản phẩm

---

## 2. Phân tích và thiết kế (Mô hình dữ liệu)

### 2.1. Liệt kê và mô tả các chức năng của hệ thống

| STT | Chức năng           | Mô tả                                                        |
| --- | ------------------- | ------------------------------------------------------------ |
| 1   | Quản lý người dùng  | Đăng ký, đăng nhập, quản lý tài khoản, phân quyền admin/user |
| 2   | Quản lý danh mục    | Thêm, sửa, xóa, tra cứu danh mục sản phẩm (hoa theo dịp)     |
| 3   | Quản lý thương hiệu | Quản lý các thương hiệu cung cấp hoa                         |
| 4   | Quản lý sản phẩm    | Thêm, sửa, xóa, tra cứu sản phẩm hoa, quản lý tồn kho        |
| 5   | Quản lý khách hàng  | Lưu trữ thông tin khách hàng đặt hàng                        |
| 6   | Quản lý giỏ hàng    | Thêm, xóa, cập nhật số lượng sản phẩm trong giỏ              |
| 7   | Quản lý đơn hàng    | Tạo, theo dõi, cập nhật trạng thái đơn hàng                  |
| 8   | Quản lý wishlist    | Lưu sản phẩm yêu thích của người dùng                        |
| 9   | Quản lý banner      | Tạo, chỉnh sửa banner quảng cáo trang chủ                    |
| 10  | Quản lý blog        | Viết, chỉnh sửa, xuất bản bài viết về hoa                    |
| 11  | Cài đặt hệ thống    | Cấu hình các thông số hệ thống (tên shop, logo, email, v.v.) |

### 2.2. Các đối tượng cần quản lý và mối quan hệ

#### 2.2.1. Các thực thể chính

| Thực thể       | Mô tả               | Thuộc tính chính                                                                          |
| -------------- | ------------------- | ----------------------------------------------------------------------------------------- |
| **Users**      | Người dùng hệ thống | id, name, email, username, password, role                                                 |
| **Categories** | Danh mục sản phẩm   | id, name, image, description, is_active, sort_order                                       |
| **Brands**     | Thương hiệu         | id, name, image, website, description, is_active                                          |
| **Products**   | Sản phẩm hoa        | id, name, category_id, brand_id, price, description, image, stock, is_active, is_featured |
| **Customers**  | Khách hàng          | id, user_id, name, phone, email, address                                                  |
| **Orders**     | Đơn hàng            | id, customer_id, total_amount, status, notes                                              |
| **OrderItems** | Chi tiết đơn hàng   | id, order_id, product_id, quantity, price                                                 |
| **Carts**      | Giỏ hàng            | id, user_id, product_id, quantity                                                         |
| **Wishlists**  | Danh sách yêu thích | id, user_id, product_id                                                                   |
| **Banners**    | Banner quảng cáo    | id, title, description, image, link, is_active, sort_order                                |
| **Blogs**      | Bài viết blog       | id, title, content, image, is_active                                                      |
| **Settings**   | Cài đặt hệ thống    | id, key, value, group, type, label, options                                               |

#### 2.2.2. Mối quan hệ giữa các thực thể

| Mối quan hệ           | Loại | Mô tả                                          |
| --------------------- | ---- | ---------------------------------------------- |
| Users - Customers     | 1-1  | Một user có thể có một profile khách hàng      |
| Users - Carts         | 1-N  | Một user có nhiều sản phẩm trong giỏ hàng      |
| Users - Wishlists     | 1-N  | Một user có nhiều sản phẩm yêu thích           |
| Categories - Products | 1-N  | Một danh mục chứa nhiều sản phẩm               |
| Brands - Products     | 1-N  | Một thương hiệu có nhiều sản phẩm              |
| Products - Carts      | 1-N  | Một sản phẩm có thể ở trong nhiều giỏ hàng     |
| Products - Wishlists  | 1-N  | Một sản phẩm có thể được nhiều người yêu thích |
| Products - OrderItems | 1-N  | Một sản phẩm có thể có trong nhiều đơn hàng    |
| Customers - Orders    | 1-N  | Một khách hàng có nhiều đơn hàng               |
| Orders - OrderItems   | 1-N  | Một đơn hàng có nhiều sản phẩm                 |

### 2.3. Các ràng buộc trên các đối tượng

#### Ràng buộc miền giá trị

| Bảng       | Thuộc tính   | Ràng buộc |
| ---------- | ------------ | --------- |
| Products   | price        | >= 0      |
| Products   | stock        | >= 0      |
| OrderItems | quantity     | > 0       |
| OrderItems | price        | >= 0      |
| Carts      | quantity     | > 0       |
| Orders     | total_amount | > 0       |
| Categories | sort_order   | >= 0      |
| Banners    | sort_order   | >= 0      |

#### Ràng buộc tham chiếu (Khóa ngoại)

- Products.category_id → Categories.id (ON DELETE CASCADE)
- Products.brand_id → Brands.id (ON DELETE CASCADE)
- Customers.user_id → Users.id (ON DELETE CASCADE)
- Carts.user_id → Users.id (ON DELETE CASCADE)
- Carts.product_id → Products.id (ON DELETE CASCADE)
- Wishlists.user_id → Users.id (ON DELETE CASCADE)
- Wishlists.product_id → Products.id (ON DELETE CASCADE)
- Orders.customer_id → Customers.id (ON DELETE CASCADE)
- OrderItems.order_id → Orders.id (ON DELETE CASCADE)
- OrderItems.product_id → Products.id (ON DELETE CASCADE)

#### Ràng buộc duy nhất (Unique)

| Bảng      | Thuộc tính            | Mô tả                                     |
| --------- | --------------------- | ----------------------------------------- |
| Users     | email                 | Email không được trùng                    |
| Users     | username              | Username không được trùng                 |
| Customers | email                 | Email khách hàng không trùng (nullable)   |
| Carts     | (user_id, product_id) | Một user chỉ có 1 dòng cho mỗi sản phẩm   |
| Wishlists | (user_id, product_id) | Một user chỉ yêu thích 1 lần mỗi sản phẩm |
| Settings  | key                   | Key setting không trùng                   |

#### Ràng buộc trạng thái

| Bảng   | Thuộc tính | Giá trị hợp lệ                                     |
| ------ | ---------- | -------------------------------------------------- |
| Users  | role       | admin, user                                        |
| Orders | status     | pending, processing, shipped, delivered, cancelled |

### 2.4. Mô hình mức quan niệm (Sơ đồ ERD)

```
┌─────────────────┐                    ┌─────────────────┐
│     Users       │                    │   Categories    │
├─────────────────┤                    ├─────────────────┤
│ *id             │                    │ *id             │
│  name           │                    │  name           │
│  email          │                    │  image          │
│  username       │                    │  description    │
│  password       │                    │  is_active      │
│  role           │                    │  sort_order     │
│  remember_token │                    │  timestamps     │
│  timestamps     │                    └────────┬────────┘
└────────┬────────┘                             │ 1
         │ 1                                    │
         │                                      │ N
         ├──────────────────┐          ┌───────┴────────┐
         │ 1                │          │   Products     │
         │                  │          ├────────────────┤
         │ N                │          │ *id            │
┌────────┴────────┐         │          │  name          │◄──────┐
│  Wishlists      │         │          │  category_id   │       │
├─────────────────┤         │          │  brand_id      │       │ N
│ *id             │         │          │  price         │       │
│  user_id (FK)   │         │          │  description   │       │
│  product_id (FK)│─────────┤          │  image         │       │
│  timestamps     │         │          │  stock         │       │
│  unique(u,p)    │         │          │  is_active     │       │
└─────────────────┘         │          │  is_featured   │       │
                            │          │  timestamps    │       │
┌─────────────────┐         │          └────────┬───────┘       │
│     Carts       │         │                   │ N             │
├─────────────────┤         │                   │               │
│ *id             │         │          ┌────────┴────────┐      │
│  user_id (FK)   │◄────────┤          │  OrderItems     │      │
│  product_id (FK)│─────────┤          ├─────────────────┤      │
│  quantity       │         │          │ *id             │      │
│  timestamps     │         │          │  order_id (FK)  │      │
│  unique(u,p)    │         │          │  product_id (FK)│──────┘
└─────────────────┘         │          │  quantity       │
                            │          │  price          │
┌─────────────────┐         │          │  timestamps     │
│   Customers     │         │          └────────┬────────┘
├─────────────────┤         │                   │ N
│ *id             │         │                   │
│  user_id (FK)   │◄────────┘                   │ 1
│  name           │                    ┌────────┴────────┐
│  phone          │                    │     Orders      │
│  email          │                    ├─────────────────┤
│  address        │                    │ *id             │
│  timestamps     │                    │  customer_id(FK)│
└────────┬────────┘                    │  total_amount   │
         │ 1                           │  status         │
         │                             │  notes          │
         │ N                           │  timestamps     │
         └─────────────────────────────┤                 │
                                       └─────────────────┘

┌─────────────────┐                    ┌─────────────────┐
│     Brands      │                    │    Banners      │
├─────────────────┤                    ├─────────────────┤
│ *id             │                    │ *id             │
│  name           │                    │  title          │
│  image          │                    │  description    │
│  website        │                    │  image          │
│  description    │                    │  link           │
│  is_active      │                    │  is_active      │
│  timestamps     │                    │  sort_order     │
└────────┬────────┘                    │  timestamps     │
         │ 1                           └─────────────────┘
         │
         │ N
         └──────────▶ Products

┌─────────────────┐                    ┌─────────────────┐
│     Blogs       │                    │    Settings     │
├─────────────────┤                    ├─────────────────┤
│ *id             │                    │ *id             │
│  title          │                    │  key (unique)   │
│  content        │                    │  value          │
│  image          │                    │  group          │
│  is_active      │                    │  type           │
│  timestamps     │                    │  label          │
└─────────────────┘                    │  options        │
                                       │  timestamps     │
                                       └─────────────────┘
```

### 2.5. Thiết kế CSDL (Mô hình mức logic)

#### Bảng 1: users (Người dùng hệ thống)

> **Tân từ:** Lưu trữ thông tin tài khoản người dùng, thông tin cá nhân và phân quyền admin/user.

| Thuộc tính        | Kiểu dữ liệu         | Ràng buộc                   | Mô tả                    |
| ----------------- | -------------------- | --------------------------- | ------------------------ |
| id                | BIGINT               | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng      |
| name              | VARCHAR(255)         | NOT NULL                    | Tên người dùng           |
| email             | VARCHAR(255)         | NOT NULL, UNIQUE            | Email đăng nhập          |
| username          | VARCHAR(255)         | NOT NULL, UNIQUE            | Tên đăng nhập            |
| password          | VARCHAR(255)         | NOT NULL                    | Mật khẩu đã mã hóa       |
| phone             | VARCHAR(20)          | NULL                        | Số điện thoại            |
| address           | TEXT                 | NULL                        | Địa chỉ nhà              |
| city              | VARCHAR(100)         | NULL                        | Thành phố                |
| state             | VARCHAR(100)         | NULL                        | Tỉnh/Bang                |
| zip_code          | VARCHAR(20)          | NULL                        | Mã bưu điện              |
| avatar            | VARCHAR(255)         | NULL                        | Ảnh đại diện người dùng  |
| role              | ENUM('admin','user') | DEFAULT 'user'              | Vai trò người dùng       |
| email_verified_at | TIMESTAMP            | NULL                        | Thời điểm xác thực email |
| remember_token    | VARCHAR(100)         | NULL                        | Token ghi nhớ đăng nhập  |
| created_at        | TIMESTAMP            | NULL                        | Ngày tạo                 |
| updated_at        | TIMESTAMP            | NULL                        | Ngày cập nhật            |

#### Bảng 2: categories (Danh mục sản phẩm)

> **Tân từ:** Lưu trữ các danh mục để phân loại sản phẩm hoa (hoa sinh nhật, hoa cưới, hoa khai trương, v.v.).

| Thuộc tính  | Kiểu dữ liệu | Ràng buộc                   | Mô tả                |
| ----------- | ------------ | --------------------------- | -------------------- |
| id          | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng  |
| name        | VARCHAR(255) | NOT NULL                    | Tên danh mục         |
| image       | VARCHAR(255) | NULL                        | Đường dẫn hình ảnh   |
| description | TEXT         | NULL                        | Mô tả danh mục       |
| is_active   | BOOLEAN      | DEFAULT TRUE                | Trạng thái hoạt động |
| sort_order  | INT          | DEFAULT 0                   | Thứ tự hiển thị      |
| created_at  | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày tạo             |
| updated_at  | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày cập nhật        |

#### Bảng 3: brands (Thương hiệu)

> **Tân từ:** Lưu trữ thông tin các thương hiệu cung cấp hoa.

| Thuộc tính  | Kiểu dữ liệu | Ràng buộc                   | Mô tả                |
| ----------- | ------------ | --------------------------- | -------------------- |
| id          | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng  |
| name        | VARCHAR(255) | NOT NULL                    | Tên thương hiệu      |
| image       | VARCHAR(255) | NULL                        | Logo thương hiệu     |
| website     | VARCHAR(255) | NULL                        | Website thương hiệu  |
| description | TEXT         | NULL                        | Mô tả thương hiệu    |
| is_active   | BOOLEAN      | DEFAULT TRUE                | Trạng thái hoạt động |
| created_at  | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày tạo             |
| updated_at  | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày cập nhật        |

#### Bảng 4: products (Sản phẩm)

> **Tân từ:** Lưu trữ thông tin chi tiết các sản phẩm hoa.

| Thuộc tính  | Kiểu dữ liệu  | Ràng buộc                   | Mô tả                      |
| ----------- | ------------- | --------------------------- | -------------------------- |
| id          | BIGINT        | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng        |
| name        | VARCHAR(255)  | NOT NULL                    | Tên sản phẩm               |
| category_id | BIGINT        | NOT NULL, FOREIGN KEY       | Khóa ngoại → categories.id |
| brand_id    | BIGINT        | NOT NULL, FOREIGN KEY       | Khóa ngoại → brands.id     |
| sku         | VARCHAR(100)  | NULL                        | Mã SKU sản phẩm            |
| price       | DECIMAL(10,2) | NOT NULL                    | Giá bán gốc                |
| sale_price  | DECIMAL(10,2) | NULL                        | Giá bán khuyến mãi         |
| description | TEXT          | NULL                        | Mô tả sản phẩm             |
| image       | VARCHAR(255)  | NULL                        | Hình ảnh sản phẩm          |
| stock       | INT           | DEFAULT 0                   | Số lượng tồn kho           |
| is_active   | BOOLEAN       | DEFAULT TRUE                | Trạng thái hoạt động       |
| is_featured | BOOLEAN       | DEFAULT FALSE               | Sản phẩm nổi bật           |
| created_at  | TIMESTAMP     | DEFAULT CURRENT_TIMESTAMP   | Ngày tạo                   |
| updated_at  | TIMESTAMP     | DEFAULT CURRENT_TIMESTAMP   | Ngày cập nhật              |

**Ràng buộc khóa ngoại:**

- `category_id` REFERENCES `categories(id)` ON DELETE CASCADE
- `brand_id` REFERENCES `brands(id)` ON DELETE CASCADE

#### Bảng 5: customers (Khách hàng)

> **Tân từ:** Lưu trữ thông tin khách hàng đặt hàng. Có thể liên kết với user hoặc khách vãng lai.

| Thuộc tính | Kiểu dữ liệu | Ràng buộc                   | Mô tả                            |
| ---------- | ------------ | --------------------------- | -------------------------------- |
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng              |
| user_id    | BIGINT       | NULL, FOREIGN KEY           | Khóa ngoại → users.id (nullable) |
| name       | VARCHAR(255) | NOT NULL                    | Tên khách hàng                   |
| phone      | VARCHAR(20)  | NOT NULL                    | Số điện thoại                    |
| email      | VARCHAR(255) | NULL, UNIQUE                | Email khách hàng                 |
| address    | TEXT         | NOT NULL                    | Địa chỉ giao hàng                |
| created_at | TIMESTAMP    | NULL                        | Ngày tạo                         |
| updated_at | TIMESTAMP    | NULL                        | Ngày cập nhật                    |

**Ràng buộc khóa ngoại:**

- `user_id` REFERENCES `users(id)` ON DELETE CASCADE

#### Bảng 6: orders (Đơn hàng)

> **Tân từ:** Lưu trữ thông tin các đơn hàng từ khách hàng.

| Thuộc tính   | Kiểu dữ liệu  | Ràng buộc                   | Mô tả                     |
| ------------ | ------------- | --------------------------- | ------------------------- |
| id           | BIGINT        | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng       |
| customer_id  | BIGINT        | NOT NULL, FOREIGN KEY       | Khóa ngoại → customers.id |
| total_amount | DECIMAL(10,2) | NOT NULL                    | Tổng tiền đơn hàng        |
| status       | ENUM          | DEFAULT 'pending'           | Trạng thái đơn hàng       |
| notes        | TEXT          | NULL                        | Ghi chú đơn hàng          |
| created_at   | TIMESTAMP     | NULL                        | Ngày tạo                  |
| updated_at   | TIMESTAMP     | NULL                        | Ngày cập nhật             |

**Giá trị ENUM cho status:**

- `pending`: Chờ xử lý
- `processing`: Đang xử lý
- `shipped`: Đã giao cho vận chuyển
- `delivered`: Đã giao hàng
- `cancelled`: Đã hủy

**Ràng buộc khóa ngoại:**

- `customer_id` REFERENCES `customers(id)` ON DELETE CASCADE

#### Bảng 7: order_items (Chi tiết đơn hàng)

> **Tân từ:** Lưu trữ chi tiết các sản phẩm trong mỗi đơn hàng.

| Thuộc tính | Kiểu dữ liệu  | Ràng buộc                   | Mô tả                     |
| ---------- | ------------- | --------------------------- | ------------------------- |
| id         | BIGINT        | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng       |
| order_id   | BIGINT        | NOT NULL, FOREIGN KEY       | Khóa ngoại → orders.id    |
| product_id | BIGINT        | NOT NULL, FOREIGN KEY       | Khóa ngoại → products.id  |
| quantity   | INT           | NOT NULL                    | Số lượng                  |
| price      | DECIMAL(10,2) | NOT NULL                    | Đơn giá tại thời điểm mua |
| created_at | TIMESTAMP     | NULL                        | Ngày tạo                  |
| updated_at | TIMESTAMP     | NULL                        | Ngày cập nhật             |

**Ràng buộc khóa ngoại:**

- `order_id` REFERENCES `orders(id)` ON DELETE CASCADE
- `product_id` REFERENCES `products(id)` ON DELETE CASCADE

#### Bảng 8: carts (Giỏ hàng)

> **Tân từ:** Lưu trữ các sản phẩm trong giỏ hàng của người dùng.

| Thuộc tính | Kiểu dữ liệu | Ràng buộc                   | Mô tả                    |
| ---------- | ------------ | --------------------------- | ------------------------ |
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng      |
| user_id    | BIGINT       | NOT NULL, FOREIGN KEY       | Khóa ngoại → users.id    |
| product_id | BIGINT       | NOT NULL, FOREIGN KEY       | Khóa ngoại → products.id |
| quantity   | INT          | DEFAULT 1                   | Số lượng                 |
| created_at | TIMESTAMP    | NULL                        | Ngày tạo                 |
| updated_at | TIMESTAMP    | NULL                        | Ngày cập nhật            |

**Ràng buộc:**

- UNIQUE(`user_id`, `product_id`): Mỗi user chỉ có 1 dòng cho mỗi sản phẩm
- `user_id` REFERENCES `users(id)` ON DELETE CASCADE
- `product_id` REFERENCES `products(id)` ON DELETE CASCADE

#### Bảng 9: wishlists (Danh sách yêu thích)

> **Tân từ:** Lưu trữ các sản phẩm mà người dùng yêu thích.

| Thuộc tính | Kiểu dữ liệu | Ràng buộc                   | Mô tả                    |
| ---------- | ------------ | --------------------------- | ------------------------ |
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng      |
| user_id    | BIGINT       | NOT NULL, FOREIGN KEY       | Khóa ngoại → users.id    |
| product_id | BIGINT       | NOT NULL, FOREIGN KEY       | Khóa ngoại → products.id |
| created_at | TIMESTAMP    | NULL                        | Ngày tạo                 |
| updated_at | TIMESTAMP    | NULL                        | Ngày cập nhật            |

**Ràng buộc:**

- UNIQUE(`user_id`, `product_id`): Mỗi user chỉ yêu thích 1 lần mỗi sản phẩm
- `user_id` REFERENCES `users(id)` ON DELETE CASCADE
- `product_id` REFERENCES `products(id)` ON DELETE CASCADE

#### Bảng 10: banners (Banner quảng cáo)

> **Tân từ:** Lưu trữ các banner quảng cáo hiển thị trên trang chủ.

| Thuộc tính  | Kiểu dữ liệu | Ràng buộc                   | Mô tả               |
| ----------- | ------------ | --------------------------- | ------------------- |
| id          | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng |
| title       | VARCHAR(255) | NOT NULL                    | Tiêu đề banner      |
| description | TEXT         | NULL                        | Mô tả banner        |
| image       | VARCHAR(255) | NOT NULL                    | Hình ảnh banner     |
| link        | VARCHAR(255) | NULL                        | Đường dẫn khi click |
| is_active   | BOOLEAN      | DEFAULT TRUE                | Trạng thái hiển thị |
| sort_order  | INT          | DEFAULT 0                   | Thứ tự hiển thị     |
| created_at  | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày tạo            |
| updated_at  | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày cập nhật       |

#### Bảng 11: blogs (Bài viết blog)

> **Tân từ:** Lưu trữ các bài viết blog về hoa, cách chăm sóc, ý nghĩa hoa.

| Thuộc tính | Kiểu dữ liệu | Ràng buộc                   | Mô tả               |
| ---------- | ------------ | --------------------------- | ------------------- |
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng |
| title      | VARCHAR(255) | NOT NULL                    | Tiêu đề bài viết    |
| content    | TEXT         | NOT NULL                    | Nội dung bài viết   |
| image      | VARCHAR(255) | NULL                        | Hình ảnh đại diện   |
| is_active  | BOOLEAN      | DEFAULT TRUE                | Trạng thái xuất bản |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày tạo            |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày cập nhật       |

#### Bảng 12: settings (Cài đặt hệ thống)

> **Tân từ:** Lưu trữ các cấu hình linh hoạt của hệ thống (tên shop, logo, email liên hệ, v.v.).

| Thuộc tính | Kiểu dữ liệu | Ràng buộc                   | Mô tả                                    |
| ---------- | ------------ | --------------------------- | ---------------------------------------- |
| id         | BIGINT       | PRIMARY KEY, AUTO_INCREMENT | Khóa chính, tự tăng                      |
| key        | VARCHAR(255) | NOT NULL, UNIQUE            | Khóa cài đặt                             |
| value      | TEXT         | NULL                        | Giá trị cài đặt                          |
| group      | VARCHAR(255) | DEFAULT 'general'           | Nhóm cài đặt                             |
| type       | VARCHAR(255) | DEFAULT 'text'              | Loại input (text, textarea, image, v.v.) |
| label      | VARCHAR(255) | NULL                        | Nhãn hiển thị                            |
| options    | TEXT         | NULL                        | Tùy chọn (JSON)                          |
| is_enabled | BOOLEAN      | DEFAULT TRUE                | Trạng thái tính năng                     |
| created_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày tạo                                 |
| updated_at | TIMESTAMP    | DEFAULT CURRENT_TIMESTAMP   | Ngày cập nhật                            |

---

## 3. Tổng kết

### 3.1. Thống kê

Hệ thống bán hàng hoa tươi được thiết kế với **12 bảng dữ liệu**:

**Bảng thực thể chính (9 bảng):**

1. users - Quản lý tài khoản
2. categories - Danh mục sản phẩm
3. brands - Thương hiệu
4. products - Sản phẩm hoa
5. customers - Khách hàng
6. orders - Đơn hàng
7. banners - Banner quảng cáo
8. blogs - Bài viết blog
9. settings - Cài đặt hệ thống

**Bảng quan hệ (3 bảng):**

1. order_items - Chi tiết đơn hàng (Orders ↔ Products)
2. carts - Giỏ hàng (Users ↔ Products)
3. wishlists - Danh sách yêu thích (Users ↔ Products)

### 3.2. Ưu điểm của thiết kế

✅ **Chuẩn hóa dữ liệu**: Tuân theo chuẩn 3NF, tránh trùng lặp dữ liệu

✅ **Tính mở rộng**: Dễ dàng thêm chức năng mới (đánh giá, khuyến mãi, v.v.)

✅ **Tính toàn vẹn**: Sử dụng khóa ngoại với CASCADE đảm bảo dữ liệu nhất quán

✅ **Linh hoạt**: Bảng Settings cho phép cấu hình động không cần thay đổi code

✅ **Hiệu năng**: Các unique constraint trên (user_id, product_id) tối ưu truy vấn

✅ **Phân quyền**: Hệ thống role admin/user rõ ràng

### 3.3. Các chỉ mục (Index) khuyến nghị

Để tối ưu hiệu năng truy vấn, nên tạo các index sau:

```sql
-- Products
CREATE INDEX idx_products_category ON products(category_id);
CREATE INDEX idx_products_brand ON products(brand_id);
CREATE INDEX idx_products_active_featured ON products(is_active, is_featured);

-- Orders
CREATE INDEX idx_orders_customer ON orders(customer_id);
CREATE INDEX idx_orders_status ON orders(status);
CREATE INDEX idx_orders_created_at ON orders(created_at);

-- OrderItems
CREATE INDEX idx_order_items_order ON order_items(order_id);
CREATE INDEX idx_order_items_product ON order_items(product_id);

-- Carts
CREATE INDEX idx_carts_user ON carts(user_id);

-- Wishlists
CREATE INDEX idx_wishlists_user ON wishlists(user_id);

-- Settings
CREATE INDEX idx_settings_group ON settings(`group`);
```

### 3.4. Các trigger và stored procedure khuyến nghị

#### Trigger 1: Cập nhật tồn kho khi tạo đơn hàng

```sql
DELIMITER $$
CREATE TRIGGER after_order_items_insert
AFTER INSERT ON order_items
FOR EACH ROW
BEGIN
    UPDATE products
    SET stock = stock - NEW.quantity
    WHERE id = NEW.product_id;
END$$
DELIMITER ;
```

#### Trigger 2: Tính tổng tiền đơn hàng

```sql
DELIMITER $$
CREATE TRIGGER after_order_items_insert_total
AFTER INSERT ON order_items
FOR EACH ROW
BEGIN
    UPDATE orders
    SET total_amount = (
        SELECT SUM(quantity * price)
        FROM order_items
        WHERE order_id = NEW.order_id
    )
    WHERE id = NEW.order_id;
END$$
DELIMITER ;
```

#### Stored Procedure: Lấy sản phẩm bán chạy

```sql
DELIMITER $$
CREATE PROCEDURE GetBestSellingProducts(IN limit_count INT)
BEGIN
    SELECT
        p.id,
        p.name,
        p.price,
        p.image,
        SUM(oi.quantity) as total_sold
    FROM products p
    INNER JOIN order_items oi ON p.id = oi.product_id
    INNER JOIN orders o ON oi.order_id = o.id
    WHERE o.status != 'cancelled'
    GROUP BY p.id
    ORDER BY total_sold DESC
    LIMIT limit_count;
END$$
DELIMITER ;
```

---

## PHỤ LỤC

### A. Các truy vấn SQL thường dùng

#### 1. Lấy danh sách sản phẩm có lọc và phân trang

```sql
SELECT p.*, c.name as category_name, b.name as brand_name
FROM products p
LEFT JOIN categories c ON p.category_id = c.id
LEFT JOIN brands b ON p.brand_id = b.id
WHERE p.is_active = 1
  AND (p.category_id = ? OR ? IS NULL)
  AND (p.brand_id = ? OR ? IS NULL)
  AND p.price BETWEEN ? AND ?
ORDER BY p.created_at DESC
LIMIT ? OFFSET ?;
```

#### 2. Lấy chi tiết đơn hàng

```sql
SELECT
    o.id as order_id,
    o.total_amount,
    o.status,
    o.created_at,
    c.name as customer_name,
    c.phone,
    c.address,
    oi.quantity,
    oi.price,
    p.name as product_name,
    p.image
FROM orders o
INNER JOIN customers c ON o.customer_id = c.id
INNER JOIN order_items oi ON o.id = oi.order_id
INNER JOIN products p ON oi.product_id = p.id
WHERE o.id = ?;
```

#### 3. Kiểm tra tồn kho trước khi đặt hàng

```sql
SELECT
    p.id,
    p.name,
    p.stock,
    c.quantity as cart_quantity,
    (p.stock >= c.quantity) as in_stock
FROM carts c
INNER JOIN products p ON c.product_id = p.id
WHERE c.user_id = ?;
```

#### 4. Thống kê doanh thu theo tháng

```sql
SELECT
    YEAR(created_at) as year,
    MONTH(created_at) as month,
    COUNT(*) as total_orders,
    SUM(total_amount) as total_revenue
FROM orders
WHERE status IN ('delivered')
GROUP BY YEAR(created_at), MONTH(created_at)
ORDER BY year DESC, month DESC;
```

#### 5. Sản phẩm được yêu thích nhiều nhất

```sql
SELECT
    p.id,
    p.name,
    p.price,
    p.image,
    COUNT(w.id) as wishlist_count
FROM products p
INNER JOIN wishlists w ON p.id = w.product_id
WHERE p.is_active = 1
GROUP BY p.id
ORDER BY wishlist_count DESC
LIMIT 10;
```

---

**Ngày tạo:** 19/01/2026  
**Phiên bản:** 1.0  
**Người thiết kế:** Hệ thống Flowershop
