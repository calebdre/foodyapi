<?php namespace calebdre\Foody\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model{
    public $timestamps = false;

    public function scopeWhereRelationIsLike($query, $relation, $param){
        $query->whereHas($relation, function($query2) use ($param) {
           $query2->where("name", "LIKE", "%$param%");
        });
    }

    public function instructions(){
        return $this->hasMany("calebdre\Foody\Models\Instruction", "recipes_id");
    }

    public function ingredients(){
        return $this->belongsToMany("calebdre\Foody\Models\Ingredient", "ingredients_recipes_pivot", "recipes_id", "ingredients_id");
    }

    public function categories(){
        return $this->belongsToMany("calebdre\Foody\Models\Category", "categories_recipes_pivot", "recipes_id", "categories_id");
    }

//    public function user(){
//        return $this->belongsTo("calebdre\Foody\Models\User");
//    }
}
