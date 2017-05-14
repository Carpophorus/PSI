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

        php bin/console doctrine schema:update -f

* Run the following command to clear the app cache:

        php bin/console cache:clear --env=prod

* Configure your web server alias to the web directory of this application

FAQ
------------

### My changes are not being applied?

If you are not accessing the application through app_dev.php you need to flush the cache with the following command:

    php bin/console cache:clear --env=prod