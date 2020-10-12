FROM php:7.2-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    # for gd
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    # for ImageMagick
    libmagickwand-dev \
    # for intl
    libicu-dev \
    # from zip
    zlib1g-dev \
    msmtp-mta \
    vim \
    ssl-cert \
    wget \
    git \
    unzip \
    locales \
    && \
    pecl install imagick xdebug && \
    docker-php-ext-enable imagick xdebug && \
    docker-php-ext-install bcmath calendar exif gettext intl mbstring mysqli pdo pdo_mysql zip && \
    docker-php-ext-install -j$(nproc) iconv && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd && \
    rm -rf /var/lib/apt/lists/* && \
    echo "ja_JP.UTF-8 UTF-8" > /etc/locale.gen && \
    locale-gen && \
    /usr/sbin/update-locale LANG=ja_JP.UTF-8 && \
    apt-get clean && \
    # enable site
    a2ensite default-ssl && \
    # enable mod_rewrite
    a2enmod rewrite ssl && \
    # install composer
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && composer config -g repos.packagist composer https://packagist.jp \
    && composer global require hirak/prestissimo \
    && wget https://get.symfony.com/cli/installer -O - | bash \
    && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/html

EXPOSE 80