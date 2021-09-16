@extends('layouts.homeLayout')
@section('content')
<main>
    <!--? slider-area start -->
    <div class="slider-area">
        <div class="slider-full-active owl-carousel custom-dots">
            <div class="slide-full slider-height d-flex align-items-center" style="background-image: url(img/hero/screen-0.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-8">
                            <div class="slide-full-content">
                                <span>#1 aritecture in united stare</span>
                                <h1>Focus on<br> Design Quality</h1>
                                <p>We creating lasting impression through architecture design.</p>
                                <a class="btn" href="#">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-full d-flex slider-height align-items-center" style="background-image: url(img/hero/messi+04.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-8">
                            <div class="slide-full-content">
                                <span>#1 aritecture in united stare</span>
                                <h1>Focus on<br> Design Quality</h1>
                                <p>We creating lasting impression through architecture design.</p>
                                <a class="btn" href="#">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-full d-flex slider-height align-items-center" style="background-image: url(img/hero/h_hero.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-8">
                            <div class="slide-full-content">
                                <span>#1 aritecture in united stare</span>
                                <h1>Focus on<br> Design Quality</h1>
                                <p>We creating lasting impression through architecture design.</p>
                                <a class="btn" href="#">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-area end -->
    <!--? About Start-->
    <section class="about-area section-padding2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>About Us</span>
                            <h2>52 Years Of Experience in this area</h2>
                        </div>
                        <p>Brook presents your services with flexible, convenient and cdpoe layouts. You can select your favorite layouts & elements for cular ts with unlimited ustomization possibilities. Pixel-perfreplication of the designers is intended.</p>
                        <a href="about.html" class="btn">About us</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img ">
                            <img src="img/gallery/about1.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="img/gallery/about2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About  End-->
    <!--? Blog Area Start -->
    <section class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-9 col-sm-10">
                    <div class="section-tittle text-center mb-90">
                        <span>Recent blog</span>
                        <h2>All recent articals from us.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($articls as $articl)
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <img src="{{asset('/img/blog/'.$articl->image)}}" alt="">
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span>{{date('d', strtotime($articl->date))}}</span>
                                    <p>{{date('Y-M', strtotime($articl->date))}}</p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p>|   Physics</p>
                                <h3><a href="{{route('blog.detail',$articl->ref)}}">{{$articl->title}}</a></h3>
                                <a href="{{route('blog.detail',$articl->ref)}}" class="more-btn">Read more »</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
    <!--? Popular Work Start -->
    <section class="popular-work-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Our Category</span>
                        <h2>Our best recent popular work here</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($cates as $cate)
                <div class="col-xl-col-lg-6 col-md-6 col-sm-6">
                    <div class="single-cat mb-110">
                        <a href="{{route('cate.post',$cate->ref_cat)}}"><img src="{{asset('img/category/'.$cate->image)}}" alt=""></a>
                        <div class="img-cap">
                            <h4>{{$cate->name}}</h4>
                            <p>Melbourn, Australia</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Popular Work End -->
    <!--? Experience Area Start -->
    <section class="experience-area position-relative d-flex align-items-end">
        <div class="caption-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="experience-caption">
                        <h2>Our best recent popular work here</h2>
                        <p>Brook presents your services with flexible, convenient and cdpoe layouts. You can select your favorite layouts & elements for cular ts with unlimited ustomization possibilit.</p>
                        <a href="about.html" class="btn">About us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Experience Area End -->
    <!--? Team Start -->
    <section class="team-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 col-sm-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Our exparts</span>
                        <h2>best team we have ever had right now</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="img/gallery/team2.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Jhon Sunsa</a></h3>
                            <span>Creative derector</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="img/gallery/team3.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Smith J White</a></h3>
                            <span>Creative derector</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="img/gallery/team1.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Jayson Brouni</a></h3>
                            <span>Creative derector</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team End -->
    <!--? All startups Start -->
    <div class="starups-area testimonial-area fix">
        <!--left Contents  -->
        <div class="starups-img">
            <div class="play-btn"><a class="popup-video" href="https://www.youtube.com/watch?v=ssBM8JaPMiw"><i class="flaticon-null-3"></i></a></div>
        </div>
        <!-- Right Contents -->
        <div class="starups">
            <!--? Testimonial Start -->
            <div class="h1-testimonial-active">
                <!-- Single Testimonial -->
                <div class="single-testimonial text-center">
                    <div class="testimonial-caption ">
                        <!-- founder -->
                        <div class="testimonial-founder d-flex align-items-center justify-content-center mb-40">
                            <div class="founder-img">
                                <img src="img/gallery/testimonial.png" alt="">
                            </div>
                            <div class="founder-text">
                                <span>OliQa .F jems</span>
                                <p>Designer</p>
                            </div>
                        </div>
                        <!-- Caption -->
                        <div class="testimonial-top-cap">
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Qcuis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsa.</p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
        </div>
    </div>
    <!--All startups End -->

</main>
@stop
