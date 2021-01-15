<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NavMenuModel extends Model
{
    public function getNav() {
        return DB::table('nav')->get();
    }
}
