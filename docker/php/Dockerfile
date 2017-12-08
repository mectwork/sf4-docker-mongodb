FROM php:7.1.11-fpm-alpine3.4

RUN apk add --no-cache \
    # Needed for mcrypt extension
    libmcrypt-dev \
    # Needed for intl extension
    icu-dev \
    # Needed for zip extension
    zlib-dev \
    # Needed for xdebug
    g++ make autoconf \
    # Needed for mongodb
    openssl-dev pcre-dev

# Needed for Composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin --filename=composer \
	&& chmod +sx /usr/local/bin/composer

# Xdebug
RUN pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

# Mongodb
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Gd
RUN apk add --no-cache \
    freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev
RUN docker-php-ext-configure gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd
RUN apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev