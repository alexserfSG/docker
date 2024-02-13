FROM php:8.2-fpm

EXPOSE 9000

#ARG UNAME=www-data
#ARG UGROUP=www-data
#ARG UID=1000
#ARG GID=1001
#RUN usermod  --uid $UID $UNAME
#RUN groupmod --gid $GID $UGROUP

RUN apt-get update && apt-get install -y \
    curl \
    wget \
    git \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
	libmcrypt-dev \
    && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
	&& docker-php-ext-configure sockets \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


COPY ./php.ini /usr/local/etc/php/conf.d/php-custom.ini
#COPY ./zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

WORKDIR /data

VOLUME /data

CMD ["php-fpm"]