FROM php:8.1-fpm

COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

RUN pecl install xdebug \
    && docker-php-ext-install mysqli pdo_mysql \
    && chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 9000

ENTRYPOINT [ "entrypoint.sh" ]
CMD [ "php-fpm" ]