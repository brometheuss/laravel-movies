<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminSliderModel extends Model
{
    public $name;
    public $path;
    public $alt;

    public function getSlider(){
        return \DB::table('slider')
            ->get();
    }

    public function insertSlide(){
        try{
            DB::table('slider')
                ->insert([
                    'name' => $this->name,
                    'path' => $this->path,
                    'alt'=> $this->alt
                ]);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }

    public function deleteSlide($id){
        return DB::table('slider')
            ->where('id_slider', $id)
            ->delete();
    }
}
