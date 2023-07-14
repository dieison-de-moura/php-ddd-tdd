FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git
RUN apt-get update && apt-get install php*-mysql
RUN apt-get update && apt-get install -y vim
RUN apt-get update && docker-php-ext-install pdo_mysql
RUN apt-get update && \
    apt-get install libzip-dev -y && \
    docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www