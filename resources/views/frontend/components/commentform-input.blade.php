<div class="comment-form-comment form-group">
    @php    $field = 'comment';    @endphp
    {!! Form::textarea($field, null, ['id'=>$field, 'rows'=>3, 'id'=>'comment', 'placeholder'=>'اكتب تعليقك' ,'aria-required'=>'true']) !!}
</div>