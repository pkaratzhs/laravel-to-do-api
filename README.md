# backend
```
this is the backend for https://github.com/pkaratzhs/laravel-to-do-api
```
##Project Setup
```
run composer install
copy .env.example to .env
setup your database as needed
add to your .env file : SANCTUM_STATEFUL_DOMAINS=localhost:8080,127.0.0.1:8080
or wherever the frontend lives
run php artisan migrate and php artisan db:seed
then follow the instructions of the frontend to set that up as well
```