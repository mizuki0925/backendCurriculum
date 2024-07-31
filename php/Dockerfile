FROM php:8.2-fpm

RUN apt-get update
RUN apt-get install -y \
      sudo \
      libpq-dev \
      git \
      zip \
      unzip \
      vim
RUN docker-php-ext-install \
      pdo \
      bcmath \
      pdo_mysql

# Xdebugのインストール
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Composerのインストール & パス通す
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD ./php.ini /usr/local/etc/php/php.ini