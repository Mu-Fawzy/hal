@extends('layouts.backend.master')

@section('title', $title)

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('assets/backend/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/backend/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
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
                            {!! Form::open(['class'=>'form-horizontal', 'route'=> [$folerViewName.'.update',$row], 'method'=>'PUT', 'files' => true]) !!}
                                @include('backend.'.$folerViewName.'.form')                                
                                <div class="text-left">
                                    {!! Form::submit($btn , ['class'=>'btn btn-primary waves-effect waves-light']) !!}
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

@endsection