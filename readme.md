# ZenueApps2 - Event Organizer Platform

Event organizer marketplace platform for managing event packages, bookings, and transactions.

Built with **Laravel 11**.

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
│   ├── Controllers/
│   │   ├── Controller.php
│   │   ├── DashboardController.php
│   │   ├── PaketController.php
│   │   ├── TransactionController.php
│   │   └── UserController.php
│   └── Middleware/
│       └── AuthUser.php
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
│   ├── 2019_04_16_042110_create_eos_table.php
│   ├── 2019_04_16_050652_create_transactions_table.php
│   ├── 2019_04_16_052840_create_bookings_table.php
│   ├── 2019_04_27_052755_create_pakets_table.php
│   └── 2019_05_14_075521_create_users_table.php
routes/
├── web.php
├── api.php
└── console.php
resources/
└── views/
    ├── layout/
    │   ├── app.blade.php
    │   └── footer.blade.php
    └── pages/
        ├── index.blade.php
        ├── login_page.blade.php
        ├── register_page.blade.php
        ├── register_eo.blade.php
        ├── paket.blade.php
        ├── paket_details.blade.php
        ├── form_ambilpaket.blade.php
        ├── search_paket.blade.php
        ├── dashpage.blade.php
        └── ... (other pages)
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
| **Regular User** | Browse packages, make bookings |
| **Event Organizer (EO)** | Create and manage event packages |

### Core Functionality

| Feature | Description |
|---------|-------------|
| User Registration | Register as regular user or EO |
| User Login | Authenticate with phone number and password |
| Package Management | EO can create, edit, delete packages |
| Package Search | Search packages by name |
| Booking System | Users can book event packages |
| Transaction Tracking | Track booking status and payments |

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
| is_renter | boolean | Is Renter flag |

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
| kategori | string | Category (Wedding, Catering, etc.) |
| available | string | Availability status |
| deskripsi | text | Package description |
| harga_paket | decimal | Price |

### Transactions Table
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| id_paket | bigint | Foreign key to pakets |
| kode_booking | string | Booking code (nullable) |
| email | string | Customer email |
| no_telp | string | Customer phone |
| tanggal_acara | date | Event date |
| status_pembayaran | int | Payment status (0=Pending, 1=Paid) |

### Bookings Table
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| pemesan_id | bigint | Customer user ID |
| renter_id | bigint | Renter user ID |
| jenis_layanan | string | Service type |
| lokasi | text | Event location |
| konsep_acara | text | Event concept |
| deskripsi_acara | text | Event description |
| jumlah_tamu | bigint | Number of guests |
| tanggal_acara | datetime | Event date/time |
| informasi | text | Additional info (nullable) |
| is_accepted | boolean | Acceptance status |

---

## Routes

### Public Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | `/` | Home page |
| GET | `/login` | Login page |
| GET | `/register` | Registration page |
| GET | `/regist_eo` | EO registration page |

### Authenticated Routes (Users)
| Method | URI | Description |
|--------|-----|-------------|
| POST | `/register` | Register new user |
| POST | `/login` | User login |
| GET | `/logout` | User logout |
| POST | `/registereo` | Register as EO |
| GET | `/dashboard` | Dashboard |
| GET | `/paket` | Manage packages (EO) |
| POST | `/insert` | Create package |
| POST | `/update/{id}` | Update package |
| GET | `/paket_edit/{id}` | Edit package |
| GET | `/hapus_paket/{id}` | Delete package |
| GET | `/detail_paket/{id}` | Package details |
| POST | `/search` | Search packages |
| GET | `/ambil_paket/{idpaket}` | Book package |
| POST | `/form_paket` | Submit booking |

### EO Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | `/eo/approve_book` | Approve bookings |
| GET | `/eo/notif` | EO notifications |
| GET | `/eo_profile` | EO profile page |
| GET | `/edit_eo` | Edit EO profile |

### User Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | `/user/approve_book` | User bookings |
| GET | `/user/notif` | User notifications |
| GET | `/user/payments` | Payment methods |
| GET | `/edit_user` | Edit user profile |
| GET | `/request` | Transaction history |

---

## Authentication

The application uses a custom `users` guard for authentication:

- **Login**: Phone number (`no_telp`) + Password
- **Auth Guard**: `Auth::guard('users')`
- **Session-based**: Uses Laravel's default session driver

### Middleware

| Middleware | Description |
|------------|-------------|
| `auth.users` | Protects authenticated routes |

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

### Test Files

| Test File | Tests |
|-----------|-------|
| `UserModelTest` | User creation, password hidden, relationships |
| `EoModelTest` | EO creation, user/pakets relationships |
| `PaketModelTest` | Package creation, images, formatted price |
| `TransactionModelTest` | Transaction creation, status labels |
| `BookingModelTest` | Booking creation, pemesan/renter relationships |
| `UserControllerTest` | Register, login, logout, EO registration |
| `PaketControllerTest` | CRUD operations, authentication |
| `TransactionControllerTest` | Booking flow, validation |

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

### Laravel 11 Upgrade
- Upgraded from Laravel 5.8 to Laravel 11
- Updated `composer.json` with Laravel 11 packages
- Migrated `bootstrap/app.php` to Laravel 11 style
- Added `bootstrap/providers.php`
- Simplified `config/app.php`
- Added `HasFactory` trait to all models
- Added relationships to models (User, Eo, Paket, Transaction, Booking)
- Updated exception handler
- Updated phpunit.xml for Laravel 11

### Code Cleanup
- Fixed duplicate routes in `api.php`
- Removed unused controllers and files
- Fixed PaketController bugs (`$id_eo`, typo)
- Added missing Eo import
- Fixed UserController undefined `$user` variable
- Added password hiding to User model
- Fixed Booking and Transaction models
- Cleaned up routes
- Removed empty stubs and dead code

---

## License

This project is proprietary software. All rights reserved.
