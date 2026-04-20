# Zenith Apps - Event Organizer Platform

Event organizer marketplace platform for managing event packages, bookings, and transactions. Built with **Laravel 11**.

## Requirements

- **PHP**: 8.1 or higher
- **Composer**: Latest version
- **Database**: MySQL 8.0+ or PostgreSQL 13+

## Installation

### 1. Install Dependencies

```bash
composer install
```

### 2. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Update `.env` File

```env
APP_NAME=Zenith
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zenueapps
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Create Database

```sql
CREATE DATABASE zenueapps;
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Start Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## Project Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── Controller.php
│       ├── PaketController.php
│       ├── TransactionController.php
│       └── UserController.php
├── Models/
│   ├── Booking.php
│   ├── Eo.php
│   ├── Paket.php
│   ├── Transaction.php
│   └── User.php
└── Providers/
    └── AppServiceProvider.php
bootstrap/
├── app.php
└── providers.php
database/
├── migrations/
├── factories/
└── seeders/
public/
├── css/          # Main stylesheets
│   ├── modern.css
│   ├── header-inline.css
│   ├── auth-inline.css
│   ├── paket-details-inline.css
│   └── ...
└── js/           # Main scripts
    ├── main.js
    ├── header-inline.js
    ├── login-inline.js
    ├── register-inline.js
    └── ...
resources/
└── views/
    ├── layout/
    │   ├── app.blade.php     # Main layout (header + footer)
    │   ├── auth.blade.php    # Auth layout (login/register)
    │   ├── header.blade.php  # Navigation header
    │   └── footer.blade.php  # Site footer
    └── pages/
        ├── index.blade.php           # Homepage
        ├── login_page.blade.php      # User login
        ├── register_page.blade.php   # User registration
        ├── register_eo.blade.php     # EO registration
        ├── browse_paket.blade.php    # Browse packages
        ├── paket_details.blade.php   # Package detail
        ├── dashboard.blade.php       # Dashboard
        ├── manage_paket.blade.php    # EO: manage packages
        ├── user_transact.blade.php   # User: bookings
        ├── transact_detail.blade.php  # Transaction detail
        ├── wishlist.blade.php        # Wishlist
        ├── user_profile.blade.php    # User profile
        ├── eo_profile.blade.php      # EO profile
        ├── form_ambilpaket.blade.php  # Booking form
        ├── search_paket.blade.php    # Search results
        ├── paket.blade.php           # EO: orders view
        └── ... (notification, approval, payment pages)
routes/
├── web.php
├── api.php
└── console.php
tests/
├── Unit/
│   ├── UserModelTest.php
│   ├── EoModelTest.php
│   ├── PaketModelTest.php
│   ├── TransactionModelTest.php
│   └── BookingModelTest.php
└── Feature/
    ├── UserControllerTest.php
    ├── PaketControllerTest.php
    └── TransactionControllerTest.php
