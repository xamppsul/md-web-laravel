# Use the official PHP image with Apache
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Expose port 8085 stagging server
EXPOSE 8085

# Start Laravel's built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8085"]