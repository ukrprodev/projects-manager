#!/bin/bash

if [ -d "/var/www/api" ]; then
  cd "/var/www/api" || exit

  if [ -f ".env.example" ] && [ ! -f ".env" ]; then
    mv .env.example .env
  fi

  composer i
  php artisan key:generate

  SQLITE_FILE="database/database.sqlite"
  if [ ! -f "$SQLITE_FILE" ]; then
    php artisan migrate --seed
  fi
else
  exit 1
fi

echo "Setup completed. Starting PHP-FPM..."
exec php-fpm
