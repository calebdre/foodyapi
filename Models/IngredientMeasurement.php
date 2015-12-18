<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class IngredientMeasurement extends Model{
    public $timestamps = false;
    public $table = "ingredient_measurement";

    public function recipe(){
        return $this->belongsTo("calebdre\Foody\Models\Recipe");
    }

    public function ingredient(){
        return $this->belongsTo("calebdre\Foody\Models\Ingredient");
    }
}