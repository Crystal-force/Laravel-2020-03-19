<div class="kt-portlet">
    <!--begin::Form-->
<style>
.form-control {    padding-left: 0px; }
.form-group {
    margin-bottom: 0rem;
}
.modal-body {
    padding: 0.25rem;
}
</style>
    <form class="kt-form kt-form--label-right" id="ads_form" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Campaign:</label>
                    <div class="input-group">
                            <input type="hidden" class="form-control" name="ad_id" id="ad_id" placeholder="">
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" id="campaign_id" name="campaign_id">
                                <option></option>
                            <?php
                                for($i=0;$i<sizeof($campaigns);$i++){
                                    echo '<option value="'.$campaigns[$i]->campaign_id.'" >'.$campaigns[$i]->campaign_name.'</option>'; 
                                }
                            ?>
						</select>
                        <!------------------------------------------------------>
                    </div>
                </div>
                <div class="col-lg-3">
                        <label>Account</label>
                        <select class="form-control kt-select2" id="account_id" name="account_id">
                                <option></option>
                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->account_id); ?>" ><?php echo e($row->email_id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
                </div>

                <div class="col-lg-2">
                     <label>Category:</label>
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" onchange="selectSubCat()" id="category_name" name="category_name">
                                <option></option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->category_name); ?>" ><?php echo e($row->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
                </div>
                <div class="col-lg-4">
                     <label>Sub category:</label>
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2"  id="sub_category_name" name="sub_category_name">
                                <option></option>
                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->sub_category_name); ?>" ><?php echo e($row->sub_category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
                </div>


            </div>
            <div class="form-group row">
                <div class="col-lg-1"></div> 
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
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" style="margin-top: 8px;">
                        <input type="checkbox" id="offerup_pay" name="offerup_pay">offerup pay
                        <span></span>
                    </label>
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success" id="mofferup">
                        <input type="checkbox" id="offerup" name="offerup">offerup
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-2">
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" style="margin-top: 8px;">
                        <input type="checkbox" id="letgo_pay" name="letgo_pay">letgo pay
                        <span></span>
                    </label>
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--warning" id="mletgo">
                        <input type="checkbox" id="letgo" name="letgo">letgo
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-3">
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" style="margin-top: 8px;" >
                        <input type="checkbox" id="fbmarket_pay" name="fbmarket_pay">fbmarket pay
                        <span></span>
                    </label>
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--danger" id="mfb">
                        <input type="checkbox" id="fbmarket" name="fbmarket">fbmarket
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-group row">
                 <div class="col-lg-2">
                     <label>Metroname:</label>
                        <!------------------------------------------------------>
                        <select class="form-control kt-select2" id="metro_name" name="metro_name">
                                <option></option>
                                <?php $__currentLoopData = $metros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($metro->metro_name); ?>" ><?php echo e($metro->metro_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
                </div> 
                <div class="col-lg-3">
                    <label>Spec location:</label>
                        <select class="form-control kt-select2" id="spec_location" name="spec_location">
                                <option></option>
                                <?php $__currentLoopData = $speclocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->spec_location); ?>" ><?php echo e($row->spec_location); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                <div class="col-lg-3">
                    <label>Spec Child location:</label>
                        <select class="form-control kt-select2"  id="spec_location_child" name="spec_location_child">
                                <option></option>
                                <?php $__currentLoopData = $lchild; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->name); ?>" ><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                <div class="col-lg-2">
                    <label>City name:</label>
                        <select class="form-control kt-select2" id="city_name" name="city_name">
                                <option></option>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->city_name); ?>" ><?php echo e($row->city_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                <div class="col-lg-2">
                    <label>SpecCityName:</label>
                    <input type="text" class="form-control" name="spec_city_name" id="spec_city_name" placeholder="">
                </div>



            </div>  
            <div class="form-group row">
                <div class="col-lg-1"></div>
                <div class="col-lg-2">
                    <label>State:</label>
                        <select class="form-control kt-select2"  id="state" name="state">
                                <option></option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->state); ?>" ><?php echo e($row->state); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                <div class="col-lg-2">
                    <label>Zip code:</label>
                        <select class="form-control kt-select2"  id="zip_code" name="zip_code">
                                <option></option>
                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->zip_code); ?>" ><?php echo e($row->zip_code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                 <div class="col-lg-3">
                    <label>street:</label>
                    <input type="text" class="form-control" name="street" id="street" placeholder="">
                </div>
                <div class="col-lg-3">
                    <label>cross street:</label>
                    <input type="text" class="form-control" name="cross_street" id="cross_street" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-8">
                    <label>Keyword:</label>
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="">
                </div>
                <div class="col-lg-2">
                    <label>Price:</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="">
                </div>
                <div class="col-lg-2">
                    <label>phone:</label>
                    <input type='text' class="form-control" id="phone" name="phone" placeholder="" type="text" />
                </div>
            </div>	 
            <!------------------title------------->
            <div class="form-group row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                    <label>description:</label>
				    <textarea class="form-control" id="description" rows="5" name="description" maxlength="3000" placeholder="" rows="6"></textarea>
                    <span class="form-text text-muted">max 3000 characters</span>
            </div>
            <div class="form-group row">
                    <div class="kt-dropzone dropzone m-dropzone--primary" style="width:760px;" id="myFile">
                        <div class="kt-dropzone__msg dz-message needsclick">
                            <h3 class="kt-dropzone__msg-title">Drop files here or click to upload.</h3>
                            <span class="kt-dropzone__msg-desc">Upload up to 4 files</span>
                        </div>
                    </div>
             </div>	  
           <!-- ----------------------------------------------------------------------------> 
            <div class="form-group row">
                <div class="col-lg-2">
                        <label style="font-size: 20px;margin-top: 5px;color: #f90707;">housing:</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-2">
                    <label>Company:</label>
                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="">
                </div>
                <div class="col-lg-2">
                    <label>fee disclosure:</label>
                    <input type="text" class="form-control" name="fee_disclosure" id="fee_disclosure" placeholder="">
                </div>
                <div class="col-lg-2">
                    <label>housing type:</label>
                        <select class="form-control kt-select2" id="housing_type" name="housing_type">
                                <option></option>
                                <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->housing_name); ?>" ><?php echo e($row->housing_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                <div class="col-lg-2">
                    <label>laundryType:</label>
                        <select class="form-control kt-select2" id="laundry_type" name="laundry_type">
                                <option></option>
                                <?php $__currentLoopData = $laundry_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->laundry_name); ?>" ><?php echo e($row->laundry_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label>parkingType:</label>
                        <select class="form-control kt-select2" id="parking_type" name="parking_type">
                                <option></option>
                                <?php $__currentLoopData = $parking_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->parking_name); ?>" ><?php echo e($row->parking_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label>bathroomType:</label>
                        <select class="form-control kt-select2" id="bathrooms_type" name="bathrooms_type">
                                <option></option>
                                <?php $__currentLoopData = $bathroom_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->bathroom_name); ?>" ><?php echo e($row->bathroom_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


            </div>

            <div class="form-group row">
                <div class="col-lg-2">
                    <label>bedroomType:</label>
                        <select class="form-control kt-select2" id="bedrooms_type" name="bedrooms_type">
                                <option></option>
                                <?php $__currentLoopData = $bedroom_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->bedroom_name); ?>" ><?php echo e($row->bedroom_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label>squareft:</label>
                    <input type="text" class="form-control" name="squareft" id="squareft" placeholder="">
                </div>
                <div class="col-lg-1">
                        <label>cats</label>
                        <input type="checkbox" class="form-control" name="cats" id="cats" placeholder=""> 
                </div>
                <div class="col-lg-1">
                        <label>dogs</label>
                        <input type="checkbox" class="form-control" name="dogs" id="dogs" placeholder=""> 
                </div>
                <div class="col-lg-2">
                        <label>furnished</label>
                        <input type="checkbox" class="form-control" name="furnished" id="furnished" placeholder=""> 
                </div>
                <div class="col-lg-2">
                        <label>no smoking</label>
                        <input type="checkbox" class="form-control" name="no_smoking" id="no_smoking" placeholder=""> 
                </div>
                <div class="col-lg-2">
                        <label>wheel chair</label>
                        <input type="checkbox" class="form-control" name="wheelchair" id="wheelchair" placeholder=""> 
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-2">
                        <label style="font-size: 20px;margin-top: 5px;color: #f90707;">For sell:</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <label>Sell condition:</label>
                        <select class="form-control kt-select2" id="sell_condition" name="sell_condition">
                                <option></option>
                                <?php $__currentLoopData = $sell_condition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->sell_condition_name); ?>" ><?php echo e($row->sell_condition_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label>make:</label>
                    <input type="text" class="form-control" name="make" id="make" placeholder="">
                </div>
                <div class="col-lg-2">
                    <label>model:</label>
                    <input type="text" class="form-control" name="model" id="model" placeholder="">
                </div>
                <div class="col-lg-2">
                    <label>size:</label>
                    <input type="text" class="form-control" name="size" id="size" placeholder="">
                </div>

            </div> 
            <div class="form-group row">
                <div class="col-lg-2">
                        <label style="font-size: 20px;margin-top: 5px;color: #f90707;">Services:</label>
                </div>
                <div class="col-lg-6">
                    <label>license:</label>
                    <input type="text" class="form-control" name="license" id="license" placeholder="">
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<script>

    function selectSubCat(){
        var category_name=$('#category_name').val();
        $.get('/getSubCat',{category_name:category_name},function(data,status){
                var rows=JSON.parse(data);
                var html="<option></option>";
                for(var i=0;i<rows.length;i++){
                    var row=rows[i];
                    html+="<option value='"+row.name+"'>"+row.name+"</option>";
                }
               // html+="<option></option>";
                $('#sub_category_name').html(html);
        });
    }
  /*  function selectMetro(){
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
    function selectZipCode(){
        var state=$('#state').val();
        $.get('/getZipCode',{state:state},function(data,status){
                var rows=JSON.parse(data);
                var html="";
                for(var i=0;i<rows.length;i++){
                    var row=rows[i];
                    html+="<option value='"+row.name+"'>"+row.name+"</option>";
                }
                $('#zip_code').html(html);
        });
    }
    function selectChildLocation(){
        var slocation=$('#spec_location').val();
        $.get('/getChildLocations',{slocation:slocation},function(data,status){
                var datas=JSON.parse(data);
                var html="";
                console.log(datas);
                var rows=datas.spec;
                for(var i=0;i<rows.length;i++){
                    var row=rows[i];
                    html+="<option value='"+row.name+"'>"+row.name+"</option>";
                }
                $('#spec_location_child').html(html);
                rows=datas.cname;
                html="";
                for(var i=0;i<rows.length;i++){
                    var row=rows[i];
                    html+="<option value='"+row.name+"'>"+row.name+"</option>";
                }
                $('#city_name').html(html);
                ////////////////////////////////////
                $.get('/getSelState',{spec_location:slocation},function(data,status){
                        var rows=JSON.parse(data);
                        var html="";
                        for(var i=0;i<rows.length;i++){
                            var row=rows[i];
                            html+="<option value='"+row.name+"'>"+row.name+"</option>";
                        }
                        $('#state').html(html);
                });
        });
    }*/
</script><?php /**PATH D:\test_ont\resources\views/manage/adsForm.blade.php ENDPATH**/ ?>