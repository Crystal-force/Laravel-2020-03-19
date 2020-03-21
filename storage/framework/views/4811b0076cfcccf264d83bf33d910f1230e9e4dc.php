<div class="row">
    <div class="col-lg-7"> 
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="flaticon-notes"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Campaign List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <button type="button" class="btn btn-brand" id="add_modal_btn"><i class="la la-plus"></i> Add New</button>&nbsp;
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable" id="campaigntable"></div>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <div class="col-lg-5"> 
        <div class="kt-widget24">
            <div class="kt-widget24__details">
                <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                        Money spend
                    </h4>
                </div>
                <span class="kt-widget24__stats kt-font-brand" id="money_content">
                    $0
                </span>
            </div>
            <div class="progress progress--sm">
                <div class="progress-bar kt-bg-brand" id="money_bar" role="progressbar" style="width:0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="kt-widget24__action">
                <span class="kt-widget24__change">
                    Charge
                </span>
            </div>
        </div>
        <div class="kt-widget24">
            <div class="kt-widget24__details">
                <div class="kt-widget24__info">
                    <h4 class="kt-widget24__title">
                        ADS POSTED
                    </h4>
                </div>
                <span class="kt-widget24__stats kt-font-success" id="ads_content">
                    0
                </span>
            </div>
            <div class="progress progress--sm">
                <div class="progress-bar kt-bg-success" id="ads_bar" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="kt-widget24__action">
                <span class="kt-widget24__change">
                </span>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\test_ont\resources\views/dashboard/table.blade.php ENDPATH**/ ?>