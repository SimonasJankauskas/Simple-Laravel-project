Simple Laravel project Restaurants.

## Installation

- Create a database locally named ***sms***
- Download composer https://getcomposer.org/download/
- Pull Laravel/php project from git repository
- Rename .env.example file to .env inside your project root (youd can rename it with this line: ```cp .env.example .env```)
- Edit these .env file parameters (```DB_NAME (sms), DB_USERNAME, DB_PASSWORD```)
- Open the console and cd your project root directory
- Run ```composer install``` or ```php composer.phar install```
- Run ```php artisan key:generate```
- Run ```php artisan migrate```
- Run ```php artisan serve```
- Open project through ```http://127.0.0.1:8000```

## Features
- Laravel UI authentication system Register/Login and Logout
- Unregistered users only could see home page with students information
- Registered users will be able to ***create*** new student entry
- Registered users will be able to ***edit*** student entry
- Registered users will be able to ***delete*** student entry