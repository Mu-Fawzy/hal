<div class="form-group">
    <div class="row">
        @php    $field = 'image';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9 ">
            {!! Form::file($field, ['id'=>$field, 'class'=>'dropify', 'data-default-file'=> isset($row) ? asset(imagePath('user.png',$row->$field)) : null, 'data-height'=>'200']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        @php    $field = 'name';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text($field, isset($row) ? $row->$field : null, ['id'=>$field, 'class'=>'form-control', 'placeholder'=>ucfirst($field)]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        @php    $field = 'email';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::text($field, isset($row) ? $row->$field : null, ['id'=>$field, 'class'=>'form-control', 'placeholder'=>ucfirst($field)]) !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        @php    $field = 'password';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::password($field, ['id'=>$field, 'class'=>'form-control', 'placeholder'=> ucfirst($field)]) !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        @php    $field = 'password_confirmation';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::password($field, ['id'=>$field, 'class'=>'form-control', 'placeholder'=> ucfirst($field)]) !!}
        </div>
    </div>
</div>
<div class="form-group ">
    <div class="row">
        @php    $field = 'status';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::select($field, ['' => 'Choose one', 1 => 'Active', 0 => 'Inactive'], isset($row) ? $row->$field : null, ['id'=>$field,'class'=>'form-control select2']) !!}
        </div>
    </div>
</div>