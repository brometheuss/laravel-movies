<?php

namespace App\Http\Controllers;

use App\Models\ActivityModel;
use App\Models\IpAddressModel;
use Illuminate\Http\Request;

class AdminActivityController extends Controller
{
    private $data;

    public function index(){
        $model = new ActivityModel();
        $this->data['logs'] = $model->getSignUpLogs();
        return view('admin.activity.signup-activity', $this->data);
    }

    public function connections() {
        $model = new IpAddressModel();
        $this->data['con'] = $model->getConnections();
        return view('admin.activity.connections-activity', $this->data);
    }
}
