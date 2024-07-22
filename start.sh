#!/bin/bash
composer install
./vendor/bin/sail npm install
./vendor/bin/sail artisan migrate:refresh --seed
./vendor/bin/sail artisan optimize
./vendor/bin/sail artisan movie:retrieve
