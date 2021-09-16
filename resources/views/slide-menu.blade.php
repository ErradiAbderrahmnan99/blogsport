<div class="col-lg-4">
    <div class="blog_right_sidebar">

        {{-- Category --}}
        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
            <ul class="list cat-list">
                @if($cates = \App\Models\categorie::select('id','name','ref_cat')->get())
                    @foreach($cates as $cate)
                        <li>
                            <a href="{{route('cate.post',$cate->ref_cat)}}" class="d-flex">
                                <p>{{$cate->name}}</p>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </aside>

        {{-- Last Post --}}

        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title" style="color: #2d2d2d;">Recent Post</h3>
            @if($posts = \App\Models\articl::select('id','title','descr','image','date','ref')->get())
                @foreach($posts as $post)
                    <div class="media post_item">
                        <img src="{{asset('img/blog/'.$post->image)}}" style="width: 50px;height: 50px" alt="post">
                        <div class="media-body">
                            <a href="{{route('blog.detail',$post->ref)}}">
                                <h3 style="color: #2d2d2d;">{{$post->title}}</h3>
                            </a>
                            <p>{{date('Y-M-d', strtotime($post->date))}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </aside>


        {{-- News Letter --}}
        <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title" style="color: #2d2d2d;">Newsletter</h4>
            <form action="#">
                <div class="form-group">
                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="submit">Subscribe</button>
            </form>
        </aside>
    </div>
</div>
