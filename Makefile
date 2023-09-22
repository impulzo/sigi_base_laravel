#Scripts
husky-init:
	npx husky install

husky-chmod:
	chmod +x .husky/pre-commit

# PHP ARTISAN
db-reset:
	php artisan migrate:refresh --seed

basic-seeder:
	php artisan iseed data_types,data_rows,permissions,permission_role,menu_items --force
