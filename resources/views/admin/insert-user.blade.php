@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Add new user</div>
            <div class="card-body">
                <form method="post" action="{{ url('/admin-panel/users') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="editFullName" name="editFullName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                                    <label for="editFullName">name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="editEmail" name="editEmail" class="form-control" placeholder="Email address">
                            <label for="editEmail">email</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="editPassword" name="editPassword" class="form-control" placeholder="Password">
                                    <label for="editPassword">password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="editPassword2" name="editPassword2" class="form-control" placeholder="Confirm password">
                                    <label for="editPassword">confirm password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="form-row">
                            <div class="col-md-2 offset-5">
                                @foreach($roles as $r)
                                 <label class="form-check-label">
                                    <input type="radio" value="{{ $r->id_role }}" class="form-check-input" name="role_id">{{ $r->type }}
                                </label><br/>
                                @endforeach
                            </div>
                        </div>
                        <br/>
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('pw-not-match'))
        <div class="alert alert-danger">{{ session('pw-not-match') }}</div>
    @endif
    @if(session('pw-match'))
        <div class="alert alert-success">{{ session('pw-match') }}</div>
    @endif
@endsection