@extends('layouts.layout')

@section('content')
@if(!session('user'))
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">New account / Sign in</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <h1>New account</h1>
                            <p class="lead">Not our registered customer yet?</p>
                            <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                            <p class="text-muted">If you have any questions, please feel free to <a href="{{ route('contact') }}">contact us</a>, our customer service center is working for you 24/7.</p>
                            <hr>
                            <form action="{{ route('signup') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="name_register" name="name_register" type="text" placeholder="name" onkeyup="check_client();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="email_register" name="email_register" type="text" placeholder="email" onkeyup="check_email();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="password_register" name="pass_register" type="password" placeholder="password" onkeyup="check_pass();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="password2_register" name="pass2_register" type="password" placeholder="password again" onkeyup="check_pass();" class="form-control">
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            @if(session('pw-not-match'))
                                                <li>{{ session('pw-not-match') }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                                @if(session('pw-not-match'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @if(session('pw-not-match'))
                                                <li>{{ session('pw-not-match') }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box">
                            <h1>Login</h1>
                            <p class="lead">Already our customer?</p>
                            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                            <hr>
                            <form action="{{ route('login-user') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input id="tbEmail" name="tbEmail" type="text" placeholder="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="tbPw" name="tbPw" type="password" placeholder="password" class="form-control">
                                </div>
                                @if(session('msg-fail'))
                                    <div class="alert alert-danger">{{ session('msg-fail') }}</div>
                                @endif
                                <div class="text-center">
                                    <button type="submit" name="btnLogin" id="btnLogin" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection