
#=========================================== BEGIN::exec docker app:development ============================
dev-docker-mdfebumk-start:
	docker compose -f dev.Docker-Compose.yml up -d
#stop docker mdfebumk
dev-docker-mdfebumk-stop:
	docker compose -f dev.Docker-Compose.yml down
#list docker mdfebumk
dev-docker-mdfebumk-container:
	docker compose -f dev.Docker-Compose.yml ps
#list docker images
dev-docker-mdfebumk-images:
	docker image ls
#restart docker mdfebumk
dev-docker-mdfebumk-restart:
	docker compose -f dev.Docker-Compose.yml restart
#logs docker mdfebumk
dev-docker-mdfebumk-logs:
	docker compose -f dev.Docker-Compose.yml logs -f
#build docker mdfebumk
dev-docker-mdfebumk-build:
	docker compose -f dev.Docker-Compose.yml build app

#================================================== migration ========================================
dev-docker-mdfebumk-migrate:
	docker compose -f dev.Docker-Compose.yml exec app php artisan migrate
	docker compose -f dev.Docker-Compose.yml exec app php artisan db:seed
dev-docker-mdfebumk-migrate-rollback:
	docker compose -f dev.Docker-Compose.yml exec app php artisan migrate:rollback
#exec run migrate refresh
dev-docker-mdfebumk-refresh:
	docker compose -f dev.Docker-Compose.yml exec app php artisan migrate:refresh
	docker compose -f dev.Docker-Compose.yml exec app php artisan db:seed
#exec run seeder
dev-docker-mdfebumk-seed:
	docker compose -f dev.Docker-Compose.yml exec app php artisan db:seed
#exec app docker via composer install
dev-docker-mdfebumk-composer:
	docker compose -f dev.Docker-Compose.yml exec app composer install
#=========================================== END::exec docker app:development ============================



#=========================================== BEGIN::exec docker app:production ============================
prod-docker-mdfebumk-start:
	docker compose -f prod.Docker-Compose.yml up -d
#stop docker mdfebumk
prod-docker-mdfebumk-stop:
	docker compose -f prod.Docker-Compose.yml down
#list docker mdfebumk
prod-docker-mdfebumk-container:
	docker compose -f prod.Docker-Compose.yml ps
#list docker images
prod-docker-mdfebumk-images:
	docker image ls
#restart docker mdfebumk
prod-docker-mdfebumk-restart:
	docker compose -f prod.Docker-Compose.yml restart
#logs docker mdfebumk
prod-docker-mdfebumk-logs:
	docker compose -f prod.Docker-Compose.yml logs -f
#build docker mdfebumk
prod-docker-mdfebumk-build:
	docker compose -f prod.Docker-Compose.yml build app

#===================================================== migration ===========================================
#exec run migrate only
prod-docker-mdfebumk-migrate:
	docker compose -f prod.Docker-Compose.yml exec app php artisan migrate
prod-docker-mdfebumk-migrate-rollback:
	docker compose -f prod.Docker-Compose.yml exec app php artisan migrate:rollback
#exec run migrate refresh
prod-docker-mdfebumk-refresh:
	docker compose -f prod.Docker-Compose.yml exec app php artisan migrate:refresh
#exec run seeder
prod-docker-mdfebumk-seed:
	docker compose -f prod.Docker-Compose.yml exec app php artisan db:seed
#exec app docker via composer install
prod-docker-mdfebumk-composer:
	docker compose -f prod.Docker-Compose.yml exec app composer install
#=========================================== END::exec docker app:production ============================



#=========================================== BEGIN::exec local app ============================
#run app mdfebumk via shell
mdfebumk-serve-port:
	php -S localhost:8089 -t public
mdfebumk-serve:
	php artisan serve
#migrate schema
mdfebumk-migrate:
	php artisan migrate
	php artisan db:seed
#seed database
mdfebumk-seed:
	php artisan db:seed
#refresh schema and seed
mdfebumk-refresh:
	php artisan migrate:refresh
	php artisan db:seed
#rollback schema
mdfebumk-rollback:
	php artisan migrate:rollback
#generate key
mdfebumk-key-generate:
	php artisan key:generate
mdfebumk-config-refresh:
	php artisan route:clear
	php artisan config:clear
	php artisan cache:clear
	php artisan view:clear
mdfebumk-composer-dump-autoload:
	composer dump-autoload
mdfebumk-config-optimize:
	php artisan optimize
#=========================================== END::exec local app ============================