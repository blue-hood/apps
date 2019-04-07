#/bin/bash

trap 'kill 0' 1 2 3

cd apps/
./serve.sh &
npm run production
php artisan config:cache
php artisan route:clear
php artisan view:clear
php artisan cache:clear

cd ../
rm -rf apps.bluehood.local/.
wget --mirror --page-requisites --html-extension http://apps.bluehood.local
# ここで sitemap.xml も wget すること。つまり、ルートのリストが必要。
cp -r apps/public/. apps.bluehood.local/
rm apps.bluehood.local/index.php

kill 0
