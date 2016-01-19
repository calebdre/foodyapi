<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class InstructionComment extends Model{
    public $timestamps = false;
    public $table = "instruction_comments";

    public function instruction(){
        return $this->belongsTo("calebdre\Foody\Models\Instruction");
    }

    public function user(){
        return $this->belongsTo("calebdre\Foody\Models\User");
    }
}