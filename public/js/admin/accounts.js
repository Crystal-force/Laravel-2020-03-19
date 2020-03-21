"use strict";
// Class definition
var start,end;
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
var accountDatatable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		accountDatatable = $('#account_table').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getAccounts',
						method: 'GET',
						search:{},
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
				//{	field: 'account_id',title: '',sortable:false,width:0,},
				{	field: 'num',title: 'No',sortable:false,width:40,},
				{  field: "email_id", title: "email",sortable: !0, width: 140,},
				{  field: "metro_name", title: "metro name",sortable: !0, width:100,},
				{  field: "cnt", title: "total ads used",sortable: !1, width:60,},
				{  field: 'pid_date',title: 'Pid Date',	type: 'date',sortable: !0,format: 'MM/DD/YYYY',width:120},
				{  field: 'schedule',title: 'schedule',width:80,
					template:function(row){
						var sel= '<select class="form-control kt-select2" name="schedule">';
						var v="";
						var select="";
						for(var i=0;i<24;i++){
							if(i<10) v="0"+i+":00";
							else v=i+":00";
							select="";
							if(v==row.schedule) select="selected";
							sel+='<option '+select+' value="'+v+'"  id="'+row.account_id+'" title="schedule">'+v+'</option>';
							
						}
						sel+='</select>';
						return sel;
					}			
				},
				{  field: "post_loop", title: "post loop", width:50,sortable: !0,
					template:function(row){
						var sel= '<select class="form-control kt-select2" name="tpost_loop">';
						for(var i=1;i<11;i++){
							if(i==row.post_loop) sel+='<option value="'+i+'" id="'+row.account_id+'" selected  title="post_loop">'+i+'</option>';
							else sel+='<option value="'+i+'" id="'+row.account_id+'" title="post_loop">'+i+'</option>';
						}
						sel+='</select>';
						return sel;
					}
				},
				{  field: "active_ads_cl", title: "active ads cl",sortable: !0, width: 60,},
				{  field: "removed_ads_cl", title: "removed ads cl",sortable: !0, width:70,},
				
				{
					field: 'post_trigger',
					title: 'post trigger',
					width:60,
					// callback function support for column rendering
					template: function(row) {
						var check="";
						if(row.post_trigger>0) check='checked="true"';
						return '<span class="kt-switch kt-switch kt-switch--icon">\
									<label>\
										<input type="checkbox" '+check+' >\
										<span title="post_trigger" value="'+row.num+'"></span>\
									</label>\
								</span>';
					},
				},
				{
					field: 'auto_post',
					title: 'auto post',
					sortable: true,
					width: 50,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						var check="";
						if(t.auto_post>0) check='checked="true"';

						return '<span class="kt-switch kt-switch kt-switch--icon">\
									<label>\
										<input type="checkbox" '+check+' >\
										<span title="auto_post" value="'+t.num+'"></span>\
									</label>\
								</span>';
					}
				},
				{
					field: 'active',
					title: 'Active',
					sortable: true,
					width: 50,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						var check="";
						if(t.active>0) check='checked="true"';

						return '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--danger">\
									<label>\
										<input type="checkbox" '+check+' >\
										<span title="active" value="'+t.num+'"></span>\
									</label>\
								</span>';
					}
				},
				{  field: "notes", title: "notes",sortable: !1, width: 100,},
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					width: 200,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						//t=JSON.parese(t);
						return '\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'" title="ADS">\
							<i class="la la-user"></i>\
						</div>\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'"  title="Edit">\
							<i class="la la-edit"></i>\
						</div>\
						<div href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'" title="Delete">\
							<i class="la la-trash"></i>\
						</div>\
					';
					},
				},{  field: 'renew_date',title: 'Renew Date',	type: 'date',format: 'MM/DD/YYYY',width:120}
				],

		});
    $("#kt_datatable_delete").on("click", function() {
		var rows= datatable.getSelectedRecords();
		var ids=[];
		for(var i=0;i<rows.length;i++){
			var row=rows[i];
			ids[i]=$(row).find("input").attr("value");
		}
		$.get("/deleteAccount",{ids:ids},function(data,status){
			//$(".kt-datatable").KTDatatable("reload");
			search();
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
	start=getDate1('2019-06-01'); 
	end=getDate('2019-10-30');
	var fds=["account_id","campaign_id","post_loop","schedule","metro_name","email_id","email_password","phone_number","fist_name","last_name","account_street","account_city","account_state","account_zipcode","gender","b_day","card_id"];
	var schecks=["scraigslist","scraigslist_pay","sofferup","sofferup_pay","sletgo_pay","sletgo","sfbmarket","sfbmarket_pay"];
	var checks=["craigslist","craigslist_pay","offerup","offerup_pay","letgo_pay","letgo","fbmarket","fbmarket_pay","active"];
	var chart_scheks=["scraigslist","scraigslist_pay","sletgo_pay","sletgo","sfbmarket","sfbmarket_pay"];
	var chart_cheks=["craigslist","craigslist_pay","letgo_pay","letgo","fbmarket","fbmarket_pay"];
	MoneyCharts.init();
	AdsCharts.init();
	if(flag>0) {
		$("#campaign_id").val(routing_campaign_id);
		$("#scampaign").val(routing_campaign_id);
		start=routing_start;end=routing_end;
		if(start!="2019-4-1"){
			$('#start').datepicker('setDate',start);
			$('#end').datepicker('setDate',end);
		}
	//	$("#start").val(routing_start);
		//$("#end").val(routing_end);
		search();
	 }else{
		search();
	 }
	$('#account_table table').on('change','tr td>span>select',function (e) {
		
		var index=e.currentTarget.selectedIndex;
		var opt=e.currentTarget.options[index];
		var data={};
		console.log(opt);
		data["account_id"]=opt.id;
		if(opt.title=="post_loop"){
			data["post_loop"]=opt.value;
		}else if(opt.title=="schedule"){
			data["schedule"]=opt.value;
		}
		$.get("/updateAccountCell",{data:data},function(){
			accountDatatable.load();
		});	
	});
	$('#account_table table').on('click','tr td>span>span>label>span',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=accountDatatable.originalDataSet[index-1];
		console.log(row);
		var data={};
		if(action=="post_trigger"){
			data["post_trigger"]=(row.post_trigger==0)?1:0;
		}else if(action=="active"){
			data["active"]=(row.active==0)?1:0;
			

		}else if(action=="auto_post"){
			data["auto_post"]=(row.auto_post==0)?1:0;
		}
		data["account_id"]=row.account_id;
		$.get("/updateAccountCell",{data:data},function(){
			//accountDatatable.load();
			search();
		});	
	});
	$('#account_table table').on('click','tr td>span>label>span',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=accountDatatable.originalDataSet[index-1];
		console.log(row);
		var data={};
		if(action=="active"){
			data["active"]=(row.active==0)?1:0;
			

		}else if(action=="auto_post"){
			data["auto_post"]=(row.auto_post==0)?1:0;
		}
		data["account_id"]=row.account_id;
		$.get("/updateAccountCell",{data:data},function(){
			//accountDatatable.load();
			search();
		});
	});

	var a=$('#b_day').datepicker({
		rtl: KTUtil.isRTL(),
		todayHighlight: true,
		format:'yyyy-mm-dd',
		orientation: "bottom left"
	});
	function search(){
		var campaign_id=$("#scampaign").val();
		var search={};
		for(var i=0;i<schecks.length;i++){
			var v=$("#"+schecks[i]).prop('checked');
			if(v){
				search[checks[i]]=1;
			}
		}
		search["campaign_id"]=campaign_id;
		//search["start"]=start;search["end"]=end;
		accountDatatable.setDataSourceParam("search",search);
		accountDatatable.load();
		
		/////////////////////////////////////chart bar
		var filter={};
		for(var i=0;i<chart_scheks.length;i++){
			var v=$("#"+chart_scheks[i]).prop('checked');
			if(v){
				filter[chart_cheks[i]]=1;
			}
		}
		$.get('/getPostCharts',{start:start,end:end,campaign_id:campaign_id,filter:filter},function(data){
                var json=JSON.parse(data);
                mchart.dataProvider = JSON.parse(json.posts);
                mchart.validateData();
                achart.dataProvider = JSON.parse(json.ads);
				achart.validateData();
				/////////////////-------------------------------
				var money_bar=JSON.parse(json.money_bar);
				var ads_bar=JSON.parse(json.posted_ads);
				var active_account=JSON.parse(json.active_account);
				var hold_account=JSON.parse(json.hold_account);
				var m=money_bar[0].value;var a=ads_bar[0].value;
				var act=active_account[0].value,hold=hold_account[0].value;
				if(m==null) m=0;if(a==null) a=0;if(act==null) act=0;if(hold==null) hold=0;
				$("#money_bar").attr("style","width:"+m+"%;");$("#money_label").text(m+"%");$("#money_value").text(m+"$");
				$("#ads_bar").attr("style","width:"+a+"%;");$("#ads_label").text(a+"%");$("#ads_value").text(a);
				$("#account_bar").attr("style","width:"+act+"%;");$("#account_label").text(act+"%");$("#account_value").text(act);
				$("#haccount_bar").attr("style","width:"+hold+"%;");$("#haccount_label").text(hold+"%");$("#haccount_value").text(hold);
	   });
	}
    //})
	 ////////////////////////////////////////////////////////////////////////////
	 $("#scampaign").on("change",function(){
		search();
		var campaignid=$('#scampaign').val();
		//if(campaignid){
			$.get('/getLocations',{campaignid:campaignid},function(data,status){
				
					var rows=JSON.parse(data);
					var html="";
					if(rows.length>0){
						for(var i=0;i<rows.length;i++){
							var row=rows[i];
							html+="<option value='"+row.metro_name+"'>"+row.metro_name+"</option>";
						}
					}else html="<option></option>";
					$('#metro_name').html(html);
			});

	 });
	 $("#campaign_id").on("change",function(){
		var campaignid=$('#campaign_id').val();
        $.get('/getLocations',{campaignid:campaignid},function(data,status){
            
                var rows=JSON.parse(data);
                var html="";
                if(rows.length>0){
                    for(var i=0;i<rows.length;i++){
                        var row=rows[i];
                        html+="<option value='"+row.metro_name+"'>"+row.metro_name+"</option>";
                    }
                }else html="<option></option>";
                $('#metro_name').html(html);
        });
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
	for(var i=0;i<schecks.length;i++){
		$("#"+schecks[i]).on("click",function(){
			search();
		});
	}
	var account_form = $('#account_form')[0];
	///////////////////////////campaign row click///////////////////////

		$('#add_modal_btn').on('click',function(){
			account_form.reset();
			$("#account_id").val("0");
			//$("#campaign_id").val(routing_campaign_id);
			$("#campaign_id").val( $("#scampaign").val());
			$("#modal_account").modal('show');
			$("#add_account_btn").fadeIn();
			$("#update_account_btn").hide();
		});
		//////////////////********************************* */
		$('#account_table table').on('click','tr td>span>div',function (e) {//////////////////////////////////////////////////////
			var action=e.currentTarget.attributes.title.value;
			var index=e.currentTarget.attributes.value.value;
			var row=accountDatatable.originalDataSet[index-1];
			var sdate=$("#start").val();
			//console.log(sdate);
			
			if(action=="ADS"){
				if(sdate==null || sdate=="") {start="";end="";}
				$.get("/setRouteParam",{account_id:row.account_id,campaign_id:row.campaign_id,start:start,end:end},function(data,status){
						if(data=="ok"){
							window.location.replace("/ads?flag=1");
						}
				});
				
			}else if(action=="Edit"){
				$("#add_account_btn").hide();
				$("#update_account_btn").fadeIn();
				for(var i=0;i<fds.length;i++){
					$('#'+fds[i]).val(row[fds[i]]);
				}
				for(var i=0;i<checks.length;i++){
					if(row[checks[i]]==1) $('#'+checks[i]).prop('checked', true);
					else $('#'+checks[i]).prop('checked', false);
				}
				if(row["post_trigger"]==1) $("#post_trigger").prop('checked', true);
				else $("#post_trigger").prop('checked', false);

				if(row["auto_post"]==1) $("#auto_post").prop('checked', true);
				else $("#auto_post").prop('checked', false);

				$("#modal_account").modal('show');
			}else{
				$.get("/deleteAccount",{id:row.account_id},function(data,status){
					//accountDatatable.load();
					search();
				});
			}
			//console.log(row);
		});	 

	 /////////////////////////////////////////////////////////////////////////////
    $('#add_account_btn').click(function(e) {
		var form = $('#account_form').closest('form');
		form.validate({
			rules: {
				user_id: {
					required: true
				},
				campaign_id: {
					required: true
				},	
				phone_number: {
					required: true,

				},
				email_password: {
					required: true
				},

				account_city: {
					required: true
				},
				email_id: {
					required: true,
					email: true
				}
			}
		});
		var pnum=$('#phone_number').val();
		var regex=/^([0-9]{3})+\-([0-9]{3})+\-([0-9]{4})$/;
		if(!pnum.match(regex)){
			$('#phone_number').after('<span style="color:red;">***-***-****</span>');
			return;
		}
		if (!form.valid()) {
			return;
		}

		form.ajaxSubmit({
			url: '/addAccount',
			method: 'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$('#account_form').trigger('reset');
					$("#modal_account").modal('hide');
			   }else{
					toastr.error("create failure!");
				}
			}
		});		
	});
    $('#update_account_btn').click(function(e) {
		if($("#account_id").val()<1){
			toastr.error("After add,please update!");return;
		}
		var form = $('#account_form').closest('form');
		form.validate({
			rules: {
				account_id: {
					required: true
				},
				email_id: {
					required: true,
					email: true
				}
			}
		});
		if (!form.valid()) {
			return;
		}
		
		form.ajaxSubmit({
			url: '/updateAccount',
			method: 'POST',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
					$(".kt-datatable").KTDatatable("reload");
					$("#modal_account").modal('hide');
			   }else{
					toastr.error("update error!");
			   }
			}
		});	
	});
	$('#reset_btn').click(function(e) {
		var form = $('#account_form')[0];
		form.reset();
		$("#profile_img").val("");
	});
	$("#today").on("click",function(){
		$('#datefilter #start').datepicker('setDate', today);
		$('#datefilter #end').datepicker('setDate', today);
		
	});
	$("#week").on("click",function(){
		$('#datefilter #start').datepicker('setDate', wstart);
		$('#datefilter #end').datepicker('setDate', today);
	});
	$("#month").on("click",function(){
		$('#datefilter #start').datepicker('setDate', predate);
		$('#datefilter #end').datepicker('setDate', today);
	});
});