FROM php:7.4-fpm

LABEL tech.tomy.docker.sen-tree-pay=""
LABEL maintainer="Tomy Hsieh @tomy0000000"
LABEL version="1.0"

WORKDIR $PHP_INI_DIR
EXPOSE 9000

# Install Composor
RUN curl -sS https://getcomposer.org/installer | php -- --version=1.7.2 --install-dir=/usr/local/bin --filename=composer

# Install PHP Extension
RUN apt update && apt install -y \
        zip \
        unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

WORKDIR /usr/share/nginx/sen-tree-pay

# Copy Application 
COPY . /usr/share/nginx/sen-tree-pay

# Install Dependencies
RUN composer install --optimize-autoloader --no-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Rebuilt Cache
RUN php artisan config:cache
RUN php artisan view:cache
