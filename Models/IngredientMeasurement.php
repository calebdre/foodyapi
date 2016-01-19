<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class IngredientMeasurement extends Model{
    public $timestamps = false;
    public $table = "ingredient_measurement";
    protected $hidden = ['ingredients_id'];

    public function ingredient(){
        return $this->belongsTo("calebdre\Foody\Models\Ingredient", "ingredients_id");
    }
}