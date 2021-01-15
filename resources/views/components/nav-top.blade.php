<div id="top">
    <div class="container">
        <div class="row">
            <div class="offset-md-6 col-lg-6 text-center text-lg-right">
                <ul class="menu list-inline mb-0">
                    @if(session()->has('user'))
                        @if(session()->get('user')->role_id == 1)
                            <li class="list-inline-item"><a href="{{ url('/admin-panel/users') }}">Admin panel</a></li>
                        @endif
                    @endif
                    @if(!session()->has('user'))
                        <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                        <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="list-inline-item"><a href="{{ route('logout-user') }}">Logout</a></li>
                        <li class="list-inline-item"><a href="#">My account</a></li>
                    @endif
                    <li class="list-inline-item"><a href="{{ route('contact') }}">Contact</a></li>
                    {{--<li class="list-inline-item"><a href="#">Recently viewed</a></li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer login</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login-user') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input id="email-modal" name="tbEmail" type="text" placeholder="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input id="password-modal" name="tbPw" type="password" placeholder="password" class="form-control">
                        </div>
                        @if(session('msg-fail'))
                            <div class="alert alert-danger">{{ session('msg-fail') }}</div>
                        @endif
                        <p class="text-center">
                            <button name="btnLogin" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>
                    </form>
                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="{{ route('register') }}"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                </div>
            </div>
        </div>
    </div>
</div>