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
        @php    $field = 'description';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::textarea($field, isset($row) ? $row->$field : null, ['id'=>$field, 'rows'=>3, 'class'=>'form-control', 'placeholder'=>ucfirst($field)]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        @php    $field = 'mata_key';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::textarea($field, isset($row) ? $row->$field : null, ['id'=>$field, 'rows'=>3, 'class'=>'form-control', 'placeholder'=>ucfirst($field)]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        @php    $field = 'mata_description';    @endphp
        <div class="col-md-3">
            {!! Form::label($field, ucfirst($field), ['class'=>'form-label']) !!}
        </div>
        <div class="col-md-9">
            {!! Form::textarea($field, isset($row) ? $row->$field : null, ['id'=>$field, 'rows'=>3, 'class'=>'form-control', 'placeholder'=>ucfirst($field)]) !!}
        </div>
    </div>
</div>