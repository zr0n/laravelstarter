# Laravel Starter
## A simple CMS start pack to your projects

Installing:

> $ composer install


Rename the .envexample to .env, and remember to configure your database and Cloudinary access information in this file.

Generate a new application key after create the .env file, with this command:

> $ php artisan key:generate

After configuring the database, execute this command to make the migrations and the seeding:
(Basically insert the data in database)

> $ php artisan migrate

> $ php artisan db:seed

Then, we need to install our node_modules using:

$ npm install

And finally run the application using:

> $ php artisan serve




If you need to edit any javascript or scss file, run this command to compile and minify them:

> $ gulp --production
