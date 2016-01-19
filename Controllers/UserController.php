<?php namespace calebdre\Foody\Controllers;
use calebdre\ApiSugar\ApiController;
use calebdre\Foody\Models\User;

class UserController extends ApiController{
    public $mappings = [
        'crud' => [
            'model' => 'calebdre\Foody\Models\User',
            'resource_name' => 'users',
            "eager_relations" => ["recipes", "comments"],
            'not' => ['create']
        ],
        "login" =>[
            "method" => "post",
            "route" => "/users/login"
        ],
        "register" => [
            "method" => "post",
            "route" => "/users/register"
        ]
    ];

    public function login(){
        $this->checkAgainstRequestParams(['email', 'password']);
        $data = $this->getRequestData();

        $fetch = User::where("email", "=", $data['email']);
        if($fetch->count() == 0){
            $this->fail("User not found");
            return;
        }

        $user = $fetch->first();

        if(password_verify($data['password'], $user->password)){
            $this->success("", ['user' => $user->toArray()]);
        }else{
            $this->fail("The password was incorrect.");
        }
    }

    public function register(){
        $this->checkAgainstRequestParams(['email', "name", 'password']);
        $data = $this->getRequestData();

        if(User::where("email", "=", $data['email'])->count() != 0){
            $this->fail("This email has already been registered.");
            return;
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->fail("You entered an invalid email.");
            return;
        }

        $user = new User($data);
        $user->password = password_hash($data["password"], PASSWORD_DEFAULT);
        echo "good job";
        if($user->save()){
            $this->success("", ["user" => $user->toArray()]);
        }else{
            $this->fail();
        }
    }
}