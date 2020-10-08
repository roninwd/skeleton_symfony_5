# ./docker/php/Dockerfile
FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev libzip-dev libpq-dev supervisor libxml2-dev\
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql

RUN docker-php-ext-install pdo pdo_pgsql
RUN pecl install apcu

RUN apt-get update
RUN apt-get install -y libzip-dev apt-utils curl

RUN docker-php-ext-install zip
RUN docker-php-ext-enable apcu
RUN docker-php-ext-install soap bcmath sockets

RUN dpkg --add-architecture i386


RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --filename=composer
RUN php -r "unlink('composer-setup.php');"
RUN mv composer /usr/local/bin/composer

RUN pecl install xdebug-2.9.0  && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=$XDEBUG_REMOTE_HOST" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN touch /var/log/xdebug.log
RUN chmod 777 /var/log --recursive

WORKDIR /usr/src/app

RUN PATH=$PATH:/usr/src/apps/vendor/bin:bin


ARG USER=rabbit
ARG UID=1001
ARG GID=1001
# default password for user
ARG PW=queue
# Option1: Using unencrypted password/ specifying password
RUN useradd -m ${USER} --uid=${UID} && echo "${USER}:${PW}" | chpasswd

RUN apt-get install -y supervisor
RUN docker-php-ext-install pcntl
COPY ./docker/php/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY ./docker/php/supervisor/queue.conf /etc/supervisor/conf.d/
CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/supervisord.conf"]