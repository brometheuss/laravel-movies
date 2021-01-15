<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SliderModel extends Model
{
    public function getSlides(){
        return DB::table('slider')
            ->get();
    }
}
