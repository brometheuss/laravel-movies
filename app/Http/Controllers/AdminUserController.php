<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\AdminUserModel;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    private $model;
    private $data;

    public function __construct(){
        $this->model = new AdminUserModel();
        $this->data['nav'] = $this->model->getRoles();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['all'] = $this->model->getAll();
        return view('admin.user', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['roles'] = $this->model->getRoles();
        return view('admin.insert-user', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        try{
            $model2 = new AdminUserModel();
            $model2->name = $request->input('editFullName');
            $model2->email = $request->input('editEmail');
            $model2->pass = $request->input('editPassword');
            $model2->pass2 = $request->input('editPassword2');
            $model2->role = $request->get('role_id', 2);

            dd($model2);

            if($model2->pass == $model2->pass2) {
                $model2->insert();
                return redirect('/admin-panel/users/create')->with('pw-match', "Successfully added user.");
            } else {
                return redirect('/admin-panel/users/create')->with('pw-not-match', 'Passwords do not match');
            }


        } catch (\Throwable $e){
            return redirect('/admin-panel/users');
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
        $this->data['id'] = $this->model->getUser($id);
        return view('admin.edit-user', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, $id)
    {
        try{
            $this->model->name = $request->input('editFullName');
            $this->model->email = $request->input('editEmail');
            $this->model->pass = $request->input('editPassword');
            $this->model->pass2 = $request->input('editPassword2');
            $this->model->active = $request->input('activeOrNot');
            $this->model->role = $request->get('rolee');

            //dd($this->model);

            if($this->model->pass == $this->model->pass2) {
                $this->model->updateUser($id);
                return redirect('/admin-panel/users')->with('u-success', "Successfully updated user.");
            } else {
                return redirect('/admin-panel/users')->with('u-fail', 'Passwords do not match');
            }

        } catch(\Exception $e){
            \Log::info("Failed to update user.");
            echo $e->getMessage();
        }
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
            $this->model->deleteUser($id);
            return redirect()->back()->with('usr-del', 'User successfully deleted.');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with('usr-not-del', "Something went wrong, try again.");
        }
    }
}
