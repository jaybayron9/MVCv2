# DIY MVC Inspired by Laravel

This DIY MVC (Model-View-Controller) framework is inspired by Laravel and aims to provide a simplified yet effective way to structure and organize your web application. It includes routing syntax and migrations for efficient development.

## Getting Started

### Prerequisites

- PHP installed on your local machine (PHP 8.1x recommended).
- Composer installed to manage dependencies.
- MySQL or any other database of your choice.

### Installation

1. Clone or download this repository to your local machine.
2. Run `composer install` to install the required dependencies.
3. Configure your database settings in `.env` file.
4. Run migrations to set up the database schema: `php migrate.php`.

### Usage

1. Define your routes in `resources/web.php` using the specified routing syntax.
2. Create controllers in the `app/controllers` directory and define actions for handling routes.
3. Implement models in the `app/models/` directory to interact with the database.
4. Create corresponding views in the `resources/views/` directory for each controller action.
5. Access your application through the defined routes.

## Routing Syntax

The routing syntax is inspired by Laravel and follows a similar pattern:

```php
Route::get('/path', [UserController::class, 'login']);
Route::post('/path', [UserController::class, 'login']);
