FROM php:8.1.11-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip
RUN pecl install xdebug

WORKDIR /var/www

EXPOSE 80
