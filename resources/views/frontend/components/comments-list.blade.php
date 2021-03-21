@foreach ($comments as $comment)
    @if ($loop->first)
        @if (isset($parent) && $parent == true)
            <ol class="commentlist"> 
        @else
            <ol class="children">
        @endif
    @endif

        <!-- #comment-## -->
        <li class="comment">
            <div class="comment">
                <div class="comment-meta">
                    <div class="comment-author">
                        <img src="{{URL::asset(asset(imagePath('user.png',$comment->user->image)))}}" alt="{{ $comment->user->name }}" class="avatar photo">					
                    </div><!-- .comment-author .vcard -->
                </div>
                <div class="comment-content">
                    <div class="information">
                        <span class="fn">{{ $comment->user->name }}</span>
                        <time class="comment-time">
                            <a href="" class="comment-timestamp">{{ $comment->created_at }}</a>
                        </time>
                    </div>						
                    <div class="reply-edit-container">
                        <span class="reply">
                            <a class="comment-reply-link" href="javascript:;" onclick="event.preventDefault(); $('#comment-{{ $comment->id }}').fadeToggle();">رد</a>																	
                        </span><!-- end of reply -->
                    </div>
                    <p>{{ $comment->comment }}</p>
                    <div class="clearfix"></div>
                </div>
                <div class="replyform" id="comment-{{ $comment->id }}" style="display:none">
                    {!! Form::open(['class'=>'comment-form', 'route'=> ['comments.replaycomments',$comment], 'method'=>'POST']) !!}
                        {!! Form::hidden('post_id', $post->id, []) !!}
                        @include('frontend.components.commentform-input')
                        <p class="form-submit">
                            {!! Form::submit('الرد' , ['id'=>'submit']) !!}
                        </p>
                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
            </div><!-- end of comment -->
            @include('frontend.components.comments-list',['comments'=>$comment->replies,'parent'=>false])
        </li><!-- #comment-## -->
    
    @if ($loop->last) </ol> @endif
@endforeach