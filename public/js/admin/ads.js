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
  "use strict";
  // Class definition
///////////////////////////////////////////////////////////////
"use strict";
// Class definition
var myDropzone;
var totol_images_cnt=24;
//KTDropzoneDemo.init();
//////////////////////////////////////////////////////////////
var adsDatatable;
var KTDatatableRemoteAjaxDemo = function() {
	// Private functions

	// basic demo
	var demo = function() {

		adsDatatable = $('#ads_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getAds',
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
			//	{	field: 'ad_id',title:"",width:0},
				{	field: 'num',title: 'no',sortable:false,width:40},
				{	field: 'title',title: 'Title',width:400,sortable: !0},
				{  field: 'pid_date',title: 'Pid Date',	type: 'date',format: 'MM/DD/YYYY',width:150,sortable: !0},
				//{  field: 'schedule',title: 'shedule',	type: 'date',format: 'MM/DD/YYYY',width:120,},
				//{	field: 'shuffle_zip_code',title: 'shuffle zipcode',width:150},
			//	{	field: 'shuffle_sub_category',title: 'shuffle sub category',width:160,},
				/*{
					field: 'shuffle_zip_code',
					title: 'Shuffle zipcode',
					sortable: false,
					width: 100,
					autoHide: false,
					overflow: 'visible',
					template: function(t) {
						var check="";
						if(t.shuffle_zip_code>0) check='checked="true"';

						return '\
							<label class="kt-checkbox kt-checkbox--success" style="padding-left:16px;margin-bottom: 21px;" >\
								<input type="checkbox" '+check+'>\
								<span title="zip_code" value="'+t.num+'"></span>\
							</label>\ ';
					}
				},*/
				{
					field: 'shuffle_zip_code',
					title: 'shuffle zip code',
					width:60,
					// callback function support for column rendering
					template: function(row) {
						var check="";
						if(row.shuffle_zip_code>0) check='checked="true"';
						return '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--brand">\
									<label>\
										<input type="checkbox" '+check+' >\
										<span title="zip_code" value="'+row.num+'"></span>\
									</label>\
								</span>';
					},
				},
				{
					field: 'shuffle_sub_category',
					title: 'shuffle sub category',
					width:60,
					// callback function support for column rendering
					template: function(row) {
						var check="";
						if(row.shuffle_sub_category>0) check='checked="true"';
						return '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--brand">\
									<label>\
										<input type="checkbox" '+check+' >\
										<span title="category" value="'+row.num+'"></span>\
									</label>\
								</span>';
					},
				},
				{
					field: 'active',
					title: 'Active',
					width:60,
					// callback function support for column rendering
					template: function(row) {
						var check="";
						if(row.active>0) check='checked="true"';
						return '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--danger">\
									<label>\
										<input type="checkbox" '+check+' >\
										<span title="active" value="'+row.num+'"></span>\
									</label>\
								</span>';
					},
				},				
				
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
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'" title="POSTS">\
							<i class="la la-user"></i>\
						</div>\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'"  title="Edit">\
							<i class="la la-edit"></i>\
						</div>\
						<div class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'"  title="Image">\
							<i class="la la-file-image-o"></i>\
						</div>\
						<div href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" value="'+t.num+'" title="Delete">\
							<i class="la la-trash"></i>\
						</div>\
					';
					},
				},

				{	field: 'user_id',title: '',width:0},
				{	field: 'campaign_id',title: '',width:0},
				{	field: 'account_id',title: '',width:0},
				],

		});
    $("#kt_datatable_reload").on("click", function() {
		//datatable.reload();
		//var semail=$('#semail').val();
		//var sname=$('#sname').val();
		//datatable.setDataSourceParam("search",{user_name:sname,user_email:semail});
		datatable.load();
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
	////////////////////////////////////////////////
	
	function makeDropZone(){
		var dropzone = new Dropzone("div#myFile", { 
			url: "/uploadFiles",
		//	maxFiles: 4,
			maxFilesize: 100, // MB
			addRemoveLinks: true,
			autoProcessQueue: false,
			parallelUploads:24,
			uploadMultiple:true,
			init: function(e) {
				this.on("sending", function (file, xhr, formData) {
					formData.append("ad_id", $("#ad_id").val());
				});
				this.on("success", function(file, response) {
					//adsDatatable.load();
			
				});
				
			},
			removedfile: function(file) {
				var name = file.name; 
				var ad_id=$("#ad_id").val();       
				$.get('/deleteImages',{image_url:name,ad_id:ad_id},function(){
				});
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;  
			},
			accept: function(file, done) {
				if (file.name == "justinbieber.jpg") {
					done("Naha, you don't.");
				} else { 
					done(); 
				}
			}
		});
		return dropzone;
	}
	var myDropzone=makeDropZone();
	/////////////////////////////////////////////////////
	KTDatatableRemoteAjaxDemo.init();
	var start=getDate1('2019-07-01'); 
	var end=getDate('2019-10-30');	
	var schecks=["scraigslist","scraigslist_pay","sofferup","sofferup_pay","sletgo_pay","sletgo","sfbmarket","sfbmarket_pay"];
	var checks1=["craigslist","craigslist_pay","offerup","offerup_pay","letgo_pay","letgo","fbmarket","fbmarket_pay","active"];
	var chart_scheks=["scraigslist","scraigslist_pay","offerup","offerup_pay","sletgo_pay","sletgo","sfbmarket","sfbmarket_pay"];
	var chart_cheks=["craigslist","craigslist_pay","offerup","offerup_pay","letgo_pay","letgo","fbmarket","fbmarket_pay"];
	var fds=["campaign_id","metro_name","account_id","shuffle_zip_code","shuffle_sub_category","category_name","sub_category_name","keyword","spec_location","spec_location_child",
	"city_name","state","zip_code","title","description","spec_city_name","price","street","cross_street","phone","housing_type","laundry_type","parking_type","bathrooms_type","bedrooms_type","squareft",
	"company_name","fee_disclosure","make","model","size","sell_condition","license","cl_load_url","cl_check_url"];
	var checks=["craigslist_pay","offerup_pay","letgo_pay","fbmarket_pay","craigslist","offerup","letgo","fbmarket","cats","dogs","furnished","no_smoking","wheelchair","active"];
	
	if(flag>0) {
		$("#campaign_id").val(routing_campaign_id);
		$("#scampaign").val(routing_campaign_id);
		$("#saccount_id").val(routing_account_id);
		$("#account_id").val(routing_account_id);
		if(routing_start){
			start=routing_start;end=routing_end;
			if(start!="2019-4-1"){
				$('#start').datepicker('setDate',start);
				$('#end').datepicker('setDate',end);
			}
		}
		var campaignid=routing_campaign_id;
		$.get('/getSelAccounts',{campaignid:campaignid},function(data,status){
			var rows=JSON.parse(data);
			var html="<option></option>";
			for(var i=0;i<rows.length;i++){
				var row=rows[i];
				html+="<option value='"+row.account_id+"'>"+row.email_id+"</option>";
			}
			$('#saccount_id').html(html);
			$("#saccount_id").val(routing_account_id);
		});
		$.get('/getSelAccounts',{campaignid:campaignid},function(data,status){
			var rows=JSON.parse(data);
			var html="<option></option>";
			for(var i=0;i<rows.length;i++){
				var row=rows[i];
				html+="<option value='"+row.account_id+"'>"+row.email_id+"</option>";
			}
			$('#account_id').html(html);
			$("#account_id").val(routing_account_id);
		});
		search();
	 }else{
		search();
	 }	

		/////////////////////////////// filter event ////////////////////////////////////////////////////
	$('#ads_datatable table').on('click','tr td>span>span>label>span',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=adsDatatable.originalDataSet[index-1];
		var data={};
		console.log(action);
		if(action=="active"){
			data["active"]=(row.active==0)?1:0;
		}else if(action=="zip_code"){
			data["shuffle_zip_code"]=(row.shuffle_zip_code==0)?1:0;
		}else if(action=="category"){
			data["shuffle_sub_category"]=(row.shuffle_sub_category==0)?1:0;
		}
		data["ad_id"]=row.ad_id;
		$.post("/updateAdsCell",{data:data},function(){
			adsDatatable.load();
			search();
		});
	});
	//////////////select box events/////////////////////////////////
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
		search();
		var campaignid=$('#scampaign').val();
		$.get('/getSelAccounts',{campaignid:campaignid},function(data,status){
			var rows=JSON.parse(data);
			var html="<option></option>";
			for(var i=0;i<rows.length;i++){
				var row=rows[i];
				html+="<option value='"+row.account_id+"'>"+row.email_id+"</option>";
			}
			$('#account_id').html(html);
		});
	});
	$("#campaign_id").on("change",function(){
		var campaignid=$('#campaign_id').val();
		if(campaignid){
			setSelectTag();
		}else{
			emptyTag();
		}
	});
	function setSelectTag(){
		//$.ajaxSetup({async:false});
		setMetro();
		setAccount();
		//setSpecLocation();
	//	setChildLocation();
	//	setCityName();
	//	setState();
	//	setZipCode();
	};
	$("#metro_name").on("change",function(){
		setSpecLocation();
		//setChildLocation();
		//setCityName();
	//	setState();
	//	setZipCode();
	});
	$("#spec_location").on("change",function(){
		setChildLocation();
		setCityName();
		setState();
		setZipCode();
	});
	$("#spec_location_child").on("change",function(){
		setCityName();
		setZipCode();
	});

	///////////////////////////////////////////////////////////////////////
					function emptyTag(){
						$("#metro_name").val("");
						$("#account_id").val("");
						$("#spec_location").val("");
						$("#spec_location_child").val("");	
						$("#state").val("");
						$("#city_name").val("");
						$("#zip_code").val("");	
					};
					function setAccount(){
						var campaignid=$('#campaign_id').val();
						$.get('/getSelAccounts',{campaignid:campaignid},function(data,status){
							var rows=JSON.parse(data);
							var html="<option></option>";
							for(var i=0;i<rows.length;i++){
								var row=rows[i];
								html+="<option value='"+row.account_id+"'>"+row.email_id+"</option>";
							}
							$('#account_id').html(html);
						});
					}
					function setMetro(){
						var campaignid=$('#campaign_id').val();
						$.get('/getLocations',{campaignid:campaignid},function(data,status){
								var rows=JSON.parse(data);
								var html="<option></option>";
								for(var i=0;i<rows.length;i++){
									var row=rows[i];
									html+="<option value='"+row.metro_name+"'>"+row.metro_name+"</option>";
								}
								$('#metro_name').html(html);
						});
					}
					function setSpecLocation(){
						var metro_name=$("#metro_name").val();
						$.get('/getSpecLocations',{metro_name:metro_name},function(data,status){
							var rows=JSON.parse(data);
							var html="<option></option>";
							for(var i=0;i<rows.length;i++){
								var row=rows[i];
								html+="<option value='"+row.spec_location+"'>"+row.spec_location+"</option>";
							}
							$('#spec_location').html(html);
						});	
					}
					function setChildLocation(){
						var slocation=$('#spec_location').val();
						
						$.get('/getChildLocations' ,{slocation:slocation},function(data,status){
								var datas=JSON.parse(data);
								var html="<option></option>";
								console.log(datas);
								var rows=datas.spec;
								for(var i=0;i<rows.length;i++){
									var row=rows[i];
									if(row.name=="") continue;
									html+="<option value='"+row.name+"'>"+row.name+"</option>";
								}
								$('#spec_location_child').html(html);
							});
						}
					function setState(){
						var slocation=$('#spec_location').val();
						$.get('/getSelState',{spec_location:slocation},function(data,status){
							var rows=JSON.parse(data);
							var html="<option></option>";
							for(var i=0;i<rows.length;i++){
								var row=rows[i];
								html+="<option value='"+row.name+"'>"+row.name+"</option>";
							}
							$('#state').html(html);
						});
					}
					function setCityName(){
						var slocation=$('#spec_location').val();
						var childlocation=$('#spec_location_child').val();
						$.get('/getCityName',{spec_location:slocation,spec_location_child:childlocation},function(data,status){
							var rows=JSON.parse(data);
							var html="<option></option>";
							for(var i=0;i<rows.length;i++){
								var row=rows[i];
								html+="<option value='"+row.name+"'>"+row.name+"</option>";
							}
							$('#city_name').html(html);
						});
					}
					function setZipCode(){
						var slocation=$('#spec_location').val();
						var childlocation=$('#spec_location_child').val();
						$.get('/getZipCode',{spec_location:slocation,spec_location_child:childlocation},function(data,status){
								var rows=JSON.parse(data);
								var html="<option></option>";
								for(var i=0;i<rows.length;i++){
									var row=rows[i];
									html+="<option value='"+row.name+"'>"+row.name+"</option>";
								}
								$('#zip_code').html(html);
						});
					}
					function selectSubCat(){
						var category_name=$('#category_name').val();
						$.get('/getSubCat',{category_name:category_name},function(data,status){
								var rows=JSON.parse(data);
								var html="<option></option>";
								for(var i=0;i<rows.length;i++){
									var row=rows[i];
									html+="<option value='"+row.name+"'>"+row.name+"</option>";
								}
							   // html+="<option></option>";
								$('#sub_category_name').html(html);
						});
					}
	///////////////////////////////////////////////////////////
	for(var i=0;i<schecks.length;i++){
		$("#"+schecks[i]).on("click",function(){
			search();
		});
	}
	function search(){
		var campaign_id=$("#scampaign").val();
		var search={},filter={};
		for(var i=0;i<schecks.length;i++){
			var v=$("#"+schecks[i]).prop('checked');
			if(v){
				search[checks1[i]]=1;
				filter[checks1[i]]=1;
			}
		}
		search["campaign_id"]=campaign_id;
		search["account_id"]=$("#saccount_id").val();
	//	search["start"]=start;search["end"]=end;
		adsDatatable.setDataSourceParam("search",search);
		adsDatatable.load();
		console.log(search);
		console.log(filter);
		/*var filter={};
		/*for(var i=0;i<chart_scheks.length;i++){
			var v=$("#"+chart_scheks[i]).prop('checked');
			if(v){
				filter[chart_cheks[i]]=1;
			}
		}
		for(var i=0;i<schecks.length;i++){
			var v=$("#"+schecks[i]).prop('checked');
			if(v){
				filter[checks1[i]]=1;
			}
		}*/
		$.get('/getPostCharts',{start:start,end:end,campaign_id:campaign_id,account_id:$("#saccount_id").val(),filter:filter},function(data){
                var json=JSON.parse(data);
				var flaged_ads=JSON.parse(json.flaged_ads);
				var posted_bar=JSON.parse(json.posted_ads);
				var active_account=JSON.parse(json.active_account);
				var active_ads=JSON.parse(json.active_ads);
				var m=flaged_ads[0].value;var a=posted_bar[0].value;
				var act1=active_account[0].value,act=active_ads[0].value;
				if(m==null) m=0;if(a==null) a=0;if(act==null) act=0;if(act==null) act=0;
				$("#active_bar").attr("style","width:"+act+"%;");$("#active_label").text(act+"%");$("#active_value").text(act);
				$("#ads_flag_bar").attr("style","width:"+m+"%;");$("#ads_flag_label").text(m+"%");$("#ads_flag_value").text(m);
				$("#ads_bar").attr("style","width:"+a+"%;");$("#ads_label").text(a+"%");$("#ads_value").text(a);//active_account
				$("#account_bar").attr("style","width:"+act1+"%;");$("#account_label").text(act1+"%");$("#account_value").text(act1);
				//$("#haccount_bar").attr("style","width:"+hold+"%;");$("#haccount_label").text(hold+"%");$("#haccount_value").text(hold);
       });
	}//////////////////////-------------------------------//////////////////////////////////////
	   //})
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
	var ads_form = $('#ads_form')[0];
	$('#add_modal_btn').on('click',function(){
		ads_form.reset();
		$(".dz-preview").fadeOut('slow');
		$(".dz-preview:hidden").remove();
		//$("#account_id").val(routing_account_id);
		//$("#campaign_id").val(routing_campaign_id);
		emptyTag();
		$("#sub_category_name").html("<option></option>");
		$("#campaign_id").val($("#scampaign").val());
		//if($("#scampaign").val()) setSelectTag();
		//////////////////////////////////////////////////////////////////////////
		$.ajaxSetup({async:false});
		setAccount();
		var campaignid=$('#campaign_id').val();
		$.get('/getLocations',{campaignid:campaignid},function(data,status){
				var rows=JSON.parse(data);
				var html="<option></option>";var fmetro_name="";
				for(var i=0;i<rows.length;i++){
					var row=rows[i];
					if(i==0) fmetro_name=row.metro_name;
					html+="<option value='"+row.metro_name+"'>"+row.metro_name+"</option>";
				}
				$('#metro_name').html(html);
				$("#metro_name").val(fmetro_name);
		});
		var metro_name1=$("#metro_name").val();
		$.get('/getSpecLocations',{metro_name:metro_name1},function(data,status){
			var rows=JSON.parse(data);
			var html="<option></option>";var fspec="";
			for(var i=0;i<rows.length;i++){
				var row=rows[i];
				if(i==0) fspec=row.spec_location;
				html+="<option value='"+row.spec_location+"'>"+row.spec_location+"</option>";
			}
			$('#spec_location').html(html);
			$('#spec_location').val(fspec);
		});	
		setChildLocation();
		setCityName();
		setState();
		setZipCode();
		$.ajaxSetup({async:true});
		////////////////////////////////////////////////////////////////////////
		$("#account_id").val($("#saccount_id").val());
		$("#modal_ads").modal('show');
		$("#add_ads_btn").fadeIn();
		$("#update_ads_btn").hide();
	});
	var fcnt=4;
	var img_length=0;
	$('#ads_datatable table').on('click','tr td>span>div',function (e) {
		var action=e.currentTarget.attributes.title.value;
		var index=e.currentTarget.attributes.value.value;
		var row=adsDatatable.originalDataSet[index-1];
		//console.log(action);
		if(action=="POSTS"){
			var sdate=$("#start").val();
			//console.log(sdate);
			if(sdate==null || sdate=="") {start="";end="";}
			$.get("/setRouteParam",{ad_id:row.ad_id,campaign_id:row.campaign_id,account_id:row.account_id,start:start,end:end},function(data,status){
					if(data=="ok"){
						window.location.replace("/posts?flag=1");
					}
			});
			
		}else if(action=="Edit"){
			$("#add_ads_btn").hide();
			$("#update_ads_btn").fadeIn();
			$("#ad_id").val(row.ad_id);
			
			for(var i=0;i<fds.length;i++){
				$('#'+fds[i]).val(row[fds[i]]);
			}
			for(var i=0;i<checks.length;i++){
				if(row[checks[i]]==1) $('#'+checks[i]).prop('checked', true);
				else $('#'+checks[i]).prop('checked', false);
			}
			//////////////////images----------------//////////////////////////////
			//-------------------------------------myDropzone.removeAllFiles();
			$(".dz-preview").fadeOut('slow');
			$(".dz-preview:hidden").remove();
			//$('#myFile').empty();
			//--------------------------------------myDropzone=makeDropZone();

			$.get("/getImages",{ad_id:row.ad_id},function(data,status){
				var html='<div class="row">';
				var j=0;
				var rows=JSON.parse(data);
				img_length=rows.length;
				for(var i=0;i<rows.length;i++){
					var row=rows[i];
					//console.log(row);
					var mockFile = { name:row.image_url , size:12345 };
					myDropzone.options.addedfile.call(myDropzone, mockFile);
					myDropzone.files.push(mockFile); // here you add them into the files array
					myDropzone.options.thumbnail.call(myDropzone, mockFile,row.image_url);
					myDropzone.emit("complete", mockFile);
				}
			});
		//console.log(row);
		$.ajaxSetup({async:false});
		setMetro();
		setAccount();
		$("#account_id").val(row.account_id);
		$("#metro_name").val(row.metro_name);
		setSpecLocation();
		$("#spec_location").val(row.spec_location);
		
		setChildLocation();
		$("#spec_location_child").val(row.spec_location_child);
		setCityName();
		$("#city_name").val(row.city_name);
		setState();
		$("#state").val(row.state);
		setZipCode();$("#zip_code").val(row.zip_code);
		selectSubCat();
		$('#sub_category_name').val(row.sub_category_name);
		$.ajaxSetup({async:true});
		
			///////////////////////////////////////
			$("#modal_ads").modal('show');
		}else if(action=="Image"){
			$("#upload_ad_id").val(row.ad_id);
			showImage();
			$("#modal_image").modal('show');
		}else if(action=="Delete"){
			$.get("/deleteAds",{id:row.ad_id},function(data,status){
				//$(".kt-datatable").KTDatatable("reload");
				search();
			});
		}
		//console.log(row);
	});	
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 //(Category,Sub category,Metroname,Spec location,City name,State,zip_code,phone,Title,description)
    $('#add_ads_btn').click(function(e) {
		var form = $('#ads_form').closest('form');
		form.validate({
			rules: {
				user_id: { required: true},
				campaign_id: {required: true},	
				title: {required: true},
				keyword: {required: true},
				description: {required: true},
				category_name: {required: true},
				sub_category_name: {required: true},
				metro_name: {required: true},
				spec_location: {required: true},
				city_name: {required: true},
				state: {required: true},
				zip_code: {required: true},
				phone: {required: true,},
				account_id: {required: true}			
			}
		});
		var pnum=$('#phone').val();
		var regex=/^([0-9]{3})+\-([0-9]{3})+\-([0-9]{4})$/;
		if(!pnum.match(regex)){
			$('#phone').after('<span style="color:red;">***-***-****</span>');
			return;
		}
		if (!form.valid()) {
			return;
		}

		form.ajaxSubmit({
            url: '/addAds',
            method:'GET',
			success: function(response, status, xhr, $form) {
				// similate 2s delay
			   if(response>0){
					$("#ad_id").val(response);
					myDropzone.processQueue();
					$(".kt-datatable").KTDatatable("reload");
					$('#ads_form').trigger('reset');
					$("#modal_ads").modal('hide');
			   }else{
					toastr.error("Your email exists,please again enter your email!");
				}
			}
		});		
	});
    $('#update_ads_btn').click(function(e) {
		var accept_cnt=myDropzone.getAcceptedFiles().length;
		var hasimg_cnt=img_length;//old images count-database saved images.
		var gueued_cnt=myDropzone.getQueuedFiles().length;
		//alert(accept_cnt+":images length="+img_length+":queued length="+gueued_cnt);
		if((gueued_cnt+img_length)<=totol_images_cnt){
					var form = $('#ads_form').closest('form');
					form.validate({
						rules: {
							ad_id: {required: true},
							account_id: {required: true},
							title: {required: true},
							description: {required: true},
							category_name: {required: true},
							sub_category_name: {required: true},
							keyword: {required: true},
							metro_name: {required: true},
							spec_location: {required: true},
							city_name: {required: true},
							state: {required: true},
							zip_code: {required: true},
							phone: {required: true,}
						}
					});
					if (!form.valid()) {
						return;
					}
					
					form.ajaxSubmit({
						url: '/updateAds',
						method: 'POST',
						success: function(response, status, xhr, $form) {
							// similate 2s delay
						if(response=="ok"){
								myDropzone.processQueue();
								$(".kt-datatable").KTDatatable("reload");
								$("#modal_ads").modal('hide');
						}else{
								toastr.error("update error!");
						}
						}
					});	
			}else{
				alert("You can only upload "+totol_images_cnt+" files");
			}
	});
	$('#reset_btn').click(function(e) {
		var form = $('#ads_form')[0];
		form.reset();
		$("#profile_img").val("");
	});
	var upload_form = $('#upload_form')[0];
	$("#upload_image_btn").on("click",function(){
		var form = $('#upload_form').closest('form');
		form.ajaxSubmit({
			url: '/uploadFiles',
			method: 'POST',
			success: function(response, status, xhr, $form) {
					if(response=="ok"){
						showImage();
					}
			}
		});	
	});
	function showImage(){
		var id=$("#upload_ad_id").val();
		$.get("/getImages",{ad_id:id},function(data,status){
			var html='<div class="row">';
			var j=0;
			var rows=JSON.parse(data);
			for(var i=0;i<rows.length;i++){
				var row=rows[i];
				console.log(row);
				var src="'"+row.image_url+"'";
				html+='<div class="col-xl-3">\
							<div class="kt-widget kt-widget--user-profile-4" style="padding:20px;">\
								<div class="kt-widget__head">\
									<div class="kt-widget__media">\
										<img class="kt-widget__img kt-hidden-" src="'+row.image_url+'" alt="image">\
									</div>\
									<div class="kt-widget__content">\
										<div class="kt-widget__section">\
											<a href="javascript:deleteImg('+src+','+row.image_id+');" class="kt-widget__username" >\
												Remove file\
											</a>\
										</div>\
									</div>\
								</div>\
							</div>\
						</div>';	
				
				j++;
				if(j>3){
					html+='</div><div class="row">';
					j=0;
				}
			}
			html+="</div>";
			$("#images_content").html(html);
		});
	}
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

	////////////////filter event/////////////////////////////////

});
function deleteImg(src,id){
	$.get('/deleteImages',{image_url:src,image_id:id},function(){
		showImage1();
	});
}
function showImage1(){
	var id=$("#upload_ad_id").val();
	$.get("/getImages",{ad_id:id},function(data,status){
		var html='<div class="row">';
		var j=0;
		var rows=JSON.parse(data);
		for(var i=0;i<rows.length;i++){
			var row=rows[i];
			console.log(row);
			var src="'"+row.image_url+"'";
			html+='<div class="col-xl-3">\
						<div class="kt-widget kt-widget--user-profile-4" style="padding:20px;">\
							<div class="kt-widget__head">\
								<div class="kt-widget__media">\
									<img class="kt-widget__img kt-hidden-" src="'+row.image_url+'" alt="image">\
								</div>\
								<div class="kt-widget__content">\
									<div class="kt-widget__section">\
										<a href="javascript:deleteImg('+src+','+row.image_id+');" class="kt-widget__username" >\
											Remove file\
										</a>\
									</div>\
								</div>\
							</div>\
						</div>\
					</div>';	
			
			j++;
			if(j>3){
				html+='</div><div class="row">';
				j=0;
			}
		}
		html+="</div>";
		$("#images_content").html(html);
	});
	////////////////////////////////////////////////////////////////////////////////////////




	//////////////////////////////////////////////////////////////////////////////////////////////////////////
}
////////////////////////////////////////////////