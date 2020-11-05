e ?= dev
em ?= default
dist ?= ./src
psr ?= PSR12
cest ?=


bash:
	docker-compose exec php /bin/bash
build:
	docker-compose up -d --build
prune:
	docker-compose down -v --remove-orphans
down:
	docker-compose down
up:
	docker-compose up -d

init: prune build composer migrate

composer:
	docker-compose exec php composer install

#database
migrate:
	docker-compose exec php php bin/console doctrine:migration:migrate -n
diff:
	docker-compose exec php php bin/console doctrine:migration:diff -n
fixture-append:
	docker-compose exec php php bin/console doctrine:fixtures:load --append -n

#composer
dump-autoload:
	docker-compose exec php composer dump-autoload

routers:
	docker-compose exec php bin/console debug:router

### Cleaner ###
rmc:
	docker-compose exec php bash -c 'rm -rf var/cache/*'
	docker-compose exec php bin/console cache:clear --env=$(e)
cc:
	docker-compose exec php bin/console cache:clear --env=$(e)
cl:
	docker-compose exec php bash -c 'cat /dev/null | tee var/log/*.log'
	docker-compose exec php bash -c 'rm var/log/**/*.log'
chmod-var:
	docker-compose exec php bash -c 'chmod -R 777 var/cache'
	docker-compose exec php bash -c 'chmod -R 777 var/log'
chmod-volumes:
	if test -d volumes; then sudo chmod -R 777 volumes; fi