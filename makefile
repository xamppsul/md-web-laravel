
#=========================================== BEGIN::exec docker app ============================
docker-mdfebumk-start:
	docker compose -f docker-compose.yml up -d
#stop docker mdfebumk
docker-mdfebumk-stop:
	docker compose -f docker-compose.yml down
#list docker mdfebumk
docker-mdfebumk-container:
	docker compose -f docker-compose.yml ps
#list docker images
docker-mdfebumk-images:
	docker image ls
#restart docker mdfebumk
docker-mdfebumk-restart:
	docker compose -f docker-compose.yml restart
#logs docker mdfebumk
docker-mdfebumk-logs:
	docker compose -f docker-compose.yml logs -f
#build docker mdfebumk
docker-mdfebumk-build:
	docker compose -f docker-compose.yml build app

#================================================== migration ========================================
docker-mdfebumk-migrate:
	docker compose -f docker-compose.yml exec app php artisan migrate
	docker compose -f docker-compose.yml exec app php artisan db:seed
docker-mdfebumk-migrate-rollback:
	docker compose -f docker-compose.yml exec app php artisan migrate:rollback
#exec run migrate refresh
docker-mdfebumk-refresh:
	docker compose -f docker-compose.yml exec app php artisan migrate:refresh
	docker compose -f docker-compose.yml exec app php artisan db:seed
#exec run seeder
docker-mdfebumk-seed:
	docker compose -f docker-compose.yml exec app php artisan db:seed
#exec app docker via composer install
docker-mdfebumk-composer:
	docker compose -f docker-compose.yml exec app composer install
#=========================================== END::exec docker app ============================


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