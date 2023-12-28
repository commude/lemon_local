FROM php:7-fpm-alpine as production
COPY ./conf/php.ini /usr/local/etc/php/

RUN apk --no-cache update && \
    apk --no-cache upgrade && \
    apk --no-cache add \
    curl-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    zlib-dev \
    pcre-dev \
    oniguruma-dev \
    g++ \
    make \
    autoconf \
    openssl \
    bash \
    vim \
    git \
  && docker-php-ext-install \
    curl \
    dom \
    mbstring \
    pdo \
    pdo_mysql \
    simplexml \
    zip \
    opcache \
    exif \
    gd \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && chmod +x /usr/local/bin/composer \
  && rm -rf /var/cache/apk/*

WORKDIR /var/www