@extends('layouts.backend.master')

@section('title', $title)

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('assets/backend/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/backend/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!--Internal  Quill css -->
    <link href="{{URL::asset('assets/backend/plugins/quill/quill.snow.css')}}" rel="stylesheet">
    <style>
        .is-invalid .dropify-wrapper ~ .invalid-feedback {
            display: block;
        }
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ $pModelName }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $title }}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <a href="{{ route($folerViewName.'.index') }}" class="btn btn-primary btn-block">{{ $all }}</a>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
                @include('backend.components.errors')
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        @component('backend.components.FormCard',['description'=>$description, 'title'=>$title])
                            {!! Form::open(['id'=>'form_post','class'=>'form-horizontal', 'route'=> $folerViewName.'.store', 'method'=>'POST', 'files' => true]) !!}
                                {!! Form::hidden('description') !!}
                                @include('backend.'.$folerViewName.'.form')                                
                                <div class="text-left">
                                    {!! Form::submit($btn, ['class'=>'btn btn-primary waves-effect waves-light']) !!}
                                </div>
                            {!! Form::close() !!}
                        @endcomponent
					</div><!-- COL END -->
				</div>
				<!-- row closed  -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/backend/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/backend/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('assets/backend/js/select2.js')}}"></script>

<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/backend/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/backend/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal quill js -->
<script src="{{URL::asset('assets/backend/plugins/quill/quill.min.js')}}"></script>
<script>
    $(function() {
        'use strict'
        var icons = Quill.import('ui/icons');
        icons['bold'] = '<i class="la la-bold" aria-hidden="true"><\/i>';
        icons['italic'] = '<i class="la la-italic" aria-hidden="true"><\/i>';
        icons['underline'] = '<i class="la la-underline" aria-hidden="true"><\/i>';
        icons['strike'] = '<i class="la la-strikethrough" aria-hidden="true"><\/i>';
        icons['list']['ordered'] = '<i class="la la-list-ol" aria-hidden="true"><\/i>';
        icons['list']['bullet'] = '<i class="la la-list-ul" aria-hidden="true"><\/i>';
        icons['link'] = '<i class="la la-link" aria-hidden="true"><\/i>';
        icons['image'] = '<i class="la la-image" aria-hidden="true"><\/i>';
        icons['video'] = '<i class="la la-film" aria-hidden="true"><\/i>';
        icons['code-block'] = '<i class="la la-code" aria-hidden="true"><\/i>';
        var toolbarOptions = [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike', 'code-block'],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'header': 1
            }, {
                'header': 2
            }, 'blockquote'],
            ['link', 'image', 'video']
        ];
        var quill = new Quill('#quillEditor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        var form = document.getElementById("form_post"); // get form by ID
        form.onsubmit = function() {
        // Populate hidden form on submit
            var content = document.querySelector('input[name=description]');
            content.value = quill.root.innerHTML;
        };

    });
</script>
@endsection