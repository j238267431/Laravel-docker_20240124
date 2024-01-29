docker-compose up --build
.env
   APP_URL=localhost

   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=root

Docker-compose exec fpm bash — зайти в контейнер fpm 
перейти в проект
выполнить
php artisan migrate