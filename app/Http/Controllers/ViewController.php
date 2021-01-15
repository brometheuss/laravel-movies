<?php

namespace App\Http\Controllers;

use App\Models\SliderModel;
use Illuminate\Http\Request;

class ViewController extends FrontEndController
{
    public function contact(){
        return view('pages.contact', $this->data);
    }

    public function home(){
        $model = new SliderModel();
        $this->data['slider'] = $model->getSlides();
        return view('pages.home', $this->data);
    }

    public function cart(){
        return view('pages.shop-cart', $this->data);
    }

    public function about() {
        return view('pages.about', $this->data);
    }

    public function faq() {
        return view('pages.faq', $this->data);
    }
}
