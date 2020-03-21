<link href="<?php echo e(asset('assets/base/style.bundle-lg.css')); ?>" rel="stylesheet" type="text/css" />
<style>

.filtermenu {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
}
#craigslist_css{
	margin-top: 2px;
  }
  #offerup_css{
	margin-top: 2px;
    
  }
  #letgo_css{
	margin-top: 2px;
    
  }
  #fb_css{
	margin-top: 2px;
    
  }
  #mfb_css{
	margin-top: 2px;
    
  }
  #mletgo_css{
	margin-top: 2px;
    
  }
  #mofferup_css{
	margin-top: 8px;
    
  }
  #scampaign{
	margin-top: 8px;
    width:120px;
  }
  #saccount_id{
	margin-top: 8px;
    width:120px;
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
  #mofferup{
    margin-left:0px;
    
  }
  #mletgo{
    margin-left:0px;
    
  }
  #mfb{
    margin-left:0px;
    
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
  #scampaign{
	margin-top: 8px;
    width:160px;
    margin-left: 5px;
  }
  #saccount_id{
	margin-top: 8px;
    width:160px;
    margin-left: 4px;
  }
  #craigslist_css{
	margin-top: 20px;
    margin-left: -4px;
  }
  #offerup_css{
	margin-top: 0px;
    margin-left: -6px;
  }
  #offerup_css2{
	margin-top: 0px;
    margin-left: -2px;
  }
  #letgo_css{
	margin-top: 16px;
    margin-left: -6px;
  }
  #letgo_css2{
	margin-top: 0px;
    margin-left: 1px;
  }
  #fb_css{
	margin-top: 16px;
    margin-left: -6px;
  }
  #fb_css2{
	margin-top: 0px;
    margin-left: 5px;
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
  #mofferup_css2{
	margin-top: 8px;
    margin-left:11px;
    
  }
  #mletgo_css2{
	margin-top: 8px;
    margin-left:24px;
    
  }
  #mfb_css2{
	margin-top: 8px;
    margin-left:0px;
    
  }
  #mofferup{
    margin-left:10px;
    
  }
  #mletgo{
    margin-left:23px;
    
  }
  #mfb{
    margin-left:0px;
    
  }
  .kt-subheader .kt-subheader__toolbar .btn:not(.dropdown-toggle-split) {
    margin-left: 0.25rem;
    margin-top: 10px;
  }
}
</style>
<?php $__env->startSection('content'); ?>
    <!------------------------------------------------------------------>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__toolbar">
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                            <div class="filtermenu">
                                    <select class="form-control kt-select2" id="scampaign"  name="scampaign">
                                            <option></option>
                                            <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($row->campaign_id); ?>" ><?php echo e($row->campaign_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <select class="form-control kt-select2" id="saccount_id"  name="saccount_id">
                                            <option></option>
                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($row->account_id); ?>" ><?php echo e($row->email_id); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
            <!----------------------------------------------------------------->
                                    <div class="col-lg-1">
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="craigslist_css">
                                            <input type="checkbox" id="scraigslist_pay" name="craigslist_pay">cl_pay
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="craigslist_css2">
                                            <input type="checkbox" id="scraigslist" name="craigslist">craigslist
                                            <span></span>
                                        </label>
                                    </div>&nbsp;
                                    <div class="col-lg-1">
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" id="offerup_css">
                                            <input type="checkbox" id="sofferup_pay" name="offerup_pay">ou_pay
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" id="offerup_css2">
                                            <input type="checkbox" id="sofferup" name="offerup">offerup
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="letgo_css">
                                            <input type="checkbox" id="sletgo_pay" name="letgo_pay">lg_pay
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="letgo_css2">
                                            <input type="checkbox" id="sletgo" name="letgo">letgo
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-1">
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" id="fb_css">
                                            <input type="checkbox" id="sfbmarket_pay" name="fbmarket_pay">fb pay
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" id="fb_css2">
                                            <input type="checkbox" id="sfbmarket" name="fbmarket">fbmarket
                                            <span></span>
                                        </label>
                                    </div>

            <!------------------------------------------------------------------------->
                                    <input type='text' class="form-control" id="start" readonly placeholder="Start date"/>&nbsp;
                                    <input type='text' class="form-control" id="end" readonly placeholder="End date"/>
                                    <button type="button" id="today" class="btn btn-outline-brand btn-pill">Today</button>
                                    <button type="button" id="week" class="btn btn-outline-warning btn-pill">Week</button>
                                    <button type="button" id="month" class="btn btn-outline-danger btn-pill">Month</button>
                                    &nbsp;
                                </div>
                            </div>
                         </div>
                    </div>               
                </div>
        <!-- end:: Subheader -->

        <!-- begin:: Content -->
 <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="kt-portlet">
    <div class="kt-portlet__body  kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-12 col-lg-6 col-xl-4">

                <!--begin::Total Profit-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Active ADS
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-brand" id="active_value">
                            0
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-brand"  id="active_bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                        </span>

                    </div>
                </div>

                <!--end::Total Profit-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">

            <!--begin::New Users-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                ADS FLAGED
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-brand" id="ads_flag_value">
                           0
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-brand"  id="ads_flag_bar" role="progressbar" style="width: 58%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                        </span>

                    </div>
                </div>

            <!--end::New Users-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">

                <!--begin::New Feedbacks-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                ADS POSTED
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-warning" id="ads_value">
                            34
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-warning" id="ads_bar" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                        </span>
                    </div>
                </div>

                <!--end::New Feedbacks-->
            </div>
        </div>
    </div>
