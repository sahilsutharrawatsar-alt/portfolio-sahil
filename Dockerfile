FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    sqlite3 \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN cp .env.example .env

RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    database

RUN touch database/database.sqlite

RUN chmod -R 777 storage bootstrap/cache database

EXPOSE 10000

CMD sh -c "php artisan key:generate --force && php artisan serve --host=0.0.0.0 --port=10000"