@extends('layouts.layout')

@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li aria-current="page" class="breadcrumb-item active">FAQ</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <!--
                        *** PAGES MENU ***
                        _________________________________________________________
                        -->
                        <div class="card sidebar-menu mb-4">
                            <div class="card-header">
                                <h3 class="h4 card-title">Pages</h3>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li><a href="{{ route('about') }}" class="nav-link">About</a></li>
                                    <li><a href="{{ route('contact') }}" class="nav-link">Contact page</a></li>
                                    <li><a href="{{ route('faq') }}" class="nav-link">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- *** PAGES MENU END ***-->
                        <div class="banner"><a href="#"><img src="{{ asset('img/banner.jpg') }}" alt="sales 2014" class="img-fluid"></a></div>
                    </div>
                    <div class="col-lg-9">
                        <div id="contact" class="box">
                            <h1>Frequently asked questions</h1>
                            <p class="lead">Are you curious about something?</p>
                            <p>Please feel free to contact us, our customer service center is working for you 24/7.</p>
                            <hr>
                            <div id="accordion">
                                <div class="card border-primary mb-3">
                                    <div id="headingOne" class="card-header p-0 border-0">
                                        <h4 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-primary d-block text-left rounded-0">1. Online purchasing</a></h4>
                                    </div>
                                    <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion" class="collapse show">
                                        <div class="card-body">
                                            <p>Can I buy tickets online ?</p><hr/>
                                            <ul>
                                                <li>Not yet, our shopping cart system is still in development.</li>
                                                <li>It is already in motion, and will be put to use in the coming months.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-primary mb-3">
                                    <div id="headingTwo" class="card-header p-0 border-0">
                                        <h4 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-primary d-block text-left rounded-0">2. Release dates</a></h4>
                                    </div>
                                    <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion" class="collapse">
                                        <div class="card-body">How early do you get all the movies ?
                                            <ul><hr/>
                                                <li>It depends on a couple of things:</li><hr/>
                                                <ul>
                                                    <li>When is the premiere date(in Europe).</li>
                                                    <li>Is it a blockbuster ?</li>
                                                    <li>Are there any additional region restrictions ?</li>
                                                </ul>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-primary">
                                    <div id="headingThree" class="card-header p-0 border-0">
                                        <h4 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-primary d-block text-left rounded-0">3. Refunds</a></h4>
                                    </div>
                                    <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion" class="collapse">
                                        <div class="card-body">Can I refund my ticket(s) ?
                                            <ul><hr/>
                                                <li>Of course</li>
                                                <li>If however you fail to do so, no worries! :)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.accordion-->
                        </div>
                    </div>
                    <!-- /.col-lg-9-->
                </div>
            </div>
        </div>
    </div>
@endsection