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
  var tokenTable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		tokenTable = $('.kt-datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getToken',
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
                {   field: 'token_name',title:'Token name',sortable: !0,},
				{	field: 'token_value',title: 'Token value',sortable: !0,},
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
		var stname=$('#stoken_name').val();
		var stvalue=$('#stoken_value').val();
		datatable.setDataSourceParam("search",{token_name:stname,token_value:stvalue});
		datatable.load();
    }),
    $("#kt_datatable_edit").on("click", function() {
		var rows= datatable.getSelectedRecords();
		if(rows.length>1){
			toastr.error("You can only edit one row!");
			return;
		}else{
            var fds=["token_name","token_value"];
			var id=$(rows[0]).find("input").attr("value");
			var rec=datatable.getRecord(id);
			$('#token_id').val(id);
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
		$.get("/deleteToken",{ids:ids},function(data,status){
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

Dropzone.autoDiscover = false;
jQuery(document).ready(function() {
	KTDatatableRemoteAjaxDemo.init();
    
	//console.log(myDropzone);ddd
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('#token_table table').on('click','tr td>span>div',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=tokenTable.originalDataSet[index-1];
		console.log(row);
		if(action=="Edit"){
			$("#add_token_btn").hide();
			$("#update_token_btn").fadeIn();
			$("#token_id").val(row.token_id);
			var fds=["token_name","token_value"];
			for(var i=0;i<fds.length;i++){
                var val=row[fds[i]];
				$('#'+fds[i]).val(val);
			}
			$("#modal_token").modal('show');
		}else{
			$.get("/deleteToken",{id:row.token_id},function(data,status){
				$(".kt-datatable").KTDatatable("reload");
			});
		}
	});
	var token_form = $('#token_form')[0];
	$('#add_modal_btn').on('click',function(){
        token_form.reset();
		$("#modal_token").modal('show');
		$("#add_token_btn").fadeIn();
		$("#update_token_btn").hide();
	});
    $('#add_token_btn').click(function(e) {
		var form = $('#token_form').closest('form');
		form.validate({
			rules: {
				token_name: {required: true}			
			}
		});
		if (!form.valid()) {
			return;
		}

		form.ajaxSubmit({
            url: '/addToken',
            method:'GET',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$('#token_form').trigger('reset');
					$("#modal_token").modal('hide');
			   }else{
					toastr.error("Add card failure!");
				}
			}
		});	
	});
    $('#update_token_btn').click(function(e) {
		var form = $('#token_form').closest('form');
		form.validate({
			rules: {
				metro_name: {required: true}
			}
		});
		if (!form.valid()) {
			return;
		}
		
		form.ajaxSubmit({
			url: '/updateToken',
			method: 'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$("#modal_token").modal('hide');
			   }else{
					toastr.error("update error!");
			   }
			}
		});	
	});
	$('#reset_btn').click(function(e) {
		var form = $('#token_form')[0];
		form.reset();
	});
	$("#stoken_name").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search['token_name']=$("#stoken_name").val();
			search["token_value"]=$("#stoken_value").val();
			tokenTable.setDataSourceParam("search",search);
			tokenTable.load();			
		//} 
	});
	$("#stoken_value").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search["token_name"]=$("#stoken_name").val();
			search["token_value"]=$("#stoken_value").val();
			tokenTable.setDataSourceParam("search",search);
			tokenTable.load();			
		//} 
	});
});