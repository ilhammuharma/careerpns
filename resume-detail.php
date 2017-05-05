<? 
	session_start();
	ini_set('display_errors', 1);
	//include('component/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="assets/css/jquery.popdown.css">
	<? include_once('layout/head.php'); ?>
	<body class="nav-on-header smart-nav ">
		<!-- Navigation bar -->
		<? include_once('layout/nav.php'); ?>
		<!-- END Navigation bar -->
		<!-- Page header -->
		<?
		$id=$_SESSION['id'];
		//$data=mysql_fetch_array(mysql_query("select * from userWorker where namaUser=$nama"));
		$data=mysql_fetch_array(mysql_query("select * from userWorker where idWorker=".$_SESSION['id'].""));
				
		$edu="SELECT *, tprov.namaProvinsi as lokasi, tp.namaPendidikan as jenjang, tj.namaJurusan as jurusan from pendidikanWorker pw ";
		$edu.= "INNER JOIN tableProvinsi tprov ON tprov.idProvinsi = pw.lokasiInstansi ";
		$edu.= "INNER JOIN tingkatPendidikan tp ON tp.gradePendidikan = pw.kualifikasiPendidikan ";
		$edu.= "INNER JOIN tableJurusan tj ON tj.idJurusan = pw.jurusanPendidikan ";
		$edu.= "WHERE idWorker=".$_SESSION['id']." ORDER BY gradePendidikan ASC ";
		$execedu = mysql_query($edu);

		$exp="SELECT *, bu.namaBidangUsaha as usaha, tprov.namaProvinsi as lokasi from pengalamanWorker exp ";
		$exp.= "INNER JOIN bidangUsaha bu ON bu.idUsaha = exp.bidangUsaha ";
		$exp.= "INNER JOIN tableProvinsi tprov ON tprov.idProvinsi = exp.lokasi ";
		$exp.= "WHERE idWorker=".$_SESSION['id']." ORDER BY awalKerja ASC ";
		$execexp = mysql_query($exp);
				
		$fam="SELECT *, hk.namaHubungan as hub, tp.namaPendidikan as edu from keluarga fam ";
		$fam.= "INNER JOIN hubunganKeluarga hk ON hk.gradeHubungan = fam.hubungan ";
		$fam.= "INNER JOIN tingkatPendidikan tp ON tp.gradePendidikan = fam.pendidikan ";
		$fam.= "WHERE idWorker=".$_SESSION['id']." ORDER BY tanggalLahir ASC ";
		$execfam = mysql_query($fam);
				
		$training="SELECT *, tkt.tingkatKetTraining as ket from skillTrainingWorker tr ";
		$training.= "INNER JOIN tingkatKetTraining tkt ON tkt.idKetTraining = tr.keteranganTraining ";
		$training.= "WHERE idWorker=".$_SESSION['id']." ORDER BY tahunTraining ASC ";
		$exectraining = mysql_query($training);
				
		$lang="SELECT *, tb.namaBahasa as bahasa, tk1.tingkatKeahlian as lisan, tk2.tingkatKeahlian as menulis, tk3.tingkatKeahlian as membaca from skillBahasaWorker sbw ";
		$lang.= "INNER JOIN tableBahasa tb ON tb.idBahasa = sbw.idBahasa ";
		$lang.= "INNER JOIN tingkatKeahlian tk1 ON tk1.gradeKeahlian = sbw.tingkatLisan ";
		$lang.= "INNER JOIN tingkatKeahlian tk2 ON tk2.gradeKeahlian = sbw.tingkatMenulis ";
		$lang.= "INNER JOIN tingkatKeahlian tk3 ON tk3.gradeKeahlian = sbw.tingkatMembaca ";
		$lang.= "WHERE idWorker=".$_SESSION['id']." ORDER BY bahasa ASC ";
		$execlang = mysql_query($lang);
				
		$add="SELECT *, tk.tingkatKeahlian as level from skillWorker sw ";
		$add.= "INNER JOIN tingkatKeahlian tk ON tk.gradeKeahlian = sw.tingkatSkill ";
		$add.= "WHERE idWorker=".$_SESSION['id']." ORDER BY namaSkill ASC ";
		$execadd = mysql_query($add);
			
		?>
		<header class="page-header bg-img" style="background-image: url(assets/img/h7.jpg)">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<!--<img src="assets/img/avatar.jpg" alt="" style="margin-top:20px;">-->
						<img src="image/<?=$data['foto']?>" class="img-rounded" alt="" style="margin-top:20px;" />
					</div>
					<div class="col-xs-12 col-sm-8 header-detail">
						<div class="hgroup">
							<h1><?=$data['namaUser']?></h1>
							<h3><?=$data['headline']?></h3>
						</div>
						<hr>
						<p class="lead"><?php echo $data['summary']?></p>
						<? if($data['alamatSekarang']!=''){?>
						<ul class="details cols-2">
							<li>
								<i class="fa fa-map-marker"></i>
								<span><?=$data['alamatSekarang']?></span>
							</li>
							<li>
								<i class="fa fa-list"></i>
								<span><?=$data['agama']?></span>
							</li>
							<li>
								<i class="fa fa-money"></i>
								<span>Rp<?=number_format($data['expSalary'],0,'.',',')?></span>
							</li>
							<li>
								<i class="fa fa-birthday-cake"></i>
								<span><?=$data['tempatLahir']?>, <? tanggal2($data['tanggalLahir'])?> (<?=$data['usia']?> years old)</span>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<span><?=$data['noPonsel']?></span>
								</li>
							<li>
								<i class="fa fa-envelope"></i>
								<a href="#"><?=$data['email']?></a>
							</li>
						<?}
						else{}
						?>
						</ul>
					</div>
				</div>
				<div class="button-group">
					<div class="action-buttons">
						<a class="btn btn-gray" href="#">Download CV</a>
						<a class="btn btn-success" href="<?=$base_url?>resume-form.php">Edit</a>
					</div>
				</div>
			</div>
		</header>
		<!-- END Page header -->

		<!-- Main container -->
		<main>
			<!-- Education -->
			<section style="padding-bottom:30px;">
				<div class="container no-margin-bottom">
					<header class="section-header">
						<span>Education</span>
						<h2>Education</h2>
						<a href="<?=$base_url?>form/resume-education.php" class="btn btn-primary" data-toggle="modal" data-target=".education">Add</a>
					</header>
					<div class="row">
					<? while($cet_edu = mysql_fetch_array($execedu)){?>
						<div class="col-xs-12">
							<div class="item-block">
								<header>
									<div class="hgroup">
										<h4><?php echo $cet_edu['jenjang']?><small><?php if($cet_edu['nilai']>='4.0'){ ?> Score <?php echo $cet_edu['nilai']?> of 10 <?} else { ?> GPA <?php echo $cet_edu['nilai']?> of 4.0 <? }?></small></h4>
										<h5><?php echo $cet_edu['namaInstansi']?>, <?php echo $cet_edu['jurusan']?></h5>
										<h5><?php echo $cet_edu['lokasi']?></h5>
										
										<a class="btn btn-success btn-xs" href="<?=$base_url?>form/resume-education.php?id=<?=$cet_edu['idPendidikan']?>" data-toggle="modal" data-target="#edu<?=$cet_edu['idPendidikan']?>"><i class="fa fa-pencil"></i></a>
										
										<!--<button class="btn btn-success btn-xs" data-toggle="modal" data-target=".education">Edit</button>-->
										<a href="<?=$base_url?>resume-education.php&del=<?=$cet_edu['idPendidikan']?>" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-trash-o "></i></a>
									</div>
									<h5 class="time"><?php echo $cet_edu['tahunMasuk']?> - <?php echo $cet_edu['tahunLulus']?></h5>
								</header>
							</div>
						</div>
					<? }?>
					</div>
				</div>
			</section>
			<!-- END Education -->
			
			<!-- Work Experience -->
			<section class="bg-alt" style="padding:30px;">
				<div class="container no-margin-bottom">
					<header class="section-header">
						<span>3 Last positions</span>
						<h2>Work Experiences</h2>
						<button class="btn btn-primary" data-toggle="modal" data-target=".workexperience">Add</button>
					</header>         
					<div class="row">
						<? while($cet_exp = mysql_fetch_array($execexp)){?>
						<!-- Work item -->
						<div class="col-xs-12">
							<div class="item-block">
								<header>
									<div class="hgroup">
										<h4><?php echo $cet_exp['namaPerusahaan']?><small><?php echo $cet_exp['usaha']?></small></h4>
										<h5><?php echo $cet_exp['posisi']?></h5>
										<h5><i class="fa fa-map-marker"> <?php echo $cet_exp['lokasi']?></i></h5>
										<h5><i class="fa fa-money"> Rp<?=number_format($cet_exp['gaji'],0,'.',',')?> (<?php echo $cet_exp['grossNett']?>)</i></h5>
										<h5><i class="fa fa-odnoklassniki"> <?php echo $cet_exp['namaAtasan']?> - <?php echo $cet_exp['jabatanAtasan']?> (<?php echo $cet_exp['telpAtasan']?>)</i></h5>  
									</div>
									<h6 class="time"><?php tanggal2($cet_exp['awalKerja'])?> - <?php tanggal2($cet_exp['akhirKerja'])?></h6>
									<p><h5>Responsibilities:</h5></p>
									<ul><h5><?php echo $cet_exp['jobdes']?></h5></ul>
										
									<a class="btn btn-success btn-xs" href="<?=$base_url?>form/resume-workexperience.php?id=<?=$cet_exp['idPengalaman']?>" data-toggle="modal" data-target="#exp<?=$cet_exp['idPengalaman']?>"><i class="fa fa-pencil"></i></a>
									
									<!--<button class="btn btn-success btn-xs" data-toggle="modal" data-target=".workexperience">Edit</button>-->
									<a href="<?=$base_url?>resume-workexperience.php&del=<?=$cet_exp['idPengalaman']?>" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-trash-o "></i></a>
								</header>
							</div>
						</div>
						<!-- END Work item -->
						<? }?>
					</div>
				</div>
			</section>
			<!-- END Work Experience -->
		  
			<!-- Families -->
			<section style="padding:30px;">
				<div class="container no-margin-bottom">
					<header class="section-header">
						<span>Families</span>
						<h2>Families</h2>
						<button class="btn btn-primary" data-toggle="modal" data-target=".families">Add</button>
					</header>
					<div class="row">
						<? while($cet_fam = mysql_fetch_array($execfam)){?>
						<!-- Families item -->
						<div class="col-xs-12">
							<div class="item-block">
								<header>
									<div class="hgroup">
										<h4><?php echo $cet_fam['hub']?><small><?php echo $cet_fam['nama']?></small></h4>
										<h5><i class="fa fa-graduation-cap "> <?php echo $cet_fam['edu']?></i></h5>
										<h5><i class="fa fa-info"> <?php echo $cet_fam['pekerjaan']?></i></h5>
										<h5><?php if($cet_fam['perusahaan']!='') { ?><i class="fa fa-building"> <?php echo $cet_fam['perusahaan']?></i><? } else{}?></h5>
										<a href="<?=$base_url?>form/resume-families.php?id=<?=$cet_fam['idKeluarga']?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
										
										<a class="btn btn-success btn-xs" href="<?=$base_url?>form/resume-families.php?id=<?=$cet_fam['idKeluarga']?>" data-toggle="modal" data-target="#fam<?=$cet_fam['idKeluarga']?>"><i class="fa fa-pencil"></i></a>
										<div id="fam<?=$cet_fam['idKeluarga']?>" class="modal fade"><div class="modal-dialog" style="width:90%;"><div class="modal-content"></div></div></div>
											
										<button class="btn btn-success btn-xs" data-toggle="modal" data-target=".families">Edit</button>
										<a href="<?=$base_url?>resume-families.php&del=<?=$cet_fam['idKeluarga']?>" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-trash-o "></i></a>
									</div>
									<h5 class="time"><?php echo $cet_fam['tempatLahir']?>, <?php tanggal2($cet_fam['tanggalLahir'])?></h5>
								</header>
							</div>
						</div>
						<!-- END families item -->
						<? }?>
					</div>
				</div>
			</section>
			<!-- END Families -->
		  
			<!-- Training -->
			<section style="padding:30px;">
				<div class="container no-margin-bottom">
					<header class="section-header">
						<span>Expertise Areas</span>
						<h2>Training / Seminar / Workshop</h2>
						<button class="btn btn-primary" data-toggle="modal" data-target=".training">Add</button>
					</header>
					<div class="row">
						<? while($cet_training = mysql_fetch_array($exectraining)){?>
						<!-- Training item -->
						<div class="col-xs-12">
							<div class="item-block">
								<header>
									<div class="hgroup">
										<h4><?php echo $cet_training['penyelenggaraTraining']?><small><?php echo $cet_training['ket']?></small></h4>
										<h5><?php echo $cet_training['namaTraining']?></h5>
										<a href="<?=$base_url?>form/resume-training.php?id=<?=$cet_training['idTraining']?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
										
										<a class="btn btn-success btn-xs" href="<?=$base_url?>form/resume-training.php?id=<?=$cet_training['idTraining']?>" data-toggle="modal" data-target="#train<?=$cet_training['idTraining']?>"><i class="fa fa-pencil"></i></a>
										<div id="train<?=$cet_training['idTraining']?>" class="modal fade"><div class="modal-dialog" style="width:90%;"><div class="modal-content"></div></div></div>
											
										<button class="btn btn-success btn-xs" data-toggle="modal" data-target=".training">Edit</button>
										<a href="<?=$base_url?>resume-training.php&del=<?=$cet_training['idTraining']?>" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-trash-o "></i></a>
									</div>
									<h6 class="time"><?php echo $cet_training['tahunTraining']?></h6>
								</header>
							</div>
						</div>
						<!-- END training item -->
						<? }?>
					</div>
				</div>
			</section>
			<!-- END Training -->

			<!-- Language Skills -->
			<section style="padding:30px;">
				<div class="container no-margin-bottom">
					<header class="section-header">
						<span>Expertise Areas</span>
						<h2>Language Skills</h2>
						<button class="btn btn-primary" data-toggle="modal" data-target=".languageskill">Add</button>
					</header>
					<br>
					<? while($cet_lang = mysql_fetch_array($execlang)){?>
					<div class="col-xs-6">
						<h4><?php echo $cet_lang['bahasa']?></h4>
						<div><span class="skill-name">Speaking</span></div>
						<? if($cet_lang['lisan']=='Beginner')
						{ ?> <div class="progress"><div class="progress-bar" style="width: 50%;"></div></div> <? }
						else if($cet_lang['lisan']=='Intermediate')
						{ ?> <div class="progress"><div class="progress-bar" style="width: 75%;"></div></div> <? }
						else
						{ ?> <div class="progress"><div class="progress-bar" style="width: 100%;"></div></div> <? }
						?>
						<div><span class="skill-name">Writing</span></div>
						<? if($cet_lang['menulis']=='Beginner')
						{ ?><div class="progress"><div class="progress-bar" style="width: 50%;"></div></div><? }
						else if($cet_lang['menulis']=='Intermediate')
						{ ?><div class="progress"><div class="progress-bar" style="width: 75%;"></div></div><? }
						else
						{ ?><div class="progress"><div class="progress-bar" style="width: 100%;"></div></div><? } 
						?>
						<div><span class="skill-name">Reading</span></div>
						<? if($cet_lang['membaca']=='Beginner')
						{ ?><div class="progress"><div class="progress-bar" style="width: 50%;"></div></div> <? }
						else if($cet_lang['membaca']=='Intermediate')
						{ ?> <div class="progress"><div class="progress-bar" style="width: 75%;"></div></div> <? }
						else
						{ ?> <div class="progress"><div class="progress-bar" style="width: 100%;"></div></div> <? } 
						?>
						<a href="<?=$base_url?>form/resume-training.php?id=<?=$cet_training['idTraining']?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
										
						<a class="btn btn-success btn-xs" href="<?=$base_url?>form/resume-training.php?id=<?=$cet_training['idTraining']?>" data-toggle="modal" data-target="#train<?=$cet_training['idTraining']?>"><i class="fa fa-pencil"></i></a>
						<div id="train<?=$cet_training['idTraining']?>" class="modal fade"><div class="modal-dialog" style="width:90%;"><div class="modal-content"></div></div></div>
											
						<button class="btn btn-success btn-xs" data-toggle="modal" data-target=".training">Edit</button>
						<a href="<?=$base_url?>resume-languageskill.php&del=<?=$cet_lang['idTable']?>" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-trash-o "></i></a>
					</div>
					<? }?>
				</div>
			</section>
			<!-- END Language Skills -->
		  
			<!-- Other Skills -->
			<section style="padding:30px;">
				<div class="container no-margin-bottom">
					<header class="section-header">
						<span>Expertise Areas</span>
						<h2>Additional Skills</h2>
						<button class="btn btn-primary" data-toggle="modal" data-target=".otherskill">Add</button>
					</header>
					<br>
					<? while($cet_add = mysql_fetch_array($execadd)){?>
					<div class="col-xs-6">
						<div><span class="skill-name"><?php echo $cet_add['namaSkill']?><?php if($cet_add['keteranganSkill']!=''){ ?> - <?php echo $cet_add['keteranganSkill']?><? } else{ }?></span></div>
						<? if($cet_add['level']=='Beginner')
						{ ?> <div class="progress"><div class="progress-bar" style="width: 50%;"></div></div> <? }
						else if($cet_add['level']=='Intermediate')
						{ ?> <div class="progress"><div class="progress-bar" style="width: 75%;"></div></div> <? }
						else
						{ ?> <div class="progress"><div class="progress-bar" style="width: 100%;"></div></div> <? }
						?>
						<a href="<?=$base_url?>resume-otherskill.php&edit=<?=$cet_add['idSkill']?>" class="btn btn-success btn-xs"><i class="fa fa-pencil "></i></a>
						<a href="<?=$base_url?>resume-otherskill.php&del=<?=$cet_add['idSkill']?>" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete this data?');"><i class="fa fa-trash-o "></i></a>
					</div>
					<? }?>
				</div>
			</section>
			<!-- END Other Skills -->
		</main>
		<!-- END Main container -->
		<? include_once('layout/footer.php'); ?>
	</body>
