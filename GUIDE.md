# FPT ShopFake Guide

This project is a demo Laravel application for a clothes shop.

## Setup

1. Install dependencies:
   ```bash
   composer install
   npm install && npm run build
   ```
2. Copy `.env.example` to `.env` and configure your database settings.
3. Run migrations:
   ```bash
   php artisan migrate
   ```
4. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

The application exposes RESTful endpoints for managing products, categories, brands and more. Endpoints follow the standard Laravel resource patterns.

Admin routes are prefixed with `/admin` and require authentication with the `admin` role.


