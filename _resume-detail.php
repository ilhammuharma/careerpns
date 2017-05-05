<? 
	session_start();
	ini_set('display_errors', 1);
	include('component/config.php');
	if(isset($_SESSION['id']))
	{
		$id=$_SESSION['id'];
		//$data=mysql_fetch_array(mysql_query("select * from userWorker where namaUser=$nama"));
		$data=mysql_fetch_array(mysql_query("select * from userWorker where idWorker=".$_SESSION['id'].""));
		
		$edu="SELECT pw.idWorker, pw.namaInstansi, pw.lokasiInstansi, tprov.namaProvinsi as lokasi, pw.kualifikasiPendidikan, tp.namaPendidikan as jenjang, pw.jurusanPendidikan, tj.namaJurusan as jurusan, pw.nilai, pw.tahunMasuk, pw.tahunLulus from pendidikanWorker pw ";
		$edu.= "INNER JOIN tableProvinsi tprov ON tprov.idProvinsi = pw.lokasiInstansi ";
		$edu.= "INNER JOIN tingkatPendidikan tp ON tp.gradePendidikan = pw.kualifikasiPendidikan ";
		$edu.= "INNER JOIN tableJurusan tj ON tj.idJurusan = pw.jurusanPendidikan ";
		$edu.= "WHERE idWorker=".$_SESSION['id']." ORDER BY gradePendidikan ASC ";
		$execedu = mysql_query($edu);

		$exp="SELECT exp.idWorker, exp.namaPerusahaan, exp.bidangUsaha, bu.namaBidangUsaha as usaha, exp.posisi, exp.lokasi, tprov.namaProvinsi as lokasi, exp.awalKerja, exp.akhirKerja, exp.gaji, exp.grossNett, exp.jumlahBawahan, exp.deskripsi, exp.namaAtasan, exp.telpAtasan, exp.jabatanAtasan, exp.jobdes from pengalamanWorker exp ";
		$exp.= "INNER JOIN bidangUsaha bu ON bu.idUsaha = exp.bidangUsaha ";
		$exp.= "INNER JOIN tableProvinsi tprov ON tprov.idProvinsi = exp.lokasi ";
		$exp.= "WHERE idWorker=".$_SESSION['id']." ORDER BY awalKerja ASC ";
		$execexp = mysql_query($exp);
		
		$fam="SELECT fam.idWorker, fam.hubungan, hk.namaHubungan as hub, fam.nama, fam.gender, fam.tempatLahir, fam.tanggalLahir, fam.pendidikan, tp.namaPendidikan as edu, fam.pekerjaan, fam.perusahaan from keluarga fam ";
		$fam.= "INNER JOIN hubunganKeluarga hk ON hk.gradeHubungan = fam.hubungan ";
		$fam.= "INNER JOIN tingkatPendidikan tp ON tp.gradePendidikan = fam.pendidikan ";
		$fam.= "WHERE idWorker=".$_SESSION['id']." ORDER BY tanggalLahir ASC ";
		$execfam = mysql_query($fam);
		
		$training="SELECT tr.idWorker, tr.namaTraining, tr.penyelenggaraTraining, tr.tahunTraining, tr.keteranganTraining, tkt.tingkatKetTraining as ket from skillTrainingWorker tr ";
		$training.= "INNER JOIN tingkatKetTraining tkt ON tkt.idKetTraining = tr.keteranganTraining ";
		$training.= "WHERE idWorker=".$_SESSION['id']." ORDER BY tahunTraining ASC ";
		$exectraining = mysql_query($training);
		
		$lang="SELECT sbw.idWorker, sbw.idBahasa, tb.namaBahasa as bahasa, sbw.tingkatLisan, tk1.tingkatKeahlian as lisan, sbw.tingkatMenulis, tk2.tingkatKeahlian as menulis, sbw.tingkatMembaca, tk3.tingkatKeahlian as membaca, sbw.keteranganBahasa from skillBahasaWorker sbw ";
		$lang.= "INNER JOIN tableBahasa tb ON tb.idBahasa = sbw.idBahasa ";
		$lang.= "INNER JOIN tingkatKeahlian tk1 ON tk1.gradeKeahlian = sbw.tingkatLisan ";
		$lang.= "INNER JOIN tingkatKeahlian tk2 ON tk2.gradeKeahlian = sbw.tingkatMenulis ";
		$lang.= "INNER JOIN tingkatKeahlian tk3 ON tk3.gradeKeahlian = sbw.tingkatMembaca ";
		$lang.= "WHERE idWorker=".$_SESSION['id']." ORDER BY bahasa ASC ";
		$execlang = mysql_query($lang);
		
		$add="SELECT sw.idWorker, sw.namaSkill, sw.tingkatSkill, tk.tingkatKeahlian as level, sw.keteranganSkill from skillWorker sw ";
		$add.= "INNER JOIN tingkatKeahlian tk ON tk.gradeKeahlian = sw.tingkatSkill ";
		$add.= "WHERE idWorker=".$_SESSION['id']." ORDER BY namaSkill ASC ";
		$execadd = mysql_query($add);
	}
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
		<header class="page-header bg-img" style="background-image: url(assets/img/h7.jpg)">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<img src="assets/img/avatar.jpg" alt="" style="margin-top:20px;">
					</div>
					<div class="col-xs-12 col-sm-8 header-detail">
						<div class="hgroup">
							<h1><?php echo $data['namaUser']?></h1>
							<h3><?php echo $data['headline']?></h3>
						</div>
						<hr>
						<p class="lead"><?php echo $data['summary']?></p>
						<ul class="details cols-2">
							<li>
								<i class="fa fa-map-marker"></i>
								<span><?php echo $data['alamatSekarang']?></span>
							</li>
							<li>
								<i class="fa fa-list"></i>
								<span><?php echo $data['agama']?></span>
							</li>
							<li>
								<i class="fa fa-money"></i>
								<span>Rp<?php echo $data['expSalary']?></span>
							</li>
							<li>
								<i class="fa fa-birthday-cake"></i>
								<span><?php echo $data['tempatLahir']?>, <?php echo $data['tanggalLahir']?> (<?php echo $data['usia']?> years old)</span>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<span><?php echo $data['noPonsel']?></span>
								</li>
							<li>
								<i class="fa fa-envelope"></i>
								<a href="#"><?php echo $data['email']?></a>
							</li>
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
						<button class="btn btn-primary" data-toggle="modal" data-target=".education">Add</button>
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
				<div class="container">
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
										<h5><i class="fa fa-money"> Rp<?php echo $cet_exp['gaji']?> (<?php echo $cet_exp['grossNett']?>)</i></h5>
										<h5><i class="fa fa-odnoklassniki"> <?php echo $cet_exp['namaAtasan']?> - <?php echo $cet_exp['jabatanAtasan']?> (<?php echo $cet_exp['telpAtasan']?>)</i></h5>  
									</div>
									<h6 class="time"><?php echo $cet_exp['awalKerja']?> - <?php echo $cet_exp['akhirKerja']?></h6>
								</header>
								<div class="item-body">
									<p>Responsibilities:</p>
									<ul><?php echo $cet_exp['jobdes']?></ul>
								</div>
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
				<div class="container">
					<header class="section-header">
						<span>Families</span>
						<h2>Families</h2>
						<button class="btn btn-primary" data-toggle="modal" data-target=".families">Add</button>
					</header>
					<br>
					<div class="col-xs-12">
						<div class="item-block">
							<table class="table">
								<thead>
									<tr>
										<td align="center"><b>Relationship</b></td>
										<td align="center"><b>Name</b></td>
										<td align="center"><b>Gender</b></td>
										<td align="center"><b>Place of Birth</b></td>
										<td align="center"><b>Date of Birth</b></td>
										<td align="center"><b>Education</b></td>
										<td align="center"><b>Job</b></td>
										<td align="center"><b>Company</b></td>
									</tr>
								</thead>
								<tbody>
									<? while($cet_fam = mysql_fetch_array($execfam)){?>
									<tr>
										<td align="center"><?php echo $cet_fam['hub']?></td>
										<td align="center"><?php echo $cet_fam['nama']?></td>
										<td align="center"><?php echo $cet_fam['gender']?></td>
										<td align="center"><?php echo $cet_fam['tempatLahir']?></td>
										<td align="center"><?php echo $cet_fam['tanggalLahir']?></td>
										<td align="center"><?php echo $cet_fam['edu']?></td>
										<td align="center"><?php echo $cet_fam['pekerjaan']?></td>
										<td align="center"><?php echo $cet_fam['perusahaan']?></td>
										</tr>
									<tr>
									<? }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
			<!-- END Families -->
		  
			<!-- Training -->
			<section style="padding:30px;">
				<div class="container">
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
				<div class="container">
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
					</div>
					<? }?>
				</div>
			</section>
			<!-- END Language Skills -->
		  
			<!-- Other Skills -->
			<section style="padding:30px;">
				<div class="container">
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