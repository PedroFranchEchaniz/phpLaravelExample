FROM php:7.1

RUN apt-get updtare && apt-get install -y libp-dev && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html

COPY . . 

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/boostrap/cache

CMD ["php", "artisan", "serve", "--host=0.0.0.0 --port=8000"]