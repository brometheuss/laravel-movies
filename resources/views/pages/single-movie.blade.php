@extends('layouts.layout')

@section('content')
        <div id="search" class="collapse">
        <div class="container">
            <form role="search" class="ml-auto">
                <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </header>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('movies') }}">Movies</a></li>
                                <li aria-current="page" class="breadcrumb-item active">{{ $single -> title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <!--
                        *** MENUS AND FILTERS ***
                        _________________________________________________________
                        -->
                        <!-- *** MENUS AND FILTERS END ***-->
                        <div class="banner"><a href="#"><img src="{{ asset('img/banner.jpg') }}" alt="sales 2014" class="img-fluid"></a></div>
                    </div>
                    <div class="col-lg-9">
                        <div id="productMain" class="row">
                            <div class="col-md-6">
                                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                                    <div class="item"> <img src="{{ asset($single -> path) }}" alt="" class="img-fluid"></div>
                                    <div class="item"> <img src="{{ asset($single -> path) }}" alt="" class="img-fluid"></div>
                                    <div class="item"> <img src="{{ asset($single -> path) }}" alt="" class="img-fluid"></div>
                                </div>
                                <!-- /.ribbon-->
                                <div class="ribbon sale">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon-->
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <h1 class="text-center">{{ $single->title }}</h1>
                                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to check out the details</a></p>
                                    {{--<p class="">Premiere: {{ $single -> date_released    }}</p>--}}
                                    {{--<p class="text-center buttons"><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a><a href="basket.html" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Add to wishlist</a></p>--}}
                                </div>
                                <div data-slider-id="1" class="owl-thumbs">
                                    <button class="owl-thumb-item"><img src="{{ asset($single -> path) }}" alt="" class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img src="{{ asset($single -> path) }}" alt="" class="img-fluid"></button>
                                    <button class="owl-thumb-item"><img src="{{ asset($single -> path) }}" alt="" class="img-fluid"></button>
                                </div>
                            </div>
                        </div>
                        <div id="details" class="box">
                            <p></p>
                            <h4>Title</h4>
                            <p>{{ $single -> title }}</p>
                            <h4>Description</h4>
                            <ul>
                                <li>{{ $single -> description }}</li>
                            </ul>
                            <h4>Available in theaters</h4>
                            <ul>
                                <li>{{ $single -> date_released }}</li>
                            </ul>
                            <blockquote>
                                <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em></p>
                            </blockquote>
                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.col-md-9-->
                </div>
            </div>
        </div>
    </div>
    @endsection