<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About this app

This app is a test for a postion in Innoscript, is the backend of a pizza shopping web site made with laravel


## Instructions to deploy locally

The following commands should be executed as shown:
    
    -** composer install //Command for Installing needed libraries
    -** php artisan migrate db:fresh --seed //Command for deploying database and seed the tables that need to be seeded
    -** php artisan passport:install --force //Command for installing the needed access keys
    -** php artisan test //Optional, for executing test
    -** php artisan serve //Serve app
    

## Use

The app is an REST API. Here is the postman doc : comming soon
