FROM php:7.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev zip unzip tzdata \
    && docker-php-ext-install zip pdo_mysql mbstring exif pcntl bcmath gd \
    && docker-php-ext-install mysqli\
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN usermod -u 1000 www-data

# Get 1.10.16 Composer
COPY --from=composer:1.10.16 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

USER www-data
