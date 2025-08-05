# Task Manager App

## Requisitos
- PHP >= 8.0
- Laravel 10
- Node.js + npm
- Vue 3

## MySQL

# sudo mysql

```bash
-- Creamos un usuario nuevo con contraseña
CREATE USER 'laraveluser'@'localhost' IDENTIFIED WITH mysql_native_password BY 'laravelpass';

-- Le damos acceso total a la base de datos 'laravel'
GRANT ALL PRIVILEGES ON laravel.* TO 'laraveluser'@'localhost';

-- Aplicamos los cambios
FLUSH PRIVILEGES;

-- Salimos de MySQL
EXIT;

## Si se necesita develvor la BD
php artisan migrate:reset
php artisan migrate:fresh

## Log
less storage/logs/laravel.log


## Instalación Backend
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan config:clear
php artisan config:cache
php artisan migrate
php artisan serve


