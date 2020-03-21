<div class="kt-portlet">

    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="account_form" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Campaign:</label>
                    <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                            <input type="hidden" class="form-control" name="account_id" id="account_id" placeholder="">
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" id="campaign_id" name="campaign_id">
                            <?php
                                for($i=0;$i<sizeof($campaigns);$i++){
                                    echo '<option value="'.$campaigns[$i]->campaign_id.'" >'.$campaigns[$i]->campaign_name.'</option>'; 
                                }
                            ?>
						</select>
                        <!------------------------------------------------------>
                    </div>
                    <span class="form-text text-muted">Please select your campaign</span>
                </div>
                <div class="col-lg-3">
                     <label>Metroname:</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" id="metro_name" name="metro_name">
                            <option></option>
                                <?php $__currentLoopData = $metros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($metro->metro_name); ?>" ><?php echo e($metro->metro_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
                        <!------------------------------------------------------>
                    </div>
                    <span class="form-text text-muted">Please select metroname</span>
                </div>
                <div class="col-lg-3">
                    <label class="">Email:</label>
                    <input type="email" class="form-control" name="email_id" id="email_id" placeholder="">
                    <span class="form-text text-muted">Please enter your email</span>
                </div>
                <div class="col-lg-3">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="email_password" id="email_password" placeholder="">
                    <span class="form-text text-muted">Please enter your password</span>
                </div>



            </div>
            <div class="form-group row">
                <div class="col-lg-3">
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" style="margin-top: 8px;">
                        <input type="checkbox" id="craigslist_pay" name="craigslist_pay">craigslist pay
                        <span></span>
                    </label>
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning">
                        <input type="checkbox" id="craigslist" name="craigslist">craigslist
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" id="mofferup_css">
                        <input type="checkbox" id="offerup_pay" name="offerup_pay">offerup pay
                        <span></span>
                    </label>
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" id="mofferup_css2">
                        <input type="checkbox" id="offerup" name="offerup">offerup
                        <span></span>
                    </label>
                </div>
                 <div class="col-lg-2">
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="mletgo_css">
                        <input type="checkbox" id="letgo_pay" name="letgo_pay">letgo pay
                        <span></span>
                    </label>
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="mletgo_css2">
                        <input type="checkbox" id="letgo" name="letgo">letgo
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" id="mfb_css">
                        <input type="checkbox" id="fbmarket_pay" name="fbmarket_pay">fbmarket pay
                        <span></span>
                    </label>
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" id="mfb_css2">
                        <input type="checkbox" id="fbmarket" name="fbmarket">fbmarket
                        <span></span>
                    </label>
                </div>
                
            </div>	  
            <div class="form-group row">
                <div class="col-lg-2">
                    <label>Phone number:</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="">
                    <span class="form-text text-muted">Please enter your phone number</span>
                </div>              
                <div class="col-lg-2">
                    <label>First name:</label>
                    <input type="text" class="form-control" name="fist_name" id="fist_name" placeholder="">
                    <span class="form-text text-muted">Please enter your first name</span>
                </div>
                <div class="col-lg-2">
                    <label>Last name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="">
                    <span class="form-text text-muted">Please enter your last_name</span>
                </div>
                <div class="col-lg-2">
                    <label>Street:</label>
                    <input type="text" class="form-control" name="account_street" id="account_street" placeholder="">
                    <span class="form-text text-muted">Please enter your street</span>
                </div>
                <div class="col-lg-2">
                    <label>City:</label>
                    <input type="text" class="form-control" name="account_city" id="account_city" placeholder="">
                    <span class="form-text text-muted">Please enter your city</span>
                </div>
                <div class="col-lg-2">
                    <label>State:</label>
                    <input type="text" class="form-control" name="account_state" id="account_state" placeholder="">
                    <span class="form-text text-muted">Please enter your state</span>
                </div>
            </div>	    
            <div class="form-group row">
                <div class="col-lg-2">
                    <label>Zipcode:</label>
                    <input type="text" class="form-control" name="account_zipcode" id="account_zipcode" placeholder="">
                    <span class="form-text text-muted">Please enter your phone zipcode</span>
                </div>
                <div class="col-lg-3">
                        <label>Profile image</label>
						<div></div>
						<div class="custom-file">
						  	<input type="file" class="custom-file-input" name="profile_img" id="profile_img ">
						  	<label class="custom-file-label" style="text-align: left;" for="customFile">...</label>
						</div>
                </div>
                <div class="col-lg-2">
                    <label>Gender:</label>
                    <div class="input-group">
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" id="gender" name="gender">
                            <option value="female" selected="selected">female</option>
                            <option value="male" >male</option>
						</select>
                        <!------------------------------------------------------>
                    </div>
                    <span class="form-text text-muted">Please select</span>
                </div>
                <div class="col-lg-3">
                    <label>Birthday:</label>
					<div class="input-group date">
						<input type="text" class="form-control" readonly  placeholder="Select date" id="b_day" name="b_day" />
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-calendar-check-o"></i>
							</span>
						</div>
                    </div>                  
                     <span class="form-text text-muted">Please enter your Birthday</span>
                </div>
                <div class="col-lg-2">
                     <label>Card:</label>
                    <div class="input-group">
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" id="card_id" name="card_id">
                                <option></option>
                                <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($card->card_id); ?>" ><?php echo e($card->c_number); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
                        <!------------------------------------------------------>
                    </div>
                    <span class="form-text text-muted">Please select card</span>
                </div>
            </div> 
            <div class="form-group row">
                 <div class="col-lg-2">
                    <label>Schedule:</label>
                    <select class="form-control kt-select2" id="schedule" name="schedule">
                        <?php 
                            for($i=1;$i<24;$i++){
                                $v="";
                                if($i<10) $v="0".$i.":00";
                                else $v=$i.":00";
                                echo '<option value="'.$v.'">'.$v.'</option>';
                            }
                        ?>
					</select>
					<!--<div class="input-group date">
						<input type="text" class="form-control" readonly  placeholder="Select date" id="schedule" name="schedule" />
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-calendar-check-o"></i>
							</span>
						</div>
                    </div> -->                 
                </div>
                <div class="col-lg-2">
                     <label>auto post:</label>
                    <input type="checkbox" class="form-control" name="auto_post" id="auto_post" placeholder="">
                </div>
                <div class="col-2">
                    <label>Post Trigger:</label>
                    <span class="kt-switch kt-switch--lg kt-switch--icon">
                        <label>
                            <input type="checkbox" name="post_trigger" id="post_trigger">
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="col-lg-2">
                     <label>Post loop:</label>
                    <select class="form-control kt-select2" id="post_loop" name="post_loop">
                        <?php 
                            for($i=1;$i<11;$i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
					</select>
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
<?php /**PATH C:\xampp\htdocs\adsbackend\resources\views/manage/accountForm.blade.php ENDPATH**/ ?>