FROM php:8.3-apache

# Install git
RUN apt-get update \
    && apt-get -y install git unzip libzip-dev curl libcurl4-openssl-dev \
    && docker-php-ext-install zip pdo pdo_mysql curl \
    && apt-get clean

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY .config/apache/. /etc/apache2/
COPY .config/openssl.cnf /etc/ssl
COPY .config/php.ini /usr/local/etc/php/
COPY .config/.bashrc /root/.bashrc

RUN a2ensite ubi

RUN a2enmod rewrite

RUN service apache2 restart

WORKDIR /var/www/html/
ADD ./ ./
# RUN chmod -R 777 /var/www/html/ 

EXPOSE 80
