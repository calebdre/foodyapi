<?php namespace calebdre\Foody\Models;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model{
    public $timestamps = false;
    protected $hidden = ["instruction_types_id","recipes_id"];

    public function recipe(){
        return $this->belongsTo("calebdre\Foody\Models\Recipe");
    }

    public function type(){
        return $this->belongsTo("calebdre\Foody\Models\InstructionType", "instruction_types_id");
    }

    public function comments(){
        return $this->hasMany("calebdre\Foody\Models\InstructionComment");
    }
}
