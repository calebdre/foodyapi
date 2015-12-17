<?php namespace calebdre\Foody;

use calebdre\ApiSugar\ApiController;
use calebdre\Foody\Models\Recipe;
use Flight;

class RecipeController extends ApiController{
    public $mappings = [
        'crud' => [
            'model' => 'calebdre\Foody\Models\Recipe',
            'resource_name' => 'recipes',
            "eager_relations" => ["ingredients", "categories", "instructions"],
            "paginate" => ["per_page" => 15]
        ]
    ];
}