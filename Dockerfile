FROM php:8.0-apache

RUN docker-php-ext-install mysqli

VOLUME /var/www/html
VOLUME /usr/local/etc/php