conf:
	sudo apt-get install php7.2 php7.2-mbstring composer
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate