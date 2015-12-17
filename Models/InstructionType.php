<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class InstructionType extends Model{
    public $timestamps = false;
    public $table = "instruction_types";

    public function instructions(){
        return $this->hasMany("calebdre\Foody\Models\Instruction");
    }
}