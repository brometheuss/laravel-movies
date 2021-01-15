@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Movies</div>
        <div class="card-body">
            @if(session('movie-del-suc'))
                <div class="alert alert-success">
                    {{ session('movie-del-suc') }}
                </div>
            @endif
            @if(session('movie-del-fail'))
                <div class="alert alert-danger">
                    {{ session('movie-del-fail') }}
                </div>
            @endif
                @if(session('movie-success'))
                    <div class="alert alert-success">
                        {{ session('movie-success') }}
                    </div>
                @endif
                @if(session('movie-fail'))
                    <div class="alert alert-danger">
                        {{ session('movie-fail') }}
                    </div>
                @endif

                @if(session('upd-suc'))
                    <div class="alert alert-success">
                        {{ session('upd-suc') }}
                    </div>
                @endif
                @if(session('upd-fail'))
                    <div class="alert alert-danger">
                        {{ session('upd-fail') }}
                    </div>
                @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>DateReleased</th>
                        <th>Genre</th>
                        <th>PictureId</th>
                        <th>Del</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>DateReleased</th>
                        <th>Genre</th>
                        <th>PictureId</th>
                        <th>Del</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($movies as $m)
                        <tr>
                            <td>{{ $m->id_movie }}</td>
                            <td>{{ $m->title }}</td>
                            <td>{{ $m->description }}</td>
                            <td>{{ $m->date_released }}</td>
                            <td>{{ $m->genre_id }}</td>
                            <td>{{ $m->picture_id }}</td>
                            <td>
                                <form action="{{ url('admin-panel/movies')."/".$m->id_movie }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
