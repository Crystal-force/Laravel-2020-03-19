"use strict";
// Class definition
toastr.options = {
	"closeButton": false,
	"debug": false,
	"newestOnTop": false,
	"progressBar": false,
	"positionClass": "toast-top-right",
	"preventDuplicates": false,
	"onclick": null,
	"showDuration": "300",
	"hideDuration": "1000",
	"timeOut": "5000",
	"extendedTimeOut": "1000",
	"showEasing": "swing",
	"hideEasing": "linear",
	"showMethod": "fadeIn",
	"hideMethod": "fadeOut"
  };
  var categoryTable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		categoryTable = $('.kt-datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getCategory',
                        method: 'GET',
						// sample custom headers
						//headers: {'x-my-custokt-header': 'some value', 'x-test-header': 'the value'},
						map: function(raw) {
							// sample data mapping
							var dataSet = raw;
							if (typeof raw.data !== 'undefined') {
								dataSet = raw.data;
							}
							return dataSet;
						},
					},
				},
				pageSize: 10,
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				scroll: false,
				footer: false,
			},

			// column sorting
			sortable: true,
			toolbar: {
				layout: ['pagination', 'info'],
				placement: ['bottom'],  //'top', 'bottom'
				items: {
					pagination: {
						type: 'default',
						pages: {
							desktop: {
								layout: 'default',
								pagesNumber: 6
							},
							tablet: {
								layout: 'default',
								pagesNumber: 3
							},
							mobile: {
								layout: 'compact'
							}
						},
		
						navigation: {
							prev: true,
							next: true,
							first: true,
							last: true
						},
		
						pageSizeSelect: [10, 20]
					},
		
					info: true
				}
			},
			pagination: true,

			/*search: {
				onEnter: true,
				input: $('#sname'),
			},*/

			// columns definition
			columns: [
				{	field: 'num',title: 'no',width:40},
                {   field: 'category_name',title:'Category name',sortable: !0,},
				{	field: 'sub_category_name',title: 'Sub category name',sortable: !0,},
                {   field: 'category_code',title:'Category code',sortable: !0,},
				{	field: 'sub_category_id',title: 'Sub category id',sortable: !0,}, 
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					width: 120,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						//t=JSON.parese(t);
						return '\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'"  title="Edit">\
							<i class="la la-edit"></i>\
						</div>\
						<div href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'" title="Delete">\
							<i class="la la-trash"></i>\
						</div>\
					';
					},
				}
            ],

		});
    $("#kt_datatable_reload").on("click", function() {
		//datatable.reload();
		var category_name=$('#scategory_name').val();
		var sub_category_name=$('#ssub_category_name').val();
		datatable.setDataSourceParam("search",{category_name:category_name,sub_category_name:sub_category_name});
		datatable.load();
    }),
    $("#kt_datatable_edit").on("click", function() {
		var rows= datatable.getSelectedRecords();
		if(rows.length>1){
			toastr.error("You can only edit one row!");
			return;
		}else{
            var fds=["category_name","sub_category_name","category_code","sub_category_id"];
			var id=$(rows[0]).find("input").attr("value");
			var rec=datatable.getRecord(id);
			$('#category_id').val(id);
			for(var i=0;i<fds.length;i++){
                var val=rec.getColumn(fds[i]).getValue();
				$('#'+fds[i]).val(val);
            }
		}
    }),
    $("#kt_datatable_delete").on("click", function() {
		var rows= datatable.getSelectedRecords();
		var ids=[];
		for(var i=0;i<rows.length;i++){
			var row=rows[i];
			ids[i]=$(row).find("input").attr("value");
		}
		$.get("/deleteCategory",{ids:ids},function(data,status){
			$(".kt-datatable").KTDatatable("reload");
		});
       // $(".kt-datatable").KTDatatable("reload")
    }),
    $('#kt_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#kt_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });

    $('#kt_form_status,#kt_form_type').selectpicker();

	};

	return {
		// public functions
		init: function() {
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableRemoteAjaxDemo.init();
	categoryTable.setDataSourceParam("search",{});
	categoryTable.load();
	$('#category_table table').on('click','tr td>span>div',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=categoryTable.originalDataSet[index-1];
		console.log(row);
		if(action=="Edit"){
			$("#add_category_btn").hide();
			$("#update_category_btn").fadeIn();
			$("#category_id").val(row.category_id);
			var fds=["category_name","sub_category_name","category_code","sub_category_id"];
			for(var i=0;i<fds.length;i++){
                var val=row[fds[i]];
				$('#'+fds[i]).val(val);
			}
			$("#modal_category").modal('show');
		}else{
			$.get("/deleteCategory",{id:row.category_id},function(data,status){
				$(".kt-datatable").KTDatatable("reload");
			});
		}
	});
	var category_form = $('#category_form')[0];
	$('#add_modal_btn').on('click',function(){
		category_form.reset();
		$("#modal_category").modal('show');
		$("#add_category_btn").fadeIn();
		$("#update_category_btn").hide();
	});
    $('#add_category_btn').click(function(e) {
		var form = $('#category_form').closest('form');
		form.validate({
			rules: {
				category_name: {required: true}			
			}
		});
		if (!form.valid()) {
			return;
		}

		form.ajaxSubmit({
            url: '/addCategory',
            method:'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$('#category_form').trigger('reset');
					$("#modal_category").modal('hide');
			   }else{
					toastr.error("Add card failure!");
				}
			}
		});		
	});
    $('#update_category_btn').click(function(e) {
		if($("#account_id").val()<1){
			toastr.error("After add,please update!");return;
		}
		var form = $('#category_form').closest('form');
		form.validate({
			rules: {
				c_number: {required: true}
			}
		});
		if (!form.valid()) {
			return;
		}
		
		form.ajaxSubmit({
			url: '/updateCategory',
			method: 'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$("#modal_category").modal('hide');
			   }else{
					toastr.error("update error!");
			   }
			}
		});	
	});
	$('#reset_btn').click(function(e) {
		var form = $('#user_form')[0];
		form.reset();
	});
	$("#scategory_name").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search['category_name']=$("#scategory_name").val();
			search["sub_category_name"]=$("#ssub_category_name").val();
			categoryTable.setDataSourceParam("search",search);
			categoryTable.load();			
		//} 
	});
	$("#ssub_category_name").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search["category_name"]=$("#scategory_name").val();
			search["sub_category_name"]=$("#ssub_category_name").val();
			categoryTable.setDataSourceParam("search",search);
			categoryTable.load();			
		//} 
	});
});