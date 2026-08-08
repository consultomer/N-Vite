# N-Vite: Digital Invitations & Cards

> Final Year Project — BS Computer Science, Virtual University of Pakistan
> **Author:** Omer Abdul Rehman (BC200200491) · **Supervisor:** Rizwana Noor

N-Vite is a web platform that modernizes the traditional paper invitation. Customers browse a catalogue of invitation card designs (weddings, birthdays, parties, corporate events and more), personalize a card, and either order printed copies delivered to their door or send it out digitally by emailing it to a guest list — no paper required. An admin panel handles catalogue management, order fulfilment, and customer/contact-query oversight.

## Table of Contents
- [About the Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Database Schema](#database-schema)
- [Getting Started](#getting-started)
  - [Requirements](#requirements)
  - [Local Installation](#local-installation)
  - [Docker Installation (Laravel Sail)](#docker-installation-laravel-sail)
- [Default Seeded Accounts](#default-seeded-accounts)
- [Usage Guide](#usage-guide)
- [Development Methodology](#development-methodology)
- [References](#references)
- [License](#license)
- [Author & Contact](#author--contact)

## About the Project

Planning an event usually still means choosing, printing, and physically distributing invitations — a process that costs time, money, and paper. N-Vite lets a customer pick a design from a curated catalogue (or supply their own), customize it, and then either:

- **Order physical prints**, paid for via card or Cash on Delivery, delivered to their address, or
- **Send it digitally**, by uploading a list of guest names and email addresses — N-Vite emails each guest their personalized invitation automatically.

The goal is to make sending invitations faster, cheaper, and more sustainable, while giving the business owner (the "admin") full control over the catalogue and order pipeline.

## Features

### Customer-facing
- Browse invitation categories and subcategories, and view individual card designs with pricing.
- Canvas-based card customization/preview, saved and attached to the order.
- Shopping cart: add, remove, and update quantities before checkout.
- Two fulfilment paths at checkout:
  - **Home delivery** of printed cards (Credit/Debit card or Cash on Delivery).
  - **Digital distribution** — submit a list of recipient names/emails and N-Vite emails each one their invitation, complete with the card image as an attachment.
  - Order history for logged-in customers.
- Registration and login for returning customers.
- Static pages: About Us, Contact Us (with a stored query/message), Terms & Conditions.

### Admin panel
- Dashboard with live counts of orders, items, categories, subcategories, and admins.
- Category and subcategory management (create/delete).
- Item (card design) management: create, edit, delete, with image upload.
- Order management: view all orders and update delivery/order status.
- Admin user management: add/remove admin accounts.
- View customer contact-us submissions.
- Role-gated access via dedicated `is_admin` middleware, separate from customer auth.

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.1+, Laravel 10 |
| Frontend | Blade templates, Bootstrap, jQuery — served as static assets from `public/css` and `public/js` (no build step) |
| Database | MySQL |
| Auth | Laravel's built-in auth + Sanctum, with a separate admin guard/middleware |
| Mail | Laravel Mail (`Invitation`, `OrderShipped` mailables) |
| Local dev / containers | Laravel Sail (Docker) |
| Testing | PHPUnit |

## Project Structure

```
app/
  Http/Controllers/   # Home, Category, SubCategory, Item, Cart, Order, Data, Display, Admin, Auth
  Http/Middleware/     # AuthMiddleware (customers), AdminAuth (admin area)
  Mail/                # Invitation.php, OrderShipped.php
  Models/              # Category, Subcategory, Item, Cart, Order, Email, Query, Admin, User
database/
  migrations/          # users, admins, category, subcategory, items, order, email, cart, query
  seeders/             # CreateAdminSeeder, CreateUsersSeeder
resources/
  views/                # customer views (home, category, card, cart, payment, order...) + admin/*
  views/mail/           # invitation.blade.php, order.blade.php
routes/
  web.php               # public routes, customer-only ("auths") group, admin-only ("is_admin") group
```

## Database Schema

| Table | Purpose |
|---|---|
| `users` | Customer accounts |
| `admins` | Admin accounts (separate table/guard from customers) |
| `category` / `subcategory` | Invitation catalogue taxonomy |
| `items` | Individual card designs (name, description, price, image, linked to a subcategory/category) |
| `cart` | Items a logged-in customer has added before checkout |
| `order` | Placed orders (customer details, chosen design, price, quantity, delivery method) |
| `email` | Recipient list (name + email) attached to an order, used for digital invitation sending |
| `query` | Contact-us submissions |

## Getting Started

### Requirements
- PHP 8.1+
- Composer
- MySQL
- (Optional) Docker, for the Sail-based setup

> **Note on Node/npm:** the repo includes `package.json`, `vite.config.js`, and `laravel-vite-plugin` (leftovers from the Laravel starter template), but no view actually calls Laravel's `@vite(...)` directive — every page loads its CSS/JS straight from `public/css` and `public/js` via plain `asset()` links, with jQuery/Bootstrap vendored in as static files. So `npm install` / `npm run dev` are not required to run the app. They're left in place in case the frontend is migrated to a Vite-based build later; feel free to skip them.

### Local Installation

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd N-Vite
   ```
2. **Install PHP dependencies**
   ```bash
   composer install
   ```
3. **(Optional) Install JS dependencies** — only needed if you plan to work with the unused Vite setup; the app itself doesn't require it
   ```bash
   npm install
   ```
4. **Configure the environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Update `.env` with your MySQL credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) and mail settings if you want digital invitations to actually send.
5. **Run migrations**
   ```bash
   php artisan migrate
   ```
6. **Seed accounts (optional but recommended)**
   ```bash
   php artisan db:seed --class=Database\\Seeders\\CreateAdminSeeder
   php artisan db:seed --class=Database\\Seeders\\CreateUsersSeeder
   ```
7. **Link storage** (required for uploaded/customized card images)
   ```bash
   php artisan storage:link
   ```
8. **Run the app**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000`.

### Docker Installation (Laravel Sail)

This project ships with a `docker-compose.yml` configured for [Laravel Sail](https://laravel.com/docs/sail) (MySQL, Redis, Mailpit, Meilisearch).

```bash
cp .env.example .env
composer install
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan storage:link
```

The app will be available at `http://localhost` (or `APP_PORT` if customized). Mailpit's dashboard for previewing sent invitation emails is at `http://localhost:8025`.

## Default Seeded Accounts

If you ran the optional seeders above:

| Role | Email | Password |
|---|---|---|
| Admin | `admin@gmail.com` | `123123123` |
| Customer | `customer@gmail.com` | `123123123` |

**Change these before deploying anywhere public.**

## Usage Guide

**As a customer:** register/login → browse a category → pick a card design → customize it → add to cart → checkout, choosing either home delivery (pay by card or COD) or digital delivery (supply a guest email list) → track the order under "My Orders."

**As an admin:** log in at `/admin` → use the dashboard to see catalogue/order counts → manage categories, subcategories, and items (with image upload) under their respective admin pages → review and update order statuses → manage other admin accounts → review contact-us queries.

## Development Methodology

This project was built following the **VU Process Model**, a hybrid of the waterfall and spiral methodologies used for Virtual University of Pakistan final year projects. Work was divided into sequential phases — requirements gathering & analysis, design, and development — with supervisor review and sign-off at the end of each phase before advancing to the next, combining spiral-style iterative feedback with waterfall-style phase gating.

## References

- [Laravel](https://laravel.com/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)
- [Bootstrap](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [Visual Studio Code](https://code.visualstudio.com/)

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Author & Contact

**Omer Abdul Rehman** (BC200200491)
BS Computer Science, Virtual University of Pakistan

- **Email:** [consultomer@gmail.com](mailto:consultomer@gmail.com)
- **LinkedIn:** [Omer Abdulrehman](https://www.linkedin.com/in/omerarehman/)
