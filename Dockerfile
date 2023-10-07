FROM php:8.0-apache

RUN docker-php-ext-install mysqli

RUN a2enmod rewrite

VOLUME /var/www/html
VOLUME /usr/local/etc/php
VOLUME /etc/apache2/sites-available