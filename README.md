# Projeto Social Amai-vos Uns Aos Outros

## 1. Requirements:
* [Git](https://git-scm.com/downloads) 
* [Docker](https://docs.docker.com/engine/installation/linux/ubuntulinux) 
* [Docker-compose](https://docs.docker.com/compose/install)
* [Laradock](https://laradock.io)
* [Composer](https://getcomposer.org/download)
* [AdminLTE](https://github.com/ColorlibHQ/AdminLTE)
#### 1.1 Config virtual hosts

```sh
$ sudo vi /etc/hosts
    #Laradock
    127.0.0.1       amaivos.local
```

#### 1.2 Copy Laradock config:

```sh
$ cp /var/www/amaivos/config/laradock/* /var/www/laradock/
```
#### 1.3 Initialize Laradock containers:
```sh
$ cd /var/www/laradock
$ docker-compose up -d nginx mariadb
$ docker-compose exec workspace bash
```

#### 1.4 Install dependencies:
```sh
$ cd amaivos
$ php composer.phar install
$ npm install
```

#### 1.5 Generate style files:
```sh
$ npm run dev
```