</html>
<!-- Modal -->

<?
$edu="SELECT *, tprov.namaProvinsi as lokasi, tp.namaPendidikan as jenjang, tj.namaJurusan as jurusan from pendidikanWorker pw ";
$edu.= "INNER JOIN tableProvinsi tprov ON tprov.idProvinsi = pw.lokasiInstansi ";
$edu.= "INNER JOIN tingkatPendidikan tp ON tp.gradePendidikan = pw.kualifikasiPendidikan ";
$edu.= "INNER JOIN tableJurusan tj ON tj.idJurusan = pw.jurusanPendidikan ";
$edu.= "WHERE idWorker=".$_SESSION['id']." ORDER BY gradePendidikan ASC ";
$execedu = mysql_query($edu);			
while($cet_edu2 = mysql_fetch_array($execedu)){ ?>
<?=$cet_edu2['idPendidikan']?>
<div id="edu<?=$cet_edu2['idPendidikan']?>" class="modal fade"  tabindex="-<?=$cet_edu2['idPendidikan']?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog" style="width:90%; "><div class="modal-content"></div></div></div>
<? } ?>

<?
$exp="SELECT *, bu.namaBidangUsaha as usaha, tprov.namaProvinsi as lokasi from pengalamanWorker exp ";
$exp.= "INNER JOIN bidangUsaha bu ON bu.idUsaha = exp.bidangUsaha ";
$exp.= "INNER JOIN tableProvinsi tprov ON tprov.idProvinsi = exp.lokasi ";
$exp.= "WHERE idWorker=".$_SESSION['id']." ORDER BY awalKerja ASC ";
$execexp = mysql_query($exp);
while($cet_exp2 = mysql_fetch_array($execexp)){ ?>
<?=$cet_exp2['idPendidikan']?>
<div id="exp<?=$cet_exp2['idPengalaman']?>" class="modal fade"><div class="modal-dialog" style="width:90%;"><div class="modal-content"></div></div></div>
<? } ?>

<div class="modal fade education" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<? include('form/resume-education.php') ?>
		</div>
	</div>
</div>
	
<div class="modal fade workexperience" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<? include('form/resume-workexperience.php') ?>
		</div>
	</div>
</div>
	
<div class="modal fade families" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<? include('form/resume-families.php') ?>
		</div>
	</div>
</div>
	
<div class="modal fade training" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<? include('form/resume-training.php') ?>
		</div>
	</div>
</div>
	
<div class="modal fade languageskill" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<? include('form/resume-languageskill.php') ?>
		</div>
	</div>
</div>
	
<div class="modal fade otherskill" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<? include('form/resume-otherskill.php') ?>
		</div>
	</div>
</div>

