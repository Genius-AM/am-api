FROM php:8.0-fpm-buster

ENV TIMEZONE            Europe/Moscow
ENV PHP_MEMORY_LIMIT    1024M
ENV UPLOAD_MAX_FILESIZE 126M
ENV PHP_MAX_POST        126M
ENV LOG_ERRORS          On
ENV SHORT_OPEN_TAG      On

ENV TZ $TIMEZONE
RUN apt-get update && apt-get install -y tzdata && \
    rm /etc/localtime && \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata

# Установка редис
RUN pecl install -o -f redis && rm -rf /tmp/pear

# Установка зависимостей
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y wget git zip unzip curl libzip-dev libpq-dev \
    libonig-dev libxslt-dev libfreetype6-dev libjpeg-dev cron supervisor exiftool locales rsync

# Устанавливаем поддержку русской локализации
RUN sed -i '/ru_RU.UTF-8/s/^# //g' /etc/locale.gen && \
    locale-gen
ENV LANG ru_RU.UTF-8
ENV LANGUAGE ru_RU:ru
ENV LC_ALL ru_RU.UTF-8

# Установка NodeJS
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && apt-get install -y nodejs

RUN apt-get install -y imagemagick libmagickwand-dev --no-install-recommends \
    && pecl install imagick

# Очистка кеша
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка нужных PHP расширений
RUN docker-php-ext-install gd pdo pdo_pgsql xsl mbstring zip opcache pcntl intl exif

# Конфигурирование PHP расширений
RUN docker-php-ext-configure exif
RUN docker-php-ext-configure gd
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure zip

RUN docker-php-ext-enable exif
RUN docker-php-ext-enable redis
RUN docker-php-ext-enable imagick

# Устанавливаем композер
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY scheduler.sh /
RUN chmod 755 /scheduler.sh

RUN echo "[PHP]" > /usr/local/etc/php/conf.d/php.ini && \
    echo "date.timezone = ${TIMEZONE}" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "memory_limit = ${PHP_MEMORY_LIMIT}" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "short_open_tag = ${SHORT_OPEN_TAG}" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "post_max_size = ${PHP_MAX_POST}" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "upload_max_filesize = ${UPLOAD_MAX_FILESIZE}" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "log_errors = ${LOG_ERRORS}" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "[opcache]" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.revalidate_freq=0" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.validate_timestamps=1" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.max_accelerated_files=10000" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.memory_consumption=192" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.max_wasted_percentage=10" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.interned_strings_buffer=16" >> /usr/local/etc/php/conf.d/php.ini && \
    echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/php.ini

RUN usermod --non-unique --uid 1000 www-data \
  && groupmod --non-unique --gid 1000 www-data

# Текущая дериктория
WORKDIR /app

EXPOSE 9000

CMD ["/usr/bin/supervisord"]
