<?php
require "vendor/autoload.php";

use calebdre\ApiSugar\Api;
use calebdre\Foody\Controllers\CategoriesController;
use calebdre\Foody\Controllers\IngredientsController;
use calebdre\Foody\Controllers\RecipeController;


$api = new Api();
$api->configureDB([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'foody',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$api->addClass(new RecipeController());
$api->addClass(new IngredientsController());
$api->addClass(new CategoriesController());
$api->execute();