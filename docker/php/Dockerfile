FROM php:7.4-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y wget vim git libicu-dev libonig-dev \
    libpq-dev libzip-dev libpng-dev libjpeg-dev libjpeg62-turbo-dev \
    libfreetype6-dev libwebp-dev libxpm-dev supervisor \
    unzip locales nodejs npm && \
    apt-get clean && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/  && \
    docker-php-ext-install -j$(nproc) gd exif && docker-php-ext-install zip pdo_mysql intl

COPY laravel-worker.conf /etc/supervisor/conf.d
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

WORKDIR /var/www
