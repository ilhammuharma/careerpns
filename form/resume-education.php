<?
	//session_start();
	ini_set('display_errors', 1);
	include('../component/config.php');
?>
<div class="popdown-content" style="height:auto;">
	<header>
		<h2>Education</h2>
	</header>
	<section class="body">
		<form role="form" id="formEdu" action="../resume-proses.php" method="post">
			<?
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$edu = "select * from pendidikanWorker where idPendidikan='".$id."' ";
					$execedu = mysql_query($edu);
					$cet_edu = mysql_fetch_array($execedu);
				}
			?>
			<div class="form-group">
				<label for="namaInstansi" class="control-label">School/University</label>
				<input type="text" name="namaInstansi" class="form-control" value="<?if(isset($_GET['id'])){ echo $cet_edu['namaInstansi'];}?>" placeholder="School/University" required>
			</div>
			<div class="form-group">
				<label for="lokasiInstansi" class="control-label">Location</label>
				<select name="lokasiInstansi" id="lokasiInstansi" class="form-control">
					<option value="" >-- Select One --</option>
					<?php
						$queryEduProv = "SELECT * FROM tableProvinsi";
						$execEduProv = mysql_query($queryEduProv);
						while($listEduProv = mysql_fetch_array($execEduProv))
						{
							?> <option value="<?php echo $listEduProv['idProvinsi'];?>" <?if(isset($_GET['id']) and ($listEduProv['idProvinsi'] == $cet_edu['lokasiInstansi'])){echo "selected";}?>> <?php echo $listEduProv['namaProvinsi'];?> </option> <?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="kualifikasiPendidikan" class="control-label">Qualification</label>
				<select class="form-control" name="kualifikasiPendidikan" id="kualifikasiPendidikan">
					<option value="" >-- Select One --</option>
					<?php
						$queryKualifikasi = "SELECT * FROM tingkatPendidikan ORDER BY gradePendidikan ASC";
						$execKualifikasi = mysql_query($queryKualifikasi);
						while($resultKualifikasi = mysql_fetch_array($execKualifikasi))
						{ 
							?><option value="<?php echo $resultKualifikasi['gradePendidikan'];?>" <?if(isset($_GET['id']) and ($resultKualifikasi['gradePendidikan'] == $cet_edu['kualifikasiPendidikan'])){echo "selected";}?> ><?php echo $resultKualifikasi['namaPendidikan'];?></option><?php 
						} 
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="jurusanPendidikan" class="col-sm-2 control-label">Major</label>
				<select name="jurusanPendidikan" id="jurusanPendidikan" class="form-control">
					<option value="" >-- Select One --</option>
					<?php
						$queryJurusan = "SELECT * FROM tableJurusan ORDER BY namaJurusan ASC";
						$execJurusan = mysql_query($queryJurusan);
						while($resultJurusan = mysql_fetch_array($execJurusan))
						{ 
							?><option value="<?php echo $resultJurusan['idJurusan'];?>" <?if(isset($_GET['id']) and ($resultJurusan['idJurusan'] == $cet_edu['jurusanPendidikan'])){echo "selected";}?>><?php echo $resultJurusan['namaJurusan'];?></option><?php 
							
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="nilai" class="control-label">GPA/Score</label>
				<input name="nilai" class="form-control" id="nilai" value="<?if(isset($_GET['id'])){ echo $cet_edu['nilai'];}?>" placeholder="GPA/Score (e.g. GPA 3.0 of 4.0 or Score 8.0 of 10)">
				<p class="help-block">Use a dot (.) as the decimal separator.</p>
			</div>
			<div class="form-group">
				<label for="tahunMasuk" class="control-label">Entrance Year</label>
				<input name="tahunMasuk" class="form-control" id="tahunMasuk" value="<?if(isset($_GET['id'])){ echo $cet_edu['tahunMasuk'];}?>" placeholder="Entrance year (e.g. 2013)">
			</div>
			<div class="form-group">
				<label for="tahunLulus" class="control-label">Graduation Year</label>
				<input name="tahunLulus" class="form-control" id="tahunLulus" value="<?if(isset($_GET['id'])){ echo $cet_edu['tahunLulus'];}?>" placeholder="Graduation year (e.g. 2017)">
			</div>
	</section>
	<footer>
			<div class="form-group">
			<?if(isset($_GET['id'])){?>
				<input type="hidden" name="id" value="<?=$id?>"> 
				<button type="submit" class="btn btn-primary" id="editEdu" name="editEdu">Edit</button>
			<?}else{?>
				<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
				<button type="submit" class="btn btn-primary" id="saveEdu" name="saveEdu">Save</button>
			<?}?>
				<!--<button type="button" class="btn btn-default" onclick="javascript:location.href='<?=$base_url?>resume-detail.php'">Cancel</button>-->
			</div>
	</footer>
		</form>
</div>