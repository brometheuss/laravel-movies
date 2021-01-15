@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Add new slide</div>
            <div class="card-body">
                <form method="post" action="{{ url('/admin-panel/slider') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="slideName" name="slideName" class="form-control" placeholder="Name" required="required" autofocus="autofocus">
                                    <label for="slideName">name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="slideAlt" name="slideAlt" class="form-control" placeholder="Alt">
                            <label for="slideAlt">alt</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="sliderPic" name="sliderPic">
                                <label class="custom-file-label" for="sliderPic">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" name="btnAdd" id="btnAdd" class="btn-block btn btn-primary">Insert</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><br/>
@endsection