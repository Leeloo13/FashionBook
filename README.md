# FashionBookParis

Require version (or updated version) of :

phpmyadmin:5.1.3
php:8.1.3

Default database behaviour:
-db named "fashionbookparis"
-user name is "root"
-no password set
(to change that go to your .env and adapts it accordingly)

## setup

-configured webpack encore and installed npm

-installed symfony/testpack to set and execute tests

-installed phpstan to analyse code statically,to foresee errors and eventual bugs in our code,along with extensions for phpunit,doctrine and symfony;also configure composer to execute cs fix AND phpstan with this command:composer check-quality with phpstan set to level 5 with a check ignored

-installed stylelint to analyse css code

-installed orm-fixtures to create multiple random data

-installed fakerphp to create better fake data

-installed vichuploader to ease uploading of images

-installed knppaginator to handle pagination

-installed easyadmin to handle back office

-installed twig extra bundle and twig string extra to handle string manipulation

-installed liipimaginebundle to use optimised assets

## Step

-create home controller and install roboto 400 police via webpack
