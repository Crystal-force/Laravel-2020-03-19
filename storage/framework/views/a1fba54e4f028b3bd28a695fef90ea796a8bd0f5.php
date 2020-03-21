<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Token detail edit....
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
    <form class="kt-form kt-form--label-right" id="token_form" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-2">
               </div>
                <div class="col-lg-8">
                    <label>Token name:</label>
                    <input type='hidden' class="form-control" id="token_id" name="token_id" placeholder="" type="text" />
                    <input type='text' class="form-control" id="token_name" name="token_name" placeholder="" type="text" />
                </div>
            </div>
            <div class="form-group row">
                    <label>Token Value:</label>
				    <textarea class="form-control" id="token_value" rows="5" name="token_value" maxlength="3000" placeholder="" rows="6"></textarea>
                    <span class="form-text text-muted">max 3000 characters</span>               
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
</script><?php /**PATH C:\xampp\htdocs\adsbackend\resources\views/manage/tokenForm.blade.php ENDPATH**/ ?>