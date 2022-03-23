#!/bin/bash

docker start omure_db
docker start omure_php-fpm
docker start omure_nginx
open http://localhost:86
