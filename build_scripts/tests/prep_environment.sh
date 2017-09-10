# Update and Install Dependencies
apt-get update && apt-get install -y git zip freetds-dev freetds-bin libicu-dev libpq-dev libmcrypt-dev libldap2-dev libnotify-bin
rm -r /var/lib/apt/lists/*
cp -s /usr/lib/x86_64-linux-gnu/libsybdb.so /usr/lib/
# Setup Docker Extensions
docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd
docker-php-ext-install intl mbstring mcrypt pcntl pdo_dblib pdo_mysql pdo_pgsql pgsql zip opcache
# Install PHP Unit
curl -L https://phar.phpunit.de/phpunit.phar -o /usr/local/bin/phpunit
chmod +x /usr/local/bin/phpunit
# Install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer