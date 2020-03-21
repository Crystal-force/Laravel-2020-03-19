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
  var cardDatatable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		cardDatatable = $('.kt-datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getCard',
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
                {   field: 'f_name',title:'first name',width:80,sortable: !0,},
				{	field: 'l_name',title: 'last name',width:60,sortable: !0,},
                {   field: 'c_number',title:'card number',width:60,sortable: !0,},
                {	field: 'c_sec',title: 'c_sec',width:60,sortable: !0,}, 
                {   field: 'c_month',title:'c_month',width:60,sortable: !0,},
                {	field: 'c_year',title: 'c_year',width:60,sortable: !0,},
                {   field: 'c_address',title:'c_address',width:140,sortable: !0,},
                {   field: 'c_city',title:'c_city',width:100,sortable: !0,},
                {   field: 'c_state',title:'c_state',sortable: !0,},
                {   field: 'c_zip',title:'c_zip',sortable: !0,},
               /// {   field: 'balance',title:'balance',},
				//{   field: 'daily_limit',title:'daily_limit',},
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
				}/*,
				{
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
				}*/],

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
	cardDatatable.setDataSourceParam("search",{});
	cardDatatable.load();	
	$('#card_datatable table').on('click','tr td>span>div',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=cardDatatable.originalDataSet[index-1];
		if(action=="Edit"){
			$("#add_card_btn").hide();
			$("#update_card_btn").fadeIn();
			$("#card_id").val(row.card_id);
			var fds=["f_name","l_name","c_number","c_sec","c_month","c_year","c_address","c_city","c_state","c_zip","balance","daily_limit"];
			for(var i=0;i<fds.length;i++){
                var val=row[fds[i]];
				$('#'+fds[i]).val(val);
			}
			if(row["active"]==1) $("#active").prop("checked",true);
			else $("#active").prop("checked",false);
			$("#modal_card").modal('show');
		}else{
			$.get("/deleteCard",{id:row.card_id},function(data,status){
				$(".kt-datatable").KTDatatable("reload");
			});
		}
	});
	var card_form = $('#card_form')[0];
	$('#add_modal_btn').on('click',function(){
		card_form.reset();
		$("#modal_card").modal('show');
		$("#add_card_btn").fadeIn();
		$("#update_update_btn").hide();
	});
    $('#add_card_btn').click(function(e) {
		var form = $('#card_form').closest('form');
		form.validate({
			rules: {
				c_number: {required: true}			
			}
		});
		if (!form.valid()) {
			return;
		}

		form.ajaxSubmit({
            url: '/addCard',
            method:'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$('#card_form').trigger('reset');
					$("#modal_card").modal('hide');
			   }else{
					toastr.error("Add card failure!");
				}
			}
		});		
	});
    $('#update_card_btn').click(function(e) {
		if($("#account_id").val()<1){
			toastr.error("After add,please update!");return;
		}
		var form = $('#card_form').closest('form');
		form.validate({
			rules: {
				c_number: {required: true}
			}
		});
		if (!form.valid()) {
			return;
		}
		
		form.ajaxSubmit({
			url: '/updateCard',
			method: 'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$('#card_form').trigger('reset');
					$("#modal_card").modal('hide');
			   }else{
					toastr.error("update error!");
			   }
			}
		});	
	});
	$('#reset_btn').click(function(e) {
		var form = $('#card_form')[0];
		form.reset();
	});
	$("#sfist_name").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search["sfist_name"]=$("#sfist_name").val();
			search["card_number"]=$("#card_number").val();
			cardDatatable.setDataSourceParam("search",search);
			cardDatatable.load();			
		//} 
	});
	$("#card_number").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search["sfist_name"]=$("#sfist_name").val();
			search["card_number"]=$("#card_number").val();
			cardDatatable.setDataSourceParam("search",search);
			cardDatatable.load();			
		//} 
	});
});