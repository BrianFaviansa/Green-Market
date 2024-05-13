# Green Market

## Web Application of Green Market

### Requirements

- PHP >= 8.1
- Composer
- MySQL + phpmyadmin

### Installation

1. Clone Repository :
   
    `https://github.com/BrianFaviansa/Green-Market.git`

2. Open Directory
   
    `cd Green-Market`

3. Install PHP Dependency
   
    `composer install`

4. Copy .env.example to .env then do the database configuration

5. Generate Application key
    
    `php artisan key:generate`

6.  Run Migration & Seeder
    
    `php artisan migrate --seed`

7. Linking Storage
    
    `php artisan storage:link`

8. Open Terminal for Running Development Server

    `php artisan serve`

