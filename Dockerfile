FROM php:8.2-apache
## Composer
## Install composer dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip
#In below code first path is address where composer located in current image (downloaded frmo DockerHub),
#the second path is the destination directory inside our container.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Install pdo_mysql и mysqli extensions for working with DB
RUN docker-php-ext-install mysqli pdo pdo_mysql
# Create path variable
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
#Replace old path with new variable
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
# enable Apache mod_rewrite for work with routing in course
RUN a2enmod rewrite