<div class="form-group">
    <div class="row">
        @php    $field = 'comment';    @endphp
        <div class="col-md-12">
            {!! Form::label($field, $title, ['class'=>'form-label']) !!}
            {!! Form::textarea($field, isset($row) && !empty($row->$field) ? $row->$field : null, ['id'=>$field, 'rows'=>3, 'class'=>'form-control', 'placeholder'=>$title]) !!}
        </div>
    </div>
</div>