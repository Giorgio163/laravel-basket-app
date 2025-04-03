<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

# Laravel Basketball Store

This is a Laravel-powered e-commerce platform focused on basketball apparel and accessories.

## Features

- User authentication with role-based access
- Product catalog with detailed descriptions and pricing
- Shopping cart functionality
- Checkout process with order management
- Admin panel powered by Filament for managing products and orders

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/Giorgio163/laravel-basket-app.git
   cd laravel-basketball-store
   ```

2. Install dependencies:
   ```sh
   composer install
   npm install
   ```

3. Set up environment variables:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database in the `.env` file and run migrations:
   ```sh
   php artisan migrate --seed
   ```

5. Start the development server and build assets:
   ```sh
   php artisan serve & npm run dev
   ```

## Admin Access

- Navigate to `http://127.0.0.1:8000/admin/login`
- Default admin credentials (if using seeders):
    - **Email:** `test@test.com`
    - **Password:** `test123`

## User Access

- Navigate to `http://127.0.0.1:8000/`
- Create an user account or login with admin and enjoy.
