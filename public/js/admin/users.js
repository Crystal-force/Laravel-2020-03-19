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
  var userTable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		userTable = $('.kt-datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getUsers',
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
				{
                    field: "user_pass",
                    title: "",
                    sortable: !1,
                    width: 0,
                    autoHide: true,
                    type: "number",
                }, {
                    field: 'user_name',
					id:'user_name',
					filterable: true,
					sortable: !1,
					title: 'User name',
				}, {
					field: 'user_last_name',
                    title: 'Last Name',
                }, {
					field: 'user_registered',
					title: 'Registered Date',
					type: 'date',
					format: 'MM/DD/YYYY',
				}, {
					field: 'user_email',
					title: 'email',
				},{
					field: 'display_name',
					title: 'Display name',
				}, {
					field: 'ads_allow',
					title: 'ads allow',
					width:50,
				},{
					field: 'active',
					title: 'active',
					width:70,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							0: {'title': 'deactive', 'class': ' kt-badge--primary'},
							1: {'title': 'active', 'class': ' kt-badge--success'},
						};
						return '<span class="kt-badge ' + status[row.active].class + ' kt-badge--inline kt-badge--pill">' + status[row.active].title + '</span>';
					},
				},			
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
		var semail=$('#semail').val();
		var sname=$('#sname').val();
		datatable.setDataSourceParam("search",{user_name:sname,user_email:semail});
		datatable.load();
    }),
    $("#kt_datatable_edit").on("click", function() {
		var rows= datatable.getSelectedRecords();
		if(rows.length>1){
			toastr.error("You can only edit one row!");
			return;
		}else{
			var id=$(rows[0]).find("input").attr("value");
			var rec=datatable.getRecord(id);
			$('#id').val(id);
			$('#name').val(rec.getColumn('user_name').getValue());
			$('#lname').val(rec.getColumn('user_last_name').getValue());
			$('#email').val(rec.getColumn('user_email').getValue());
			$('#pwd').val(rec.getColumn('user_pass').getValue());
			$('#ads_allow').val(rec.getColumn('ads_allow').getValue());
			//id, name,lname,email,pwd,ads_allow
			var act=rec.getColumn('active').getValue();
			if(act=="active"){
				$("#act2").removeAttr('checked');
				 $("#act1").attr('checked',true);
			}else{
				$("#act1").removeAttr('checked');
				 $("#act2").attr('checked',true);
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
		$.get("/deleteUser",{ids:ids},function(data,status){
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
	userTable.setDataSourceParam("search",{});
	userTable.load();
	$('#user_table table').on('click','tr td>span>div',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=userTable.originalDataSet[index-1];
		console.log(row);
		if(action=="Edit"){
			$("#add_user_btn").hide();
			$("#update_user_btn").fadeIn();
			$("#id").val(row.user_id);
			//id, name,lname,email,pwd,ads_allow
			var fds=["name","lname","email","pwd","ads_allow"];
			var valfds=["user_name","user_last_name","user_email","user_pass","ads_allow"];
			for(var i=0;i<fds.length;i++){
                var val=row[valfds[i]];
				$('#'+fds[i]).val(val);
			}
			if(row.active==1) $('#active').prop('checked', true);
			else $('#active').prop('checked', false);

			$("#modal_user").modal('show');
		}else{
			$.get("/deleteUser",{id:row.user_id},function(data,status){
				$(".kt-datatable").KTDatatable("reload");
			});
		}
	});
	var user_form = $('#user_form')[0];
	$('#add_modal_btn').on('click',function(){
		user_form.reset();
		$("#modal_user").modal('show');
		$("#add_user_btn").fadeIn();
		$("#update_user_btn").hide();
	});
    $('#add_user_btn').click(function(e) {
		var form = $('#user_form').closest('form');
		form.validate({
			rules: {
				name: {
					required: true
				},
				new_pwd: {
					required: true
				},
				email: {
					required: true,
					email: true
				}
			}
		});
		if (!form.valid()) {
			return;
		}
		form.ajaxSubmit({
			url: '/addUser',
			method: 'GET',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$('#user_form').trigger('reset');
					$("#modal_user").modal('hide');
			   }else{
					toastr.error("Your email exists,please again enter your email!");
				}
			}
		});		
	});
    $('#update_user_btn').click(function(e) {
		var form = $('#user_form').closest('form');
		form.validate({
			rules: {
				name: {
					required: true
				},
				email: {
					required: true,
					email: true
				}
			}
		});
		if (!form.valid()) {
			return;
		}
		form.ajaxSubmit({
			url: '/updateUser',
			method: 'GET',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$("#modal_user").modal('hide');
			   }else{
					toastr.error("update error!");
				}
			}
		});		
	});
	$("#sname").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search['user_name']=$("#sname").val();
			search["user_email"]=$("#semail").val();
			userTable.setDataSourceParam("search",search);
			userTable.load();			
		//} 
	});
	$("#semail").on('keyup',function(e){
		var search={};
	//	if(e.keyCode==13){
			search["user_name"]=$("#sname").val();
			search["user_email"]=$("#semail").val();
			userTable.setDataSourceParam("search",search);
			userTable.load();			
	//	} 
	});
});