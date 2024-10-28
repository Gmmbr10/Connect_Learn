FROM php:apache

RUN a2enmod rewrite

COPY mm.config /usr/local/apache2/conf/httpd.conf
COPY ./ /var/www/html

EXPOSE 80