</div>   
<!-- ////////////////////////////////input form//////////////////////////////////////////////////////////////////////-->
<!-- ////////////////////////////////add modal form/////////////ddd/////////////////////////////////////////////////////////-->
                <div class="modal fade" id="modal_ads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <!------------------------------------>
                                     <?php echo $__env->make('manage.adsForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="add_ads_btn" class="btn btn-primary">Add</button>
                                    <button type="button" id="update_ads_btn" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------------------------------------------------------------->
                    <style>
                    .kt-widget.kt-widget--user-profile-4 .kt-widget__head .kt-widget__media .kt-widget__img {
                            max-width: 170px;
                            max-height: 170px;
                            border-radius: 5%; 
                        }
                    </style>
                    <div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body" id="images_content">
                                        <!------------------------->
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div class="kt-widget kt-widget--user-profile-4" style="background-color:#ffb822b8;padding:20px;">
                                                    <div class="kt-widget__head">
                                                        <div class="kt-widget__media">
                                                            <img class="kt-widget__img kt-hidden-" src="<?php echo e(asset('img/upload/300_21.jpg')); ?>" alt="image">
                                                        </div>
                                                        <div class="kt-widget__content">
                                                            <div class="kt-widget__section">
                                                                <span class="kt-widget__username">
                                                                    John Beans
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="kt-widget kt-widget--user-profile-4" style="background-color:#ffb822b8;padding:20px;">
                                                    <div class="kt-widget__head">
                                                        <div class="kt-widget__media">
                                                            <img class="kt-widget__img kt-hidden-" src="<?php echo e(asset('img/upload/300_21.jpg')); ?>" alt="image">
                                                        </div>
                                                        <div class="kt-widget__content">
                                                            <div class="kt-widget__section">
                                                                <span class="kt-widget__username">
                                                                    John Beans
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------>
                                </div>
                                <div class="modal-footer">
                                    <form class="kt-form kt-form--label-right" id="upload_form" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-lg-8">
                                                <input type="hidden" name="ad_id" id="upload_ad_id">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file" id="file">
                                                    <label class="custom-file-label" style="text-align: left;" for="customFile">...</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                 <button type="button" id="upload_image_btn" class="btn btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
<!-- ----/////////////////////////////////////////////////////////------------------------>
<!-- ----/////////////////////////////////////////////////////////------------------------>
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon-users"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Ads list
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <button type="button" class="btn btn-brand" id="add_modal_btn"><i class="la la-plus"></i> Add New</button>&nbsp;
                        </div>
                    </div>
                </div>
                 <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin: Datatable -->
                    <div class="kt-datatable" id="ads_datatable"></div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
    <!------------------------------------------------------------>

    <script>var routing_campaign_id,routing_user_id,routing_account_id,routing_start,routing_end;</script>
<?php if(isset($campaign_id)): ?>
<script>  routing_campaign_id=<?php echo e($campaign_id); ?>;</script>
<?php endif; ?>
<?php if(isset($user_id)): ?>
<script>  routing_user_id=<?php echo e($user_id); ?>;</script>
<?php endif; ?>
<?php if(isset($account_id)): ?>
<script>  routing_account_id=<?php echo e($account_id); ?>;</script>
<?php endif; ?>
<?php if(isset($flag)): ?>
<script>  flag=<?php echo e($flag); ?>;</script>
<?php endif; ?>
<?php if(isset($start)): ?>
<script> 
routing_start='<?php echo e($start); ?>';
console.log(routing_start);
routing_end='<?php echo e($end); ?>';
</script>
<?php endif; ?>
<script>
   if(routing_user_id!=undefined) $("#user_id").val(routing_user_id);

   $("#page_title").text("ADS Manage");
</script>
<script src="<?php echo e(asset('js/admin/ads.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\test\resources\views/manage/ads.blade.php ENDPATH**/ ?>