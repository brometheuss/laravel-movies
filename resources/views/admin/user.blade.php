@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Users</div>
        <div class="card-body">
            @if(session('usr-del'))
                <div class="alert alert-success">
                    {{ session('usr-del') }}
                </div>
            @endif
            @if(session('usr-not-del'))
                <div class="alert alert-danger">
                    {{ session('usr-not-del') }}
                </div>
            @endif
                @if(session('u-success'))
                    <div class="alert alert-success">{{ session('u-success') }}</div>
                @endif
                @if(session('u-fail'))
                    <div class="alert alert-success">{{ session('u-fail') }}</div>
                @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>RoleID</th>
                        <th>Edit</th>
                        <th>Del</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>RoleID
                        <th>Edit</th>
                        <th>Del</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($all as $u)
                    <tr>
                        <td>{{ $u->id_user }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->active }}</td>
                        <td>{{ $u->role_id }}</td>
                        <td>
                            <a href="{{ url('admin-panel/users')."/".$u->id_user."/edit" }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ url('admin-panel/users')."/".$u->id_user }}" method="POST">
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
