<h2 align="center">
Ply Laravel Starter
</h2>
<h4 align="center">
Base Laravel 5.5 Project using Foundation 6, Pug Templates, Backpack Admin, Attachable Media, including TDD and BDD workflows.
</h4>
<h5 align="center">Under development by <a href="http://madewithply.com" target="_blank">Ply Creative</a>.</h5>

## How To Use

This code-base has a number of CI/CD pipelines configured using BuddyWorks to deploy to our develop, staging and production environments, however, simple local development can be achieved using [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/)

### Minimum Requirements

To clone and run this application, you'll need [git](https://git-scm.com) and [docker](https://www.docker.com/) installed and configured on your computer.

### Local Development

A `docker-compose` file has been put together to speed up your local development. Follow the following steps to get up and running with a fully contained system for project development.

```bash
# Setup Web Application #
$ cd webapp/

# Run the Docker Compose configuration #
$ docker-compose up -d

# Configuration #
# You need to setup your .env file for your environment. The .env.docker.local file has been pre-configured for this docker setup.
$ cp .env.docker.local .env

# SSH into the PHP docker container
$ docker exec -ti projectx-app bash

# Installation # 
# Install Node and NPM
# This container does not have node, npm or yarn installed by default
$ sudo apk add --update nodejs nodejs-npm yarn

# Install the dependencies of the project
$ npm install 
$ composer install

# Setup Keys and Refresh the configuration
$ php artisan key:generate 
$ php artisan config:cache

# Setup Database
$ php artisan migrate:refresh --seed

# Load the app in your browser @ http://localhost:80
```

Note: If you're using Linux Bash for Windows, [see this guide](https://www.howtogeek.com/261575/how-to-run-graphical-linux-desktop-applications-from-windows-10s-bash-shell/).

## Credits

This software uses code from several open source packages.

- [Laravel](https://laravel.com/)
- [Vue.js](https://vuejs.org/)
- [Webpack](https://webpack.js.org/)
- [Pug](https://pugjs.org/)
- [Docker](https://www.docker.com/)
---

> [madewithply.com](https://www.madewithply.com) &nbsp;&middot;&nbsp;
> GitHub [@madewithply](https://github.com/madewithply) &nbsp;&middot;&nbsp;
> Twitter [@madewithply](https://twitter.com/madewithply)
