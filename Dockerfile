# Start from official PHP image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    git \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl

# Set working directory
WORKDIR /var/www/html

# Install Composer (PHP dependency manager)
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Copy all application files
COPY . .

# Install Node.js dependencies for Vite frontend
RUN npm install

# Build frontend assets using Vite
RUN npm run build

# Set permissions (storage + cache folders)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port (Laravel server will run here)
EXPOSE 8000

# Start Laravel development server (for Render)
CMD php artisan serve --host=0.0.0.0 --port=8000
