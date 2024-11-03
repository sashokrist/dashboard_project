<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Install and run the project follow these steps:

If you run migration and seed it will create grind with 9 buttons 2 users:

user1@test.com      password:12345678

user1@test.com      password:12345678

run in console:

git clone git@github.com:sashokrist/dashboard_project.git

cd dashboard_project

composer install

cp .env.example .env

php artisan key:generate

Set database credentials in .env

 php artisan migrate --seed    //to be able to see the grind, the user must run migration and seed and login with user1@test.com      password:12345678

npm install

npm run dev

php artisan serve

Project Description:

Dynamic Link Dashboard with Configurable Buttons

Overview

The Dynamic Link Dashboard is a web application designed to manage and configure a set of customizable buttons, each with unique links, titles, and colors. Built with Laravel, this application provides users with a streamlined interface to create, edit, delete, and organize interactive buttons for quick access to specified URLs.

Key Features

Dashboard Interface:

The main dashboard displays a grid of user-configurable buttons.
Each button includes a title, a color, and an optional URL link.
Users can easily see all available buttons and click to open URLs directly.

Configurable Button Modal:

Buttons marked "Config" open an inline modal where users can edit button details.
The modal allows users to update the button’s title, link, and color without leaving the dashboard.
AJAX is used for seamless, page-refresh-free updates.

Button Management:

Create New Button-
Users can add a new button to the dashboard with a default title, link, and color.
Edit Button: Through the modal, users can modify button properties. This includes adding a new URL link or changing the title and color.
Delete Button: Users can delete a button, permanently removing it from the dashboard.
User-Specific Access:

Only authenticated users have access to the dashboard.
Each user sees and manages only their own buttons.
Technical Highlights

Frontend:

The user interface is built with Bootstrap, providing a responsive, mobile-friendly design.

AJAX Integration:

AJAX is implemented for modal-based editing, creating a smoother, dynamic experience without full-page reloads.
Laravel Backend:

Built with Laravel, the backend manages user authentication, and button data storage.

Database:

The button configuration is stored in a relational database, including user ownership details for secure, user-specific access.

Screenshots:

![s1](https://github.com/user-attachments/assets/a76a980a-8c5a-4f7d-9b09-fe13ba4f019c)

![s2](https://github.com/user-attachments/assets/9984cd70-da00-40ba-a5a3-e86dafe992bd)

![s3](https://github.com/user-attachments/assets/20f62296-1f5f-46a6-b0ef-d6df8ed6579f)



