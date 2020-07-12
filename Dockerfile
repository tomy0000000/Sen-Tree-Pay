FROM tomy0000000/php-fpm:7.4-nginx-1.1

LABEL tech.tomy.docker.sen-tree-pay=""
LABEL maintainer="Tomy Hsieh @tomy0000000"
LABEL version="1.0"

WORKDIR /usr/share/nginx/sen-tree-pay

# Copy Application 
COPY . /usr/share/nginx/sen-tree-pay

# Install Dependencies
RUN composer install --optimize-autoloader --no-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Rebuilt Cache
RUN php artisan config:cache
RUN php artisan view:cache
