<? 
session_start();
if(!isset($_SESSION['id'])){header("Location:login.php");}else{
ini_set('display_errors', 1);
include('module/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href="assets/select2.css" rel="stylesheet">
	<? include('layout/css-file.php') ?>
    <title>PNS Recruitment</title>
	<link rel="icon" href="assets/img/logo-icon.png" sizes="32x32" />
	<link rel="icon" href="assets/img/logo-icon.png" sizes="192x192">
    <!--easy pie chart-->
    <link href="js/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="assets/fa-picker/css/fontawesome-iconpicker.min.css" rel="stylesheet">
    <!--vector maps -->
    <link rel="stylesheet" href="js/vector-map/jquery-jvectormap-1.1.1.css">

    
    <!--switchery-->
    <link href="js/switchery/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
	
	<!--iCheck-->
    <link href="js/icheck/skins/all.css" rel="stylesheet">

	<!--bootstrap picker-->
    <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="js/bootstrap-timepicker/compiled/timepicker.css"/>
    <link rel="stylesheet" type="text/css" href="js/bootstrap-colorpicker/css/colorpicker.css"/>
    <link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
    <link rel="stylesheet" type="text/css" href="js/bootstrap-datetimepicker/css/datetimepicker.css"/>

	<!--Data Table-->
    <link href="js/data-table/css/jquery.dataTables.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.tableTools.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.colVis.min.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.responsive.css" rel="stylesheet">
    <link href="js/data-table/css/dataTables.scroller.css" rel="stylesheet">
    <!-- Base Styles -->
	
    <!--jquery-ui-->
    <link href="js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

	<!--common style-->

    <!--common style-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<?
$haha=explode('r=',$_SERVER['REQUEST_URI']);
if(strpos($haha[1], 'report-')!== false){
	$collapsed="sidebar-collapsed";
}else{
	$collapsed="";
}
?>
<body class="sticky-header <?=$collapsed?>">
    <section>
        <!-- sidebar left start-->
        <? include('layout/sidebar.php') ?>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
            <? include('layout/header.php') ?>
            <!-- header section end-->
			<?php
			
				if($_SERVER['REQUEST_URI']=='/index.php' OR $_SERVER['REQUEST_URI']=='/')
				{
					?>
						<!-- page head start-->
						<div class="page-head">
							<h3>Dashboard</h3>
							<span class="sub-title">Welcome to PT Pratama Nusantara Sakti</span>
							<div class="state-information">
								<div class="state-graph">
									<div id="balance" class="chart"></div>
									<div class="info">Balance $ 2,317</div>
								</div>
								<div class="state-graph">
									<div id="item-sold" class="chart"></div>
									<div class="info">Item Sold 1230</div>
								</div>
							</div>
						</div>
						<!-- page head end-->

						<!--body wrapper start-->
						<div class="wrapper"><!--state overview start--></div>
						<!--body wrapper end-->
					<?
				}
				else
				{	
					$aa=explode('r=',$_SERVER['REQUEST_URI']);
					$bb=explode('&',$aa[1]);
					//echo $_REQUEST['param'];
					$cc=explode('/',$_SERVER['REQUEST_URI']);
					//echo $cc['1'];
					$cek1=mysql_num_rows(mysql_query("select id from tablemenu where link='".$cc['1']."'"));
					//include("application/".$cc['1'].".php");
					//echo $cc['1'];
					if($cek1==0)
					{
						include("application/".$bb['0'].".php");
						//echo $cek1;
					}
					else
					{
						//echo $cek1;
						$cek2=mysql_fetch_array(mysql_query("select id from tablemenu where link='".$cc['1']."'"));
						$cek3=mysql_num_rows(mysql_query("select id from tablemenuuser where id_menu='".$cek2['id']."' and id_user='".$_SESSION['id']."'"));
						//echo $cek3;
						if($cek3==0){
							echo"
							<script>
							window.location.href = '".$url."404.html';
							</script>
							";
						}else{
							include("application/".$bb['0'].".php");
						} 
						//include("application/".$bb['0'].".php");
					}
					//echo $_SERVER['REQUEST_URI'];
					
					?>	
					
					<? 
				} 
			?>
			
            <!--footer section start-->
            <footer>2017 &copy; PT Pratama Nusantara Sakti</footer>
            <!--footer section end-->
        </div>
        <!-- body content end-->
    </section>
	
	<!-- Placed js at the end of the document so the pages load faster -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/jquery-migrate.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/modernizr.min.js"></script>

	<!--jquery-ui-->
	<script src="js/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	
	<!--bootstrap picker-->
	<script type="text/javascript" src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="js/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script type="text/javascript" src="js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	
	<!--picker initialization-->
	<script src="js/picker-init.js"></script>
	
	<!--Morris Chart-->
	<script src="js/morris-chart/morris.js"></script>
	<script src="js/morris-chart/raphael-min.js"></script>

	<!--morris chart initialization-->
	<script src="js/morris-init.js"></script>
	
	<!--flot chart -->
	<script src="js/flot-chart/jquery.flot.js"></script>
	<script src="js/flot-chart/flot-spline.js"></script>
	<script src="js/flot-chart/jquery.flot.resize.js"></script>
	<script src="js/flot-chart/jquery.flot.tooltip.min.js"></script>
	<script src="js/flot-chart/jquery.flot.pie.js"></script>
	<script src="js/flot-chart/jquery.flot.selection.js"></script>
	<script src="js/flot-chart/jquery.flot.stack.js"></script>
	<script src="js/flot-chart/jquery.flot.crosshair.js"></script>
	
	<!--earning chart init-->
	<script src="js/earning-chart-init.js"></script>
	
	<!--Sparkline Chart-->
	<script src="js/sparkline/jquery.sparkline.js"></script>
	<script src="js/sparkline/sparkline-init.js"></script>

	<!--easy pie chart-->
	<script src="js/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
	<script src="js/easy-pie-chart.js"></script>

	<!--vectormap-->
	<script src="js/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/vector-map/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/dashboard-vmap-init.js"></script>

	<!--Icheck-->
	<script src="js/icheck/skins/icheck.min.js"></script>
	<script src="js/todo-init.js"></script>
	
	<!--icheck init-->
	<script src="js/icheck-init.js"></script>
	
	<!--tags input-->
	<script src="js/tags-input.js"></script>

	<!--tags input init-->
	<script src="js/tags-input-init.js"></script>
	
	<!--touchspin spinner-->
	<script src="js/touchspin.js"></script>

	<!--spinner init-->
	<script src="js/spinner-init.js"></script>
	
	<!--dropzone-->
	<script src="js/dropzone.js"></script>

	<!--select2-->
	<script src="js/select2.js"></script>

	<!--select2 init-->
	<script src="js/select2-init.js"></script>

	<!--jquery countTo-->
	<script src="js/jquery-countTo/jquery.countTo.js" type="text/javascript"></script>

	<!--owl carousel-->
	<script src="js/owl.carousel.js"></script>

	<!--Nice Scroll-->
	<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
	
	<!--right slidebar-->
	<script src="js/slidebars.min.js"></script>
	
	<!--switchery-->
	<script src="js/switchery/switchery.min.js"></script>
	<script src="js/switchery/switchery-init.js"></script>
	
	<!--Data Table-->
	<script src="js/data-table/js/jquery.dataTables.min.js"></script>
	<script src="js/data-table/js/dataTables.tableTools.min.js"></script>
	<script src="js/data-table/js/bootstrap-dataTable.js"></script>
	<script src="js/data-table/js/dataTables.colVis.min.js"></script>
	<script src="js/data-table/js/dataTables.responsive.min.js"></script>
	<script src="js/data-table/js/dataTables.scroller.min.js"></script>
	
	<!--data table init-->
	<script src="js/data-table-init.js"></script>
	
	<!--common scripts for all pages-->
	<script src="js/scripts.js"></script>

	<script type="text/javascript">
		$(document).ready(function() 
		{
			//countTo
			$('.timer').countTo();
			//owl carousel
			$("#news-feed").owlCarousel({
				navigation : true,
				slideSpeed : 300,
				paginationSpeed : 400,
				singleItem : true,
				autoPlay:true
			});
		});
		$(window).on("resize",function(){
			var owl = $("#news-feed").data("owlCarousel");
			owl.reinit();
		});
	</script>
	
	<script src="http://thevectorlab.net/slicklab/js/jrespond..min.js"></script>
	<!--form validation-->
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>

	<!--form validation init-->
	<script src="js/form-validation-init.js"></script>
	<script src="assets/fa-picker/js/fontawesome-iconpicker.js"></script>
    <script>
        $(document).ready(function(){
            $('.iCheck').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal',
                increaseArea: '20%' // optional
            });
            $('.iCheck-square').iCheck({
                checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
            });
            $('.iCheck-flat').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat',
                increaseArea: '20%' // optional
            });
            $('.iCheck-polaris').iCheck({
                checkboxClass: 'icheckbox_polaris',
                radioClass: 'iradio_polaris',
                increaseArea: '20%' // optional
            });


        });
    </script>
	<script src="js/jquery-checktree.js"></script>
	<script>
    $('#tree').checktree();
    </script>
	<script>
            $(function() {
                
                $('.action-create').on('click', function() {
                    $('.icp-auto').iconpicker();
                }).trigger('click');
				$('.icp').on('iconpickerSelected', function(e) {
                    $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                            e.iconpickerInstance.options.iconBaseClass + ' ' +
                            e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
                });

            });
			
        </script>
</body>
</html>
<? } ?>