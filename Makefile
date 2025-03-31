# Executables (local)
DOCKER = docker-compose -f .docker/local/docker-compose.yml --env-file ./.env
EXEC = $(DOCKER) exec pa-app

## —— Docker 🐳 ————————————————————————————————————————————————————————————————
build: ## Builds the Docker images
	@$(DOCKER) build --no-cache

up: ## Start the docker hub in detached mode (no logs)
	@$(DOCKER) up -d

down: ## Stop the docker hub
	@$(DOCKER) down

cli: ## Run Container (Go inside)
	@$(EXEC) bash

## —— Laravel 🚀 ————————————————————————————————————————————————————————————————
pint:
	@$(EXEC) ./vendor/bin/pint

## —— Other 🌈 ————————————————————————————————————————————————————————————————
swagger:
	@$(EXEC) php artisan l5-swagger:generate

check:
	@$(EXEC) ./vendor/bin/pint
	@$(EXEC) php artisan l5-swagger:generate
