<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
	<meta http-equiv="x-ua-compatible" content="IE=edge" >

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title','الرئيسية')</title>
    <!--  style -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/animation.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/responsive.css')}}" type="text/css" />

	<!--carousel-->
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/owl.carousel.css')}}" type="text/css" />
	<!--carousel-->
    
    <link rel="shortcut icon" href="{{URL::asset('assets/frontend/img/favicon.ico')}}">
</head>

