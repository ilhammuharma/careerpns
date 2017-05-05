<? 
	session_start();
	ini_set('display_errors', 1);
	//include('component/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<? include_once('layout/head.php'); ?>
	<body class="nav-on-header smart-nav ">
    <!-- Navigation bar -->
    <? include_once('layout/nav.php'); ?>
    <!-- END Navigation bar -->
	<!-- Page header -->
	<? 
		$idvacancy = $_GET['r'];
		$data ="SELECT *, kdep.namaDepartemen as dept,ks.namaSection as sec, kk.namaKategori as pos, kl.namaLevel as lev, kd.namaDistrik as loc,tp.namaPendidikan as edu, tj.namaJurusan as jur FROM vacancy v ";
		$data .= "INNER JOIN kategoriDepartemen kdep ON kdep.idDepartemen = v.department ";
		$data .= "INNER JOIN kategoriSection ks ON ks.idSection = v.section ";
		$data .= "INNER JOIN kategoriKerja kk ON kk.idKategori = v.position ";
		$data .= "INNER JOIN kategoriLevel kl ON kl.idLevel = v.level ";
		$data .= "INNER JOIN kategoriDistrik kd ON kd.idDistrik = v.location ";
		$data .= "INNER JOIN tingkatPendidikan tp ON tp.gradePendidikan = v.education ";
		$data .= "INNER JOIN tableJurusan tj ON tj.idJurusan = v.major ";
		$data .= "WHERE v.idvacancy='$idvacancy'";
		$execdata = mysql_query($data);
		$cet_data = mysql_fetch_array($execdata); 
	?>
		<header class="page-header bg-img" style="background-image: url(assets/img/h3.jpg)">
			<div class="container">
				<div class="header-detail">
					<img class="logo" src="assets/img/logo-pns.jpg" alt="">
					<div class="hgroup">
						<h1><?php echo $cet_data['pos']?></h1>
						<h3><?php echo $cet_data['lev']?></h3>
					</div>
					<time datetime="2016-03-03 20:00">Close Date: <?tanggal2($cet_data['duedate'])?></time>
					<hr>
					<p class="lead">PT Pratama Nusantara Sakti is a joint venture company of 3 conglomerates group in Indonesia consists of Djarum Group, Wings group, and Central Proteina Prima. We are moved in sugarcane plantation, located in OKI, South Sumatera. Our company was established since 2009 and started operating on 2012. We start from our ideas to become the first and the largest sugar company in low land or swamp land in Indonesia, which become priority to realize 'Swasembada Gula'. Produce Sugar with our heart and excellent process become our principal and guideline to run the business.</p>
					<ul class="details cols-3">
						<li>
							<i class="fa fa-map-marker"></i>
							<span><?php echo $cet_data['loc']?></span>
						</li>
						<li>
							<i class="fa fa-clock-o"></i>
							<span><?php echo $cet_data['experience']?> Years Experience</span>
						</li>
						<li>
							<i class="fa fa-money"></i>
							<span>Competitive Salary</span>
						</li>
						<li>
							<i class="fa fa-odnoklassniki"></i>
							<span>Max. Age: <?php echo $cet_data['age']?> Years Old</span>
						</li>
						<li>
							<i class="fa fa-graduation-cap"></i>
							<span>Min. Education: <?php echo $cet_data['edu']?>, <?php echo $cet_data['jur']?></span>
						</li>
						<li>
							<i class="fa fa-certificate"></i>
							<span>Min. GPA: <?php echo $cet_data['gpa']?> of 4.0</span>
						</li>
					</ul>
					<!--<div class="button-group">
						<div class="action-buttons">
						<a class="btn btn-success" href="<?//=$base_url?>vacancy-proses.php?r=<?//=$cet_data['idvacancy']?>&id=<?//=$_SESSION['id']?>"> Apply Now</a>
						</div>
					</div>-->
					
					<div class="modal-footer">
						<?
							if(!isset($_SESSION['id']))
							{ echo "Please login to apply this job"; }
							else
							{
								?>
									<button class="btn btn-success" data-toggle="modal" data-target="#confirm-apply"
									<?
										$getStatus = "SELECT * FROM vacancyapply WHERE idVacancy = '$idvacancy' AND idWorker = '".$_SESSION['id']."'";
										if(!isset($_SESSION['id']))
										{ echo " disabled"; }
										else
										{
											$execStatus = mysql_query($getStatus);
											if(mysql_num_rows($execStatus) > 0){
											echo " disabled";
										}
									}
									?>>Apply
									</button>
									<?
										if(isset($_SESSION['id']))
										{
											$execLabelStatus = mysql_query($getStatus);
											if(mysql_num_rows($execLabelStatus) > 0)
											{
												echo "<p>You have applied this job</p>";
											}
										}
							}
									?>
					</div>
					
					
					
					<!--<div class="modal-footer">
						<form action="<?//=$base_url?>vacancy-proses.php" method="post">
							<input type="hidden" name="idWorker" value="<?//=$_SESSION['id'];?>">
							<input type="hidden" name="idvacancy" value="<?//=$idvacancy;?>">
							<button type="submit" class="btn btn-success" name="apply">Apply Now</button>
						</form>
					</div>-->
				</div>
			</div>
		</header>
		<!-- END Page header -->
		<!-- Main container -->
		<main>
			<!-- Job detail -->
			<section>
				<div class="container">
					<h4>Responsibilities</h4>
					<ul><li><?php echo $cet_data['jobdes']?></li></ul>
					<br>
					<h4>Preferred Qualifications</h4>
					<ul><li><?php echo $cet_data['other']?></li></ul>
				</div>	
			</section>
			<!-- END Job detail -->
		</main>
		<!-- END Main container -->
		
	<? include_once('layout/footer.php'); ?>
	</body>
</html>
<!-- Modal Verifikasi-->
<div class="modal fade" id="confirm-apply" tabindex="-1" role="dialog" aria-labelledby="label-confirm" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="label-confirm"><?php echo $cet_data['pos']?></h4>
			</div>
			<div class="modal-body">Are you sure you want to apply this job?</div>
			<div class="modal-footer">
				<form action="<?=$base_url?>vacancy-proses.php" method="post">
					<input type="hidden" name="idWorker" value="<?=$_SESSION['id'];?>">
					<input type="hidden" name="idvacancy" value="<?=$idvacancy;?>">
					<input type="hidden" name="nomorFptk" value="<?php echo $cet_data['fptk'];?>">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-success" name="apply">Apply Now</button>
				</form>
			</div>
		</div>
	</div>
</div>