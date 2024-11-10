install: build create vendors

vendors:
	docker compose exec symfony composer install
	docker compose exec symfony composer dump-env dev # this command is to create the .env.local.php
	docker compose exec symfony php bin/console doctrine:migrations:migrate

build:
	docker compose build --force-rm

stop:
	docker compose stop

start:
	docker compose up -d --no-recreate --remove-orphans

prune:
	docker system prune -a

create:
	docker compose up -d --force-recreate

enter:
	docker compose exec symfony bash

restart-nginx:
	docker compose exec nginx nginx -s reload

down:
	docker compose down

restart: stop start

clear-cache:
	docker compose exec varnish varnishadm "ban req.url ~ ."
	docker compose exec symfony php bin/console c:c --no-warmup -e prod