FROM docker.io/bitnami/minideb:buster
LABEL maintainer "Bitnami <containers@bitnami.com>"

ENV OS_ARCH="amd64" \
    OS_FLAVOUR="debian-10" \
    OS_NAME="linux"

COPY conf/prebuildfs /
# Install required system packages and dependencies
RUN install_packages argon2 ca-certificates curl gzip libargon2-0 libargon2-0-dev libbsd0 libbz2-1.0 libc6 libcom-err2 libcurl4 libexpat1 libffi6 libfftw3-double3 libfontconfig1 libfreetype6 libgcc1 libgcrypt20 libglib2.0-0 libgmp10 libgnutls30 libgomp1 libgpg-error0 libgssapi-krb5-2 libhogweed4 libicu63 libidn2-0 libjpeg62-turbo libk5crypto3 libkeyutils1 libkrb5-3 libkrb5support0 liblcms2-2 libldap-2.4-2 liblqr-1-0 libltdl7 liblzma5 libmagickcore-6.q16-6 libmagickwand-6.q16-6 libmcrypt4 libmemcached11 libmemcachedutil2 libncurses6 libnettle6 libnghttp2-14 libonig5 libp11-kit0 libpcre3 libpng16-16 libpq5 libpsl5 libreadline7 librtmp1 libsasl2-2 libsqlite3-0 libssh2-1 libssl1.1 libstdc++6 libsybdb5 libtasn1-6 libtidy5deb1 libtinfo6 libunistring2 libuuid1 libx11-6 libxau6 libxcb1 libxdmcp6 libxext6 libxml2 libxslt1.1 libzip4 procps tar wget zlib1g curl gnupg apt-transport-https
RUN wget -nc -P /tmp/bitnami/pkg/cache/ https://downloads.bitnami.com/files/stacksmith/php-7.4.14-1-linux-amd64-debian-10.tar.gz && \
    echo "deab46bf8aa3b80307657c86a721960e1ce7f8f5b51aad0578c594012912d08d  /tmp/bitnami/pkg/cache/php-7.4.14-1-linux-amd64-debian-10.tar.gz" | sha256sum -c - && \
    tar -zxf /tmp/bitnami/pkg/cache/php-7.4.14-1-linux-amd64-debian-10.tar.gz -P --transform 's|^[^/]*/files|/opt/bitnami|' --wildcards '*/files' && \
    rm -rf /tmp/bitnami/pkg/cache/php-7.4.14-1-linux-amd64-debian-10.tar.gz
RUN apt-get update && apt-get upgrade -y && \
    rm -r /var/lib/apt/lists /var/cache/apt/archives
RUN sed -i 's/^PASS_MAX_DAYS.*/PASS_MAX_DAYS    90/' /etc/login.defs && \
    sed -i 's/^PASS_MIN_DAYS.*/PASS_MIN_DAYS    0/' /etc/login.defs && \
    sed -i 's/sha512/sha512 minlen=8/' /etc/pam.d/common-password

ENV BITNAMI_APP_NAME="php-fpm" \
    BITNAMI_IMAGE_VERSION="7.4.14-prod-debian-10-r14" \
    PATH="/opt/bitnami/php/bin:/opt/bitnami/php/sbin:$PATH"


# Microsoft SQL Server Prerequisites
RUN apt-get update -y --no-install-recommends
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN apt-get update -y --no-install-recommends
ENV ACCEPT_EULA=y \
    DEBIAN_FRONTEND=noninteractive
RUN apt-get -y --no-install-recommends install msodbcsql17 nginx autoconf make gcc g++ unixodbc unixodbc-dev sed git \
    && pecl install sqlsrv pdo_sqlsrv

# Install composer
RUN curl -sS https://getcomposer.org/installer | php

# Install NodeJS v10
RUN curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh && bash nodesource_setup.sh && apt -y install nodejs

RUN printf "\nextension=pgsql.so" >> /opt/bitnami/php/etc/php.ini && \
    printf "\nextension=pdo_pgsql.so" >> /opt/bitnami/php/etc/php.ini && \
    sed -i s/^upload_max_filesize.*/upload_max_filesize\ =\ 32M/g /opt/bitnami/php/etc/php.ini && \
    sed -i s/^post_max_size.*/post_max_size\ =\ 200M/g /opt/bitnami/php/etc/php.ini && \
    sed -i s/^memory_limit.*/memory_limit\ =\ 1024M/g /opt/bitnami/php/etc/php.ini && \
    printf "\nclient_buffer_max_kb_size = '65000240'" >> /opt/bitnami/php/etc/php.ini && \
    printf "\nsqlsrv.ClientBufferMaxKBSize = 65000240" >> /opt/bitnami/php/etc/php.ini && \
    sed -i s/^pm.max_children.*/pm.max_children\ =\ 200/g /opt/bitnami/php/etc/php-fpm.d/www.conf && \
    printf "\nphp_admin_value[upload_max_filesize] = 200M" >> /opt/bitnami/php/etc/php-fpm.d/www.conf && \
    printf "\nphp_admin_value[post_max_size] = 200M" >> /opt/bitnami/php/etc/php-fpm.d/www.conf && \
    printf "\nphp_flag[display_errors] = off" >> /opt/bitnami/php/etc/php-fpm.d/www.conf && \
    printf "\nphp_flag[expose_php] = Off" >> /opt/bitnami/php/etc/php-fpm.d/www.conf && \
    printf "\npm.process_idle_timeout = 10s" >> /opt/bitnami/php/etc/php-fpm.d/www.conf

# Remove Cache
RUN apt-get remove --purge -y --allow-remove-essential autoconf make gcc g++ sed gnupg apt-transport-https wget curl git && \
    apt-get clean -y && \
    apt-get autoremove --purge -y && \
    apt-get autoclean --dry-run -y && \
    rm -rf /tmp/*

COPY conf/default /etc/nginx/sites-enabled/default
COPY conf/www.conf /opt/bitnami/php/etc/php-fpm.d/www.conf
RUN mkdir /app

WORKDIR /app

EXPOSE 80
