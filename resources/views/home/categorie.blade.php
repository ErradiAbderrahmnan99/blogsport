@extends('layouts.homeLayout')
@section('content')
    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-70 text-center">
                                <h2>Categories</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Popular Work Start -->
        <section class="popular-work-area section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-70">
                            <span>Our Categories</span>
                            <h2>Our best recent popular work here</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($cates as $cate)
                        <div class="col-xl-col-lg-6 col-md-6 col-sm-6">
                            <div class="single-cat mb-110">
                                <a href="{{route('cate.post',$cate->ref_cat)}}">
                                    <img src="{{asset('img/category/'.$cate->image)}}" width="570px" height="420px" alt="">
                                </a>
                                <div class="img-cap">
                                    <h4>{{$cate->name}}</h4>
                                    <p>Melbourn, Australia</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="#" class="btn">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Work End -->
    </main>
@stop
