FROM php:8.2-apache

# Install dependency system
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Aktifkan Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy semua source code DULU
COPY . .

# Copy Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install dependency PHP
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Ubah permission
RUN chown -R www-data:www-data /var/www/html

# Buka port 80
EXPOSE 80

# Jalankan apache
CMD ["apache2-foreground"]
