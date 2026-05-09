# Stage 1: Build frontend assets with Node
FROM node:18-alpine AS frontend
WORKDIR /build
COPY package*.json ./
RUN npm ci
COPY resources ./resources
COPY vite.config.js ./
RUN npm run build

# Stage 2: PHP runtime with Laravel
FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    curl \
    git \
    unzip \
    libzip-dev \
    oniguruma-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    zlib-dev \
    autoconf \
    g++ \
    make \
    && docker-php-ext-install -j$(nproc) \
    zip \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    pdo

# Install MongoDB extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application code
COPY . .

# Copy built frontend assets from node stage
COPY --from=frontend /build/public/build public/build

# Install PHP dependencies (production only)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Create storage directories and set permissions
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/html

# Set environment to production
ENV APP_ENV=production
ENV APP_DEBUG=false

# Expose port (Render will bind to $PORT)
EXPOSE 8000

# Start PHP built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
