@extends('layouts.admin')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            SignUp Activity</div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ip Address</th>
                        <th>Page</th>
                        <th>Date and time</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Ip Address</th>
                        <th>Page</th>
                        <th>Date and time</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($logs as $u)
                        <tr>
                            <td>{{ $u->id_activity }}</td>
                            <td>{{ $u->ip_address }}</td>
                            <td>{{ $u->page }}</td>
                            <td>{{ $u->date_time }}</td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
