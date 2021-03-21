@extends('layouts.frontend.app')

@section('title', $post->name)
    
@section('content')
    <div class="container bg-color">
        @if (isset($posts) && !empty($posts))
            <div class="row">
                <div class="col-md-12">
                    <div class="slider_important">
                        <div class="title">
                            <h3>اخر المقالات</h3>
                        </div>
                        <div class="content_slider">
                            <div id="owl-demo" class="owl-carousel owl-theme">
                                @foreach ($posts as $lastPost)
                                <div class="item">
                                    <div class="inner_item">
                                        @include('frontend.components.related_last',['post'=>$lastPost])
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="margin-top">
                <div class="col-md-8">
                    <div class="content-single">
                        <article class="single">
                            <div class="header_article">
                                <div class="post-type"><i class="fa fa-picture-o fa-2"></i></div>
                                <div class="breadcrumb">
                                    <a href="index.html">الرئيسية</a> 
                                    <span class="delimiter"><i class="fa fa-angle-left"></i></span>
                                    <a href=""> اسم التصنيف </a> 
                                </div>
                                <div class="title">
                                    <h1>{{ $post->name }}</h1>
                                </div>
                                <div class="meta">
                                    <div class="post-date"><i class="fa fa-clock-o"></i>{{ $post->created_at }}</div>
                                </div>
                                <div class="meta_absolute">
                                    <div class="post-author">
                                        <a href=""><img src="{{URL::asset(imagePath('user.png',$post->user->image))}}" alt=""></a>
                                        <span><a href="">{{ $post->user->name }}</a></span> 
                                    </div>
                                </div>
                                <div class="share">
                                    <span>شارك المقالة</span>
                                    <ul>
                                        <li><a href="" class="facebook"><i class="fa fa-facebook"></i></a></li> 
                                        <li><a href="" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="img-post">
                                <img src="{{URL::asset(imagePath('no-image.png',$post->image))}}" alt="{{ $post->name }}">
                            </div>
                            <div class="content-inner">
                                <div class="content-inner-ads sidebar">
                                    <div class="theiaStickySidebar">
                                        <img src="img/wide-skyscraper.gif" alt="">
                                    </div>
                                </div>
                                <div class="content-inner-article">
                                    {!! $post->description !!}
                                    @if (isset($tags) && !empty($tags))
                                        <div class="tags">
                                            <span><i class="fa fa-tags"></i></span>
                                            <ul>
                                                @foreach ($tags as $tag)
                                                    <li><a href="">{{ $tag->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </article>
                        <div class="related-posts">
                            <div class="title">
                                <h3>المواضيع المتعلقة</h3>
                            </div>
                            <div class="row">
                                <div class="all_related-posts">
                                    @foreach ($relatedPosts as $relatedPost)
                                    <div class="col-md-3">
                                        <div class="related_post">
                                            <div class="inner_related_post">
                                                @include('frontend.components.related_last',['post'=>$relatedPost])
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="comment">
                            <div id="comments">
                                <div class="title">
                                    <h3 id="comments-title">
                                        <i class="fa fa-comments"></i>
                                        <span>{{ $post->allComments->count() }}</span> تعليقات
                                    </h3>
                                </div>
                                @include('frontend.components.comments-list',['comments'=>$post->comments,'parent'=>true])
                                @include('frontend.components.comments-form')
                            </div>
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
    