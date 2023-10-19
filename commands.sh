#!/bin/bash

rm -rf bootstrap/cache/* &&
php artisan config:clear &&
php artisan route:clear &&
php artisan cache:clear &&
php artisan view:cache  &&
php artisan view:clear

