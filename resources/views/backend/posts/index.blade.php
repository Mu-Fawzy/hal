@extends('layouts.backend.master')

@section('title', $title)

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ $pModelName }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $list }}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <a href="{{ route($folerViewName.'.create') }}" class="btn btn-primary btn-block">{{ $add }}</a>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
				<!--Row-->
				<div class="row row-sm">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
						@component('backend.components.table',['description'=>$description,'table'=>$table,'rows'=>$rows])
							<table class="table card-table table-striped table-vcenter text-nowrap mb-0">
								<thead>
									<tr>
										<th class="wd-lg-8p"><span>Name</span></th>
										<th class="wd-lg-25p"><span></span></th>
										<th class="wd-lg-25p"><span>Description</span></th>
										<th class="wd-lg-25p"><span>UserName</span></th>
										<th class="wd-lg-25p">Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($rows as $row)
										<tr>
											<td><img alt="avatar" class="rounded-circle avatar-md mr-2" src="{{URL::asset(imagePath('no-image.png',$row->image))}}"></td>
											<td>{{ $row->name }}</td>
											<td>{{ $row->description }}</td>
											<td>{{ $row->user->name }}</td>
											<td>
												@include('backend.components.btnEdit',['row'=>$row,'folerViewName' => $folerViewName])
												@include('backend.components.btnDelete',['row'=>$row,'folerViewName' => $folerViewName])
											</td>
										</tr> 
									@empty
										<tr><td colspan="6" class="text-center">{{ $noYet }}</td></tr>
									@endforelse
								</tbody>
							</table>
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
@endsection