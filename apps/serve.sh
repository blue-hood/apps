#!/bin/sh

php artisan key:generate
npm run production
php artisan config:cache
php artisan route:clear
php artisan view:clear
php artisan cache:clear

php artisan serve --host=apps.bluehood.net --port=80
