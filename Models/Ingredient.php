<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model{
    public $timestamps = false;

    public function recipes(){
        return $this->belongsToMany("calebdre\Foody\Models\Recipe", "ingredients_recipes_pivot", "ingredients_id", "recipes_id");
    }

    public function measurement(){
        return $this->hasOne("calebdre\\Foody\\Models\\IngredientMeasurement","ingredients_id");
    }
}