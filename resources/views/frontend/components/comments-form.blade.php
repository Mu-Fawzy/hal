<div class="content-form white-form" id="reply">
    <div id="respond" class="comment-respond">
        <div class="title">
            <h3 id="reply-title" class="comment-reply-title">
                <i class="fa fa-comment"></i>
                اترك رد
            </h3>
        </div>

        @guest
            <p>You Must Login First <a href="{{ route('login') }}">{Login}</a></p>
        @else
            <p>You Logged In As {{ Auth::user()->name }} - <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            {!! Form::open(['id'=>'commentform', 'class'=>'comment-form', 'route'=> ['comments.addcomments'], 'method'=>'POST']) !!}
                {!! Form::hidden('post_id', $post->id, []) !!}
                
                @include('frontend.components.commentform-input')

                <p class="form-submit">
                    {!! Form::submit('ارسل التعليق' , ['id'=>'submit']) !!}
                </p>
            {!! Form::close() !!}

        @endguest
    </div><!-- #respond -->
</div>