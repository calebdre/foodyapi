<?php namespace calebdre\Foody\Controllers;

use calebdre\ApiSugar\ApiController;
use calebdre\Foody\Models\Recipe;
use Flight;

class RecipeController extends ApiController{
    public $mappings = [
        'crud' => [
            'model' => 'calebdre\Foody\Models\Recipe',
            'resource_name' => 'recipes',
            "eager_relations" => ["ingredients", "categories", "ingredient_measures", "instructions"],
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
        if(strpos($q, ",") !== false){
            // there is a comma! (to help out with the logic...double negatives suck D:
            $q = explode(",", $q);
        }else{
            $q = [$q];
        }

        $results = [];

        foreach($q as $keyword){
            switch($options['filterBy']){
                case "ingredient":
                    $results = array_unique(array_merge($results, $this->searchIngredients($keyword)->all()));
                    break;
                case "category":
                    $results = array_unique(array_merge($results, $this->searchCategories($keyword)->all()));
                    break;
                case "keyword":
                    $results = array_unique(array_merge($results, $this->searchByName($keyword)->all()));
            }
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