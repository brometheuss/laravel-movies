@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Slider</div>
        <div class="card-body">
            @if(session('slide-suc'))
                <div class="alert-success">
                    {{ session('slide-suc') }}
                </div>
            @endif
            @if(session('slide-fail'))
                <div class="alert alert-danger">
                    {{ session('slide-fail') }}
                </div>
            @endif
                @if(session('slider-del-suc'))
                    <div class="alert alert-success">
                        {{ session('slider-del-suc') }}
                    </div>
                @endif
                @if(session('slider-del-fail'))
                    <div class="alert alert-danger">
                        {{ session('slider-del-fail') }}
                    </div>
                @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Alt</th>
                        <th>Preview</th>
                        <th>Del</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Alt</th>
                        <th>Preview</th>
                        <th>Del</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($slider as $u)
                    <tr>
                        <td>{{ $u->id_slider }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->alt }}</td>
                        <td><img src="{{ asset($u -> path) }}" class="img-fluid"/></td>
                        <td>
                            <form action="{{ url('admin-panel/slider')."/".$u->id_slider }}" method="POST">
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
