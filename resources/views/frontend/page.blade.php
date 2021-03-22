@extends('layouts.frontend.app')

@section('title', $page->name)
    
@section('content')
    <div class="container bg-color">
        <div class="row">
            <div class="margin-top">
                <div class="col-md-8">
                    <div class="content-single">
                        <div class="title">
                            <h3>{{ $page->name }}</h3>
                        </div>
                        <div class="white privacy">
                            <div class="tabcontents">
                                {!! $page->description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        @include('layouts.frontend.sidebar_page')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
