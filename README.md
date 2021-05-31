# car_pooling
## Getting started

### Prerequisites
- [PHP 7.x](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [Symfony](https://symfony.com/download)
- [MySQL](https://dev.mysql.com/downloads/)


### Installation
Follow the steps below to install and run locally the web service.

* Clone this repository:
    ```sh
    git clone https://github.com/pietrobigiarini/car_pooling.git
    ```
    
* Move into the project directory and install the required dependecies:
  ```sh
  cd car_pooling
  composer update
  ```
  
* Set your custom database URL as you prefer by adding the `DATABASE_URL` variable in a file named `.env`:
  ```sh
  touch .env
  "DATABASE_URL="mysql://user:password@host:port/car_pooling?serverVersion=server-version"" 
  ```
  Remember to replace `user`, `password`, `host` and `port` with your MySQL credentials.
  You also have to set the `server-version`: follow the [Symfony guide](https://symfony.com/doc/current/doctrine.html#configuring-the-database).
  
* Generate the database and its schema using [Doctrine](https://www.doctrine-project.org/):
  ```sh
  bin/console doctrine:database:create
  bin/console doctrine:schema:create
  ```
* Now you can finally run the web service with the Symfony built-in web server:
  
  ```sh
  symfony server:start
  ```
