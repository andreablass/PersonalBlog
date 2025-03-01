# Imagen base con PHP y Apache
FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mbstring

# Copiar archivos de Kirby
COPY . /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto de Apache
EXPOSE 80

# Ejecutar Apache en primer plano
CMD ["apache2-foreground"]
