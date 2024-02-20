# Application Access Credentials

This section provides default credentials for accessing different parts of the application. Please ensure these credentials are changed in production environments to maintain security.

## Admin Access

The admin panel can be accessed at `yourdomain.com/admin`.

- **URL**: `yourdomain.com/admin`
- **Email**: `admin@admin.com`
- **Password**: `password`

## User Access

Standard user access for the application.

- **Email**: `user@user.com`
- **Password**: `password`

## Note

These credentials are provided for initial setup and testing purposes only. It's crucial to use strong, unique passwords and change the default credentials before deploying the application in a production environment.


# Laravel Application Setup Guide

This README provides detailed instructions for deploying a Laravel application on a server with Apache as the web server and MySQL as the database. Follow these steps after ensuring your server has Apache, MySQL, PHP, and Composer installed.

## Prerequisites

- **Apache Web Server**
- **MySQL Database Server**
- **PHP** (version required by your Laravel version, usually PHP >= 8.1)
- **Composer** - PHP Dependency Manager
- **NPM** - Front Dependency Manager

## Step-by-Step Installation

### Step 1: Clone the Repository

Clone your Laravel application repository onto your server by executing:
```apacheconf
git clone https://github.com/shaxzodbe/test-project
```

Navigate to the application directory:
```apacheconf
cd /path/to/test-project
```

Install the required PHP packages using Composer:
```apacheconf
composer install --ignore-platform-reqs
```

Install the required PHP packages using NPM:
```apacheconf
npm install
```

Copy the .env.example file to .env and update it with your specific settings, including database credentials:
```apacheconf
cp .env.example .env
```

Edit the .env file to configure your database connection:
```apacheconf
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Generate a new Laravel application key:
```apacheconf
php artisan key:generate
```

Run the Laravel migrations with seeders to create your database schema:
```apacheconf
php artisan migrate:fresh --seed
```

