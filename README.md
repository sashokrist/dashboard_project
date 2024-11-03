<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Install and run the project follow these steps:

run in console:

git clone git@github.com:sashokrist/dashboard_project.git

cd credit-system

composer install

cp .env.example .env

php artisan key:generate

Set database credentials in .env

php artisan migrate

php artisan db:seed

npm install

npm run dev

php artisan serve

Project Description: Dynamic Link Dashboard with Configurable Buttons

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

Create New Button: Users can add a new button to the dashboard with a default title, link, and color.
Edit Button: Through the modal, users can modify button properties. This includes adding a new URL link or changing the title and color.
Delete Button: Users can delete a button, permanently removing it from the dashboard.
User-Specific Access:

Only authenticated users have access to the dashboard.
Each user sees and manages only their own buttons.
Technical Highlights

Frontend: The user interface is built with Bootstrap, providing a responsive, mobile-friendly design.
AJAX Integration: AJAX is implemented for modal-based editing, creating a smoother, dynamic experience without full-page reloads.
Laravel Backend: Built with Laravel, the backend manages user authentication, button data storage, and provides RESTful API endpoints for button management.
Database: The button configuration is stored in a relational database, including user ownership details for secure, user-specific access.
