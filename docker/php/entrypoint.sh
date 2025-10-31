#!/bin/bash

# Corrige permissões para Laravel
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Recria o link simbólico para arquivos públicos
rm -rf public/storage
php artisan storage:link

# Inicia o PHP-FPM
exec "$@"