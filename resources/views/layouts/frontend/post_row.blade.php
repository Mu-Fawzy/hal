<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-6">
            @include('backend.components.frontend.article')
        </div>
    @endforeach
</div>