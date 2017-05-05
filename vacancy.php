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
		if(isset($_GET['search']))
		{
			$data .= "where (lower(kk.namaKategori) like lower('%".$_GET['search']."%') or lower(kl.namaLevel) like lower('%".$_GET['search']."%') or lower(kd.namaDistrik) like lower('%".$_GET['search']."%'))";
		}
		$data .= "AND v.duedate>='".date('Y-m-d')."' ORDER BY v.duedate DESC ";
		$execdata = mysql_query($data);
	?>
		<header class="page-header bg-img bg-alt" style="background-image: url(assets/img/h3.jpg);">
			<div class="container page-name">
				<h1 class="text-center">Browse jobs</h1>
				<p class="lead text-center">Use following search box to find jobs that fits you better</p>
			</div>
			<div class="container" style="padding:0px 20px 20px 20px;">
				<form method="get" class="header-job-search">
					<div class="input-keyword" style="width:80%;">
						<input type="text" name="search" class="form-control" placeholder="Position, level, or location" >
					</div>
					<div class="btn-search">
						<button class="btn btn-primary" type="submit">Find jobs</button>   
					</div>
				</form>
			</div>
		</header>
		<!-- END Page header -->
		<main>
			<section class="no-padding-top bg-alt">
				<div class="container">
					<div class="row item-blocks-connected">
						<div class="col-xs-12" style="margin-top:30px;">
							<br>
							<!--<h5>We found <strong>357</strong> matches, you're watching <i>10</i> to <i>20</i></h5>-->
							<br>
						</div>
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
					<!-- Page navigation
					<nav class="text-center">
						<ul class="pagination">
							<li><a href="#" aria-label="Previous"><i class="ti-angle-left"></i></a></li>
							<li><a href="#">1</a></li>
							<li class="active"><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#" aria-label="Next"><i class="ti-angle-right"></i></a></li>
						</ul>
					</nav>
					END Page navigation -->
				</div>
			</section>
		</main>
		<!-- END Main container -->
	<? include_once('layout/footer.php'); ?> 
	</body>
</html>