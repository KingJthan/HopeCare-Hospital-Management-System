# HopeCare Hospital Management System

## Overview
This is a Laravel-based web application developed to manage hospital operations including patients, drug categories, drugs, and treatments.

## Installation Steps

1. Extract or copy the project folder into htdocs.

2. Open terminal in the project directory and run:
composer install

3. Generate application key:
php artisan key:generate

4. Create the environment file if needed:
copy .env.example .env

5. Configure the database in the .env file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hopecare_hospital
DB_USERNAME=root
DB_PASSWORD=

6. Run migrations:
php artisan migrate

7. Seed sample data:
php artisan db:seed

8. Start the server:
php artisan serve

9. Open in browser:
http://127.0.0.1:8000

## Features
- Dashboard with statistics and charts
- Patient management
- Drug categories management
- Drug management
- Treatment management

## Technologies Used
- Laravel
- PHP
- MySQL
- Blade
- Bootstrap
- Chart.js

## Author
Jonathan Mugume  
VU-BBC-2411-1587-DAY  
2026