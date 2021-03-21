<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-6">
            @include('frontend.components.article')
        </div>
    @endforeach
</div>