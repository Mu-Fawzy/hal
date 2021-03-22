@foreach($categories as $category)
    <div class="cat"> 
        <div class="inner_cat">
            <div class="title">
                <h3>{{$category->name}}</h3>
                <a href="{{ route('category.home.index',$category) }}"><div class="more_posts"><i class="fa fa-plus-square-o"></i><span>المزيد</span></div></a>
            </div>
            <div class="row">
                @foreach ($category->posts()->paginate(4) as $post)
                    @if ($loop->index % 2 == 0)
                        <div class="col-lg-7 col-md-7 col-sm-12">
                    @else
                        <div class="col-lg-5 col-md-5 col-sm-12">
                    @endif
                        <article>
                            <div class="thumb">
                                <a href="{{ route('post.index',$post) }}"><img src="{{URL::asset(imagePath('no-image.png',$post->image))}}" alt="{{ $post->name }}"></a>
                                <div class="more-thumb"><a href="{{ route('post.index',$post) }}"><i class="fa fa-paper-plane"></i></a></div>
                            </div>
                            
                            <div class="content">
                                <div class="content-slide">
                                    
                                    <h3 class="title"><a href="{{ route('post.index',$post) }}">{{ Str::words($post->name, 5, ' ...') }}</a></h3>
                                    <p>{{ strip_tags( Str::words($post->description, 25, ' ...')) }}</p>
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
                                {{--  <div class="clearfix"></div>
                                <div class="points">
                                    <ul>
                                        <li>بصمة لتصميم المواقع هي شركة تهتم بشكل أساسي بالاهتمام بالمواقع العربية وتسعى أساسي بالاهتمام بالمواقع</li>
                                        <li>بصمة لتصميم المواقع هي شركة تهتم بشكل أساسي بالاهتمام بالمواقع العربية وتسعى أساسي بالاهتمام بالمواقع</li>
                                        <li>بصمة لتصميم المواقع هي شركة تهتم بشكل أساسي بالاهتمام بالمواقع العربية وتسعى أساسي بالاهتمام بالمواقع</li>
                                    </ul>
                                </div>  --}}
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
            <div class="more">
                <a href="{{ route('category.home.index',$category) }}">المزيد من المقالات</a>
            </div>
        </div>
    </div>
@endforeach