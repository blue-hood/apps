#/bin/bash

cd apps/
npm run production
php artisan config:cache
php artisan route:clear
php artisan view:clear
php artisan cache:clear

cd ../
rm -rf apps.bluehood.local/
wget --mirror --page-requisites --html-extension http://apps.bluehood.local
# ここで sitemap.xml も wget すること。つまり、ルートのリストが必要。

for path in `find apps.bluehood.local/ -name '*.html?*'`
do
  rename="${path//index.html?/_}"
  rename="${rename//.html?/.html_}"
  mv "${path}" "${rename}"
done

cp -r apps/public/. apps.bluehood.local/
rm apps.bluehood.local/index.php
