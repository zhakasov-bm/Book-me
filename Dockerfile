# Устанавливаем образ базового контейнера
FROM php:8.3-fpm

# Устанавливаем необходимые зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
#    libpng-dev \
#    zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip pdo pdo_mysql
#    mbstring gd

# Копируем исходный код приложения в контейнер
COPY . /var/www/html

# Устанавливаем composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем зависимости Laravel
RUN cd /var/www/html && composer install

# Устанавливаем права доступа
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# NGINX setup
RUN apt-get update && apt-get install -y nginx
COPY nginx/default.conf /etc/nginx/sites-enabled/default

# Expose port 80 for NGINX
EXPOSE 80

# Run PHP-FPM and NGINX concurrently
CMD service nginx start && php-fpm
