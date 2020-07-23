FROM php:7.4-fpm

RUN apt-get update && apt-get install -y curl libpq-dev libzip-dev zip unzip git wget libsqlite3-dev dos2unix libfreetype6-dev libmcrypt-dev \
    libpng16-16 libjpeg-dev libpng-dev libxslt-dev libwebp-dev libjpeg62-turbo-dev libxpm-dev \
    libicu-dev libmemcached-dev libmagick++-dev libmagickwand-dev libzip-dev cron libgmp-dev

RUN docker-php-ext-install -j$(nproc) iconv json zip

RUN curl -s https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install zip pdo pdo_pgsql opcache sockets pcntl intl xml soap iconv bcmath bz2 gettext xsl gmp

RUN ln -s /usr/local/bin/php /bin/php

RUN usermod -u 1000 www-data

RUN usermod -s /bin/bash -d /home/www-data www-data && mkdir -p /home/www-data && chown -R www-data.www-data /home/www-data

WORKDIR /app

COPY php/ /usr/local/etc/

CMD ["php-fpm"]
