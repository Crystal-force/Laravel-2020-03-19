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
var adsDatatable;
var postDatatable
var AdsTable = function() {
	// Private functions

	// basic demo
	var table = function() {

		 adsDatatable = $('#adstable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getAds',
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
				serverSorting: true,
			},
			layout: {
				scroll: false,
				footer: false,
			},
			pagination: true,
			columns: [
                {
					field: "image",
                    title: "image",
                    width:50,
					template: function(t) {
						var pic='<div class="kt-user-card-v2">\t\t\t\t\t\t\t\t';
						 	pic=pic+'	<div class="kt-user-card-v2__pic">\t\t\t\t\t\t\t\t\t';
							pic=pic+'		<img src="/img/upload/2.jpg" alt="photo">\t\t\t\t\t\t\t\t';
							pic=pic+'    </div>\t\t\t\t\t\t\t\t';
						//	pic=pic+'    <div class="kt-user-card-v2__details">\t\t\t\t\t\t\t\t\t';
						//	pic=pic+'   	<span class="kt-user-card-v2__name"> '+t.user_name+'</span>\t\t\t\t\t\t\t\t\t<a class="kt-user-card-v2__email kt-link">'+t.email_id+'</a>';
						//	pic=pic+'    </div>\t\t\t\t\t\t\t';
							pic=pic+'</div>';
							return pic;
					}
                },
                {	field: 'title',title: 'Title',width:400,},
                {	field: 'city_name',title: 'City',width:60,},
                {	field: 'zip_code',title: 'Zip code',width:60,},
                {	field: 'spec_location',title: 'Location',width:90,},
                {	field: 'price',title: 'Price',width:40,}
              ],

		});
        $('#kt_form_status').on('change', function() {
            //adsDatatable.search($(this).val().toLowerCase(), 'Status');
        });
    };

	return {
		// public functions
		init: function() {
			table();
		},
	};
}();
////////////////////////////////////////////////////////////////////////////////////////////
var PostTable = function() {
	// Private functions

	// basic demo
	var table = function() {

		 postDatatable = $('#posttable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
                        url: '/getPost',
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
				serverSorting: true,
			},
			layout: {
				scroll: false,
				footer: false,
			},
			pagination: true,
			columns: [
                {	field: 'title',title: 'Title',width:200,},
                {	field: 'link_url',title: 'Link',width:200,},
                {	field: 'pid_date',title: 'Date',width:90,}
              ],

        });

        $('#kt_form_status').on('change', function() {
            //postDatatable.search($(this).val().toLowerCase(), 'Status');
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
    AdsTable.init();
    PostTable.init();
	start=getDate1(new Date(),1); 
	end=getDate(new Date());
    $.get('/getPostCharts',{start:start,end:end},function(data){
       // console.log(data);
        MoneyCharts.init();
        AdsCharts.init();
        var json=JSON.parse(data);
        mchart.dataProvider = JSON.parse(json.posts);
        mchart.validateData();
        achart.dataProvider = JSON.parse(json.ads);
        achart.validateData();
    });
    $('#search').on('keypress',function(e){
        var key = e.charCode || e.keyCode || 0;     
        if (key == 13) {
            postDatatable.KTDatatable("reload");
        }       
    });
   //mchart.dataprovider=JSON.parse('[{"date": "2013-01-30","value": 174}]');
    $('#today').on('click', function() {
        //alert("dd");
        postDatatable.load();
        //postDatatable.search($(this).val().toLowerCase(), 'Status');
    });
    $('#datefilter').on('click',function(){
        $(this).attr("autocomplete", "off"); 
    })
   // $('#datefilter').datepicker().setDate("2019-4-4");//"setDate", new Date("2019-04-02"));
   
    $('#datefilter').on('change',function(e){
        start=getDate($(this).data().datepicker.dates[0]);
        end=getDate($(this).data().datepicker.dates[1]);
    })
    $('#search_btn').on('click',function(){
		category=$('#scategory').val();metro=$("#smetro").val();psite=$("#sites").val();
        adsDatatable.setDataSourceParam("search",{start:start,end:end,category:category,metro:metro,psite:psite});
        postDatatable.setDataSourceParam("search",{start:start,end:end,category:category,psite:psite});
        adsDatatable.load();
        postDatatable.load();
       $.get('/getPostCharts',{start:start,end:end,category:category,metro:metro,psite:psite},function(data){
                var json=JSON.parse(data);
                mchart.dataProvider = JSON.parse(json.posts);
                mchart.validateData();
                achart.dataProvider = JSON.parse(json.ads);
                achart.validateData();
       });
    })
    function getDate(date){
        let s=new Date(date);
        let ss=s.getFullYear() + "-" + (s.getMonth() + 1) + "-" + s.getDate();
        return ss;
    }
    function getDate1(date){
        let s=new Date(date);
        let ss=s.getFullYear() + "-" + s.getMonth() + "-" + s.getDate();
        return ss;
    }
});