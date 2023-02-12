# Lean and Mean Dev with PhpStorm (for Symfony) 

Hiya!

This is the code, script and other Tom-foolery for the tutorial that you can
find here:

https://symfonycasts.com/screencast/phpstorm

## Project Setup

**NOTE**: Because this is an older tutorial, the code only
works on PHP 7.2 and lower.

If you've just downloaded the code, congratulations!!

To get it working, follow these steps:

**Download Composer dependencies**

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```

You may alternatively need to run `php composer.phar install`, depending
on how you installed Composer.

## parameters.yml Config

As `composer install` finishes, it will interactively ask you for some
setup config, like your database credentials. Fill these in for your
machine (you can just hit enter for the mailer configuration - that won't
be use).

## Database Setup

To set up the database, run:

```
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
```

## Web Server

The easier web server to use is the built-in PHP web server
via Symfony. Run:

```
php app/console server:run
```

Then open your site at http://localhost:8000

Cheers!
