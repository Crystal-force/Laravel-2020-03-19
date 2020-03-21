<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Cards detail edit....
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
    <form class="kt-form kt-form--label-right" id="card_form" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-2">
                    <label>first name:</label>
                    <input type='hidden' class="form-control" id="card_id" name="card_id" placeholder="" type="text" />
                    <input type='text' class="form-control" id="f_name" name="f_name" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>last name:</label>
                    <input type='text' class="form-control" id="l_name" name="l_name" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>card number:</label>
                    <input type='text' class="form-control" id="c_number" name="c_number" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>c_sec:</label>
                    <input type='text' class="form-control" id="c_sec" name="c_sec" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>c_month:</label>
                    <input type='text' class="form-control" id="c_month" name="c_month" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>c_year:</label>
                    <input type='text' class="form-control" id="c_year" name="c_year" placeholder="" type="text" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-2">
                    <label>c_address:</label>
                    <input type='text' class="form-control" id="c_address" name="c_address" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>c_city:</label>
                    <input type='text' class="form-control" id="c_city" name="c_city" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>c_state:</label>
                    <input type='text' class="form-control" id="c_state" name="c_state" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>c_zip:</label>
                    <input type='text' class="form-control" id="c_zip" name="c_zip" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>balance:</label>
                    <input type='text' class="form-control" id="balance" name="balance" placeholder="" type="text" />
                </div>
                <div class="col-lg-2">
                    <label>daily_limit:</label>
                    <input type='text' class="form-control" id="daily_limit" name="daily_limit" placeholder="" type="text" />
                </div>
            </div>	 
            <div class="form-group row">
                <div class="col-lg-11">
                 </div> 
                 <div class="col-lg-1">
                        <label>Active</label>
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
</script><?php /**PATH D:\xampp\htdocs\test\resources\views/manage/cardForm.blade.php ENDPATH**/ ?>