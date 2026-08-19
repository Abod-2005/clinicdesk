FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo_mysql \
    && a2enmod rewrite

RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

WORKDIR /var/www/html

COPY . /var/www/html

RUN mkdir -p /var/www/html/logs \
    && chown -R www-data:www-data /var/www/html/logs /var/www/html/public/uploads

EXPOSE 80