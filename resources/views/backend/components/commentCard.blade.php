<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mb-1">{{ $title }}</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
        </div>
        <p class="tx-12 tx-gray-500 mb-2">{{ $description }}</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="example" id="commentsform">
                    <div class="comment_form">
                        {{ $form }}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="example" id="commentslist">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>