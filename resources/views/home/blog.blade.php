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
                            <h2>Blog</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($articls as $articl)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{asset('/img/blog/'.$articl->image)}}" alt="">
                                    <a href="{{route('blog.detail',$articl->ref)}}" class="blog_item_date">
                                        <h3>{{date('d', strtotime($articl->date))}}</h3>
                                        <p>{{date('Y-M', strtotime($articl->date))}}</p>
                                    </a>
                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('blog.detail',$articl->ref)}}">
                                        <h2 class="blog-head" style="color: #2d2d2d;">{{$articl->title}}</h2>
                                    </a>
                                    <p>{!! Str::limit($articl->descr, 100) !!}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> {{$articl->userarticl->name}}</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach

                    </div>
                </div>

                @include('slide-menu')

            </div>
        </div>
        <!--pagenition-->

        <!--pagenition-->
    </section>

    <!-- Blog Area End -->
</main>
@stop


