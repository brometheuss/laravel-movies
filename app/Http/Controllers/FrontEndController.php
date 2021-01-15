<?php

namespace App\Http\Controllers;

use App\Models\NavMenuModel;
use Illuminate\Http\Request;

abstract class FrontEndController extends Controller
{
    protected $data;

    public function __construct() {
        $nav = new NavMenuModel();
        $this->data['nav'] = $nav->getNav();
    }
}
