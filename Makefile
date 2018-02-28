SHELL=/bin/bash -o pipefail -e
PROJECT_NAME="session-tickets"

run: build
	docker-compose run php-cli php /data/application/index.php

build: start
	docker-compose run php-cli composer install --optimize-autoloader

start: stop
	docker-compose up -d --remove-orphans

stop:
	docker-compose down -v --remove-orphans
