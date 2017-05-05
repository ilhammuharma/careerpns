<?
	//session_start();
	ini_set('display_errors', 1);
	include('../component/config.php');
?>
<div class="popdown-content" style="height:auto;">
	<header>
		<h2>Families</h2>
	</header>
	<section class="body">
		<form role="form" id="formFamilies" action="<?=$base_url?>resume-proses.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
			<?
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$fam = "select * from keluarga where idKeluarga='".$id."' ";
					$execfam = mysql_query($fam);
					$cet_fam = mysql_fetch_array($execfam);
				}
			?>
			<div class="form-group">
				<label for="hubungan" class="control-label">Family Relationships</label>
				<select name="hubungan" id="hubungan" class="form-control">
				<option value="" >-- Select One --</option>
				<?php
					$queryHubunganKeluarga = "SELECT * FROM hubunganKeluarga";
					$execHubunganKeluarga = mysql_query($queryHubunganKeluarga);
					while($resultHubunganKeluarga = mysql_fetch_array($execHubunganKeluarga))
					{
						?><option value="<?php echo $resultHubunganKeluarga['gradeHubungan'];?>" <?php if($resultHubunganKeluarga['gradeHubungan'] == $cet_fam['hubungan']){echo "selected";}?>><?php echo $resultHubunganKeluarga['namaHubungan'];?></option><?php
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="namaanggota" class="control-label">Name</label>
				<input type="text" name="namaanggota" class="form-control" id="namaanggota" value="<?=$cet_fam['nama']?>" placeholder="Name" required>
			</div>
			<div class="form-group">
				<label for="gender" class="control-label">Gender</label>
				<label class="radio-inline"><input type="radio" name="gender" id="genderPa" <?php if($cet_fam['gender'] == "Male"){ echo "checked";}?> value="Male" default>Male</label>
				<label class="radio-inline"><input type="radio" name="gender" id="genderPi" <?php if($cet_fam['gender'] == "Female"){ echo "checked";}?> value="Female">Female</label>
			</div>
			<div class="form-group">
				<label for="tempatLahir" class="control-label">Place of Birth</label>
				<input type="text" name="tempatLahir" class="form-control" id="tempatLahir" value="<?=$cet_fam['tempatLahir']?>" placeholder="Place of birth (e.g. Jakarta)" required>
			</div>
			<div class="form-group">
				<label for="tanggalLahir" class="control-label">Date of Birth</label>
				<input type="date" class="form-control" name="tanggalLahir" id="tanggalLahir" value="<?=$cet_fam['tanggalLahir']?>" placeholder="Date of Birth" required >
			</div>
			<div class="form-group">
				<label for="pendidikan" class="control-label">Education</label>
				<select class="form-control" name="pendidikan" id="pendidikan">
				<option value="" >-- Select One --</option>
					<?php
						$queryPendidikan = "SELECT * FROM tingkatPendidikan ORDER BY gradePendidikan ASC";
						$execPendidikan = mysql_query($queryPendidikan);
						while($resultPendidikan = mysql_fetch_array($execPendidikan))
						{
							?><option value="<?php echo $resultPendidikan['gradePendidikan'];?>" <?php if($resultPendidikan['gradePendidikan'] == $cet_fam['pendidikan']){echo "selected";}?>><?php echo $resultPendidikan['namaPendidikan'];?></option><?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="pekerjaan" class="control-label">Job</label>
				<input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?=$cet_fam['pekerjaan']?>" placeholder="Position">
			</div>
			<div class="form-group">
				<label for="perusahaan" class="control-label">Company Name</label>
				<input type="text" name="perusahaan" class="form-control" id="perusahaan" value="<?=$cet_fam['perusahaan']?>" placeholder="Company name">
			</div>
	</section>
	<footer>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" id="saveFamilies" name="saveFamilies">Save</button>
				<!--<button class="close-popdown">Close</button>-->
				<button type="button" class="btn btn-default" onclick="javascript:location.href='<?=$base_url?>resume-detail.php'">Cancel</button>
			</div>
	</footer>
		</form>
</div>