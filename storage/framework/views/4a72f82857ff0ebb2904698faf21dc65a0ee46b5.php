<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Location detail edit....
            </h3>
        </div>
    </div>
    <!--begin::Form-->
<style>
.form-control {    padding-left: 0px; }
.form-group {
    margin-bottom: 1rem;
}
</style>
    <form class="kt-form kt-form--label-right" id="location_form" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Metro name:</label>
                    <input type='hidden' class="form-control" id="location_id" name="location_id" placeholder="" type="text" />
                    <input type='text' class="form-control" id="metro_name" name="metro_name" placeholder="" type="text" />
                </div>
                <div class="col-lg-3">
                    <label>Spec location:</label>
                    <input type='text' class="form-control" id="spec_location" name="spec_location" placeholder="" type="text" />
                </div>
                <div class="col-lg-3">
                    <label>Spec location child:</label>
                    <input type='text' class="form-control" id="spec_location_child" name="spec_location_child" placeholder="" type="text" />
                </div>
                <div class="col-lg-3">
                    <label>City name:</label>
                    <input type='text' class="form-control" id="city_name" name="city_name" placeholder="" type="text" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-2">
                    <label>State:</label>
                    <input type='text' class="form-control" id="state" name="state" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>Zip code:</label>
                    <input type='text' class="form-control" id="zip_code" name="zip_code" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>City code:</label>
                    <input type='text' class="form-control" id="city_code" name="city_code" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                        <label>Used</label>
                        <input type="checkbox" class="form-control" name="used" id="used" placeholder=""> 
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
</script><?php /**PATH D:\xampp\htdocs\test\resources\views/manage/locationForm.blade.php ENDPATH**/ ?>