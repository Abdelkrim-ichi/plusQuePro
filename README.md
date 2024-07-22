

to use this project 
first u should have docker installed and running

Then  run this  command line

## ./start.sh

Go to this url to see movies list

## http://localhost/list-movies

## for back office login using the user created by default test@example.com

## http://localhost/login
## email => test@example.com
## password => password

there you can go to movie detail and update it
and delete a movie if needed
## http://localhost/list-movies/{id}


To update the list of movies there is two way

#### 1 by going to the command line run ./vendor/bin/sail artisan movie:retrieve

#### 2 by going to http://localhost/dashboard

