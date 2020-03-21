<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Category detail edit....
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
    <form class="kt-form kt-form--label-right" id="category_form" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Category name:</label>
                    <input type='hidden' class="form-control" id="category_id" name="category_id" placeholder="" type="text" />
                    <input type='text' class="form-control" id="category_name" name="category_name" placeholder="" type="text" />
                </div>
                <div class="col-lg-3">
                    <label>Sub Category name:</label>
                    <input type='text' class="form-control" id="sub_category_name" name="sub_category_name" placeholder="" type="text" />
                </div>
                <div class="col-lg-3">
                    <label>Category code:</label>
                    <input type='text' class="form-control" id="category_code" name="category_code" placeholder="" type="text" />
                </div>
                <div class="col-lg-3">
                    <label>Sub category id:</label>
                    <input type='text' class="form-control" id="sub_category_id" name="sub_category_id" placeholder="" type="text" />
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
</script><?php /**PATH C:\xampp\htdocs\adsbackend\resources\views/manage/categoryForm.blade.php ENDPATH**/ ?>