@extends('layouts.frontend.app')

@section('title', $author->name)
    
@section('content')
    <div class="container bg-color">
        <div class="row">
            <div class="margin-top">
                <div class="col-md-8">
                    <div class="content-single">
                        <div class="info_author"> 
                        	<div class="img-author">
                            	<img src="{{URL::asset(imagePath('user.png',$author->image))}}" alt="">
                            </div>
                            <div class="inner_info_author">
                            	@if ($author)
                                    <h1>{{ $author->name }}</h1>
                                @endif
                                <p>بصمة لتصميم المواقع هي شركة تهتم بشكل أساسي بالاهتمام بالمواقع العربية وتسعى للرقي بمستوى الشبكة العنكبوتية العربية ، جدير بالذكر أن بصمة لتصميم المواقع والتسويق الإلكتروني قد قامت بالعديد من الأعمال الإحترافية التي تُعَد فخراً للعرب</p>
                                <div class="share">
                                    <ul>
                                        <li><a href="" class="facebook"><i class="fa fa-facebook"></i></a></li> 
                                        <li><a href="" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="categories_page author">
                            @include('layouts.frontend.post_row')
                        </div>
                    </div>
                </div>
                <div class="col-md-4 sidebar">
                    <div class="theiaStickySidebar">
                        <div class="theiaStickySidebar">
                        @include('layouts.frontend.sidebar_page')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection