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
  var start,end;
var campaignDatatable;
var CampaignTable = function() {
	// Private functions

	// basic demo
	var table = function() {

		 campaignDatatable = $('#campaigntable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getCampaign',
                        method: 'GET',
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
				serverSorting:false,
			},
			layout: {
				scroll: false,
				footer: false,
			},
			pagination: true,
			columns: [
				//{	field: 'campaign_id',title: '',sortable:false,width:0,},
				{	field: 'num',title: 'No',sortable:false,width:40,},
                {	field: 'campaign_name',title: 'Campaign Name',sortable:false,width:120,},
				{	field: 'metro_name',title: 'Metro name',sortable:true,width:100,},
				{
					field: 'Action',
					title: 'Actions',
					sortable: false,
					width: 150,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						//t=JSON.parese(t);
						return '\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'" title="Accounts">\
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
				},
				
				{	field: 'user_id',title: '',width:0,}
              ],

		});
    };

	return {
		// public functions
		init: function() {
			table();
		},
	};
}();

//////////////////////////////////////////////
jQuery(document).ready(function() {
	start=getDate1('2019-05-01'); 
	end=getDate('2019-10-31');
	MoneyCharts.init();
	AdsCharts.init();
	CampaignTable.init();
	sfilter();
	$.get('/getPostCharts',{start:start,end:end},function(data){
		// console.log(data);

		 var json=JSON.parse(data);
		 mchart.dataProvider = JSON.parse(json.posts);
		 mchart.validateData();
		 achart.dataProvider = JSON.parse(json.ads);
		 achart.validateData();
		 var money_bar=JSON.parse(json.money_bar);
		 var ads_bar=JSON.parse(json.posted_ads);
		 //////////////////--------------------------------
		 var m=money_bar[0].value;var a=ads_bar[0].value;
		 if(m==null) m=0;if(a==null) a=0;
		 $("#money_bar").attr("style","width:"+m+"%;");$("#money_label").text(m+"%");$("#money_content").text(m+"$");
		 $("#ads_bar").attr("style","width:"+a+"%;");$("#ads_label").text(a+"%");$("#ads_content").text(a);
	 });
	
	//////////////////////////////////////////////

	var campaign_form = $('#add_campaign_form')[0];
	///////////////////////////campaign row click///////////////////////
	$('#add_modal_btn').on('click',function(){
		campaign_form.reset();
		$("#metro_name").val($("#smetro_name").val());
		$("#campaign_id").val("0");
		$("#modal_campaign").modal('show');
		$("#add_campaign_btn").fadeIn();
		$("#update_campaign_btn").hide();
	});
    $('#campaigntable table').on('click','tr td>span>div',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=campaignDatatable.originalDataSet[index-1];
		if(action=="Accounts"){
			$.get("/setRouteParam",{campaign_id:row.campaign_id,start:start,end:end},function(data,status){
					if(data=="ok"){
						window.location.replace("/accounts?flag=1");
					}
			});
			
		}else if(action=="Edit"){
			$("#campaign_id").val(row.campaign_id);
			$("#campaign_name").val(row.campaign_name);
			$("#metro_name").val(row.metro_name);
			$("#modal_campaign").modal('show');
			$("#add_campaign_btn").hide();
			$("#update_campaign_btn").fadeIn();
		}else{
			$.get("/deleteCampaign",{id:row.campaign_id},function(data,status){
				campaignDatatable.load();
				$("#modal_campaign").modal('hide');
			});
		}
		//console.log(row);
	});
    ///////////////////////add campaign///////////////////////////////////////////////////////////////
    $("#add_campaign_btn").on('click',function(){
        var form = $('#add_campaign_form').closest('form');
        form.validate({
			rules: {
				campaign_name: {
					required: true
				},
				metro_name: {
					required: true
				}
			}
        });
        if (!form.valid()) {
			return;
		}
        form.ajaxSubmit({
			url: '/addCampaign',
			method: 'GET',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
                    campaignDatatable.reload();
                    $("#modal_campaign").modal('hide');
			   }else{
					toastr.error("create failure!");
				}
			}
		});	
	});
	$("#update_campaign_btn").on('click',function(){
        var form = $('#add_campaign_form').closest('form');
        form.validate({
			rules: {
				campaign_name: {
					required: true
				},
				metro_name: {
					required: true
				}
			}
        });
        if (!form.valid()) {
			return;
		}
        form.ajaxSubmit({
			url: '/updateCampaign',
			method: 'GET',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response=="ok"){
                    campaignDatatable.load();
					$("#modal_campaign").modal('hide');
			   }else{
					toastr.error("create failure!");
				}
			}
		});	
	});///////////////////////////////////////////////
	$("#smetro_name").on("change",function(){
		sfilter();
	});
	$('#start').on('change',function(e){
		start=getDate($('#start').datepicker('getDate'));
		end=getDate($('#end').datepicker('getDate'));
		sfilter();
	})
	$('#end').on('change',function(e){
		start=getDate($('#start').datepicker('getDate'));
		end=getDate($('#end').datepicker('getDate'));
		sfilter();
	})

//   $('#search_btn').on('click',function(){
	function sfilter(){
		var search={};
		metro=$("#smetro_name").val();
		search["metro_name"]=metro;
		campaignDatatable.setDataSourceParam("search",search);
		campaignDatatable.load();
		$.get('/getPostCharts',{metro_name:metro,start:start,end:end},function(data){
                var json=JSON.parse(data);
                mchart.dataProvider = JSON.parse(json.posts);
                mchart.validateData();
                achart.dataProvider = JSON.parse(json.ads);
				achart.validateData();
				/////////////////-------------------------------
				var money_bar=JSON.parse(json.money_bar);
				var ads_bar=JSON.parse(json.posted_ads);
				var m=money_bar[0].value;var a=ads_bar[0].value;
				if(m==null) m=0;if(a==null) a=0;
				$("#money_bar").attr("style","width:"+m+"%;");$("#money_label").text(m+"%");$("#money_content").text(m+"$");
				$("#ads_bar").attr("style","width:"+a+"%;");$("#ads_label").text(a+"%");$("#ads_content").text(a);
	   });
	}
    //})

	////////////////////ADD,UPDATE,DELETE///////////////////////////////////////////////
});