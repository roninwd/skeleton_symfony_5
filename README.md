# core.topy.app

## Description

Based on [PHP][PHP-LINK] and [Symfony][SYMFONY-LINK] framework

## How to install

### Requirements

#### Windows

0. Windows 10 version **2004** or higher
1. Enabled **WSL2**
2. Installed **Docker Desktop** 19.03.0+  with enabled WSL2 containers
3. Installed **Ubuntu** for Windows 10

Go to Ubuntu and clone project **inside** it.

#### Linux

* Install [docker][DOCKER-LINK] (19.03.12+) / [docker-compose][DOCKERCOMPOSE-LINK] (v1.26.2+).
* To use docker-container without switching to superuser mode, you need to add a group for the current system user: `sudo usermod -aG docker $USER`. Otherwise, you will have to run all the docker commands through the `sudo` command

## Configuration

### Environment variables

* `REDIS_HOST` _(string)_ - should be described
* `REDIS_PORTS` _(string)_ - should be described
* `NGINX_PORTS` _(string)_ - should be described
* `DB_PORTS` _(string)_ - should be described
* `POSTGIS_PORTS` _(string)_ - should be described
* `PGADMIN_PORTS` _(string)_ - should be described
* `PHP_IDE_CONFIG` _(string)_ - should be described
* `XDEBUG_REMOTE_HOST` _(string)_ - should be described
* `DOMAIN` _(string)_ - should be described					
* `REDOC_PORTS` _(string)_ - should be described					

[PHP-LINK]: https://www.php.net
[SYMFONY-LINK]: https://symfony.com/
[DOCKER-LINK]: https://docs.docker.com/install/
[DOCKERCOMPOSE-LINK]: https://docs.docker.com/compose/install/

