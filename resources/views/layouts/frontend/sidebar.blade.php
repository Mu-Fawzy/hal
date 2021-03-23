@include('frontend.components.widgets.tabs')

<div class="widget related"> 		
    <div class="title">
        <h3>مقالات مختارة</h3>
    </div>
    @foreach ($postss->whereFeaturedPost('1')->get()->sortByDesc('id') as $post)
        <article class="small-post">
            <div class="thumb">
                <a href=""><img src="{{URL::asset('assets/frontend/img/friends1-1200x600-580x290.jpg')}}" alt=""></a>
                <div class="more-thumb"><a href=""><i class="fa fa-paper-plane"></i></a></div>
            </div>
            <div class="content">
                <div class="content-slide">
                    
                    <h3 class="title"><a href="">{{ Str::words($post->name, 11, ' ...') }}</a></h3>
                </div> 
                <div class="share">
                    <span class="title">
                        <h3>شارك</h3>
                    </span>
                    <div class="inner_share">
                        <ul>
                            <li><a href="" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</div>