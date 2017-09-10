FROM ambientum/php:7.1-caddy

# Repository/Image Maintainer
MAINTAINER Phillip Hartin <phillip@madewithply.com>

# Reset user to root to allow software install
USER ambientum

# Set the working directory to /app
WORKDIR /var/www/app

# Copy the current directory contents into the container at /app
ADD . /var/www/app
