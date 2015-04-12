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
                <h2>Laporan Harian</h2>
					<a href="laporan-harian.php">List</a> | <a href="laporan-harian.php?cmd=add">Add</a>
				
				<?php
					if(isset($_GET['cmd'])){
						switch ($_GET['cmd']){
							case 'add':
								echo '
									<form class="form-horizontal" method="post" action="bin/upload.php" enctype="multipart/form-data">
										<div class="form-group">
											<div class="col-xs-3">
												<input type="text" class="form-control" placeholder="Tanggal" name="tanggal">
												<input type="text" class="form-control" placeholder="link video dokumentasi" name="youtube">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-10">
												<textarea name="deskripsi" class="form-control">
												</textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<input type="file" id="file" name="userfile" multiple="multiple">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<input type="submit" class="form-control" id="inputEmail" value="Submit Laporan" name="submit">
											</div>
										</div>
									</form>
								';
								break;
							case 'view':
								$query = mysql_query("select * from laporan_harian WHERE no =".$_GET['id']);
								while($data  =  mysql_fetch_array($query)){
									echo '<center>';
									echo $data['tanggal'];
									echo '<br>';
									echo '<img src="img/laporan/'.$data['gambar'].'" width="400px" height="300px"><br>';
									echo '<p>'.$data['deskripsi'].'</p>';
									echo '</center>';									
								}
								break;
							case 'delete':
								$query = mysql_query("DELETE from laporan_harian WHERE no =".$_GET['id']);
								header("location: laporan-harian.php");
								break;
							case 'edit':
								echo '
									<form class="form-horizontal" method="post" action="bin/data.php" enctype="multipart/form-data">
										<div class="form-group">
											<div class="col-xs-3">
												<input type="tanggal" class="form-control" placeholder="Tanggal" name="tanggal">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-10">
												<textarea name="deskripsi" class="form-control">
												</textarea>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<input type="file" id="file" name="userfile" multiple="multiple">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-3">
												<input type="submit" class="form-control" id="inputEmail" value="Submit Laporan" name="submit">
											</div>
										</div>
									</form>
								';
								break;
						}
					}else{
						$query = mysql_query("select no,tanggal from laporan_harian");
						print '<div class="row" align="center">';
						print '<div class="col-md-3" style="border-style:solid;">Nomor</div>';
						print '<div class="col-md-3" style="border-style:solid;">Tanggal</div>';
						print '<div class="col-md-3" style="border-style:solid;">Link Video</div>';

						print '<div class="col-md-3" style="border-style:solid;">Action</div>';

						print '</div>';
						$i = 1;
						while($data  =  mysql_fetch_array($query)){
							print '<div class="row" align="center">';
							print '<div class="col-md-3" style="border-style:solid;">'.$i.'</div>';
							print '<div class="col-md-3" style="border-style:solid;">'.$data['tanggal'].'</div>';
							print '<div class="col-md-3" style="border-style:solid;"> &nbsp;</div>';

							print '<div class="col-md-3" style="border-style:solid;"><a href="laporan-harian.php?cmd=view&id='.$data['no'].'">View</a>
									<a href="laporan-harian.php?cmd=delete&id='.$data['no'].'"> | Delete</a>
									<a href="laporan-harian.php?cmd=edit&id='.$data['no'].'"> | Edit</a>
									</div>';
							print '</div>';
							
							$i++;
						}
					}
				?>
				
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
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
