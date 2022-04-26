#!/bin/sh

chmod o+w ./storage/ -R
php artisan migrate

exec "$@"