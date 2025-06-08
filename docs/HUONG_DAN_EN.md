# Installation Guide for the Laravel Clothing Shop

## Requirements
- PHP >= 8.2 and Composer
- MySQL or SQLite database

## Installation Steps
1. Clone the source code and install dependencies
   ```bash
   composer install
   npm install && npm run build
   ```
2. Copy `.env.example` to `.env` and configure your database connection.
3. Generate the application key and run migrations and seeders
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```
4. Start the development server
   ```bash
   php artisan serve
   ```

After completing the steps, open the URL shown in the terminal to view the website.

Default administrator account:
- Email: `admin@example.com`
- Password: `password`
