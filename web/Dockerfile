FROM php:7.4-apache

ENV LANG=C.UTF-8 \
    TZ=Asia/Tokyo

RUN apt-get update \
    && apt-get install -y \
    git \
    vim \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
COPY ./env_files/php/dev/php.ini /usr/local/etc/php/
COPY ./env_files/apache/*.conf /etc/apache2/sites-enabled/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer global require laravel/installer

WORKDIR /app
