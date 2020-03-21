@extends('layout')


<link href="{{asset('assets/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<style>
.filtermenu {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
}
@media (max-width: 1024px) {
  .filtermenu{
    display: table;
    margin-left: 20px;
  }
  #smetro_name{
	margin-left: 40px;
  }
  #start{
	margin-left: 40px;
	margin-top:10px;
  }
  #end{
	margin-left: 40px;
	margin-top:10px;
  }
  .kt-subheader .kt-subheader__toolbar .btn:not(.dropdown-toggle-split) {
    margin-left: 0.25rem;
    margin-top: 10px;
  }
}

</style>
@section('content')
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
						<!-------------------------------------------------------------------->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<!--<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								<ul class="kt-menu__nav ">
									<li class="kt-menu__item " aria-haspopup="true">
										<span class="kt-menu__link-text">
											<input type='text' class="form-control" id="start" style="width:120px;" readonly placeholder="start date"/>	
																				</span>
									</li>
								</ul>
							</div>
						</div>-->
						<!--------------------------------->
						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
								</div>
								<div class="kt-subheader__toolbar">
									<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
										<div class="filtermenu">
												<label style="margin-top:0.5rem;">Metro name Filter: </label>&nbsp;
												<select class="form-control kt-select2" id="smetro_name" style="width:120px;"  name="smetro_name" >
														<option></option>
														@foreach ($metros as $row)
															<option value="{{ $row->metro_name}}" >{{ $row->metro_name}}</option>
														@endforeach
												</select>
												<input type='text' class="form-control" id="start" style="width:120px;" readonly placeholder="start date"/>
												<input type='text' class="form-control" id="end" style="width:120px;" readonly placeholder="end date"/>
												<button type="button" id="today" class="btn btn-outline-brand btn-pill">Today</button>&nbsp;
												<button type="button" id="week" class="btn btn-outline-warning btn-pill">Week</button>&nbsp;
												<button type="button" id="month" class="btn btn-outline-danger btn-pill">Month</button>&nbsp;
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
								@include('dashboard.graph')
								@include('dashboard.table')
								@include('dashboard.modal')
						</div>

						<!-- end:: Content -->
					</div>
					<script>
					var metro="",category="",psite="";
					var start,end;
					$("#page_title").text("Dashboard");
					</script>
					<script src="{{asset('js/dashboard/graph.js')}}" type="text/javascript"></script>
<!--					<script src="{{asset('js/admin/dashboard.js')}}" type="text/javascript"></script>-->
					<script src="{{asset('js/dashboard/campaign.js')}}" type="text/javascript"></script>
					
					

@endsection
