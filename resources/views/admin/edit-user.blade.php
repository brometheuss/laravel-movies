@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Update user</div>
            <div class="card-body">
                <form method="post" action="{{ url('/admin-panel/users') . "/" . $id->id_user}}">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-label-group">
                                    <input type="text" id="firstName" name="editFullName" value="{{ $id -> name }}" class="form-control" placeholder="First name" autofocus="autofocus">
                                    <label for="firstName">name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="editEmail" value="{{ $id -> email }}" class="form-control" placeholder="Email address">
                            <label for="inputEmail">email</label>
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
                                    <label for="editPassword2">confirm password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="activeOrNot">Active?</label>
                                <select class="custom-select" id="activeOrNot" name="activeOrNot">
                                    <option>...</option>
                                    @if($id -> active == 1)
                                        <option value="1" selected>Yes</option>
                                        <option value="2">No</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="2" selected>No</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-2 offset-2">
                                @if($id -> role_id == 2)
                                    <label class="form-check-label">
                                        <input type="radio" value="2" checked class="form-check-input" name="rolee">user
                                    </label><br/>
                                    <label class="form-check-label">
                                        <input type="radio" value="1" class="form-check-input" name="rolee">admin
                                    </label><br/>
                                @else
                                    <label class="form-check-label">
                                        <input type="radio" value="2" class="form-check-input" name="rolee">user
                                    </label><br/>
                                    <label class="form-check-label">
                                        <input type="radio" value="1" checked class="form-check-input" name="rolee">admin
                                    </label><br/>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" name="btnAdd" id="btnAdd" class="btn-block btn btn-primary">Update</button>
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