FROM php:8.2-apache

# Устанавливаем расширения pdo_mysql и mysqli для работы с базой данных
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Включаем модуль mod_rewrite для Apache (понадобится для роутинга в курсе)
RUN a2enmod rewrite