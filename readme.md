# Realtime Pizza Order Tracker - Laravel, Vue & Pusher
🍕🍕🍕

Code for YouTube video tutorial: [https://www.youtube.com/watch?v=pjK0VMTCtVg](https://www.youtube.com/watch?v=pjK0VMTCtVg)

## Installation

1. clone the repo and cd into it
1. `composer install`
1. rename or copy `.env.example` file to `.env`
1. Enter your database credentials in your `.env` file
1. Change `BROADCAST_DRIVER` to `pusher` in your `.env` file
1. Enter your Pusher credentials in your `.env` file. If needed, change cluster in `config/broadcasting.php`
1. `php artisan migrate`
1. `php artisan key:generate`
1. Enter your Pusher key in `resources/assets/js/bootstrap.js`. If needed, change cluster as well
1. `npm install`
1. `npm run dev`
1. `php artisan serve` or use Laravel Valet
1. Visit localhost:8000 in your browser
1. Make a new user and a new pizza order. Open up another window, go to admin, change order status, and watch it update in realtime!
