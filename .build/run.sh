#!/bin/bash

set -euo pipefail

cp .build/.env .env

docker-compose up -d --build
docker-compose run -T --rm php php artisan migrate
