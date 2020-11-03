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
rebuild: build composer migrate fixture-append migrate-postgis api-doc

init: prune build composer migrate fixture-append

composer:
	docker-compose exec php composer install

#database
migrate:
	docker-compose exec php php bin/console doctrine:migration:migrate -n
diff:
	docker-compose exec php php bin/console doctrine:migration:diff -n
fixture-append:
	docker-compose exec php php bin/console doctrine:fixtures:load --append -n

migrate-postgis:
	docker-compose exec php php bin/console doctrine:migrations:migrate -n --em=postgis  --configuration=config/migrations/migrations_postgis.yaml
diff-postgis:
	docker-compose exec php php bin/console doctrine:migrations:diff -n --em=postgis  --configuration=config/migrations/migrations_postgis.yaml

#composer
dump-autoload:
	docker-compose exec php composer dump-autoload

#tests
tests:
	docker-compose exec php bin/phpunit
tests-coverage:
	docker-compose exec php bin/phpunit --coverage-html public
unit:
	docker-compose exec php bin/phpunit --testsuite=unit
functional:
	docker-compose exec php bin/phpunit --testsuite=functional

routers:
	docker-compose exec php bin/console debug:router

api-doc:
	docker-compose exec php ./vendor/bin/openapi --bootstrap /usr/src/docs/constants.php ./src --output /usr/src/docs/swagger.yaml