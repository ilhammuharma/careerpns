<?
	session_start();
	ini_set('display_errors', 1);
	include('component/config.php');
	if(isset($_SESSION['nama']))
	{
		$nama=$_SESSION['nama'];
		//$data=mysql_fetch_array(mysql_query("select * from userWorker where namaUser=$nama"));
		$data=mysql_fetch_array(mysql_query("select * from userWorker where idWorker=".$_SESSION['id'].""));
	}
?>
<!DOCTYPE html>
<html lang="en">
<? include_once('layout/head.php'); ?>
<body class="nav-on-header smart-nav">
	<!-- Navigation bar -->
    <? include_once('layout/nav.php'); ?>
    <!-- END Navigation bar -->

    <form action="<?=$base_url?>resume-proses.php" method="post">
		<!-- Page header -->
		<header class="page-header">
			<div class="container page-name">
				<h1 class="text-center">Add your resume</h1>
				<p class="lead text-center">Create your resume and put it online.</p>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<input type="file" class="dropify" data-default-file="assets/img/avatar.jpg">
							<span class="help-block">Please choose a 4:6 profile picture.</span>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<label for="posisi" class="control-label"><b>Applied Position</b></label>
							<select name="posisi" id="posisi" class="form-control">
								<option value="" >-- Select One --</option>
								<?php
									$queryKategoriKerja = "SELECT * FROM kategoriKerja ORDER BY namaKategori ASC";
									$execKategoriKerja = mysql_query($queryKategoriKerja);
									while($resultKategoriKerja = mysql_fetch_array($execKategoriKerja))
									{ ?><option value="<?=$resultKategoriKerja['idKategori'];?>"<?php if($data['posisi'] == $resultKategoriKerja['idKategori']){ echo " selected";}?>><?=$resultKategoriKerja['namaKategori'];?></option><?php }
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="gender" class="control-label"><b>Gender</b></label>
							<select id="gender" name="gender" required="required" class="form-control"/>
								<option value="" >-- Select One --</option>
								<option value="Male" <?php if($data['gender'] == "Male"){ echo "selected";}?> default>Male</option>
								<option value="Female" <?php if($data['gender'] == "Female"){ echo "selected";}?>>Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="kewarganegaraan" class="control-label"><b>Citizenship</b></label>
							<select id="kewarganegaraan" name="kewarganegaraan" required="required" class="form-control"/>
								<option value="" >-- Select One --</option>
								<option value="Indonesian" <?php if($data['kewarganegaraan'] == "Indonesian"){ echo "selected";}?> default>Indonesian</option>
								<option value="Foreign" <?php if($data['kewarganegaraan'] == "Foreign"){ echo "selected";}?>>Foreign</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tempatLahir" class="control-label"><b>Place of Birth</b></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<input type="text" name="tempatLahir" class="form-control" value="<?=$data['tempatLahir'];?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="tanggalLahir" class="control-label"><b>Date of Birth</b></label>
							<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" class="input-append date dpYears">
								<input type="date" name="tanggalLahir" class="form-control" value="<?=$data['tanggalLahir']?>" required>
								<span class="input-group-btn add-on">
									<button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
								</span>
							</div>
							<span class="help-block">Select date</span>
						</div>
						<div class="form-group">
							<label for="noKtp" class="control-label"><b>No.KTP/Others</b></label>
							<input type="text" name="noKtp" class="form-control" id="noKtp" value="<?=$data['noKtp'];?>"required>
						</div>
						<div class="form-group">
							<label for="noNpwp" class="control-label"><b>No.NPWP</b></label>
							<input type="text" name="noNpwp" class="form-control" id="noNpwp" value="<?=$data['noNpwp'];?>">
						</div>
						<div class="form-group">
							<label for="noPonsel" class="control-label"><b>No.Tel/HP</b></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="tel" class="form-control" name="noPonsel" id="noPonsel" value="<?=substr($data['noPonsel'], 3, 15);?>" required>
							</div>
						</div>
						<!--<div class="form-group">
							<label for="otherPonsel" class="control-label">No.Tel/HP (2)</b></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
								<input type="tel" class="form-control" name="otherPonsel" id="otherPonsel" value="<?php //echo substr($data['otherPonsel'], 3, 15);?>">
							</div>
						</div>-->
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<label for="golonganDarah" class="control-label"><b>Blood Type</b></label>
							<select id="golonganDarah" name="golonganDarah" required="required" class="form-control"/>
								<option value="" >-- Select One --</option>
								<option value="A" <?php if($data['golonganDarah'] == "A"){ echo "selected";}?> default>A</option>
								<option value="B" <?php if($data['golonganDarah'] == "B"){ echo "selected";}?>>B</option>
								<option value="AB" <?php if($data['golonganDarah'] == "AB"){ echo "selected";}?>>AB</option>
								<option value="O" <?php if($data['golonganDarah'] == "O"){ echo "selected";}?>>O</option>
							</select>
						</div>
						<div class="form-group">
							<label for="agama" class="control-label"><b>Religion</b></label>
							<select id="agama" name="agama" required="required" class="form-control"/>
								<option value="" >-- Select One --</option>
								<option value="Islam" <?php if($data['agama'] == "Islam"){ echo "selected";}?> default>Islam</option>
								<option value="Christian" <?php if($data['agama'] == "Christian"){ echo "selected";}?>>Christian</option>
								<option value="Catholic" <?php if($data['agama'] == "Catholic"){ echo "selected";}?>>Catholic</option>
								<option value="Hindu" <?php if($data['agama'] == "Hindu"){ echo "selected";}?>>Hindu</option>
								<option value="Buddha" <?php if($data['agama'] == "Buddha"){ echo "selected";}?>>Buddha</option>
							</select>
						</div>
						<div class="form-group">
							<label for="usia" class="control-label"><b>Age</b></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
								<input type="text" name="usia" class="form-control" value="<?=$data['usia'];?>" required>
								<span class="input-group-addon">Years Old</span>
							</div>
						</div>
						<div class="form-group">
							<label for="alamatKtp" class="control-label"><b>Address (KTP)</b></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<textarea name="alamatKtp" id="alamatKtp" class="form-control" required><?=$data['alamatKtp'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="alamatSekarang" class="control-label"><b>Current Address</b></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
								<textarea name="alamatSekarang" id="alamatSekarang" class="form-control" required><?=$data['alamatSekarang'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="domisili" class="control-label"><b>Domicile</b></label>
							<select name="domisili" id="domisili" class="form-control" required>
								<option value="">-- Select One --</option>
								<? 
									$prov=mysql_query("select * from tableProvinsi order by idProvinsi"); 
									while($cet_prov=mysql_fetch_array($prov))
									{ ?> <option <?=($cet_prov['idProvinsi']==$data['domisili'])?'selected':'';?> value="<?=$cet_prov['idProvinsi'] ?>"><? echo $cet_prov['namaProvinsi'] ?></option><? } 
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="headline" class="control-label"><b>Headline</b></label>
							<input type="text" name="headline" class="form-control" value="<?=$data['headline'] ?>" placeholder="Headline (e.g. IT Developer)">
						</div>
						<div class="form-group">
							<label for="summary" class="control-label"><b>Summary</b></label>
							<textarea class="form-control" name="summary" id="summary" placeholder="Short description about you" required><?=$data['summary'];?></textarea>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- END Page header -->
		
		<!-- Main container -->
		<main>
			<!-- Specialisation & Personal Concept -->
			<section>
				<div class="container">
					<header class="section-header">
						<h2>Specialisation & Personal Concept</h2>
					</header>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="citaCita" class="control-label"><b>Vision</b></label>
								<textarea name="citaCita" id="citaCita"  class="form-control" placeholder="Describe briefly!"><?=$data['citaCita'];?></textarea>
							</div>
							<div class="form-group">
								<label for="motivasiBekerja" class="control-label"><b>Work Motivation</b></label>
								<textarea name="motivasiBekerja" id="motivasiBekerja" class="form-control" placeholder="Describe briefly!"><?=$data['motivasiBekerja'];?></textarea>
							</div>
							<div class="form-group">
								<label for="alasanBekerja" class="control-label"><b>Reason Working</b></label>
								<textarea name="alasanBekerja" id="alasanBekerja" class="form-control" placeholder="Describe briefly!"><?=$data['alasanBekerja'];?></textarea>
							</div>
							<div class="form-group">
								<label for="expSalary" class="control-label"><b>Expected Salary</b></label>
								<div class="input-group">
									<div class="input-group-addon"><u>+</u> Rp</div>
									<input type="text" class="form-control" name="expSalary" id="expSalary" value="<?=$data['expSalary'];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="negosiasiGaji" class="control-label"><b>Negotiable/No</b></label>
								<label class="radio-inline"><input type="radio" name="negosiasiGaji" id="negosiasiGajiY" <?php if($data['negosiasiGaji'] == "Negotiable"){ echo "checked";}?> value="Negotiable" default>Negotiable</b></label>
								<label class="radio-inline"><input type="radio" name="negosiasiGaji" id="negosiasiGajiN" <?php if($data['negosiasiGaji'] == "No"){ echo "checked";}?> value="No">No</b></label>
							</div>
							<div class="form-group">
								<label for="tunjanganFasilitas" class="control-label"><b>Expected Facilities/Allowances</b></label>
								<textarea name="tunjanganFasilitas" id="tunjanganFasilitas" class="form-control" placeholder="Mention the points!"><?=$data['tunjanganFasilitas'];?></textarea>
							</div>
							<div class="form-group">
								<label for="waktuBekerja" class="control-label"><b>Start Working</b></label>
								<div data-date-viewmode="years" data-date-format="dd-mm-yyyy" class="input-append date dpYears">
									<input type="date" name="waktuBekerja" class="form-control" value="<?=$data['waktuBekerja']?>">
									<span class="input-group-btn add-on">
										<button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
								<span class="help-block">Select date</span>
							</div>
							<div class="form-group">
								<label for="jenisPekerjaanDisukai1" class="control-label"><b>Work Type Priority</b></label>
								<div class="input-group">
									<div class="input-group-addon">1.</div>
									<select name="jenisPekerjaanDisukai1" id="jenisPekerjaanDisukai1" class="form-control">
										<option value="">-- Select One --</option>
										<?php
											$queryJenisPekerjaan = "SELECT * FROM jenisPekerjaan ORDER BY namaJenisPekerjaan ASC";
											$execJenisPekerjaan = mysql_query($queryJenisPekerjaan);
											while($resultJenisPekerjaan = mysql_fetch_array($execJenisPekerjaan))
											{
												?><option value="<?=$resultJenisPekerjaan['idJenisPekerjaan'];?>"<?php if($data['jenisPekerjaanDisukai1'] == $resultJenisPekerjaan['idJenisPekerjaan']){ echo " selected";}?>><?=$resultJenisPekerjaan['namaJenisPekerjaan'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">2.</div>
									<select name="jenisPekerjaanDisukai2" id="jenisPekerjaanDisukai2" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execJenisPekerjaan2 = mysql_query($queryJenisPekerjaan);
											while($resultJenisPekerjaan2 = mysql_fetch_array($execJenisPekerjaan2))
											{
												?><option value="<?=$resultJenisPekerjaan2['idJenisPekerjaan'];?>"<?php if($data['jenisPekerjaanDisukai2'] == $resultJenisPekerjaan2['idJenisPekerjaan']){ echo " selected";}?>><?=$resultJenisPekerjaan2['namaJenisPekerjaan'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">3.</div>
									<select name="jenisPekerjaanDisukai3" id="jenisPekerjaanDisukai3" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execJenisPekerjaan3 = mysql_query($queryJenisPekerjaan);
											while($resultJenisPekerjaan3 = mysql_fetch_array($execJenisPekerjaan3))
											{
												?><option value="<?=$resultJenisPekerjaan3['idJenisPekerjaan'];?>"<?php if($data['jenisPekerjaanDisukai3'] == $resultJenisPekerjaan3['idJenisPekerjaan']){ echo " selected";}?>><?=$resultJenisPekerjaan3['namaJenisPekerjaan'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">4.</div>
									<select name="jenisPekerjaanDisukai4" id="jenisPekerjaanDisukai4" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execJenisPekerjaan4 = mysql_query($queryJenisPekerjaan);
											while($resultJenisPekerjaan4 = mysql_fetch_array($execJenisPekerjaan4))
											{
												?><option value="<?=$resultJenisPekerjaan4['idJenisPekerjaan'];?>"<?php if($data['jenisPekerjaanDisukai4'] == $resultJenisPekerjaan4['idJenisPekerjaan']){ echo " selected";}?>><?=$resultJenisPekerjaan4['namaJenisPekerjaan'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">5.</div>
									<select name="jenisPekerjaanDisukai5" id="jenisPekerjaanDisukai5" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execJenisPekerjaan5 = mysql_query($queryJenisPekerjaan);
											while($resultJenisPekerjaan5 = mysql_fetch_array($execJenisPekerjaan5))
											{
												?><option value="<?=$resultJenisPekerjaan5['idJenisPekerjaan'];?>"<?php if($data['jenisPekerjaanDisukai5'] == $resultJenisPekerjaan5['idJenisPekerjaan']){ echo " selected";}?>><?=$resultJenisPekerjaan5['namaJenisPekerjaan'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="lingKerDisukai1" class="control-label"><b>Work Environment Priority</b></label>
								<div class="input-group">
									<div class="input-group-addon">1.</div>
									<select name="lingKerDisukai1" id="lingKerDisukai1" class="form-control">
										<option value="">-- Select One --</option>
										<?php
											$queryLingkunganKerja = "SELECT * FROM lingkunganKerja ORDER BY namaLingkunganKerja ASC";
											$execLingkunganKerja1 = mysql_query($queryLingkunganKerja);
											while($resultLingkunganKerja1 = mysql_fetch_array($execLingkunganKerja1))
											{
												?><option value="<?=$resultLingkunganKerja1['idLingkunganKerja'];?>"<?php if($data['lingKerDisukai1'] == $resultLingkunganKerja1['idLingkunganKerja']){ echo " selected";}?>><?=$resultLingkunganKerja1['namaLingkunganKerja'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">2.</div>
									<select name="lingKerDisukai2" id="lingKerDisukai2" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execLingkunganKerja2 = mysql_query($queryLingkunganKerja);
											while($resultLingkunganKerja2 = mysql_fetch_array($execLingkunganKerja2))
											{
												?><option value="<?=$resultLingkunganKerja2['idLingkunganKerja'];?>"<?php if($data['lingKerDisukai2'] == $resultLingkunganKerja2['idLingkunganKerja']){ echo " selected";}?>><?=$resultLingkunganKerja2['namaLingkunganKerja'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">3.</div>
									<select name="lingKerDisukai3" id="lingKerDisukai3" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execLingkunganKerja3 = mysql_query($queryLingkunganKerja);
											while($resultLingkunganKerja3 = mysql_fetch_array($execLingkunganKerja3))
											{
												?><option value="<?=$resultLingkunganKerja3['idLingkunganKerja'];?>"<?php if($data['lingKerDisukai3'] == $resultLingkunganKerja3['idLingkunganKerja']){ echo " selected";}?>><?=$resultLingkunganKerja3['namaLingkunganKerja'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">4.</div>
									<select name="lingKerDisukai4" id="lingKerDisukai4" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execLingkunganKerja4 = mysql_query($queryLingkunganKerja);
											while($resultLingkunganKerja4 = mysql_fetch_array($execLingkunganKerja4))
											{
												?><option value="<?=$resultLingkunganKerja4['idLingkunganKerja'];?>"<?php if($data['lingKerDisukai4'] == $resultLingkunganKerja4['idLingkunganKerja']){ echo " selected";}?>><?=$resultLingkunganKerja4['namaLingkunganKerja'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">5.</div>
									<select name="lingKerDisukai5" id="lingKerDisukai5" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execLingkunganKerja5 = mysql_query($queryLingkunganKerja);
											while($resultLingkunganKerja5 = mysql_fetch_array($execLingkunganKerja5))
											{
												?><option value="<?=$resultLingkunganKerja5['idLingkunganKerja'];?>"<?php if($data['lingKerDisukai5'] == $resultLingkunganKerja5['idLingkunganKerja']){ echo " selected";}?>><?=$resultLingkunganKerja5['namaLingkunganKerja'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">6.</div>
									<select name="lingKerDisukai6" id="lingKerDisukai6" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execLingkunganKerja6 = mysql_query($queryLingkunganKerja);
											while($resultLingkunganKerja6 = mysql_fetch_array($execLingkunganKerja6))
											{
												?><option value="<?=$resultLingkunganKerja6['idLingkunganKerja'];?>"<?php if($data['lingKerDisukai6'] == $resultLingkunganKerja6['idLingkunganKerja']){ echo " selected";}?>><?=$resultLingkunganKerja6['namaLingkunganKerja'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="lokasiKerja1" class="control-label"><b>Location Priority</b></label>
								<div class="input-group">
									<div class="input-group-addon">1.</div>
									<select name="lokasiKerja1" id="lokasiKerja1" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$queryProvinsi = "SELECT * FROM tableProvinsi";
											$execProvinsi1 = mysql_query($queryProvinsi);
											while($resultProvinsi1 = mysql_fetch_array($execProvinsi1))
											{ 
												?><option value="<?=$resultProvinsi1['idProvinsi'];?>"<?php if($data['lokasiKerja1'] == $resultProvinsi1['idProvinsi']){ echo " selected";}?>><?=$resultProvinsi1['namaProvinsi'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">2.</div>
									<select name="lokasiKerja2" id="lokasiKerja2" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execProvinsi2 = mysql_query($queryProvinsi);
											while($resultProvinsi2 = mysql_fetch_array($execProvinsi2))
											{ 
												?><option value="<?=$resultProvinsi2['idProvinsi'];?>"<?php if($data['lokasiKerja2'] == $resultProvinsi2['idProvinsi']){ echo " selected";}?>><?=$resultProvinsi2['namaProvinsi'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon">3.</div>
									<select name="lokasiKerja3" id="lokasiKerja3" class="form-control">
										<option value="" >-- Select One --</option>
										<?php
											$execProvinsi3 = mysql_query($queryProvinsi);
											while($resultProvinsi3 = mysql_fetch_array($execProvinsi3))
											{ 
												?><option value="<?=$resultProvinsi3['idProvinsi'];?>"<?php if($data['lokasiKerja3'] == $resultProvinsi3['idProvinsi']){ echo " selected";}?>><?=$resultProvinsi3['namaProvinsi'];?></option><?php
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="mutasi" class="control-label"><b>Mutated/reassigned at the branch office</b></label>
								<label class="radio-inline"><input type="radio" name="mutasi" id="mutasiY" <?php if($data['mutasi'] == "Yes"){ echo "checked";}?> value="Yes" default>Yes</b></label>
								<label class="radio-inline"><input type="radio" name="mutasi" id="mutasiN" <?php if($data['mutasi'] == "No"){ echo "checked";}?> value="No">No</b></label>
							</div>
							<div class="form-group">
								<label for="dinasLuarKota" class="control-label"><b>Business trips to the branch office</b></label>
								<label class="radio-inline"><input type="radio" name="dinasLuarKota" id="dinasLuarKotaY" <?php if($data['dinasLuarKota'] == "Yes"){ echo "checked";}?> value="Yes" default>Yes</b></label>
								<label class="radio-inline"><input type="radio" name="dinasLuarKota" id="dinasLuarKotaN" <?php if($data['dinasLuarKota'] == "No"){ echo "checked";}?> value="No">No</b></label>
							</div>
							<div class="form-group">
								<label for="penempatanOki" class="control-label"><b>Placement in South Sumatera (Site)</b></label>
								<label class="radio-inline"><input type="radio" name="penempatanOki" id="penempatanOkiY" <?php if($data['penempatanOki'] == "Yes"){ echo "checked";}?> value="Yes" default>Yes</b></label>
								<label class="radio-inline"><input type="radio" name="penempatanOki" id="penempatanOkiN" <?php if($data['penempatanOki'] == "No"){ echo "checked";}?> value="No">No</b></label>
							</div>
							<div class="form-group">
								<label for="menghadapiMasalah" class="control-label"><b>How to solve problems in working</b></label>
								<textarea name="menghadapiMasalah" id="menghadapiMasalah" class="form-control" placeholder="Describe briefly!"><?=$data['menghadapiMasalah'];?></textarea>
							</div>
							<div class="form-group">
								<label for="kondisiSulit" class="control-label"><b>The condition of the hard decisions</b></label>
								<textarea name="kondisiSulit" id="kondisiSulit" class="form-control" placeholder="Describe briefly!"><?=$data['kondisiSulit'];?></textarea>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Specialisation & Personal Concept -->

			<!-- Submit -->
			<section class=" bg-img" style="background-image: url(assets/img/bg-facts.jpg);">
				<div class="container">
					<header class="section-header">
						<span>Are you done?</span>
						<h2>Submit resume</h2>
						<p>Please review your information once more and press the below button to put your resume online.</p>
					</header>
					<div class="form-group">
						<? if(isset($_SESSION['nama']))
						{ ?><p class="text-center"><input type="hidden" name="nama" value="<?=$nama?>"><input class="btn btn-success" type="submit" name="edit" value="Submit Resume"></p><? }
						else
						{ ?><p class="text-center"><input class="btn btn-success btn-xl btn-round" type="submit" name="save" value="Submit Resume"></p><? } 
						?>
					</div>
				</div>
			</section>
			<!-- END Submit -->
		</main>
		<!-- END Main container -->
    </form>

	<!-- Site footer -->
	<? include_once('layout/footer.php'); ?>
    <!-- END Site footer -->

    <!-- Back to top button -->
    <a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
    <!-- END Back to top button -->

    <!-- Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/vendors/summernote/summernote.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
