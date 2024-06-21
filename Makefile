build:
	docker compose up --build
status:
	docker compose ps
autoload:
	docker compose exec php bash -c "composer i && composer dump-autoload && composer update"
migrate:
	docker compose exec php bash -c "cd src/Database && php MakeMigration.php"