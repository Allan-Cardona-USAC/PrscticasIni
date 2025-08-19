FROM debian:stable

RUN apt-get -y update
RUN apt-get -y install apache2
RUN apt-get -y install php7.3
RUN apt-get -y install php-gd
RUN apt-get -y install git
RUN apt-get -y install composer
RUN apt-get -y install php-mysql
RUN apt-get -y install php-zip
RUN apt-get -y install php-pgsql
RUN apt-get -y install php-curl
RUN apt-get -y install php-xml
RUN apt-get -y install libfontconfig1 libxrender1


COPY vhost.conf /etc/apache2/sites-available/000-default.conf
COPY apache2-foreground /usr/local/bin/

RUN chmod +x /usr/local/bin/apache2-foreground
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

WORKDIR /var/www/html/
CMD ["apache2-foreground"]

EXPOSE 80
