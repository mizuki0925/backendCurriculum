# ./php/Dockerfile

FROM php:8.2-fpm

# システム依存関係をインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Xdebug設定ファイルをコピー
COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# 既存のアプリケーションディレクトリの内容をコピー
COPY . /var/www/html

# 作業ディレクトリを設定
WORKDIR /var/www/html

# www-dataユーザーがvar/www/htmlディレクトリに書き込めるようにする
RUN chown -R www-data:www-data /var/www/html
