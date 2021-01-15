<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Pages</h4>
                <ul class="list-unstyled">
                    @foreach($nav as $n)
                        <li><a href="{{ route($n->link) }}" data-delay="200">{{ $n->text }}</a></li>
                    @endforeach
                </ul>
                <hr>
                <h4 class="mb-3">User section</h4>
                @if(session('user'))
                    <ul class="list-unstyled">
                        <li><a href="#">My Account</a></li>
                    </ul>
                @else
                <ul class="list-unstyled">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
                @endif
            </div>
            <!-- /.col-lg-3-->
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <h4 class="mb-3">Where to find us</h4>
                <p><strong>Obaju Ltd.</strong><br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br><strong>Great Britain</strong></p><a href="{{ url('/contact') }}">Go to contact page</a>
                <hr class="d-block d-md-none">
            </div>
            <!-- /.col-lg-3-->
            <div class="col-lg-3 col-md-6">
                <hr>
                <h4 class="mb-3">Stay in touch</h4>
                <p class="social"><a href="#" class="facebook external"><i class="fa fa-facebook"></i></a><a href="#" class="twitter external"><i class="fa fa-twitter"></i></a><a href="#" class="instagram external"><i class="fa fa-instagram"></i></a><a href="#" class="gplus external"><i class="fa fa-google-plus"></i></a><a href="#" class="email external"><i class="fa fa-envelope"></i></a></p>
            </div>
            <!-- /.col-lg-3-->
        </div>
        <!-- /.row-->
    </div>
    <!-- /.container-->
</div>


<!-- /#footer-->
<!-- *** FOOTER END ***-->


<!--
*** COPYRIGHT ***
_________________________________________________________
-->
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <p class="text-center text-lg-left">©2019 Uros Markov.</p>
            </div>
            <div class="col-lg-6">
                <p class="text-center text-lg-right">Template design by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious: E-commerce</a>
                    <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :)-->
                </p>
            </div>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END ***-->
<!-- JavaScript files-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="{{ asset('js/front.js') }}"></script>
