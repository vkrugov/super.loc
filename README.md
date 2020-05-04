## SuperHero

Required:
- PHP 7.2
- Mysql
- Ubuntu

#You need
- clone & install frontend from https://github.com/vkrugov/super-front
- create DataBase 'super' in MySql

## For Localhost

go to folder afore project and set permissions:
- sudo chgrp -R www-data super.loc/
- sudo chmod -R 775 super.loc/storage/
- sudo chmod -R 777 super.loc/storage/logs

1) in project create .env and fill it from .env.example
2) in .env Fill next fields with your local data:
   * DB_DATABASE=super
   * DB_USERNAME=***
   * DB_PASSWORD=***
3) run next commands:
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan jwt:secret
- php artisan storage:link

go to project folder and run serve:
- php artisan serve --port 1580

IMPORTANT! check created url. Frontend work only with http://127.0.0.1:1580/

Install and start frontend:
* Open VueJs project and enter:

- npm install
- npm run serve

open created host
