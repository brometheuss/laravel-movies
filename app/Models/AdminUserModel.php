<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminUserModel extends Model
{
    public $name;
    public $email;
    public $pass;
    public $pass2;
    public $role;
    public $active;

    public function getAll() {
        return DB::table('user')
            ->get();
    }

    public function getUser($id) {
        return DB::table('user')
            ->join('role', 'user.role_id', '=', 'role.id_role')
            ->where([
                'user.id_user' => $id
            ])
            ->first();
    }

    public function getRoles() {
        return DB::table('role')
            ->get();
    }

    public function insert() {
        try{
            DB::table('user')->insert([
                'name' => $this->name,
                'email' => $this->email,
                'pass' => sha1($this->pass),
                'active' => 1,
                'role_id' => $this->role,
            ]);
        } catch(\Throwable $e){
            \Log::critical("Failed to add user.");
            echo $e->getMessage();
        }
    }

    public function updateUser($id) {
        try{
            DB::table('user')
                ->where('id_user', $id)
                ->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'pass' => sha1($this->pass),
                    'active' => $this->active,
                    'role_id' => $this->role
                ]);
        } catch(\Throwable $e) {
            \Log::critical("Failed to update user.");
            echo $e->getMessage();
        }
    }

    public function deleteUser($id) {
        return DB::table('user')
            ->where([
                "id_user" => $id
            ])
            ->delete();
    }
}
