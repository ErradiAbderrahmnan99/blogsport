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
                                <h2>Blog Details</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Blog Area Start -->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{asset('img/blog/'.$articl->image)}}" alt="">
                            </div>
                            <div class="blog_details">
                                <h2 style="color: #2d2d2d;">
                                    {{$articl->title}}
                                </h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> {{$articl->userarticl->name}}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>

                                <p>
                                    {!! $articl->descr !!}
                                </p>
                            </div>
                        </div>
                        <div class="navigation-top">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                                    people like this</p>
                                <div class="col-sm-4 text-center my-2 my-sm-0">
                                    <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                                </div>
                                <ul class="social-icons">
                                    <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                </ul>
                            </div>
                            {{-- Prev and Next post --}}
                            <div class="navigation-area">
                                <div class="row">
                                    @if($posts = \App\Models\articl::all()->random(1))
                                    @foreach($posts as $post)
                                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{asset('img/blog/'.$post->image)}}" style="width: 50px;height: 50px" alt="">
                                                </a>
                                            </div>
                                            <div class="arrow">
                                                <a href="{{route('blog.detail',$post->ref)}}">
                                                    <span class="lnr text-white ti-arrow-left"></span>
                                                </a>
                                            </div>
                                            <div class="detials">
                                                <p>Prev Post</p>
                                                <a href="#">
                                                    <h4 style="color: #2d2d2d;">{{$post->title}}</h4>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif

                                    @if($posts = \App\Models\articl::all()->random(1))
                                    @foreach($posts as $post)
                                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                            <div class="detials">
                                                <p>Next Post</p>
                                                <a href="{{route('blog.detail',$post->ref)}}">
                                                    <h4 style="color: #2d2d2d;">{{$post->title}}</h4>
                                                </a>
                                            </div>
                                            <div class="arrow">
                                                <a href="#">
                                                    <span class="lnr text-white ti-arrow-right"></span>
                                                </a>
                                            </div>
                                            <div class="thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{asset('img/blog/'.$post->image)}}" style="width: 50px;height: 50px" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            {{-- /Prev and Next post --}}
                        </div>

                        {{-- comment --}}
                        @foreach($commentshows as $commentshow)
                        <div class="comments-area">
                            <h4>05 Comments</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="assets/img/blog/comment_1.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">{{$commentshow->comment}}</p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">{{$commentshow->name}}</a>
                                                    </h5>
                                                    <p class="date">{{$commentshow->date}}</p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- /comment --}}

                        {{-- add comment --}}
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form class="form-contact comment_form" action="#"  id="pageForm">
                                @csrf
                                <input type="hidden" value="{{$articl->id}}" name="articl_id">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                placeholder="Write Comment"></textarea>
                                            </div>
                                            <small id="comment_error" class="form-text text-danger"></small>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                            </div>
                                            <small id="name_error" class="form-text text-danger"></small>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                            </div>
                                            <small id="email_error" class="form-text text-danger"></small>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                            </div>
                                            <small id="website_error" class="form-text text-danger"></small>
                                        </div>
                                </div>
                                <div class="mb-3 text-center">
                                    <small class="alert alert-success" id="success_msg" style="display: none">
                                        done ! your article added
                                    </small>
                                </div>
                                <div class="form-group">
                                    <button id="save_page" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>
                                </div>
                            </form>
                        </div>
                        {{-- /add comment --}}
                    </div>

                    @include('slide-menu')
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
    </main>
@stop

@section('script')
    <script>
        $(document).on('click','#save_page',function (e){
            e.preventDefault();
            $('#comment_error').text('');
            $('#name_error').text('');
            $('#email_error').text('');
            $('#website_error').text('');
            var formData = new FormData($('#pageForm')[0]);
            $.ajax({
                type:'post',
                enctype: 'multipart/form-data',
                url    : "{{route('add.comment')}}",
                data   :formData,
                processData : false,
                contentType : false,
                cache  : false,
                success: function(data){
                    if (data.status == true){
                        $('#success_msg').show();
                        setTimeout(
                            function()
                            {
                                location.reload();
                            }, 0010);
                    }

                },error: function (reject){
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
    </script>
@stop


