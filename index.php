<? 
	session_start();
	ini_set('display_errors', 1);
	//include('component/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<? include_once('layout/head.php'); ?>
	<body class="nav-on-header smart-nav bg-alt">
    <!-- Navigation bar -->
    <? include_once('layout/nav.php'); ?>
    <!-- END Navigation bar -->
	<?
		$data ="SELECT v.idvacancy, v.createdate, v.createby, v.fptk, v.department, kdep.namaDepartemen as dept, v.section, ks.namaSection as sec, v.position, kk.namaKategori as pos, v.level, kl.namaLevel as lev, v.location, kd.namaDistrik as loc, v.experience, v.salary, v.education, tp.namaPendidikan as edu, v.major, tj.namaJurusan as jur, v.gpa, v.age, v.duedate, v.other, v.jobdes FROM vacancy v ";
		$data .= "INNER JOIN kategoriDepartemen kdep ON kdep.idDepartemen = v.department ";
		$data .= "INNER JOIN kategoriSection ks ON ks.idSection = v.section ";
		$data .= "INNER JOIN kategoriKerja kk ON kk.idKategori = v.position ";
		$data .= "INNER JOIN kategoriLevel kl ON kl.idLevel = v.level ";
		$data .= "INNER JOIN kategoriDistrik kd ON kd.idDistrik = v.location ";
		$data .= "INNER JOIN tingkatPendidikan tp ON tp.gradePendidikan = v.education ";
		$data .= "INNER JOIN tableJurusan tj ON tj.idJurusan = v.major ";
		$data .= "WHERE v.duedate>='".date('Y-m-d')."' ORDER BY v.duedate ASC LIMIT 5";
		$execdata = mysql_query($data);
	?>
    <!-- Site header -->
		<header class="site-header size-lg text-center" style="background-image: url(assets/img/h7.jpg);">
			<div class="container" style="padding-bottom:85px;">
				<div class="col-xs-12">
					<br>
					<h2>We offer <mark>job vacancies</mark> right now!</h2>
					<h5 class="font-alt">Find your desire one in a minute</h5> 
					<form method="get" class="header-job-search" action="<?=$base_url?>vacancy.php">
						<div class="input-keyword" style="width:80%;">
							<input type="text" name="search" class="form-control" placeholder="Job title, skills, or Positon" >
						</div>
						<div class="btn-search">
							<button class="btn btn-primary" type="submit">Find jobs</button>
						</div>
					</form>
				</div>
			</div>
		</header>
		<!-- END Site header -->
		<!-- Main container -->
		<main>
			<!-- Recent jobs -->
			<section  class="no-padding-top bg-alt">
				<div class="container">
					<header class="section-header" style="margin-top:30px;">
						<h2>Recent jobs</h2>
					</header>
					<div class="row item-blocks-connected">
						<!-- Job item -->
						<div class="col-xs-12">
							<? while($cet_data = mysql_fetch_array($execdata)){?>
							<a class="item-block" href="<?=$base_url?>vacancy-detail.php?r=<?=$cet_data['idvacancy']?>">
								<header>
									<img src="assets/img/logo-pns.jpg" alt="">
									<div class="hgroup">
										<h4><?php echo $cet_data['pos']?></h4>
										<h5><?php echo $cet_data['lev']?></h5>
									</div>
									<div class="header-meta">
										<span class="location"><?php echo $cet_data['loc']?></span>
										<span class="label label-success"><?php echo $cet_data['experience']?> years experience</span>
									</div>
								</header>
							</a>
							<? }?>
						</div>
						<!-- END Job item -->
					</div>
					<br><br>
					<p class="text-center"><a class="btn btn-primary" href="vacancy.php">Browse all jobs</a></p>
				</div>
			</section>
			<!-- END Recent jobs -->
		</main>
		<!-- END Main container -->
		<? include_once('layout/footer.php'); ?>
	</body>
</html>