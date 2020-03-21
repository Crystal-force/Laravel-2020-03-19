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
var locationTable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		locationTable = $('.kt-datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getLocation',
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
                {   field: 'metro_name',title:'Metro name',sortable: !0,},
				{	field: 'spec_location',title: 'Spec location',sortable: !0,},
                {   field: 'spec_location_child',title:'Spec location child',sortable: !0,},
                {   field: 'city_name',title:'City name',sortable: !0,},
				{	field: 'state',title: 'State',sortable: !0,},
                {   field: 'zip_code',title:'Zip code',sortable: !0,},
                {   field: 'city_code',title:'City code',sortable: !0,},
                {
					field: 'used',
					title: 'Used',
					width:70,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							0: {'title': 'unused', 'class': ' kt-badge--primary'},
							1: {'title': 'used', 'class': ' kt-badge--success'},
						};
						return '<span class="kt-badge ' + status[row.used].class + ' kt-badge--inline kt-badge--pill">' + status[row.used].title + '</span>';
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
		var mname=$('#smetro_name').val();
		var slocation=$('#sspec_location').val();
		datatable.setDataSourceParam("search",{metro_name:mname,spec_location:slocation});
		datatable.load();
    }),
    $("#kt_datatable_edit").on("click", function() {
		var rows= datatable.getSelectedRecords();
		if(rows.length>1){
			toastr.error("You can only edit one row!");
			return;
		}else{
            var fds=["metro_name","spec_location","spec_location_child","city_name","state","zip_code","city_code"];
			var id=$(rows[0]).find("input").attr("value");
			var rec=datatable.getRecord(id);
			$('#location_id').val(id);
			for(var i=0;i<fds.length;i++){
                var val=rec.getColumn(fds[i]).getValue();
				$('#'+fds[i]).val(val);
            }
            var val=rec.getColumn("used").getValue();
            if(val=="used") $('#used').prop('checked', true);
            else $('#used').prop('checked', false);
		}
    }),
    $("#kt_datatable_delete").on("click", function() {
		var rows= datatable.getSelectedRecords();
		var ids=[];
		for(var i=0;i<rows.length;i++){
			var row=rows[i];
			ids[i]=$(row).find("input").attr("value");
		}
		$.get("/deleteLocation",{ids:ids},function(data,status){
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
	locationTable.setDataSourceParam("search",{});
	locationTable.load();
	$('#location_table table').on('click','tr td>span>div',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=locationTable.originalDataSet[index-1];
		console.log(row);
		if(action=="Edit"){
			$("#add_location_btn").hide();
			$("#update_location_btn").fadeIn();
			$("#location_id").val(row.location_id);
			var fds=["metro_name","spec_location","spec_location_child","city_name","state","zip_code","city_code"];
			for(var i=0;i<fds.length;i++){
                var val=row[fds[i]];
				$('#'+fds[i]).val(val);
			}
			if(row.used==1) $('#used').prop('checked', true);
            else $('#used').prop('checked', false);
			$("#modal_location").modal('show');
		}else{
			$.get("/deleteLocation",{id:row.location_id},function(data,status){
				$(".kt-datatable").KTDatatable("reload");
			});
		}
	});
	var category_form = $('#location_form')[0];
	$('#add_modal_btn').on('click',function(){
		category_form.reset();
		$("#modal_location").modal('show');
		$("#add_location_btn").fadeIn();
		$("#update_location_btn").hide();
	});
    $('#add_location_btn').click(function(e) {
		var form = $('#location_form').closest('form');
		form.validate({
			rules: {
				metro_name: {required: true}			
			}
		});
		if (!form.valid()) {
			return;
		}

		form.ajaxSubmit({
            url: '/addLocation',
            method:'GET',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$('#location_form').trigger('reset');
					$("#modal_location").modal('hide');
			   }else{
					toastr.error("Add card failure!");
				}
			}
		});		
	});
    $('#update_location_btn').click(function(e) {
		var form = $('#location_form').closest('form');
		form.validate({
			rules: {
				metro_name: {required: true}
			}
		});
		if (!form.valid()) {
			return;
		}
		
		form.ajaxSubmit({
			url: '/updateLocation',
			method: 'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$("#modal_location").modal('hide');
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
	$("#smetro_name").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search['metro_name']=$("#smetro_name").val();
			search["spec_location"]=$("#sspec_location").val();
			locationTable.setDataSourceParam("search",search);
			locationTable.load();			
		//} 
	});
	$("#sspec_location").on('keyup',function(e){
		var search={};
	//	if(e.keyCode==13){
			search["metro_name"]=$("#smetro_name").val();
			search["spec_location"]=$("#sspec_location").val();
			locationTable.setDataSourceParam("search",search);
			locationTable.load();			
	//	} 
	});
});