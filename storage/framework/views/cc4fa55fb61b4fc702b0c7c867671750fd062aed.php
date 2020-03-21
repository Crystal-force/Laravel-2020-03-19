<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('assets/base/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
<style>
 .filtermenu {
    display: flex;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
} 
@media (max-width: 1024px) {
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
}
</style>


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
                            <label style="margin-top: 10px;"> First name:</label>
                            <div class="col-lg-3">
                                <input type='text' class="form-control" id="sfist_name" name="sfist_name" placeholder=""  />
                            </div>
                            <label style="margin-top: 10px;"> card number:</label>
                            <div class="col-lg-3">
                                <input type='text' class="form-control" id="card_number" name="card_number" placeholder="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<!-- ////////////////////////////////input form//////////////////////////////////////////////////////////////////////-->

                    <div class="modal fade" id="modal_card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <!------------------------------------>
                                     <?php echo $__env->make('manage.cardForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="add_card_btn" class="btn btn-primary">Add</button>
                                    <button type="button" id="update_card_btn" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- ----/////////////////////////////////////////////////////////------------------------>
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Card list
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
                    <div class="kt-datatable" id="card_datatable"></div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
    <script>
         $("#page_title").text("Card Manage");
    </script>
<script src="<?php echo e(asset('js/admin/cards.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\adsbackend\resources\views/manage/card.blade.php ENDPATH**/ ?>