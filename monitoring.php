<?php 
	session_start();
	require_once("connect/connect.php");

	if($_SESSION['username'] == ""){
		header("location: login.php");
	}else{
		$username = $_SESSION['username'];
	}

?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BIS COTA Cisokan - Laporan Harian</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<table style="color:white">
					<tr>
						<td valign="middle">
							<img src="img/pln-logo.jpg" width="50px" height="50px">
						</td>
						<td>
							&nbsp;
						</td>
						<td valign="middle">
							PT. PLN (Persero) UPK PH 1 Proyek PLTA Upper Cisokan<br/>
							Monitoring Progress Kegiatan Proyek
						</td>
					</tr>
				</table>            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="monitoring.php">Monitoring</a>
                    </li>
                    <li>
                        <a href="kurva-s.php">Kurva S</a>
                    </li>
                    <li>
                        <a href="laporan-harian.php">Laporan Harian</a>
                    </li>
                    <li>
                        <a href="laporan-mingguan.php">Laporan Mingguan</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan Harian
                    <small>Input</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Sidebar Page</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item">Home</a>
					<a href="bin/logout.php" class="list-group-item">Log Out</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2>Input Data Monitoring</h2>
					<form class="form-horizontal" method="post" action="bin/data.php" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-xs-6">
								<select name="groupid">
									<option value="1"> Group 1 </option>
									<option value="2"> Group 2 </option>
									<option value="3"> Group 3 </option>
								</select>
								<!--<select name="minggu">
									<option value="M66"> M66 </option>
									<option value="M67"> M67 </option>
								</select>-->
								<select name="subkerja">
								<?php 
									$file = file("subkerja.txt");
									foreach($file as $baris){
										$baris = explode(",",$baris);
										
										echo '<option value="'.$baris[0].'">'.$baris[0]." ".$baris[1].'</option>';
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-10">
								<div class="row">
									<div class="col-md-1" style=""> Senin </div>
									<div class="col-md-1" style=""> Selasa </div>
									<div class="col-md-1" style=""> Rabu </div>
									<div class="col-md-1" style=""> Kamis </div>
									<div class="col-md-1" style=""> Jumat </div>
									<div class="col-md-1" style=""> Sabtu </div>
									<div class="col-md-1" style=""> Minggu </div>
								</div>
								Minggu 66
								<div class="row">
									<div class="col-md-1" style=""> <input type="text" name="senin" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="selasa" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="rabu" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="kamis" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="jumat" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="sabtu" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="minggu" size="5px"> </div>
								</div>
								Minggu 67
								<div class="row">
									<div class="col-md-1" style=""> <input type="text" name="senin2" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="selasa2" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="rabu2" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="kamis2" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="jumat2" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="sabtu2" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="minggu2" size="5px"> </div>
								</div>
								Minggu 68
								<div class="row">
									<div class="col-md-1" style=""> <input type="text" name="senin3" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="selasa3" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="rabu3" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="kamis3" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="jumat3" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="sabtu3" size="5px"> </div>
									<div class="col-md-1" style=""> <input type="text" name="minggu3" size="5px"> </div>
								</div>
								<?php 
								for($i=69;$i<=81;$i++){
									echo "Minggu ".$i;
									echo '
									<div class="row">
										<div class="col-md-1" style=""> <input type="text" name="senin3x" size="5px"> </div>
										<div class="col-md-1" style=""> <input type="text" name="selasa3x" size="5px"> </div>
										<div class="col-md-1" style=""> <input type="text" name="rabu3x" size="5px"> </div>
										<div class="col-md-1" style=""> <input type="text" name="kamis3x" size="5px"> </div>
										<div class="col-md-1" style=""> <input type="text" name="jumat3x" size="5px"> </div>
										<div class="col-md-1" style=""> <input type="text" name="sabtu3x" size="5px"> </div>
										<div class="col-md-1" style=""> <input type="text" name="minggu3x" size="5px"> </div>
									</div>';
								}
								?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-3">
								<input type="submit" class="form-control" value="Submit Data" name="submitdata">
							</div>
						</div>
					</form>
					
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; sto.bangsatya.com 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
