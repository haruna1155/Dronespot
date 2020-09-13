#!/bin/sh
cd /
composer create-project --prefer-dist laravel/laravel app "6.*"
chmod -R 777 /app/storage
