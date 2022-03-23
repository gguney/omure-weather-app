#!/bin/bash

docker volume create omure-data

docker-compose up -d

cp ./.env.example ./.env

docker exec -i omure_php-fpm composer install
docker exec -i omure_php-fpm npm install
docker exec -i omure_php-fpm npm run prod
docker exec -i omure_php-fpm php artisan key:generate
docker exec -i omure_db mariadb -uroot -pmy-secret-psw <<< "CREATE DATABASE IF NOT EXISTS omure;"
docker exec -i omure_php-fpm php artisan migrate:fresh --seed

open http://localhost:86
