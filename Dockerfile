# Etapa 1: construir assets con Node
FROM node:18 AS build-frontend
WORKDIR /app
COPY package*.json webpack.mix.js ./
RUN npm install
COPY resources/ ./resources/
RUN npm run production

# Etapa 2: PHP + Apache
FROM php:8.2-apache

# Cambios aquí: Añadido libpq-dev y limpieza de caché apt
RUN apt-get update && apt-get install -y \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  libzip-dev \
  libpq-dev \
  zip \
  unzip \
  git \
  curl \
  && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip \
  && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar proyecto PHP
COPY . .

# Copiar build de Laravel Mix generado en la primera etapa
COPY --from=build-frontend /app/public ./public

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Configuración Apache
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Definimos un valor por defecto para PORT por si acaso, luego se reemplaza
ENV PORT=8080
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 8080