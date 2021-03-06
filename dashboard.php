<?php 
include 'koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | PikaPika Laundry</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/moris/morris-0.4.3.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
</head>
<body>
	
	<!-- /. NAV SIDE  -->
		<div id="page-wrapper" >
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
						<h2>Tes Diagram</h2>   
						<h5>Welcome Akasuna Hera , Love to see you back. </h5>
                       
					</div>
				</div>
				<!-- /. ROW  -->
				<hr />
             
				<div class="row"> 
					<div class="col-md-6 col-sm-12 col-xs-12">                     
						<div class="panel panel-default">
							<div class="panel-heading">
								Bar Chart Example
							</div>

							<div class="panel-body">
								<div id="morris-bar-chart"></div>
 							</div>
						</div>            
                </div>

				<div class="col-md-6 col-sm-12 col-xs-12">                     
					<div class="panel panel-default">
						<div class="panel-heading">
							Area Chart Example
						</div>

						<div class="panel-body">
							<div id="morris-area-chart"></div>
						</div>
					</div>            
				</div> 
			</div>
                 <!-- /. ROW  -->


			<div class="row">                     
				<div class="col-md-6 col-sm-12 col-xs-12">                     
					<div class="panel panel-default">
						<div class="panel-heading">
							Donut Chart Example
						</div>

						<div class="panel-body">
							<div id="morris-donut-chart"></div>
						</div>
					</div>            
				</div>
				
				<div class="col-md-6 col-sm-12 col-xs-12">                     
					<div class="panel panel-default">
						<div class="panel-heading">
							Line Chart Example
						</div>

                        <div class="panel-body">
							<div id="morris-line-chart"></div>
						</div>
					</div>            
				</div> 
			</div><!-- /. ROW  -->
		</div><!-- /. PAGE WRAPPER  -->
 

<!-- buat ubah nilai dari diagramnya di setting di custom.js -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
