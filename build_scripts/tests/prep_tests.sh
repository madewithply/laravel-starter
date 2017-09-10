# Go to Laravel directory
cd webapp

# Set the testing environment
cp .env.testing .env
touch database/database.sqlite

# Remove cached files
rm -f boostrap/cache/config.php
rm -f boostrap/cache/services.php

# Update composer
composer self-update --no-plugins

# Install the dependencies
composer install --no-interaction --prefer-dist

# Set the app key
php artisan key:generate

# Remove Compiled Services file and cache config
php artisan clear-compiled
php artisan config:cache

# Run Migration
php artisan migrate:refresh --seed