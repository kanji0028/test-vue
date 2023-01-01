FROM php:8.0-apache
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y \
    git \
    && docker-php-ext-install pdo_mysql
    
RUN sed -i 's!/var/www/html!/var/www/app/public!g' /etc/apache2/sites-available/000-default.conf

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

RUN apt-get update \
&& apt-get install -y \
git \
zlib1g-dev \
libzip-dev \
zip \
unzip \
vim \
&& docker-php-ext-install zip 

RUN a2enmod rewrite
