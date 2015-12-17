<?php namespace calebdre\Foody\Models;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model{
    public $timestamps = false;

    public function recipe(){
        return $this->belongsTo("calebdre\Foody\Models\Recipe");
    }

    public function type(){
        return $this->belongsTo("calebdre\Foody\Models\InstructionType");
    }
}