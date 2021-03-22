@extends('layouts.frontend.app')

@section('content')
    <div class="container bg-color">  
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="allcategories">
                    @include('frontend.components.allcats')                    
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 sidebar-home">
                @include('layouts.frontend.sidebar')
            </div>
        </div>
    </div>
@endsection