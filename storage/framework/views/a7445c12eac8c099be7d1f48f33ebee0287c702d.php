<link href="<?php echo e(asset('assets/base/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->startSection('content'); ?>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                </div>
                <div class="kt-subheader__toolbar">
                
                    <div class="kt-subheader__wrapper">
                        <a href="/" class="btn kt-subheader__btn-primary">
                            Logout &nbsp;

                            <!--<i class="flaticon2-calendar-1"></i>-->
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<!-- ////////////////////////////////input form//////////////////////////////////////////////////////////////////////-->
                    <div class="modal fade" id="modal_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <!------------------------------------>
                                     <?php echo $__env->make('manage.categoryForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="add_category_btn" class="btn btn-primary">Add</button>
                                    <button type="button" id="update_category_btn" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- ----/////////////////////////////////////////////////////////------------------------>
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon-users"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Categories list
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
					<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
						<div class="row align-items-center">
							<div class="col-xl-8 order-2 order-xl-1">
								<div class="row align-items-center">				
									<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
										<div class="kt-input-icon kt-input-icon--left">
											<input type="text" class="form-control" placeholder="Search category..." id="scategory_name">
											<span class="kt-input-icon__icon kt-input-icon__icon--left">
												<span><i class="la la-search"></i></span>
											</span>
										</div>
									</div>
									<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
										<div class="kt-input-icon kt-input-icon--left">
											<input type="text" class="form-control" placeholder="Search sub category..." id="ssub_category_name">
											<span class="kt-input-icon__icon kt-input-icon__icon--left">
												<span><i class="la la-user"></i></span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                                <button type="button" class="btn btn-brand" id="add_modal_btn"><i class="la la-plus"></i> Add New</button>&nbsp;

							</div>
						</div>
					</div>
                    <!--begin: Search Form -->

                    <!--end: Search Form -->
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin: Datatable -->
                    <div class="kt-datatable" id="category_table"></div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
<script> $("#page_title").text("Category Manage");</script>
<script src="<?php echo e(asset('js/admin/category.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\test\resources\views/manage/category.blade.php ENDPATH**/ ?>