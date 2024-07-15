step-1
git clone https://github.com/tisaju289/softexel_project


step-2
composer install
npm install

step-3
Copy the .env file
cp .env.example .env

step-4
php artisan key:generate


step-5
Configure the .env file
Update the following lines in your .env file with your database and other configuration settings:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=softexel
DB_USERNAME=
DB_PASSWORD=

step-6
php artisan migrate



