FROM php:7.4-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libmysqlclient-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

# Copiar tu aplicación al contenedor
COPY . /var/www/html/

# Habilitar el módulo de Apache para permitir .htaccess (si es necesario)
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80

