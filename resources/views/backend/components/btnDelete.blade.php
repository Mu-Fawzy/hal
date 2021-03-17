<a href="{{ route($folerViewName.'.destroy', $row->id) }}"
    onclick="$(this).next('form').submit(); event.preventDefault();" class="btn btn-sm btn-danger">
    <i class="las la-trash"></i>
</a>

{!! Form::open(['class'=> 'd-none','route' => [$folerViewName.'.destroy', $row->id], 'method'=>'DELETE']) !!}
    {!! Form::submit('submit') !!}
{!! Form::close() !!}