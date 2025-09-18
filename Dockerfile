# Use PHP 8.1 with Apache pre-installed
FROM php:8.1-apache

# Install required system tools and PHP extensions
RUN apt-get update && apt-get install -y zip unzip git \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Install Composer (PHP package manager)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory inside container
WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html

# Install PHP dependencies from composer.json
RUN composer install --no-dev --optimize-autoloader

# Fix permissions so Apache can read/write
RUN chown -R www-data:www-data /var/www/html

# Expose Apache default port
EXPOSE 80
