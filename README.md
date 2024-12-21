# DEVPanel Multi Guard Auth (Laravel 11, Vue 3.4, Client/Admin Panel)

Panel z multi guard authentication w Laravel (Vue3, Sessions, Social login, Spatie permissions, 2FA emails, auth emails, local package dev). 

# Zawiera

SPA, client dashboard, router, stores, locales, themes, fontawesome.css, animate.css, custom inputs, code highlightjs.

## Vue

Zainstaluj node.js i pobierz repozytorium z githuba rozpakuj i przejdż do katalogu.

### Instaluj, kompiluj

```sh
npm install
npm run build
```

## Laravel

Zainstaluj composer

### Aktualizuj

```sh
composer clear-cache
composer update
composer dump-autoload -o
```

### Konfiguracja

```php
// config/apilogin.php
return [
  // Admin users emails (email with dns mx)
  'super_admin_email' => 'superadmin@gmail.com',
  'admin_email' => 'admin@gmail.com',
  'worker_email' => 'worker@gmail.com',

  // Admin users passsword
  'super_admin_password' => 'Password123#',
  'admin_password' => 'Password123#',
  'worker_password' => 'Password123#',
]
```

### Uruchom

```sh
php artisan key:generate
php artisan migrate:fresh
php artisan config:clear
php artisan storage:link

php artisan serve
php artisan serve --host=localhost --port=8000
```

## Dev

### Mysql user i db

```sql
CREATE DATABASE IF NOT EXISTS laravel CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE IF NOT EXISTS laravel_testing CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

GRANT ALL PRIVILEGES ON *.* TO root@localhost IDENTIFIED BY 'toor' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON *.* TO root@127.0.0.1 IDENTIFIED BY 'toor' WITH GRANT OPTION;
```

### 2FA auth

Two factor auth redirection url (vue).

```sh
/login/f2a/{hash}
/admin/login/f2a/{hash}
```

### S3 dysk

```sh
FILESYSTEM_DISK=s3
```

## Uruchom testy

```sh
php artisan test --stop-on-failure --testsuite=Dev
```

## Screenshots

<img src="https://raw.githubusercontent.com/atomjoy/dev-panel/refs/heads/main/screenshots/client.png" width="100%">
