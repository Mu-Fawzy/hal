@foreach ($comments as $comment)
    <div class="media d-block d-sm-flex mg-t-25">
        <img alt="" class="main-img-user avatar-lg mg-sm-l-20 mg-b-20 mg-sm-b-0" src="{{URL::asset('assets/img/user.png')}}">
        <div class="media-body">
            <h5 class="mg-b-5 tx-inverse tx-15">{{ $comment->user->name }}</h5>

            <div class="d-sm-flex justify-content-between align-items-center border-bottom py-3"> 
                <div class="d-flex align-items-center"> 
                    <i class="mdi mdi-clock text-muted ml-1"></i> 
                    <p class="mb-0">{{ $comment->comment }}</p>
                </div> 
                <div class="mr-auto">
                    <a href="{{ route('comments.destroy',$comment->id) }}" onclick="$(this).next('form').submit(); event.preventDefault();"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                    {!! Form::open(['class'=> 'd-none','route' => ['comments.destroy', $comment->id], 'method'=>'DELETE']) !!}
                        {!! Form::submit('submit') !!}
                    {!! Form::close() !!}

                    
                    <a aria-controls="collapseComment-{{ $comment->id }}" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseComment-{{ $comment->id }}" role="button"><i class="fa fa-pen text-success" aria-hidden="true"></i></a>

                    <a aria-controls="collapseExample-{{ $comment->id }}" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseExample-{{ $comment->id }}" role="button"><i class="fa fa-reply text-primary" aria-hidden="true"></i></a>
                </div> 
            </div>
            <div class="collapse" id="collapseComment-{{ $comment->id }}">
                {!! Form::open(['class'=>'form-horizontal', 'route'=> ['comments.update',$comment->id], 'method'=>'PUT']) !!}
                    {!! Form::hidden('post_id', $row->id, []) !!}
                    @include('backend.comments.form',['row'=>$comment, 'title'=>'update Comment'])
                    <div class="text-left">
                        {!! Form::submit('Update' , ['class'=>'btn btn-primary waves-effect waves-light']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

            <div class="collapse" id="collapseExample-{{ $comment->id }}">
                {!! Form::open(['class'=>'form-horizontal', 'route'=> ['comments.replycomments',$comment->id], 'method'=>'POST']) !!}
                    {!! Form::hidden('post_id', $row->id, []) !!}
                    @include('backend.comments.form', ['title'=>'Reply Comment'])
                    <div class="text-left">
                        {!! Form::submit('Reply' , ['class'=>'btn btn-primary waves-effect waves-light']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            @include('backend.components.replies',['comments'=>$comment->replies, 'row'=>$row])
        </div>
    </div>
@endforeach