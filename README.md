
# Laravel+Vue Crud Starter index calculation app kklp Univ. Dipa Makassar


[![Build Status](https://dev.azure.com/anowarhossain/laravel-vue-crud-starter/_apis/build/status/AnowarCST.laravel-vue-crud-starter?branchName=master)](https://dev.azure.com/anowarhossain/laravel-vue-crud-starter/_build/latest?definitionId=6&branchName=master)


## About Repository

KKLP Universitas Dipa Makassar Angakatan III


## Tech Specification

- Laravel 8
- Vue 2 + VueRouter + vue-progressbar + sweetalert2 + laravel-vue-pagination
- Laravel Passport
- Admin LTE 3 + Bootstrap 4 + Font Awesome 5
- PHPUnit Test Case/Test Coverage

## Features

- Modal based Create+Edit, List with Pagination, Delete with Sweetalert
- Login, Register, Forget+Reset Password as default auth
- Profile, Update Profile, Change Password, Avatar
- Product Management 
- User Management
- Settings: Categories, Tags
- Frontend and Backend User ACL with Gate Policy (type: admin/user)
- Simple Static Dashboard
- Developer Options for OAuth Clients and Personal Access Token
- Build with Docker

## Installation

- `cd laravel-vue-crud-starter/`
- `composer install`
- `cp .env.example .env`
- Update `.env` and set your database credentials
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan passport:install`
- `npm install`
- `npm run dev`
- `php artisan serve`

## Install with Docker

- `docker-compose up -d`
- `docker exec -it vue-starter /bin/bash`
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`
- `php artisan passport:install`
- Application http://localhost:8008/
- Adminer for Database http://localhost:8080/
- DBhost: yourIP:3307, user: root, Password: 123456


## Unit Test

#### run PHPUnit

```bash
# run PHPUnit all test cases
vendor/bin/phpunit
# or Feature test only
vendor/bin/phpunit --testsuite Feature
```

## Thanks to STO Antang
