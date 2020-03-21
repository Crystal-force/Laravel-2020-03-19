<!doctype html>
<html lang = "<?php echo e(app()-> getLocale()); ?>">
<?php echo $__env->make('common.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
					<a href="/signout"><img alt="Logo" src="<?php echo e(asset('img/logo.png')); ?>" style="width:150px;"/></a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>
<style>
.modal-xb {
  width: 1200px;
  max-width: 1235px;
  margin: auto;
}
.kt-header--fixed.kt-subheader--fixed .kt-subheader {
    height: 70px;
}
.kt-checkbox {
    padding-left: 20px;
}
#page_title{
	margin-top: 17px;
    margin-left: 100px;
}
</style>
		<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
		<?php echo $__env->make('common.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
			
			<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<div class="kt-header__topbar">
							<h3 class="kt-subheader__title" id="page_title">page name</h3>
						</div>
				<!-- end:: Header Topbar -->
			</div>	
			<?php echo $__env->yieldContent('content'); ?>
			<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
				<div class="kt-container  kt-container--fluid ">
					<div class="kt-footer__copyright">
						2019&nbsp;&copy;&nbsp;
					</div>
					<div class="kt-footer__menu">
						<a href="" target="_blank" class="kt-footer__menu-link kt-link">About</a>
					</div>
				</div>
			</div>

			<!-- end:: Footer -->
		</div>
	</div>
</div>

	
<style>
    .btn.btn-icon.btn-icon-md [class^="la-"], .btn.btn-icon.btn-icon-md [class*=" la-"] {
            font-size: 1.8rem;
        }
	</style>
	<script>
		var now = new Date();
		var today=getDate(now);var wstart=getWeek(now);var predate=getDate1(now)
		function getDate(date){
			let s=new Date(date);
			let ss=s.getFullYear() + "-" + (s.getMonth() + 1) + "-" + s.getDate();
			return ss;
		}
		function getDate1(date){
			let s=new Date(date);
			let ss=s.getFullYear() + "-" + (s.getMonth()+1) + "-1" ;
			return ss;
		}
		function getWeek(date){
			let s=new Date(date);
			var date=s.getDate();
			var day=s.getDay();
			var offset=[6,0,1,2,3,4,5];
			date=date-offset[day];
			if(date<1) date=1;
			let ss=s.getFullYear() + "-" + (s.getMonth() + 1) + "-" + date;
			//ss=s.getFullYear() + "-" + (s.getMonth() + 1) + "-" + date;
			return ss;
   	 }
	 	$("#today").on("click",function(){
		$('#start').datepicker('setDate', today);
		$('#end').datepicker('setDate', today);
		
	});
	$("#week").on("click",function(){
		$('#start').datepicker('setDate', wstart);
		$('#end').datepicker('setDate', today);
	});
	$("#month").on("click",function(){
		$('#start').datepicker('setDate', predate);
		$('#end').datepicker('setDate', today);
	});
	$("#start").datepicker({
		//todayHighlight: !0,
		orientation: "bottom left",
		format:'yyyy-mm-dd',
		autocomplete:"off",
		templates: {
			leftArrow: '<i class="la la-angle-left"></i>',
			rightArrow: '<i class="la la-angle-right"></i>'
		}
	});
	$("#end").datepicker({
		//todayHighlight: !0,
		orientation: "bottom left",
		format:'yyyy-mm-dd',
		autocomplete:"off",
		templates: {
			leftArrow: '<i class="la la-angle-left"></i>',
			rightArrow: '<i class="la la-angle-right"></i>'
		}
	});
	</script>	
</body>
</html>
<?php /**PATH C:\xampp\htdocs\adsbackend\resources\views/layout.blade.php ENDPATH**/ ?>