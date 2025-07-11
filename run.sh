#!/bin/zsh

echo "🔧 Laravel process started..."

composer update

php artisan migrate
php artisan shield:generate --all
php artisan db:seed
                
php artisan down

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
php artisan clear-compiled

php artisan config:cache
php artisan route:cache
php artisan view:cache

composer dump-autoload

php artisan up

echo "✅ Laravel running"
