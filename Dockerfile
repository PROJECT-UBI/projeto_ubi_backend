FROM php:8.3-apache

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY .config/apache/. /etc/apache2/
COPY .config/openssl.cnf /etc/ssl
COPY .config/php.ini /usr/local/etc/php/

RUN service apache2 restart

WORKDIR /var/www/html/

EXPOSE 80
