<?php namespace calebdre\Foody\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model{
    public $timestamps = false;

    public function instructions(){
        return $this->hasMany("calebdre\Foody\Models\Instruction", "recipes_id");
    }

    public function ingredients(){
        return $this->belongsToMany("calebdre\Foody\Models\Ingredient", "ingredients_recipes_pivot", "recipes_id", "ingredients_id");
    }

    public function categories(){
        return $this->belongsToMany("calebdre\Foody\Models\Category", "categories_recipes_pivot", "recipes_id", "categories_id");
    }

    public function likes(){
        return $this->hasMany("calebdre\Foody\Models\Like");
    }
}