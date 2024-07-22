#!/bin/bash

sudo apt update
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y php8.3 php8.3-xml
php -v
composer install
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
./vendor/bin/sail up -d
touch database/database.sqlite
touch .env
cp .env.example .env
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan optimize
./vendor/bin/sail artisan migrate:refresh --seed
./vendor/bin/sail artisan movie:retrieve
