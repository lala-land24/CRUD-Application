# Use PHP 8.1 with Apache
FROM php:8.1-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y unzip git curl \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (better for caching)
COPY composer.json composer.lock* ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy the rest of the project
COPY . /var/www/html

# Fix permissions so Apache can read/write
RUN chown -R www-data:www-data /var/www/html

# Expose Apache default port
EXPOSE 80
