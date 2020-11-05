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