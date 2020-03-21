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
  var callsDatatable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		callsDatatable = $('.kt-datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getCall',
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
                {
                    field: "call_id",
                    title: "#",
                    sortable: !1,
                    width: 30,
                    type: "number",
                    selector: {
                        class: "kt-checkbox--solid",
                        //id:'selid'
                    },
                    textAlign: "center"
                } ,
                {	field: 'caller_id',title: 'caller_id',sortable: !0,width:100},
                {	field: 'called_to',title: 'called_to',sortable: !0,width:100},
                {field: 'call_date',title: 'call date',sortable: !0,type: 'date',format: 'MM/DD/YYYY',},
				{	field: 'recored_url',title: 'recored_url',sortable: !0,},
				{	field: 'phone_number_tag',title: 'phone_number_tag',sortable: !0,},
				{	field: 'answered_by',title: 'answered_by',sortable: !0,},
				{	field: 'duration',title: 'duration',sortable: !0,}/*,
				{
					field: 'active',
					title: 'Active',
					sortable: false,
					width: 50,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						return '\
							<label class="kt-checkbox kt-checkbox--danger" style="padding-left:16px;margin-bottom: 21px;" >\
								<input type="checkbox" checked="true" disabled=”disabled”>\
								<span></span>\
							</label>\ ';
					}
				},
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					width: 200,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						return '\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="1" title="POSTS">\
							<i class="la la-edit"></i>\
						</div>\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="e44"  title="Edit">\
							<i class="la la-edit"></i>\
						</div>\
						<div href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" value="del44" title="Delete">\
							<i class="la la-trash"></i>\
						</div>\
					';
					},
				}*/
                ],

		});
    $("#kt_datatable_reload").on("click", function() {
		//datatable.reload();
		var called_to=$('#called_to').val();
        var phone_number_tag=$('#phone_number_tag').val();
        var answered_by=$('#answered_by').val();
		callsDatatable.setDataSourceParam("search",{called_to:called_to,phone_number_tag:phone_number_tag,answered_by:answered_by});
		callsDatatable.load();
    }),
    $('#kt_form_status').on('change', function() {
		callsDatatable.search($(this).val().toLowerCase(), 'Status');
    });

    $('#kt_form_type').on('change', function() {
		callsDatatable.search($(this).val().toLowerCase(), 'Type');
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
	AdsCharts.init();

	var start=getDate1('2019-07-01'); 
	var end=getDate('2019-11-25');	
	search11();

    $('#calls_datatable table').on('click','td>span>div',function (e,r) {
		var value=e.currentTarget.attributes.value.value;
		var row = callsDatatable.row(this).dataSet[value];
		console.log(row);
		//var row = callsDatatable.row(this).dataSet[rindex];td>span>div'
	});
	function search11(){
		var search={};
		search["called_to"]=$("#called_to").val();
		search["phone_number_tag"]=$("#phone_number_tag").val();
		search["answered_by"]=$("#answered_by").val();
		search["start"]=start;search["end"]=end;
		callsDatatable.setDataSourceParam("search",search);
		callsDatatable.load();
		search["start"]=start;search["end"]=end;
		$.get('/getCallCharts',{search:search},function(data){
			var json=JSON.parse(data);
			var calls=JSON.parse(json.calls);
			var calls30=JSON.parse(json.calls30);
			achart.dataProvider = JSON.parse(json.calls30);
			achart.validateData();
			var m=0,a=0;
			if(calls.length>0 ) m=calls[0].value;
			if(calls30.length>0) a=calls30[0].value;
			if(m==null) m=0;if(a==null) a=0;
			$("#calls_bar").attr("style","width:"+m+"%;");$("#calls_label").text(m+"%");$("#calls_value").text(m);
			//$("#calls30_bar").attr("style","width:"+a+"%;");$("#calls30_label").text(a+"%");$("#calls30_value").text(a);
   });	
	}
	$('#start').on('change',function(e){
		start=getDate($('#start').datepicker('getDate'));
		end=getDate($('#end').datepicker('getDate'));
		search11();
	});
	$('#end').on('change',function(e){
		start=getDate($('#start').datepicker('getDate'));
		end=getDate($('#end').datepicker('getDate'));
		search11();
	});
	$("#called_to").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search11();		
		//} 
	});
	$("#phone_number_tag").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search11();		
		//} 
	});
	$("#answered_by").on('keyup',function(e){
		var search={};
		//if(e.keyCode==13){
			search11();
		//} 
	});


});