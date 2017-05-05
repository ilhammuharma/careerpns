<?
	session_start();
	ini_set('display_errors', 1);
	include('component/config.php');

	if(isset($_SESSION['id']))
	{
		if(isset($_POST['apply']))
		{
			$idVacancy = $_POST['idvacancy'];
			$idWorker = $_POST['idWorker'];
			$id = $_SESSION['id'];
			$getStatus = "SELECT * FROM vacancyapply WHERE idVacancy = '$idVacancy' AND idWorker = '$id'";
			$execStatus = mysql_query($getStatus);
			?>
				<!DOCTYPE html>
				<html lang="en">
				<? include_once('layout/head.php'); ?>
					<body class="nav-on-header smart-nav ">
					<!-- Navigation bar -->
					<? include_once('layout/nav.php'); ?>
					<!-- END Navigation bar -->
						<!-- Page header -->
						<header class="page-header bg-img" style="background-image: url(assets/img/h3.jpg)">
							<div class="container">
								<div class="box-no-border">
								<?
									if(mysql_num_rows($execStatus) > 0)
									{
										?>
											<div class="alert alert-danger alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<p>You have applied for this job. Please find other jobs!</p>
											</div>
											<a href="<?=$base_url?>vacancy.php"><button class="btn btn-success">Back to Job Vacancy</button></a>
										<?
									}
									else
									{
										$query = mysql_query("insert into vacancyapply (idApply, createdate, idVacancy, idWorker) values ('', '".date('Y-m-d')."', '".$_POST['idvacancy']."', '".$_POST['idWorker']."')");
										?>
											<div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<p>You have successfully applied for this job!</p>
											</div>
											<a href="<?=$base_url?>vacancy.php"><button class="btn btn-success">Back to Job Vacancy</button></a>
										<?
									}	
								?>
								</div>
							</div>
						</header>
						<? include_once('layout/footer.php'); ?>
					</body>
				</html>
			<?
		}
	}
?>