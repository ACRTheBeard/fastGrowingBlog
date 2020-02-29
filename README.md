#Fast Growing Blog

Author: Alex Rosekrans
CopyRight: interview-use-only

#Development
This project was quickly created on a windows box with the lates stable php, laravel, and mariaDB versions.  It uses composer as a dependency manager, and it has a some quirky db settings do to windows.  You may have to configure your database differently.

## commands used for developement
1. '''php artisan ui vue --auth''' For createing authentication, and registration
2. '''php artisan make:migration'' For creating the category and post schemes
3. '''php artisan migrate''' For adding all the schemas to the database

## Directories where code was modified by me (not a tool)
1. app/database/migrations (adding column defenitions to schema migrations)
2. app/routes (changed some default routes to make sense within a blog type application)
3. app/http/controllers (adding actions to controllers and changing default controllers)


#Setup
1. clone the fast growing blog from ....
2. make sure you can create a database in your .env file (the example should have most of the settings necessary)
3. run "php artisan migrate"
4. have fun ripping pointing and laughing (:D)

