<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Dashboard">
<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<title>SISTEM INFORMASI RUMAH Kost</title>

<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
<link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css"> 



<!-- Custom styles for this template -->
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/style-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="media/css/demo_table_jui.css" />
<link rel="stylesheet" type="text/css" href="media/themes/smoothness/jquery-ui-1.8.4.custom.css" />
<script src="media/js/jquery.js"></script>
<script src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 oTable = $('#tabel').dataTable({
	"bJQueryUI" : true,
	"sPaginationType" : "full_numbers"
	});
	});
	</script>

<script src="assets/js/chart-master/Chart.js"></script>
<!--datatable-->


<script src="assets/js/chart-master/Chart.js"></script>
</head>
<body>
<section id="container" >
<?php include"header.php";?>
<aside>
<?php include "menu.php";?>
</aside>
<section id="main-content">
<section class="wrapper"><?php 

	//koneksi terpusat
	include "../config/config.php";
	
?>
<?php $view=mysql_query("select * from kelurahan order by id_kecamatan asc");?>

          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tabel" class="display">
                                    <thead>
                                        <tr>
                    <th>No</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kode POst</th>
                    <th>Aksi</th>
                   
                </tr>
                </thead>
				<tbody>
					<?php

include"../config/config.php";

		while($row=mysql_fetch_array($view)){
		$nama_kec=mysql_fetch_array(mysql_query("SELECT nama_kec FROM kecamatan WHERE id_kecamatan='$row[id_kecamatan]'"));	
		?>
			
                                        <tr class="odd grade">
				<td><?php echo $c=$c+1;?></td>
				
				<td><?php echo $row['nama_kel'];?></td>
				<td><?php echo $nama_kec['nama_kec'];?></td>
				<td><?php echo $row['id_kecamatan'];?></td>
				<td><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></td>
			</tr>

  <?php } ?> </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div><!-- /col-md-4 -->







</div><!-- /col-md-4 -->

</div><!-- /row -->

<div class="row mt">

</div><!-- /row --> 

</div>


</section>
</section>

<br><br>
<?php include"foter.php";?>s