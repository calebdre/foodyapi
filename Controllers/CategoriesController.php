<?php namespace calebdre\Foody\Controllers;
use calebdre\ApiSugar\ApiController;

class CategoriesController extends ApiController{
    public $mappings = [
        'crud' => [
            'model' => 'calebdre\Foody\Models\Category',
            'resource_name' => 'categories',
            "paginate" => ["per_page" => 20]
        ]
    ];
}