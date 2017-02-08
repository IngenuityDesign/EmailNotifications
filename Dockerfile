# Dockerizing OB DLS. Contains Node Web Application
# Based on ubuntu:latest.

FROM php:5.6
MAINTAINER Stephen Parente <stephen@ingenuitydesign.com>

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
    && docker-php-ext-install iconv mcrypt mysqli mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html

# RUN npm install
# RUN bower install

# Done

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "app/webroot"]