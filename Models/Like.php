<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class Like extends Model{
    public $timestamps = false;

    public function recipe(){
        return $this->belongsTo("calebdre\Foody\Models\Recipe");
    }
}