FROM php:8.3-apache

# Enable mod_rewrite if needed
RUN a2enmod rewrite

# Copy your app
COPY . /var/www/html/

EXPOSE 80
