# Hướng dẫn cài đặt dự án bán quần áo Laravel

## Yêu cầu
- PHP >= 8.2 và Composer
- Cơ sở dữ liệu MySQL hoặc SQLite

## Các bước cài đặt
1. Clone mã nguồn và cài đặt các thư viện
   ```bash
   composer install
   npm install && npm run build
   ```
2. Sao chép file `.env.example` thành `.env` và cấu hình thông tin kết nối database.
3. Tạo khóa ứng dụng và chạy migration
   ```bash
   php artisan key:generate
   php artisan migrate
   ```
4. Khởi chạy server phát triển
   ```bash
   php artisan serve
   ```

Sau khi hoàn tất, truy cập địa chỉ hiển thị trên terminal để xem website.
