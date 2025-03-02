#!/bin/sh
set -e

if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

if [ "$1" = 'php-fpm' ] || [ "$1" = 'php' ] || [ "$1" = 'bin/console' ]; then

	if [ "$APP_ENV" != 'prod' ]; then
	    if [ -f composer.json ]; then
            composer install --prefer-dist --no-progress --no-interaction
            php artisan migrate
            php artisan db:seed
        fi
	fi

	setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX storage
	setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX storage
fi

exec docker-php-entrypoint "$@"
