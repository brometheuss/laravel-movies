<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityModel extends Model
{
    public function insert($ip, $page){
        return DB::table('activity')
            ->insert([
                'ip_address' => $ip,
                'page' => $page
            ]);
    }

    public function getSignUpLogs(){
        return DB::table('activity')
            ->get();
    }
}
