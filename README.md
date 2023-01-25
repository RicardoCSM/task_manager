# Task Manager

Task Manager is a Laravel application to handle task tracking. It was made with the aim of fixing studied content.

----------

# Getting started

## Installation

Task Manager was made using Docker with Laravel framework version 9 and PHP 8.1.12. In addition, the MySql database was used on port 33060, Redis and Nginx exporting port 8989.

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

```
git@github.com:RicardoCSM/task_manager.git
cd task_manager
```

## Usage

Install [Docker](https://www.docker.com/) on your system.

* [Install instructions](https://docs.docker.com/installation/mac/) for Mac OS X
* [Install instructions](https://docs.docker.com/installation/ubuntulinux/) for Ubuntu Linux
* [Install instructions](https://docs.docker.com/installation/) for other platforms

Install [Docker Compose](http://docs.docker.com/compose/) on your system.

To start the containers

```bash
docker-compose build # only the first time
docker-compose up
```

If you are running the application for the first time you should
run the migrations

```bash
docker exec -i -t task_manager-app-1 composer install    # install php dependencies
docker exec -i -t task_manager-app-1 php artisan migrate # run migrations
```

The application can be accessed at [http://localhost:8989](http://localhost:8989).

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

# Code overview

## Folders

- `app/models` - Contains all the Eloquent models
- `app/Http/Controllers/` - Contains all the controllers
- `app/Http/Middleware` - Contains the auth middleware
- `database/migrations` - Contains all the database migrations
- `routes` - Contains all the routes defined in web.php file
- `public` - Contains all the application images and the basic css file
- `resources/views` - Contains all the blade views

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.