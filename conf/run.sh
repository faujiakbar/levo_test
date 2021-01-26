#!/bin/bash
if [ -d "storage" ]; then
	chown -Rf 1000:1000 storage/
	chmod -Rf 777 storage/
fi

if [ -d "bootstrap/cache" ]; then
	chown -Rf 1000:1000 bootstrap/cache/
	chmod -Rf 777 bootstrap/cache/
fi

if [ -f "artisan" ]; then
	echo "migrate process"
	sleep 20
	php artisan migrate
	php artisan optimize:clear
else
	echo "NO artisan" > vault.log
fi

php-fpm -F --pid /opt/bitnami/php/tmp/php-fpm.pid -y /opt/bitnami/php/etc/php-fpm.conf &
nginx -c /etc/nginx/nginx.conf -g "daemon off;"