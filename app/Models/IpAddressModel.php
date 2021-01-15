<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IpAddressModel extends Model
{
    public function insertIp($ip) {
        return DB::table('connections')->insert([
            'ip_address' => $ip
        ]);
    }

    public function getConnections() {
        return DB::table('connections')
            ->get();
    }
}
