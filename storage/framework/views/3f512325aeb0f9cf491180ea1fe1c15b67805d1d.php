<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Account detail edit in Dashboard
            </h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="account_form">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-2">
                    <label>Metro Name:</label>
                    <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                            <input type="hidden" class="form-control" name="account_id" id="account_id" placeholder="">
                            <input type="hidden" class="form-control" name="user_id" id="user_id" placeholder="">
                            <input type="hidden" class="form-control" name="campaign_id" id="a_campaign_id" placeholder="">
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" id="act_metro_name" name="metro_name">
                                <option></option>
                                <?php $__currentLoopData = $metros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($metro->metro_name); ?>" ><?php echo e($metro->metro_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
                        <!------------------------------------------------------>
                    </div>
                    <span class="form-text text-muted">Please select your account metro name</span>
                </div>
                <div class="col-lg-2">
                    <label class="">Email:</label>
                    <input type="email" class="form-control" name="email_id" id="email_id" placeholder="">
                    <span class="form-text text-muted">Please enter your email</span>
                </div>
                <div class="col-lg-2">
                    <label>Password:</label>
                    <input type="text" class="form-control" name="email_password" id="email_password" placeholder="">
                    <span class="form-text text-muted">Please enter your password</span>
                </div>
                <div class="col-lg-2">
                     <label>Craigslist pay:</label>
                    <input type="checkbox" class="form-control" name="craigslist_pay" id="craigslist_pay" placeholder="">
                </div>
                <div class="col-lg-2">
                     <label>Offerup pay:</label>
                    <input type="checkbox" class="form-control" name="offerup_pay" id="offerup_pay" placeholder="">
                </div>
                <div class="col-lg-2">
                     <label>Letgo pay:</label>
                    <input type="checkbox" class="form-control" name="letgo_pay" id="letgo_pay" placeholder="">
                </div>
            </div>	  
            <div class="form-group row">
                <div class="col-lg-2">
                     <label>fbmarket pay:</label>
                    <input type="checkbox" class="form-control" name="fbmarket_pay" id="fbmarket_pay" placeholder="">
                </div>
                <div class="col-lg-2">
                     <label>craigslist:</label>
                    <input type="checkbox" class="form-control" name="craigslist" id="craigslist" placeholder="">
                </div>
                <div class="col-lg-1">
                     <label>offerup:</label>
                    <input type="checkbox" class="form-control" name="offerup" id="offerup" placeholder="">
                </div>
                <div class="col-lg-1">
                     <label>letgo:</label>
                    <input type="checkbox" class="form-control" name="letgo" id="letgo" placeholder="">
                </div>
                <div class="col-lg-1">
                     <label>fbmarket:</label>
                    <input type="checkbox" class="form-control" name="fbmarket" id="fbmarket" placeholder="">
                </div>
                <div class="col-lg-2">
                    <label>*Select Campaign:</label>
                    <input type="text" class="form-control"  id="select_campaign" placeholder="" readonly>
                    <span class="form-text text-muted">You selected this campaign!</span>
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
<script>
    function selectMetro(){
        var campaignid=$('#campaign_id').val();
        $.get('/getLocations',{campaignid:campaignid},function(data,status){
                var rows=JSON.parse(data);
                var html="";
                for(var i=0;i<rows.length;i++){
                    var row=rows[i];
                    html+="<option value='"+row.metro_name+"'>"+row.metro_name+"</option>";
                }
                $('#metro_name').html(html);
        });
    }
</script><?php /**PATH C:\xampp\htdocs\adsbackend\resources\views/dashboard/accountAddForm.blade.php ENDPATH**/ ?>