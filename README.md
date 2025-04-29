# WebShop TALL Stack Project

This project is built using the TALL stack:
- **T**ailwind CSS
- **A**lpine.js
- **L**aravel
- **L**ivewire

Additionally, it includes:
- **Laravel Breeze** for authentication scaffolding
- **Filament** for admin panel and dashboard

## Installation

1. Clone the repository
2. Navigate to the project directory:
```bash
cd webshop-tall
```
3. Install PHP dependencies:
```bash
composer install
```
4. Install Node.js dependencies:
```bash
npm install
```
5. Create a copy of your .env file:
```bash
cp .env.example .env
```
6. Generate an application key:
```bash
php artisan key:generate
```
7. Run database migrations:
```bash
php artisan migrate 
```
7.1 If you want to seed the data
```bash
php artisan db:seed
```
8. Build assets:
```bash
npm run build
```

## Development

To start the development server:
```bash
php artisan serve
```

To watch for frontend changes:
```bash
npm run dev
```

## Accessing Admin Panel

Filament admin panel is accessible at:
(If you have logged in as user, then you need to logout from user then you will see the admin form created in Filament)
```
/admin
```

## Project Structure

- **Livewire Components**: `app/Livewire`
- **Filament Admin Panel**: `app/Filament`
- **Views**: `resources/views`
- **CSS/JS**: `resources/css` and `resources/js`