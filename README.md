# Fast Growing Blog

Author: Alex Rosekrans

Copyright: interview-use-only

# Development
This project was quickly created on a windows box with the lates stable PHP, Laravel, and MariaDB versions.  It uses Composer as a dependency manager, and it has a some quirky db settings do to windows.  You may have to configure your database differently.

## Commands used for developement
1. 'php artisan ui vue --auth' For createing authentication, and registration
2. 'php artisan make:migration' For creating the category and post schemes
3. 'php artisan migrate' For adding all the schemas to the database
3. 'php artisan make:model' For using the category and post data
4. 'php artisan make:controller' For creating controllers to handle the frontend, and a few for the backend
5. 'php artisan key:generate' For creating an app level security key


## Directories where code was modified by me (not a tool)
1. app/database/migrations (adding column defenitions to schema migrations)
2. app/routes (changed some default routes to make sense within a blog type application)
3. app/http/controllers (adding actions to controllers and changing default controllers)
4. app/resources/sass (adding styling)
5. app/resources/views (dealing with the blade files)
6. app/ (modifying generated models)
7. app/providers (adding the EDITOR constant to redirect to the editor on login)

# Setup
1. Clone the fast growing blog
2. Make sure you can create the database, and name it like it is in your .env file (the example should have most of the settings necessary)
3. Run "composer install"
4. Run "npm install"
5. Run "php artisan key:generate"
6. Have fun pointing and laughing (:D)

# Using the Editor
1. Register and login
2. You will be redirected to the editor page
3. Have fun editing 
4. Go view your changes by clicking the logo

## Getting back to the editor
1. Click on your name and wait for the dropdown menu
2. Click on 'Goto the Editor'


