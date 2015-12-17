<?php namespace calebdre\Foody;

use calebdre\ApiSugar\ApiController;
use calebdre\Foody\Models\Recipe;
use Flight;

class RecipeController extends ApiController{
    public $mappings = [
        'crud' => [
            'model' => 'calebdre\Foody\Models\Recipe',
            'resource_name' => 'recipes',
            "eager_relations" => ["ingredients", "categories"],
            "paginate" => ["per_page" => 15]
        ],
        'search' => [
            'method' => 'get',
            'route' => '/recipes/search'
        ]
    ];

    public function search(){
        $options = $offset = Flight::request()->query;

        if(!isset($options['q']) || !isset($options['filterBy'])){
            Flight::json(['error' => "You need to pass in both a q and a filterBy"], 400);
            return;
        }

        $q = $options['q'];
        $results = [];

        switch($options['filterBy']){
            case "ingredient":
                $results = $this->searchIngredients($q);
                break;
            case "category":
                $results = $this->searchCategories($q);
                break;
            case "name":
                $results = $this->searchByName($q);
        }

        Flight::json($results);
    }

    private function searchIngredients($q){
        return $this->searchRecipesWhere("ingredients", $q);
    }

    private function searchCategories($q){
        return $this->searchRecipesWhere("categories", $q);
    }

    private function searchByName($q){
        return Recipe::where("name" , "LIKE", "%$q%")->get()->all();
    }

    private function searchRecipesWhere($relation, $q){
        return Recipe::whereHas($relation,function($query) use ($q){
            $query->where("name", "LIKE", "%$q%");
        })->with("categories")->get();
    }
}