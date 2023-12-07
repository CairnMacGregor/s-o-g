# Use the official PHP 8.0 FPM image from Docker Hub
FROM php:8.0-fpm

# Copy the local src directory to the container's workspace
COPY src/ /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
