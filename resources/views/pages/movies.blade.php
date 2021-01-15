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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li aria-current="page" class="breadcrumb-item active">Movies</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <!--
                    *** MENUS AND FILTERS ***
                    _________________________________________________________
                    -->
                    <div class="card sidebar-menu mb-3">
                        <div class="card-header">
                            <h3 class="h4 card-title">Genres</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills flex-column category-menu">
                                        @foreach($genres as $g)
                                            <li><a href="{{ route('movies_genre', ['id' => $g->id_genre]) }}" class="nav-link">{{ $g->genre }}</a></li>
                                        @endforeach
                                            <div class="card-header">
                                                <h3 class="h4 card-title"><a href="{{ route('movies') }}" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i>Clear</a></h3>
                                            </div>
                            </ul>
                        </div>
                    </div>
                                  <!-- *** MENUS AND FILTERS END ***-->
                    <div class="banner"><a href="#"><img src="{{ asset('img/banner.jpg') }}" alt="sales 2014" class="img-fluid"></a></div>
                </div>
                <div class="col-lg-10">
                    <div class="box">
                        <h1>Movies</h1>
                        <p>Here you can find all the latest movies.</p>
                    </div>
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 products-showing">Showing <strong>12</strong> of <strong>25</strong> products</div>
                            <div class="col-md-12 col-lg-4 products-number-sort">
                                <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">All</a><span>products</span></div>
                            </div>
                            <div class="col-md-12 col-lg-5 products-number-sort">
                                <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                                    <div class="products-sort-by mt-2 mt-lg-0"><strong>Sort by</strong>
                                        <select name="sort-by" class="form-control">
                                            <option>Date released ASC</option>
                                            <option>Date released DESC</option>
                                            <option>Name ASC</option>
                                            <option>Name DESC</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row products">
                        @if($movies != null)
                            @foreach($movies as $m)
                            <div class="col-lg-4 col-md-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front"><a href="{{ route('single_movie', ['id' => $m->id_movie]) }}"><img src="{{ asset($m->path) }}" alt="{{ $m->alt }}" class="img-fluid"></a></div>
                                            <div class="back"><a href="{{ route('single_movie', ['id' => $m->id_movie]) }}"><img src="{{ asset($m->path) }}" alt="{{ $m->alt }}" class="img-fluid"></a></div>
                                        </div>
                                    </div><a href="{{ route('single_movie', ['id' => $m->id_movie]) }}" class="invisible"><img src="{{ asset($m->path) }}" alt="{{ $m->alt }}" class="img-fluid"></a>
                                    <div class="text"><br/>
                                        <h3><a href="{{ route('single_movie', ['id' => $m->id_movie])}}">{{ $m->title }}</a></h3></br>
                                    </div>
                                    <!-- /.text-->
                                </div>
                                <!-- /.product            -->
                            </div>
                            @endforeach
                        @endif
                           <!-- /.products-->
                    </div>
                    <div class="pages">
                        <span>{{ $movies->links() }}</span>
                        {{--<p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p>--}}
                        {{--<nav aria-label="Page navigation example" class="d-flex justify-content-center">--}}
                            {{--<ul class="pagination">--}}
                                {{--<li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>--}}
                                {{--<li class="page-item active"><a href="#" class="page-link">1</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">2</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">3</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">4</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">5</a></li>--}}
                                {{--<li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>--}}
                            {{--</ul>--}}
                        {{--</nav>--}}
                    </div>
                </div>
                <!-- /.col-lg-9-->
            </div>
        </div>
    </div>
</div>
@endsection