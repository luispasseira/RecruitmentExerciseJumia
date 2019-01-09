FROM php:7.2-apache

MAINTAINER Luis Passeira <lfmpasseira30@gmail.com>

COPY . /src

RUN chown -R www-data:www-data /src \
    && a2enmod rewrite