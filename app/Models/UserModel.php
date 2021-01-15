<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel
{
    //public $userId;
    public $name;
    public $email;
    public $pass;
    public $pass2;

    public function findUser($email, $pass){
        return DB::table('user')
              ->join('role', 'user.role_id', '=', 'role.id_role')
              ->where([
                    "user.email" => $email,
                    "user.pass" => sha1($pass)
              ])
            ->first();
    }

    public function addUser(){
        try{
            DB::table('user')->insert([
                'name' => $this->name,
                'email' => $this->email,
                'pass' => sha1($this->pass),
                'active' => 1,
                'role_id' => 2
            ]);
        } catch(\Throwable $e){
            \Log::critical("Failed to add user.");
            throw new \Exception("Greska pri unosu korisnika.");
        }
    }

    public function emailTaken($email){
        return DB::table('user')->where([
            'email' => $email
        ]);
    }
}
