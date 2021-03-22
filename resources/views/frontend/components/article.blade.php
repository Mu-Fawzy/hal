<article>
    <div class="thumb">
        <a href="{{ route('post.index',$post) }}"><img src="{{URL::asset(imagePath('no-image.png',$post->image))}}" alt=""></a>
        <div class="more-thumb"><a href="{{ route('post.index',$post) }}"><i class="fa fa-paper-plane"></i></a></div>
    </div>
    <div class="meta_absolute">
        <div class="post-author">
            <a href="{{ route('author.home.index',$post->user->id) }}"><img src="{{ URL::asset(imagePath('user.png',$post->user->image)) }}" alt=""></a>
            <span><a href="">{{ $post->user->name }}</a></span> 
        </div>
        <div class="post-type"><i class="fa fa-picture-o fa-2"></i></div>
        <div class="post-view">{{ $post->views }}</div>
    </div>
    <div class="content">
        <div class="content-slide" style="height: 156px; overflow: hidden;">
            <div class="meta">
                <div class="post-date"><i class="fa fa-clock-o"></i> {{ $post->created_at }}</div>
                <div class="post-comment"><a href=""><i class="fa fa-comments"></i> {{ $post->allComments->count() }}</a></div>
            </div>
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
    </div>
</article>