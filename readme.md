# Swilv test task

## Install set

1. composer install
2. cp .env .env.local 
3. Change DB credentials in .env.local file
4. php bin/console doctrine:database:create
5. php bin/console doctrine:migrations:migrate -n
6. php bin/console doctrine:fixtures:load -n


## Run server

* php bin/console server:run

## Run tests

* php bin/phpunit
* php bin/phpunit --testsuite=unit
* php bin/phpunit --testsuite=functional

## Credentials

Credentials for access to api in email that was sended with link on this repository.
