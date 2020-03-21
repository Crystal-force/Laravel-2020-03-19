<link href="<?php echo e(asset('assets/base/style.bundle-lg.css')); ?>" rel="stylesheet" type="text/css" />
<style>
.form-group.row .kt-switch.kt-switch--lg {
    margin-top: 0rem;
    position: relative;
    top: 0rem;
}
.filtermenu {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
}
#craigslist_css{
	margin-top: 8px;
  }
  #offerup_css{
	margin-top: 8px;
    
  }
  #letgo_css{
	margin-top: 8px;
    
  }
  #fb_css{
	margin-top: 8px;
    
  }
  #mfb_css{
	margin-top: 8px;
    
  }
  #mletgo_css{
	margin-top: 8px;
    
  }
  #mofferup_css{
	margin-top: 8px;
    
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
@media (max-width: 1399px) {
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
  #offerup_css{
	margin-top: 0px;
    margin-left: -21px;
  }
  #offerup_css2{
	margin-top: 0px;
    margin-left: 8px;
  }
  #cl_css2{
	margin-top: 0px;
    margin-left: 15px;
  }
  #letgo_css{
	margin-top: 16px;
    margin-left: -14px;
  }
  #letgo_css2{
	margin-top: 0px;
    margin-left: 12px;
  }
  #fb_css{
	margin-top: 16px;
    margin-left: -2px;
  }
  #fb_css2{
	margin-top: 0px;
    margin-left: 8px;
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
  .kt-subheader .kt-subheader__toolbar .btn:not(.dropdown-toggle-split) {
    margin-left: 0.25rem;
    margin-top: 10px;
  }
}
</style>
<?php $__env->startSection('content'); ?>
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
                            <select class="form-control kt-select2" id="scampaign" style="width:180px;margin-top: 10px;"  name="spec_location">
                                    <option></option>
                                    <?php $__currentLoopData = $scampaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->campaign_id); ?>" ><?php echo e($row->campaign_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            &nbsp;
<!----------------------------------------------------------------->
                            <div class="col-lg-1">
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="craigslist_css" >
                                    <input type="checkbox" id="scraigslist_pay" name="craigslist_pay">cl_pay
                                    <span></span>
                                </label>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="cl_css2">
                                    <input type="checkbox" id="scraigslist" name="craigslist">craigslist
                                    <span></span>
                                </label>
                            </div>&nbsp;
                            <div class="col-lg-1" style="margin-left:22px;">
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" id="offerup_css" >
                                    <input type="checkbox" id="sofferup_pay" name="offerup_pay">ou_pay
                                    <span></span>
                                </label>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" id="offerup_css2">
                                    <input type="checkbox" id="sofferup" name="offerup">offerup
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-lg-1" style="margin-left:15px;">
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="letgo_css">
                                    <input type="checkbox" id="sletgo_pay" name="letgo_pay">lg_pay
                                    <span></span>
                                </label>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="letgo_css2">
                                    <input type="checkbox" id="sletgo" name="letgo">letgo
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-lg-1" style="margin-left:5px;">
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" id="fb_css">
                                    <input type="checkbox" id="sfbmarket_pay" name="fbmarket_pay">fb_pay
                                    <span></span>
                                </label>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" id="fb_css2">
                                    <input type="checkbox" id="sfbmarket" name="fbmarket">fbmarket
                                    <span></span>
                                </label>
                            </div>

<!------------------------------------------------------------------------->
                            <input type='text' class="form-control" id="start" readonly placeholder="start date"/>&nbsp;
                            <input type='text' class="form-control" id="end" readonly placeholder="end date"/>
                            <button type="button" id="today" class="btn btn-outline-brand btn-pill" style="margin-top: 12px;">Today</button>
                            <button type="button" id="week" class="btn btn-outline-warning btn-pill" style="margin-top: 12px;">Week</button>
                            <button type="button" id="month" class="btn btn-outline-danger btn-pill" style="margin-top: 12px;">Month</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                      <?php echo $__env->make('dashboard.graph', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>.
<!--///////////////////////////////bar ////////////////////////////////////////////////////////////////////////////////-->

<!--begin:: Widgets/Stats-->
<div class="kt-portlet">
    <div class="kt-portlet__body  kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::Total Profit-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Money spend
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-brand" id="money_value">
                            $18M
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-brand"  id="money_bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                        </span>
                        <span class="kt-widget24__number" id="money_label">
                            78%
                        </span>
                    </div>
                </div>

                <!--end::Total Profit-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

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
                        <span class="kt-widget24__number" id="ads_label">
                            84%
                        </span>
                    </div>
                </div>

                <!--end::New Feedbacks-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Orders-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                ACTIVE ACCOUNTS
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-danger" id="account_value">
                            10
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-danger" id="account_bar" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                        </span>
                        <span class="kt-widget24__number" id="account_label">
                            69%
                        </span>
                    </div>
                </div>

                <!--end::New Orders-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">

                <!--begin::New Users-->
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                ACCOUNTS ON HOLD
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-success" id="haccount_value">
                            4
                        </span>
                    </div>
                    <div class="progress progress--sm">
                        <div class="progress-bar kt-bg-success" id="haccount_bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="kt-widget24__action">
                        <span class="kt-widget24__change">
                        </span>
                        <span class="kt-widget24__number" id="haccount_label">
                            90%
                        </span>
                    </div>
                </div>

                <!--end::New Users-->
            </div>
        </div>
    </div>
</div>                     
<!-- ////////////////////////////////add modal form/////////////ddd/////////////////////////////////////////////////////////-->
                    <div class="modal fade" id="modal_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <?php echo $__env->make('manage.accountForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="add_account_btn" class="btn btn-primary">Add</button>
                                    <button type="button" id="update_account_btn" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- ----/////////////////////////////////////////////////////////------------------------>
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="flaticon-notes"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Account List
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
                    <div id="table">
                        <div class="kt-datatable" id="account_table"></div>
                    </div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
    <script>var routing_campaign_id,routing_user_id,routing_account_id,flag=0,routing_start,routing_end;</script>
<?php if(isset($campaign_id)): ?>
<script>  routing_campaign_id=<?php echo e($campaign_id); ?>;</script>
<?php endif; ?>
<?php if(isset($user_id)): ?>
<script>  routing_user_id=<?php echo e($user_id); ?>;</script>
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
   $("#page_title").text("Account Manage");
</script>
<script src="<?php echo e(asset('js/dashboard/graph.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/admin/accounts.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\test_ont\resources\views/manage/account.blade.php ENDPATH**/ ?>