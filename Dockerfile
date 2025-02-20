# Utiliza la imagen base oficial de PHP 8.2 con Apache.
FROM php:8.2-apache

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Instala extensiones de PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Configuración de PHP para Cloud Run
RUN docker-php-ext-install -j "$(nproc)" opcache

RUN set -ex; \
  { \
    echo "; Cloud Run aplica límites de memoria y tiempo de ejecución."; \
    echo "memory_limit = -1"; \
    echo "max_execution_time = 0"; \
    echo "; Limite de subida de archivos en Cloud Run."; \
    echo "upload_max_filesize = 32M"; \
    echo "post_max_size = 32M"; \
    echo "; Configuración de Opcache para Contenedores."; \
    echo "opcache.enable = On"; \
    echo "opcache.validate_timestamps = Off"; \
    echo "; Configura la memoria de Opcache (específica de la aplicación)."; \
    echo "opcache.memory_consumption = 32"; \
  } > "$PHP_INI_DIR/conf.d/cloud-run.ini"

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define el directorio de trabajo del contenedor
WORKDIR /var/www/html/public/

# Copia los archivos del proyecto al contenedor
COPY . .

# Instala las dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Ajusta permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Utiliza la variable de entorno PORT en los archivos de configuración de Apache
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Expone el puerto para Cloud Run
EXPOSE 8080
