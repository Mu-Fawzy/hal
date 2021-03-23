@extends('layouts.backend.master')

@section('title', $title)

@section('css')
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ $pModelName }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
                <div class="row row-sm">
					<div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
						<div class="card">
							<div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">{{ $pModelName }}</div>
                            
                            <div class="main-content-left main-content-left-mail card-body">
                                <div class="main-mail-menu">
                                    <nav class="nav main-nav-column">
                                        @foreach ($setting_sections as $setting_section)
                                            <a class="nav-link" href="{{ route('settings.index',['section'=>$setting_section]) }}"><i class="bx bxs-inbox"></i> {{ ucfirst($setting_section) }}</a> 
                                        @endforeach
                                    </nav>
                                </div>
                            </div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-9 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">{{ $section_name }}</div>

                                {!! Form::model($get_setting_section, ['class'=> 'form-horizontal' ,'route'=>['settings.update',1], 'method'=>'PUT', 'files' => true]) !!}
                                    @foreach ($get_setting_section->sortBy('ordering') as $setting_section)
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {!! Form::label('value'.$loop->index, $setting_section->display_name, ['class'=> 'form-label']) !!}
                                                </div>
                                                <div class="col-md-9">
                                                    @if ($setting_section->type == 'text')
                                                        {!! Form::text('value['.$loop->index.']', $setting_section->value, ['id'=>'value'.$loop->index,'class'=> 'form-control','placeholder'=>$setting_section->display_name]) !!}
                                                    @elseif ($setting_section->type == 'textarea')
                                                        {!! Form::textarea('value['.$loop->index.']', $setting_section->value, ['id'=>'value'.$loop->index,'class'=> 'form-control','rows'=> '4']) !!}
                                                    @elseif ($setting_section->type == 'file')
                                                        {!! Form::file('value['.$loop->index.']', ['id'=>'value'.$loop->index,'class'=> 'form-control','placeholder'=>$setting_section->display_name]) !!}
                                                    @endif

                                                    {!! Form::hidden('id['.$loop->index.']', $setting_section->id) !!}
                                                    {!! Form::hidden('key['.$loop->index.']', $setting_section->key) !!}
                                                    {!! Form::hidden('ordering['.$loop->index.']', $setting_section->ordering) !!}

                                                    @error('value')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    <div class="form-group text-left">
										<button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
									</div>
                                    
                                {!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
				<!-- row closed  -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection