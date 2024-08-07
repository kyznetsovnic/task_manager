FROM php:8.0-fpm

RUN apt-get update
RUN apt-get install -y \
    wget \
    zlib1g-dev \
    libicu-dev \
    libzip-dev \
    libssh-dev \
    gettext-base && apt-get clean

# create docker user
RUN useradd -m docker && echo "docker:docker" | chpasswd

RUN mkdir -p /www/app
RUN cd /www/app && wget https://getcomposer.org/installer && php installer && mv composer.phar /usr/local/bin/composer

RUN apt-get install -y libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN docker-php-ext-install zip mysqli pdo_mysql
RUN apt-get install -y libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql pdo

RUN docker-php-ext-install opcache
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0"
ADD opcache.ini "$PHP_INI_DIR/conf.d/opcache.ini"

RUN pecl install apcu \
  && docker-php-ext-enable apcu
