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
  var postDatatable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		postDatatable = $('.kt-datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getPost',
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
				{	field: 'post_id',title: '',width:0},
				{	field: 'num',title: 'No',width:40},
				{	field: 'category_name',title: 'Category',width:70,sortable: !0},
				{	field: 'city_name',title: 'City',width:100},
                {	field: 'title',title: 'title',width:310,sortable: !0},
                {	field: 'pid',title: 'pid',width:120},
              	 {field: 'pid_date',title: 'pid date',type: 'date',sortable: !0,format: 'MM/DD/YYYY',width:120},
				{	field: 'link_url',title: 'link_url',width:420}
                ],

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
	var start=getDate1('2019-06-01'); 
	var end=getDate('2019-10-30');
	if(flag>0) {
		console.log(flag);
		console.log(routing_campaign_id);
		$("#scampaign").val(routing_campaign_id);
		if(routing_start){
			start=routing_start;end=routing_end;
			if(start!="2019-4-1"){
				$('#start').datepicker('setDate',start);
				$('#end').datepicker('setDate',end);
			}
		}
		$.get('/getSelAccounts',{campaignid:routing_campaign_id},function(data,status){
			var rows=JSON.parse(data);
			var html="<option></option>";
			for(var i=0;i<rows.length;i++){
				var row=rows[i];
				html+="<option value='"+row.account_id+"'>"+row.email_id+"</option>";
			}
			$('#saccount_id').html(html);
			$("#saccount_id").val(routing_account_id);
			$.get('/getSelAds',{campaignid:routing_campaign_id,account_id:routing_account_id},function(data,status){
					var rows=JSON.parse(data);
					var html="<option></option>";
					for(var i=0;i<rows.length;i++){
						var row=rows[i];
						html+="<option value='"+row.ad_id+"'>"+row.title+"</option>";
					}
					$('#sads_id').html(html);
					$("#sads_id").val(routing_ad_id);
					search();
			});
		});
		
	}else{
		search();
	 }
	/*$.get('/getPostCharts',{start:start,end:end},function(data){
		//////////////////--------------------------------
		var json=JSON.parse(data);
		var flaged_ads=JSON.parse(json.flaged_ads);
		var posted_ads=JSON.parse(json.posted_ads);
		var m=flaged_ads[0].value;var a=posted_ads[0].value;
		if(m==null) m=0;if(a==null) a=0;
		$("#ads_flag_bar").attr("style","width:"+m+"%;");$("#ads_flag_label").text(m+"%");$("#ads_flag_value").text(m);
		$("#ads_bar").attr("style","width:"+a+"%;");$("#ads_label").text(a+"%");$("#ads_value").text(a);
	});*/

	$("#scampaign").on("change",function(){
		var campaignid=$('#scampaign').val();
        $.get('/getSelAccounts',{campaignid:campaignid},function(data,status){
                var rows=JSON.parse(data);
                var html="<option></option>";
                for(var i=0;i<rows.length;i++){
                    var row=rows[i];
                    html+="<option value='"+row.account_id+"'>"+row.email_id+"</option>";
                }
				$('#saccount_id').html(html);
				search();
        });
	});
	$("#saccount_id").on("change",function(){
		var campaignid=$('#scampaign').val();
		var accountid=$('#saccount_id').val();
        $.get('/getSelAds',{campaignid:campaignid,account_id:accountid},function(data,status){
                var rows=JSON.parse(data);
                var html="<option></option>";
                for(var i=0;i<rows.length;i++){
                    var row=rows[i];
                    html+="<option value='"+row.ad_id+"'>"+row.title+"</option>";
                }
				$('#sads_id').html(html);
				search();
        });
	});
	$("#sads_id").on("change",function(){
		search();
	});
	$('#start').on('change',function(e){
		start=getDate($('#start').datepicker('getDate'));
		end=getDate($('#end').datepicker('getDate'));
		search();
	})
	$('#end').on('change',function(e){
		start=getDate($('#start').datepicker('getDate'));
		end=getDate($('#end').datepicker('getDate'));
		search();
	})
	//$('#search_btn').on('click',function(){
	function search(){
		var campaign_id=$("#scampaign").val();
		var search={};
		search["campaign_id"]=campaign_id;
		search["account_id"]=$("#saccount_id").val();
		var account_id=$("#saccount_id").val();
		search["sads_id"]=$("#sads_id").val();
		search["start"]=start;search["end"]=end;
		postDatatable.setDataSourceParam("search",search);
		postDatatable.load();
		$.get('/getPostCharts',{start:start,end:end,campaign_id:campaign_id,account_id:account_id,ad_id:$("#sads_id").val()},function(data){
				var json=JSON.parse(data);
				var flaged_ads=JSON.parse(json.flaged_ads);
				var posted_ads=JSON.parse(json.posted_ads);
				var m=flaged_ads[0].value;var a=posted_ads[0].value;
				if(m==null) m=0;if(a==null) a=0;
				$("#ads_flag_bar").attr("style","width:"+m+"%;");$("#ads_flag_label").text(m+"%");$("#ads_flag_value").text(m);
				$("#ads_bar").attr("style","width:"+a+"%;");$("#ads_label").text(a+"%");$("#ads_value").text(a);
	   });
	}
	//})

});