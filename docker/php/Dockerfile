FROM php:7.4-apache

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    zip \
    curl
	
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN docker-php-ext-install opcache

# Extensiones necesarias para Symfony 4
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    intl \
    zip \
    gd

# Activar mod_rewrite
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar DocumentRoot hacia /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf
	

WORKDIR /var/www/html