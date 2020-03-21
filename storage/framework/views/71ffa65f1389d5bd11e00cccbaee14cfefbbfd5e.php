<style>
.modal-xb {
  width: 1100px;
  max-width: 1135px;
  margin: auto;
}
</style>
<div class="modal fade" id="modal_campaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="add_campaign_form">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Campaign Name:</label>
                        <input type="hidden" class="form-control" name="campaign_id" id="campaign_id">
                        <input type="text" class="form-control" name="campaign_name" id="campaign_name">
                    </div>
                    <div class="form-group">
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
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="add_campaign_btn" class="btn btn-primary"><i class="la la-plus-circle">Add</i></button>
                <button type="button" id="update_campaign_btn" class="btn btn-primary"><i class="la la-save">Update</i></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xb" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                
                 <?php echo $__env->make('dashboard.accountAddForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="account_cancel_btn" class="btn btn-secondary" >Cancel</button>
                <button type="button" id="account_add_btn" class="btn btn-primary">Add</button>
                <button type="button" id="account_update_btn" class="btn btn-primary">Update</button>
                <button type="button" id="account_delete_btn" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\test_ont\resources\views/dashboard/modal.blade.php ENDPATH**/ ?>