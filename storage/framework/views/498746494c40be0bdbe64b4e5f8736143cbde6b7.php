<link href="<?php echo e(asset('assets/base/style.bundle-lg.css')); ?>" rel="stylesheet" type="text/css" />
<style>
  .filtermenu {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
}  
  #start{
    width:120px;
    margin-top: 5px;
    margin-left: 15px;
  }
  #end{
    width:120px;
    margin-top: 5px;
    margin-left: 15px;
  }
  #today,#week,#month{
	margin-top: 8px;
  } 
  #scampaign{
    margin-left:4px;
    margin-top:5px;
  }
  #saccount_id{
    margin-left:4px;
    margin-top:5px;
    
  }
  #sads_id{
    margin-left:4px;
    margin-top:5px;
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
  #sads_id{
	margin-top: 8px;
    width:160px;
    margin-left: 4px;
  }
  #start{
    width:180px;
    margin-top: 10px;
    margin-left: 11px;
  }
  #end{
    width:180px;
    margin-top: 0px;
    margin-left: 11px;
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
                        <label style="margin-top:10px;"> Campaign:</label>
                            <select class="form-control kt-select2" id="scampaign" style="width:140px;"  name="scampaign">
                                    <option></option>
                                    <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->campaign_id); ?>" ><?php echo e($row->campaign_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label style="margin-top:10px;margin-left:4px;"> Account:</label>
                            <select class="form-control kt-select2" id="saccount_id" style="width:160px;"  name="saccount_id">
                                    <option></option>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->account_id); ?>" ><?php echo e($row->email_id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label style="margin-top:10px;margin-left:4px;"> AD:</label>
                            <select class="form-control kt-select2" id="sads_id" style="width:160px;"  name="sads_id">
                                    <option></option>
                                    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->ad_id); ?>" ><?php echo e($row->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>&nbsp;
                            <input type='text' class="form-control" id="start" readonly placeholder="Start date"/>&nbsp;
                            <input type='text' class="form-control" id="end" readonly placeholder="End date"/>
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
            <div class="kt-portlet">
                <div class="kt-portlet__body  kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-6">

                            <!--begin::Total Profit-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <h4 class="kt-widget24__title">
                                                ADS FLAGED
                                            </h4>
                                        </div>
                                        <span class="kt-widget24__stats kt-font-brand" id="ads_flag_value">
                                           38
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
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-6">

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
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon-users"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Post list
                        </h3>
                    </div>
                </div>

                    <!--begin: Search Form -->


                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin: Datatable -->
                    <div class="kt-datatable" id="local_data"></div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
<script>var routing_campaign_id,routing_ad_id,routing_account_id,flag=0,routing_start,routing_end;</script>
 <?php if(isset($campaign_id)): ?>
<script>  routing_campaign_id=<?php echo e($campaign_id); ?>;</script>
<?php endif; ?>
<?php if(isset($ad_id)): ?>
<script>  routing_ad_id=<?php echo e($ad_id); ?>;</script>
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
routing_end='<?php echo e($end); ?>';
</script>
<?php endif; ?>
<script>
   $("#page_title").text("POST Manage");
</script>
<script src="<?php echo e(asset('js/admin/posts1.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\test\resources\views/manage/post.blade.php ENDPATH**/ ?>