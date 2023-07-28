FROM mlocati/php-extension-installer:latest AS php_extension_installer

FROM php:8.2-apache

# php extensions installer: https://github.com/mlocati/docker-php-extension-installer
COPY --from=php_extension_installer --link /usr/bin/install-php-extensions /usr/local/bin/

RUN set -eux; \
    install-php-extensions \
    	intl \
    	zip \
    	apcu \
		opcache \
		pdo_mysql \
    ;

WORKDIR /var/www/html



