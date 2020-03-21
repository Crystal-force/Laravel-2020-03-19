<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('assets/base/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />

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
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////-->
<div class="modal fade" id="modal_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Edit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
               <div class="modal-body">
					<div class="kt-portlet">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">
									User detail edit....
								</h3>
							</div>
						</div>
						<!--begin::Form-->
						<form class="kt-form kt-form--label-right" id="user_form">
							<div class="kt-portlet__body">
								<div class="form-group row">
									<div class="col-lg-4">
										<label>Username:</label>
										<div class="input-group">
											<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
											<input type="hidden" class="form-control" name="id" id="id" placeholder="">
											<input type="text" class="form-control" name="name" id="name" placeholder="">
										</div>
										<span class="form-text text-muted">Please enter your username</span>
									</div>
									<div class="col-lg-4">
										<label>Last Name:</label>
										<input type="text" class="form-control" name="lname" id="lname" placeholder="">
										<span class="form-text text-muted">Please enter your last name</span>
									</div>
									<div class="col-lg-4">
										<label class="">Email:</label>
										<input type="email" class="form-control" name="email" id="email" placeholder="">
										<span class="form-text text-muted">Please enter your email</span>
									</div>
								</div>	  
								<div class="form-group row">
									<!--<div class="col-lg-4">
										<label class="">Password:</label>
										<div class="kt-input-icon kt-input-icon--right">
											<input type="text" class="form-control" name="pwd" readonly id="pwd" placeholder="">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>
										</div>
										<span class="form-text text-muted">Please enter your password</span>
									</div>--->
									<div class="col-lg-4">
										<label class="">NEW Password:</label>
										<div class="kt-input-icon kt-input-icon--right">
											<input type="text" class="form-control" name="new_pwd" id="new_pwd" placeholder="">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>
										</div>
										<span class="form-text text-muted">Please enter your new password</span>
									</div>
									<div class="col-lg-2">
										<label class="">Ads allow:</label>
										<div class="kt-input-icon kt-input-icon--right">
											<input type="text" class="form-control" name="ads_allow" id="ads_allow" placeholder="">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-bookmark-o"></i></span></span>
										</div>
									</div>
									<div class="col-lg-2">
										<label>Active:</label>
										<input type="checkbox" class="form-control" name="active" id="active" placeholder="">
									</div>
								</div>	                
							</div>
						</form>
						<!--end::Form-->
					</div>
					</div>
			<div class="modal-footer">
				<button type="button" id="add_user_btn" class="btn btn-primary">Add</button>
				<button type="button" id="update_user_btn" class="btn btn-primary">Update</button>
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
                            User list
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
											<input type="text" class="form-control" placeholder="Search name..." id="sname">
											<span class="kt-input-icon__icon kt-input-icon__icon--left">
												<span><i class="la la-search"></i></span>
											</span>
										</div>
									</div>
									<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
										<div class="kt-input-icon kt-input-icon--left">
											<input type="text" class="form-control" placeholder="Search email..." id="semail">
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
                    <div class="kt-datatable" id="user_table"></div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
	</div>
	<script> $("#page_title").text("User Manage");</script>
<script src="<?php echo e(asset('js/admin/users.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\test_ont\resources\views/manage/user.blade.php ENDPATH**/ ?>