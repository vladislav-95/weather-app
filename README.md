## Installation
- run `git clone --recursive https://github.com/vladislav-95/weather-app.git`
- go to `path_to_project/laradock`
- run `cp env-example .env`
- setup mysql configs in `path_to_project/laradock/.env`
- run `docker-compose up -d nginx php-fpm mysql`
- run `docker-compose exec mysql bash`
- run `mysql -udbuser -p`
- create database
- run `cp .env.example .env` from project dir
- setup mysql configs in `path_to_project/.env`
- create api key in [https://openweathermap.org/](https://openweathermap.org/)
- setup OPEN_WEATHER_MAP_API_KEY in `path_to_project/.env`
- run `docker-compose exec workspace bash`
- run `composer install`
- run `php artisan key:generate`
- run `php artisan migrate`
- run `php artisan db:seed`

## Cities CRUD
- GET|HEAD  `/api/v1/cities`
- GET|HEAD  `/api/v1/cities/{city_id}`
- POST      `/api/v1/cities`
- PUT|PATCH `/api/v1/cities/{city_id}`
- DELETE    `/api/v1/cities/{city_id}`

## Weather
- GET|HEAD  `/api/v1/weather/{city_id}`
