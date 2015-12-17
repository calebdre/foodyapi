<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    public $timestamps = false;
    public $table = "categories";

    public function recipes(){
        return $this->belongsToMany("calebdre\Foody\Models\Recipe", "categories_recipes_pivot", "categories_id", "recipes_id");
    }
}