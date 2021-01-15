<?php

namespace App\Http\Controllers;

use App\Models\AdminSliderModel;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    private $data;
    private $model;

    public function __construct() {
        $this->model = new AdminSliderModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['slider'] = $this->model->getSlider();
        return view('admin.slider.slider', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.insert-slide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('sliderPic');
        $fileName = $file->getClientOriginalName();
        $newName = time() . "_" . $fileName;

        try {
            $file->move(public_path('img'), $newName);
            $new = "img/" . $newName;
            $this->model->name = $request->input('slideName');
            $this->model->alt = $request->input('slideAlt');
            $this->model->path = $new;

            //dd($this->model);

            $this->model->insertSlide();
            return redirect('/admin-panel/slider')->with('slide-suc', 'Successfully added a picture to the slider.');
        } catch (\Throwable $e) {
            return redirect('/admin-panel/slider')->with('slide-fail', 'Error occured while trying to add slider, try again.');
            //echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->model->deleteSlide($id);
            return redirect('/admin-panel/slider')->with('slider-del-suc', 'Slide successfully deleted');
        }catch (\Throwable $e){
            return redirect('/admin-panel/slider')->with('slider-del-fail', 'Error occured while trying to remove slide, try again.');
            //echo $e->getMessage();
        }
    }
}
