@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Edit movie</div>
            <div class="card-body">
                @if(session('movie-success'))
                    <div class="alert alert-success">{{ session('movie-success') }}</div>
                @endif
                @if(session('movie-fail'))
                    <div class="alert alert-success">{{ session('movie-fail') }}</div>
                @endif
                <form method="post" action="{{ url('/admin-panel/movies') . "/" . $movie -> id_movie }}" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="movieTitle" name="movieTitle" value="{{ $movie -> title }}" class="form-control" placeholder="Movie title" autofocus="autofocus">
                                    <label for="movieTitle">title</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <textarea type="text" id="movieDescription" name="movieDescription" class="form-control" placeholder="description" autofocus="autofocus">{{ $movie -> description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="dateReleased" name="dateReleased" value="{{ $movie -> date_released }}" class="form-control" placeholder="Date released">
                            <label for="dateReleased">release date (yyyy-dd-mm)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <select class="custom-select" name="genreId" id="genreId">
                                    <option selected>select genre..</option>
                                    @foreach($genres as $g)
                                        <option value="{{ $g -> id_genre }}">{{ $g -> genre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="moviePic" name="moviePic" value="{{ $movie -> name }}">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                        <br/>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" name="btnUpdate" id="btnUpdate" class="btn-block btn btn-primary">Update</button>
                            </div>
                        </div>
                </form>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div><br/>
@endsection