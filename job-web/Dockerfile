# --- Stage 1: PHP Dependencies ---
FROM composer:latest AS vendor-builder
WORKDIR /app
COPY composer.json composer.lock ./
# We ignore platform reqs here because we just need the files for Vite
RUN composer install --no-dev --no-scripts --no-autoloader --ignore-platform-reqs

# --- Stage 2: Frontend Assets ---
FROM node:22-slim AS frontend-builder
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
# Copy vendor files from stage 1 so Vite can find flux.css
COPY --from=vendor-builder /app/vendor ./vendor
RUN npm run build

# --- Stage 3: Final Image ---
FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_pgsql pgsql bcmath

# Enable Apache mod_rewrite
RUN a2enmod rewrite
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
COPY . .

# Copy everything from the builders
COPY --from=vendor-builder /app/vendor ./vendor
COPY --from=frontend-builder /app/public/build ./public/build

# Ensure no .env file exists so Render variables are used
RUN rm -f .env

# Final composer optimization
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer dump-autoload --optimize --no-scripts

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
# Run migrations and start Apache
CMD php artisan migrate --force && apache2-foreground
