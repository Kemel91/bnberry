#!/bin/bash

set -euo pipefail

cp .build/.env.example .env

docker-compose up -d --build
docker-compose run -T --rm php composer install
docker-compose run -T --rm php php artisan migrate
