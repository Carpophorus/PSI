N2M Symfony application
========================

About
------------

Application developed as a homework project of a subject:

Principles of software engineering at School of Electrical engineering in Belgrade,Serbia (etf.bg.ac.rs).

The application uses RIOT games api to fetch and display data about recent matches played as well as maintaining a user database and a backend administration.

Installation
------------

* Clone this repository
* Run the following commands inside the application root folder containing composer.json file

* Run the following command and give needed parameters (more information can be found at official symfony docs):

        composer install

* Run the following command to initialize the database (This command and data fixtures still in development, will be added to post install in the future):

        php bin/console doctrine:schema:update -f
        
* Run the following command to initialize needed initial DB data:

        php bin/console doctrine:fixtures:load
        
* Run the following command to generate a admin user for backend:

        php bin/console psi:user:admin <email> <first_name> <last_name> <password>

* Run the following command to clear the app cache:

        php bin/console cache:clear --env=prod


* Configure your web server alias to the web directory of this application

* Open the admin section of the app: alias/app.php/admin

* Login and configure the API key and API request delay parameters. API key must be a valid RIOT api key, API delay must be at least 10 seconds for safe usage in order not to break the API limit if using a development key.

* Run the following command to pull static data from the RIOT API:

        php bin/console psi:static:update
        
* Create following folders inside the application web directory: web/static/champion, web/static/rune, web/static/profileicon, web/static/mastery, web/static/spell

* Run the following command to pull static file data from the RIOT API:

        php bin/console psi:static:file:update
        
* Clear the app cache again if needed / errors occur:

        php bin/console cache:clear --env=prod        

FAQ
------------

### My changes are not being applied?

If you are not accessing the application through app_dev.php you need to flush the cache with the following command:

    php bin/console cache:clear --env=prod
