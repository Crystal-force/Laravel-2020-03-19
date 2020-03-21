@extends('layout')

<link href="{{asset('assets/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
<style>
.filtermenu {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
}
#phone_number_tag{
	margin-top: 8px;
    width:160px;
    margin-left: 5px;
  }
  #called_to{
	margin-top: 8px;
    width:160px;
    margin-left: 4px;
  }
  #answered_by{
	margin-top: 8px;
    width:160px;
    margin-left: 4px;
  }

  #start{
    width:120px;
    margin-top: 10px;
    margin-left: 15px;
  }
  #end{
    width:120px;
    margin-top: 10px;
    margin-left: 15px;
  }
  #today,#week,#month{
	margin-top: 12px;
  } 

@media (max-width: 1399px) {
    .kt-header__topbar--mobile-on .kt-header__topbar {
        margin-top: -1px;
    }
    .kt-header-menu-wrapper.kt-header-menu-wrapper--on {
     transition: left 0.3s ease, right 0.3s ease; 
    left: 0;
    }
    .kt-header-mobile--fixed .kt-header-mobile {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 97;
        }
    .kt-header-menu-wrapper {
        background: #ffffff; 
        box-shadow: 0px 1px 9px -3px rgba(0, 0, 0, 0.75); 
        z-index: 1001;
        position: fixed;
        -webkit-overflow-scrolling: touch;
        top: 0;
        bottom: 0;
        overflow-y: auto;
        -webkit-transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        width: 275px !important;
        transition: left 0.3s ease, right 0.3s ease;
        left: -295px;
    }
    .kt-header-mobile {
        background-color: #1a1a27;
         box-shadow: 0px 1px 9px -3px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        padding: 0 15px;
        height: 50px;
        min-height: 50px;
        position: relative;
        z-index: 1;
    }
  .filtermenu{
    display: table;
    margin-left: 30px;
    margin-top:40px;
  }
  #phone_number_tag{
	margin-top: 8px;
    width:180px;
    margin-left: 5px;
  }
  #called_to{
	margin-top: 8px;
    width:180px;
    margin-left: 4px;
  }
  #answered_by{
	margin-top: 8px;
    width:180px;
    margin-left: 4px;
  }
  #start{
    width:160px;
    margin-top: 10px;
    margin-left: 11px;
  }
  #end{
    width:160px;
    margin-top: 0px;
    margin-left: 11px;
  }
  .kt-subheader .kt-subheader__toolbar .btn:not(.dropdown-toggle-split) {
    margin-left: 0.25rem;
    margin-top: 10px;
  }
}
</style>
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                 <div class="kt-subheader__main">
                </div>
                <div class="kt-subheader__toolbar">
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div class="filtermenu">  
                            <input type="text" class="form-control" placeholder="Search by called_to..." id="called_to">&nbsp;
                            <input type="text" class="form-control" placeholder="Search by phone_number_tag..." id="phone_number_tag"> &nbsp;
                            <input type="text" class="form-control" placeholder="Search by answered_by..." id="answered_by">
                            <input type='text' class="form-control" id="start" readonly placeholder="Start date"/>&nbsp;
                            <input type='text' class="form-control" id="end" readonly placeholder="End date"/>
                            <button type="button" id="today" class="btn btn-outline-brand btn-pill">Today</button>
                            <button type="button" id="week" class="btn btn-outline-warning btn-pill">Week</button>
                            <button type="button" id="month" class="btn btn-outline-danger btn-pill">Month</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!------------------------------------------------------------------------------------------->
        <div class="row">

                <div class="col-lg-4"> 
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Incoming Calls
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-brand" id="calls_value">
                            40
                            </span>
                        </div>
                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-brand"  id="calls_bar" role="progressbar" style="width: 40%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="kt-widget24__action">
                            <span class="kt-widget24__change">
                            </span>
                            <span class="kt-widget24__number" id="calls_label">
                            40%
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8"> 
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="flaticon2-bar-chart"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    30 days Incoming Calls
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div id="adschart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>   
<!-------------------------------------------------------------------------------------------------------------->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon-users"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Calls list
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin: Datatable -->
                    <div class="kt-datatable" id="calls_datatable"></div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
    <style>
    .btn.btn-icon.btn-icon-md [class^="la-"], .btn.btn-icon.btn-icon-md [class*=" la-"] {
            font-size: 1.8rem;
        }
    </style>
<script> $("#page_title").text("Call Manage");</script>
<script src="{{asset('js/dashboard/graph.js')}}" type="text/javascript"></script>

<script src="{{asset('js/admin/calls.js')}}" type="text/javascript"></script>
@endsection
