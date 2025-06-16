FROM php:8.2.12-cli

# Update apt-get and install necessary packages
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    libonig-dev \
    libpq-dev \
    libjpeg-dev \
    libwebp-dev 



# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install -j$(nproc) \
    pdo pdo_pgsql

# Set the working directory
WORKDIR /var/www/html

#1 - RUN composer install

#CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

#CMD ["return 1"]

# php artisan migrate:reset  --> elimina migraciones bd

#2 php artisan migrate  -->> migraciones

#3 php artisan db:seed  -->> Seeds

#4 php artisan serve --host=0.0.0.0 --port=8000   -->> Inciar servidor