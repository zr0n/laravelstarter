# laravelstarter
A bootstrap CMS to a simple laravel website

Installing:

$ composer install


Rename the .envexample to .env, and remember to configure your database and Cloudinary configuration in this file.

Generate a new application key after create the .env file, with this command:

$ php artisan key:generate

After configuring the database, execute this command to make the migrations and the seeding:
(Basically insert the data in database)

$ php artisan migrate
$ php artisan db:seed


And finally run the application using:

$ php artisan serve
