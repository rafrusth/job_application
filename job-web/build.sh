#!/bin/bash
set -e

echo "Downloading Composer..."
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
chmod +x /usr/local/bin/composer

echo "Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

echo "Caching Laravel config..."
php artisan config:cache
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force