<?php namespace calebdre\Foody\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
    public $timestamps = false;
    public $table = "users";
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];

    public function recipes(){
        return $this->hasMany("calebdre\Foody\Models\Recipe");
    }

    public function comments(){
        return $this->hasMany("calebdre\Foody\Models\InstructionComment");
    }
}