<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Laravle-ERP
Base on Laravel 5.5

### STEP 1. Git Clone
> git clone https://github.com/RobinJian/laravel-ERP

### STEP 2. Get Into laravel-ERP
>cd laravel-ERP

### STEP 3. Rebuild /vendor Direction
>composer install

### STEP 4. Rebuild /node_modules  Direction
>npm install

### STEP 5. Rebuild .env
>cp .env.example .env

### STEP 6. Create APP_KEY
>php artisan key:generate

### STEP 7. Rebuild Database and Seeder
>php artisan migrate:refresh --seed
