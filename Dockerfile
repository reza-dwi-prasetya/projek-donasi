FROM php:8.2-apache

# Aktifkan module (bukan install ulang!)
RUN docker-php-ext-enable pdo pdo_mysql || true

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

COPY . .

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