```

---

## Features

### User Roles

| Role | Description |
|------|-------------|
| **Regular User** | Browse packages, make bookings, manage wishlist |
| **Event Organizer (EO)** | Create and manage event packages, handle orders |

### Core Functionality

| Feature | Description |
|---------|-------------|
| User Registration | Register as regular user or EO |
| User Login | Authenticate with email and password |
| Package Browsing | Browse packages by category with search & sort |
| Package Management | EO can create, edit, delete packages |
| Booking System | Users can book event packages |
| Transaction Tracking | Track booking status and payments |
| Wishlist | Save favorite packages for later |
| Notifications | Real-time notifications for users and EOs |
| User Profile | Edit profile and password |
| EO Profile | Manage EO business profile |

---

## Database Schema

### Users Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | string | User's full name |
| email | string | User's email (unique) |
| no_telp | string | Phone number |
| password | string | Hashed password |
| is_eo | boolean | Is Event Organizer flag |

### Eos Table (Event Organizers)

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| user_id | bigint | Foreign key to users |
| nama_eo | string | EO business name |
| email | string | EO contact email |
| alamat | text | EO address |
| kontak | string | Contact phone |
| link | string | Website (nullable) |
| gambar_profil | string | Profile image (nullable) |

### Pakets Table (Packages)

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| id_eo | bigint | Foreign key to eos |
| gambar_paket | string | JSON array of images |
| nama_paket | string | Package name |
| kategori | string | Category (Wedding, Concert, Party, etc.) |
| available | string | Availability status |
| deskripsi | text | Package description |
| harga_paket | decimal | Price |

### Transactions Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| id_paket | bigint | Foreign key to pakets |
| id_user | bigint | Foreign key to users |
| kode_booking | string | Booking code |
| email | string | Customer email |
| no_telp | string | Customer phone |
| tanggal_acara | date | Event date |
| status_pembayaran | int | Payment status (0=Pending, 1=Paid) |
| status_approval | int | Approval status (0=Pending, 1=Approved, 2=Rejected) |

---

## Routes

### Public Routes

| Method | URI | Description |
|--------|-----|-------------|
| GET | `/` | Home page |
| GET | `/login` | Login page |
| GET | `/register` | Registration page |
| GET | `/regist_eo` | EO registration page |
| GET | `/paket` | Browse all packages |
| GET | `/detail_paket/{id}` | Package detail page |

### Authenticated Routes (Users & EO)

| Method | URI | Description |
|--------|-----|-------------|
| POST | `/register` | Register new user |
| POST | `/login` | User login |
| GET | `/logout` | User logout |
| POST | `/registereo` | Register as EO |
| GET | `/dashboard` | User dashboard |
| GET | `/edit_user` | Edit user profile |
| GET | `/user_profile` | View user profile |
| GET | `/booking` | User bookings / transactions |
| GET | `/wishlist` | Saved packages |
| GET | `/user/notif` | User notifications |
| GET | `/user/payments` | Payment methods |

### EO-Specific Routes

| Method | URI | Description |
|--------|-----|-------------|
| GET | `/manage_paket` | Manage EO packages |
| POST | `/insert` | Create package |
| GET | `/paket_edit/{id}` | Edit package |
| POST | `/update/{id}` | Update package |
| GET | `/hapus_paket/{id}` | Delete package |
| GET | `/orders` | View orders |
| GET | `/eo/approve_book` | Approve bookings |
| GET | `/eo/notif` | EO notifications |
| GET | `/eo_profile` | View EO profile |
| GET | `/eo_profile/edit` | Edit EO profile |

---

## Authentication

The application uses a custom `users` guard for authentication:

- **Login**: Email + Password
- **Auth Guard**: `Auth::guard('users')`
- **Session-based**: Uses Laravel's default session driver

---

## CSS & JS Architecture

Styles and scripts use an **inline externalization pattern**: inline `<style>` and `<script>` blocks in blade templates are extracted into external files in `public/css/` and `public/js/`, then loaded via Laravel's `@push/@stack` mechanism.

### CSS Files

| File | Description |
|------|-------------|
| `modern.css` | Base theme styles |
| `header-inline.css` | Navigation header styles |
| `auth-inline.css` | Login/register page styles |
| `paket-details-inline.css` | Package detail page styles |
| `transact-detail-inline.css` | Transaction detail styles |
| `user-editprofile-inline.css` | Edit profile styles |
| `user-transact-inline.css` | User transactions/booking styles |
| `wishlist-inline.css` | Wishlist page styles |
| `index.css` | Homepage styles |

### JS Files

| File | Description |
|------|-------------|
| `header-inline.js` | Navigation, scroll behavior, notifications |
| `index-slider-inline.js` | Homepage EO carousel slider |
| `browse-paket-inline.js` | Package browsing, filtering, wishlist toggle |
| `login-inline.js` | Login form validation |
| `register-inline.js` | User registration validation |
| `register-eo-inline.js` | EO registration validation |
| `manage-paket-inline.js` | Package management modals |
| `paket-details-inline.js` | Package detail page JS |
| `user-transact-inline.js` | Booking cancel modal |
| `transact-detail-inline.js` | Transaction detail JS |
| `wishlist-inline.js` | Wishlist remove modal |
| `dashboard-inline.js` | Dashboard pagination |

### Page Body Classes

Each page sets a unique body class for page-specific CSS targeting:

| Page | Body Class |
|------|-----------|
| Homepage | `is-home` |
| Login/Register | `body-auth` |
| Browse Packages | `is-package` |
| Package Detail | `is-paket-detail` |
| Dashboard | `is-dashboard` |
| Manage Packages | `is-manage` |
| User Bookings | `is-booking` |
| Transaction Detail | `is-transact` |
| Wishlist | `is-wishlist` |
| User Profile | `is-profile` |
| EO Profile | `is-eo-profile` |

---

## Testing

```bash
# Run all tests
php artisan test

# Run with coverage
php artisan test --coverage

# Run specific test suite
php artisan test --testsuite=Unit
php artisan test --testsuite=Feature
```

---

## Common Commands

```bash
# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Recreate cache
php artisan config:cache
php artisan route:clear

# Database
php artisan migrate
php artisan migrate:rollback
php artisan migrate:fresh

# Development
php artisan serve
php artisan route:list
```

---

## Troubleshooting

### Database Connection Error
- Ensure MySQL is running
- Check `.env` database credentials
- Verify database exists

### Storage Not Found
- Run `php artisan storage:link`
- Check `storage/app/public` permissions

### Authentication Issues
- Clear cache: `php artisan config:clear`
- Check `config/auth.php` guard configuration

---

## Recent Changes

### Inline Code Externalization
- Extracted all inline `<style>` blocks from blade templates into external CSS files in `public/css/`
- Extracted all inline `<script>` blocks from blade templates into external JS files in `public/js/`
- Migrated to Laravel's `@push/@stack` mechanism for styles and scripts
- Created 15 external CSS files and 12 external JS files
- Added body classes to all 26 blade templates for page-specific CSS targeting

### Homepage Improvements
- Fixed navbar text visibility (dark header with white text)
- Added border and rounded container to EO slider section
- Removed gap between CTA section and footer
- Fixed hero section padding for proper nav-to-content spacing

### Code Cleanup
- Fixed missing `@section('body_class')` directives across all pages
- Removed duplicate CSS rules in header-inline.css
- Fixed missing user-transact-inline.js file
- Cleaned up orphaned inline code left behind by partial replacements
- Removed unused bower_components directory (Flot, Ionicons, etc.)

### Laravel 11 Upgrade
- Upgraded from Laravel 5.8 to Laravel 11
- Updated `composer.json` with Laravel 11 packages
- Migrated `bootstrap/app.php` to Laravel 11 style
- Added `bootstrap/providers.php`
- Simplified `config/app.php`
- Added `HasFactory` trait to all models
- Added relationships to models (User, Eo, Paket, Transaction)
- Updated exception handler
- Updated phpunit.xml for Laravel 11

---

## License

This project is proprietary software. All rights reserved.
