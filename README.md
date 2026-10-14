# Cat Tales 🐱

A cat adoption web application built with Laravel. Users can browse cats, adopt them, book visits, and leave reviews. Admins manage cats, orders, booking requests, and the photo gallery.

## Features

### For users
- Browse available cats and filter by breed and sex
- Adopt a cat and manage a cart
- Confirm an order and track its status
- Book a cat and see if the request is approved or denied
- View the photo gallery
- Read cat facts
- Write reviews
- Register, log in, and manage a profile (Laravel Jetstream)

### For admins
- Dashboard with totals for cats, adoptions, bookings, and delivered orders
- Add, edit, and delete cats
- Manage orders: mark as on the way, delivered, or cancelled
- Approve or deny booking requests
- Upload and delete gallery images

## Tech Stack

- **Backend:** PHP 8.2+, Laravel 12
- **Auth:** Laravel Jetstream, Sanctum, Livewire
- **Frontend:** Blade, Tailwind CSS, Vite
- **Database:** MySQL
- **Testing:** Pest

## Getting Started

### Requirements
- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL

### Installation

1. Clone the repository

   ```bash
   git clone https://github.com/YOUR-USERNAME/YOUR-REPO-NAME.git
   cd YOUR-REPO-NAME
   ```

2. Install dependencies

   ```bash
   composer install
   npm install
   ```

3. Create your environment file

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Create a MySQL database named `cat_tales`, then check these values in `.env`

   ```env
   DB_CONNECTION=mysql
   DB_DATABASE=cat_tales
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Run migrations and link storage

   ```bash
   php artisan migrate
   php artisan storage:link
   ```

6. Start the app (use two terminals)

   ```bash
   npm run dev
   ```

   ```bash
   php artisan serve
   ```

7. Open http://127.0.0.1:8000

## Creating an Admin

Every new user is a normal user by default. To make someone an admin, open the `users` table in your database and change the `user status` column from `user` to `admin`.

## Project Structure

```
app/Http/Controllers/   HomeController (users), AdminController (admin)
app/Models/             Cat, Adoption, Order, Book, GalleryImage, Review, User
database/migrations/    Database tables
resources/views/home/   User pages
resources/views/admin/  Admin pages
routes/web.php          All routes
```

## Running Tests

```bash
php artisan test
```

## Author

Your Name

## License

This project is open source and available under the [MIT License](https://opensource.org/licenses/MIT).
