<?php namespace calebdre\Foody\Controllers;
use calebdre\ApiSugar\ApiController;

class CommentsController extends ApiController{
    public $mappings = [
        'crud' => [
            'model' => 'calebdre\Foody\Models\InstructionComment',
            'resource_name' => 'instruction_comments',
            'eager_relations' => ['user', 'instruction']
        ],
    ];
}