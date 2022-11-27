FROM php:7.4-fpm

COPY composer*.json /var/www/

WORKDIR /var/www/

RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    git \
    curl

#instalacion de extensiones de PHP
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

#composer

RUN curl -sSL https://getcomposer.org/installer > composer-setup.php \
    && curl -sSL https://composer.github.io/installer.sha384sum > composer-setup.sha384sum \
             && sha384sum --check composer-setup.sha384sum \
             # Install Composer 2.
             && php composer-setup.php --install-dir=/usr/local/bin --filename=composer --2 \

#instalacion de dependencias de composer
RUN composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts

COPY . /var/www

EXPOSE 9000

CMD ["php-fpm"]
