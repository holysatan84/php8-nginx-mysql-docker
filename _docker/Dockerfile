FROM php:8.1.11-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

COPY ./_config/xdebug.ini "${PHP_INI_DIR}/conf.d/"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

EXPOSE 80
