# ====================
# Build Stage
# ====================
FROM composer:2 as composer_build

WORKDIR /app

# Copy file composer
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# ====================
# Production Stage
# ====================
FROM php:8.2-apache

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Copy vendor hasil install dari build stage
COPY --from=composer_build /app/vendor ./vendor

# (Optional) Set permission untuk keamanan
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (default Apache port)
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
