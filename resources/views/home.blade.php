@extends('layouts.frontend.app')

@section('title','اخر المقالات')
    
@section('content')
    <div class="container bg-color">
        <div class="row">
            <div class="margin-top">
                <div class="col-md-8">
                    <div class="content-single">
                        <div class="title">
                            <h3>اخر المقالات</h3>
                        </div>
                        <div class="categories_page">
                            @include('layouts.frontend.post_row')
                        </div>
                    </div>
                </div>
                <div class="col-md-4 sidebar">
                    <div class="theiaStickySidebar">
                        @include('layouts.frontend.sidebar_page')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection