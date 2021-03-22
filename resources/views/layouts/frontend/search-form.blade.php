{!! Form::open(['id'=>'searchform', 'route'=> 'home', 'method'=>'GET', 'role' => 'search']) !!}
    
    @php    $field = 'search';    @endphp
    {!! Form::text($field, isset(request()->$field) && request()->get($field) != null ? request()->get($field) : '', ['id'=>$field, 'placeholder'=>'ابحث هنا...']) !!}
            

    {!! Form::submit('submit', ['id'=>'searchsubmit','hidden'=>'']) !!}
{!! Form::close() !!}