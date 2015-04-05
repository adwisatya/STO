<?php 
	session_start();

	if($_SESSION['username'] == ""){
		header("location: login.php");
	}else{
		$username = $_SESSION['username'];
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MPO Cisokan - Kurva S</title>

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
							PT. PLN (Persero) UPK PIH 1 Proyek PLTA Upper Cisokan<br/>
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
                <h1 class="page-header">Kurva S
                </h1>
                <ol class="breadcrumb">
                    <li>
						<a href="index.php">Home</a>
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
					<a href="kurva-s.php?gid=0" class="list-group-item">Overall</a>
					<a href="kurva-s.php?gid=1" class="list-group-item">Group 1</a>
					<a href="kurva-s.php?gid=2" class="list-group-item">Group 2</a>
					<a href="kurva-s.php?gid=3" class="list-group-item">Group 3</a>
					<a href="bin/logout.php" class="list-group-item">Log Out</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
				<?php
					if(isset($_GET['gid'])){
						switch ($_GET['gid']){
							case 0:
								echo '<img src="jpgraph/src/Examples/new_line1.php" class="col-md-12"></img>';
								break;
							case 1:
								echo '<img src="bin/mingguan.php?gid=1&minggu=m67" class="col-md-12"></img>';
								break;
							case 2:
								echo '<img src="bin/mingguan.php?gid=2&minggu=m67" class="col-md-12"></img>';
								break;
							case 3:
								echo '<img src="bin/mingguan.php?gid=3&minggu=m67" class="col-md-12"></img>';
								break;

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
