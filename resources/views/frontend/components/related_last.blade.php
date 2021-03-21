
    <div class="thumb">
        <a href="{{ route('post.index',$post) }}"><img src="{{URL::asset( imagePath('no-image.png',$post->image) )}}" alt="{{ $post->name }}"></a>
        <div class="more-thumb"><a href="{{ route('post.index',$post) }}"><i class="fa fa-paper-plane"></i></a></div>
    </div>
    <div class="meta">
        <div class="post-category">
            @foreach ($post->categories as $cat)
                {{--  show 1 category  --}}
                @if ($loop->first)
                    <a href="{{ route('category.home.index',$cat) }}">{{ $cat->name }}</a>
                @endif
            @endforeach
        </div>
    </div>
    <a href="{{ route('post.index',$post) }}" class="title"><h3>{{ Str::words($post->name, 6, ' ...') }}</h3></a>
