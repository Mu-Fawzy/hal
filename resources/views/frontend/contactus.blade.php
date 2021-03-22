@extends('layouts.frontend.app')

@section('title', 'اتصل بنا')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="margin-top">
                <div class="col-md-12">
                    <div class="content-single">
                        <div class="title">
                            <h3>اتصل بنا</h3>
                        </div>
                        <div class="contactus_page">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="post-content">
                                        <div class="video-container">
                                            <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2809.0880466962412!2d19.8403654!3d45.2460123!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475b10146f01051b%3A0x2e21aff936abec47!2zNTYg0JHRg9C70LXQstCw0YAg0L7RgdC70L7QsdC-0ZLQtdGa0LAsINCd0L7QstC4INCh0LDQtCAyMTEwMiwg0KHRgNCx0LjRmNCw!5e0!3m2!1ssr!2s!4v1412716337001" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::open(['class'=>'contact-form', 'route'=> 'sendMessage.home', 'method'=>'POST']) !!}
                                        <div class="form-group has-feedback">
                                            @php    $field = 'name';    @endphp
                                            {!! Form::text($field, isset($row) ? $row->$field : null, ['class'=>'form-control', 'placeholder'=>'اسمك من فضلك']) !!}
                                        </div>                   
                                        <div class="form-group has-feedback">
                                            @php    $field = 'email';    @endphp
                                            {!! Form::email($field, isset($row) ? $row->$field : null, ['class'=>'form-control', 'placeholder'=>'بريدك الالكترونى من فضلك']) !!}
                                        </div>                   
                                        <div class="form-group has-feedback">
                                            @php    $field = 'subject';    @endphp
                                            {!! Form::text($field, isset($row) ? $row->$field : null, ['class'=>'form-control', 'placeholder'=>'موضوع الرساله']) !!}
                                        </div> 
                                        <div class="form-group has-feedback">
                                            @php    $field = 'message';    @endphp
                                            {!! Form::textarea($field, null, ['class'=>'form-control', 'placeholder'=>'رسالتك']) !!}
                                        </div>                  
                                        <p>
                                            {!! Form::submit('ارسل رسالة') !!}
                                        </p>
                                    {!! Form::close() !!}
                                    
                                </div>						
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <img src="{{ URL::asset('assets/frontend/img/mail.png') }}" class="img-responsive" alt="">
                                        <p>بصمة لتصميم المواقع هي شركة تهتم بشكل أساسي بالاهتمام بالمواقع العربية وتسعى للرقي بمستوى الشبكة العنكبوتية العربية ، جدير بالذكر أن بصمة لتصميم المواقع والتسويق الإلكتروني قد قامت بالعديد من الأعمال الإحترافية التي تُعَد فخراً للعرب</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
