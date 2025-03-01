FROM php:7.4-apache

# Habilitar repositorios adicionales (universe) para dependencias
RUN apt-get update -y && \
    apt-get install -y software-properties-common && \
    add-apt-repository universe && \
    apt-get update -y

# Instalar dependencias necesarias
RUN apt-get install -y \
    libmysqlclient-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring

# Habilitar la reescritura de URL de Apache
RUN a2enmod rewrite

# Copiar archivos del proyecto
COPY . /var/www/html/

# Establecer permisos adecuados para los archivos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]

