FROM php:7.2-fpm

RUN apt-get update -y && apt-get install -y libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6-dev zlib1g-dev libzip-dev git zip nano libgmp-dev libldap2-dev

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && docker-php-ext-install ldap
RUN docker-php-ext-install mbstring zip gd mysqli pdo pdo_mysql gmp
RUN docker-php-ext-configure gd --with-gd --with-webp-dir --with-jpeg-dir \
    --with-png-dir --with-zlib-dir --with-xpm-dir --with-freetype-dir

#    --enable-gd-native-ttf

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN echo 'memory_limit = 2G' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require "fxp/composer-asset-plugin:~1.4.2"


# Install Yii framework bash autocompletion
RUN curl -L https://raw.githubusercontent.com/yiisoft/yii2/master/contrib/completion/bash/yii -o /etc/bash_completion.d/yii


CMD ["php-fpm"]

WORKDIR /var/project

#RUN composer install




EXPOSE 9000

#COPY conf/php.ini /etc/php/7.1/fpm/conf.d/40-custom.ini