<?php namespace calebdre\Foody\Controllers;
use calebdre\ApiSugar\ApiController;

class IngredientsController extends ApiController{
    public $mappings = [
        'crud' => [
            'model' => 'calebdre\Foody\Models\Ingredient',
            'resource_name' => 'ingredients',
            "eager_relations" => [],
            "paginate" => ["per_page" =>20]
        ],
    ];

}