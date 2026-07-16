FROM php:8.2-apache

# Install pdo_mysql и mysqli extensions for working with DB
RUN docker-php-ext-install mysqli pdo pdo_mysql

# enable Apache mod_rewrite for work with routing in course
RUN a2enmod rewrite