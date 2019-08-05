# Jumia Challenge - Phone List

It's a simple project that you can see a list of phones, and filter for country or valid status. It was created using Laravel Framework and Bootstrap. I hope you like it! 😃

## Installation
1 - Clone the project;

2 - Use composer [composer](https://getcomposer.org/) to install the dependencies;
```bash
composer install
```

3 - Clone the .env.example file, rename to .env and update the folder of your project in the DB_DATABASE constant(.env file). Ex: ```C:\Users\Alex\Documents\jumia-phone-project\database\sample.sqlite```

4 - Generate a new encrypt key
```bash
php artisan key:generate
```

## Run the tests

Run the command ```phpunit``` inside of the project folder.
