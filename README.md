Laravel CRUD application, with currency list and admin panel with ability to manage different currenies for user display
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    https://github.com/SabaSahban/laravel-crud-application.git

Switch to the repo folder

    cd crud-app
Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
    
Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
   
Start the local development server

    php artisan serve


You can now access the server at http://localhost:8000/property/admin
And main page at http://localhost:8000/currency/show


**TL;DR command list**

    git clone https://github.com/SabaSahban/laravel-crud-application.git
    cd crud-app
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan serve

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

If any changes were made, run

    php artisan migrate
    php artisan serve

