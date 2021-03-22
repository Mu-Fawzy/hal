@extends('layouts.frontend.app')

@section('title','404 Error')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="error_page"> 
                <div class="col-md-6 col-md-push-3  col-md-pull-3">
                    <h1>404</h1>
                    <div class="img-error">
                        <img src="{{ URL::asset('assets/frontend/img/404-error-pages.jpg') }}" alt="{{ env('APP_NAME', 'Laravel') }}">
                    </div>
                    <p>تم نقل الصفحة التى تبحث عنها او تمت ازالتها او قد لاتوجد صفحة بهذا الاسم</p>
                    <div class="nav_error">
                        <a href="{{ route('home.page') }}">اذهب الى الرئيسية</a>
                        <a href="{{ route('contactus.home') }}">تواصل معنا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
