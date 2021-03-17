<div class="card">
    <div class="card-header pb-0">
        <div class="d-flex justify-content-between">
            <h4 class="card-title mg-b-0">{{ $title }}</h4>
            <i class="mdi mdi-dots-horizontal text-gray"></i>
        </div>
        <p class="tx-12 tx-gray-500 mb-2">{{ $description }}</p>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>