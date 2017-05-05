<?
	//session_start();
	ini_set('display_errors', 1);
	include('../component/config.php');
?>
<div class="popdown-content" style="height:auto;">
	<header>
		<h2>Work Experiences</h2>
	</header>
	<section class="body">
		<form role="form" id="formExp" action="<?=$base_url?>resume-proses.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
			<?
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$exp = "select * from pengalamanWorker where idPengalaman='".$id."' ";
					$execexp = mysql_query($exp);
					$cet_exp = mysql_fetch_array($execexp);
				}
			?>
			<div class="form-group">
				<label for="pengalaman-perusahaan" class="control-label">Company Name</label>
				<input type="text" name="pengalaman-perusahaan" class="form-control" id="pengalaman-perusahaan" value="<?=$cet_exp['namaPerusahaan']?>" placeholder="Company name" required>
			</div>
			<div class="form-group">
				<label for="pengalaman-bidang" class="control-label">Business Fields</label>
				<select name="pengalaman-bidang" id="pengalaman-bidang" class="form-control">
					<option value="" >-- Select One --</option>
					<?php
						$queryBidangUsaha = "SELECT * FROM bidangUsaha ORDER BY namaBidangUsaha ASC";
						$execBidangUsaha = mysql_query($queryBidangUsaha);
						while($resultBidangUsaha = mysql_fetch_array($execBidangUsaha))
						{
							?><option value="<?php echo $resultBidangUsaha['idUsaha'];?>" <?php if($resultBidangUsaha['idUsaha'] == $cet_exp['bidangUsaha']){echo "selected";}?> ><?php echo $resultBidangUsaha['namaBidangUsaha'];?></option><?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="pengalaman-posisi" class="control-label">Position</label>
				<input type="text" name="pengalaman-posisi" class="form-control" id="pengalaman-posisi" value="<?=$cet_exp['posisi']?>" placeholder="Position" required>
			</div>
			<div class="form-group">
				<label for="pengalaman-lokasi" class="control-label">Location</label>
				<select name="pengalaman-lokasi" id="pengalaman-lokasi" class="form-control">
					<option value="" >-- Select One --</option>
					<?php
						$queryExpProv = "SELECT * FROM tableProvinsi";
						$execExpProv = mysql_query($queryExpProv);
						while($listProv = mysql_fetch_array($execExpProv))
						{
							?><option value="<?php echo $listProv['idProvinsi']?>" <?php if($listProv['idProvinsi'] == $cet_exp['lokasi']){ echo "selected";}?>><?php echo $listProv['namaProvinsi'];?></option><?php
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label class="control-label">Period</label>
				<div class="input-group input-large custom-date-range" data-date-format="dd/mm/yyyy">
					<input type="date" class="form-control dpd1" id="start-date-work" name="start-date-work" value="<?=$cet_exp['awalKerja']?>">
					<span class="input-group-addon">To</span>
					<input type="date" class="form-control dpd2" id="end-date-work" name="end-date-work" value="<?=$cet_exp['akhirKerja']?>">
				</div>
				<span class="help-block">Select date range</span>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="endNow" id="endNow" value="1">Present
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="pengalaman-gaji" class="control-label">Last Salary</label>
				<div class="input-group">
					<div class="input-group-addon"><u>+</u> Rp</div>
					<input type="text" class="form-control" name="pengalaman-gaji" id="pengalaman-gaji" value="<?=$cet_exp['gaji']?>" placeholder="Last salary (e.g. 5000000)">
				</div>
			</div>
			<div class="form-group">
				<label for="pengalaman-grossNett" class="control-label">Gross/Nett</label>
				<label class="radio-inline"><input type="radio" name="pengalaman-grossNett" id="pengalaman-gross" <?php if($cet_exp['grossNett'] == "Gross"){ echo "checked";}?> value="Gross" default>Gross</label>
				<label class="radio-inline"><input type="radio" name="pengalaman-grossNett" id="pengalaman-nett" <?php if($cet_exp['grossNett'] == "Nett"){ echo "checked";}?> value="Nett">Nett</label>
			</div>
			<div class="form-group">
				<label for="pengalaman-bawahan" class="control-label">Number of Subordinates (Jumlah Bawahan)</label>
				<input type="text" name="pengalaman-bawahan" class="form-control" id="pengalaman-bawahan" value="<?=$cet_exp['jumlahBawahan']?>" placeholder="Number of subordinates (e.g. 2)">
			</div>
			<div class="form-group">
				<label for="pengalaman-alasan" class="control-label">Reason for Move</label>
				<textarea name="pengalaman-alasan" id="pengalaman-alasan" class="form-control" value="<?=$cet_exp['deskripsi']?>" placeholder="Describe briefly!"></textarea>
			</div>
			<div class="form-group">
				<label for="pengalaman-namaAtasan" class="control-label">The Name of the Boss</label>
				<input name="pengalaman-namaAtasan" id="pengalaman-namaAtasan" rows="3" class="form-control" value="<?=$cet_exp['namaAtasan']?>" placeholder="The name of the boss who can be used as a reference on your data">
			</div>
			<div class="form-group">
				<label for="pengalaman-jabatanAtasan" class="control-label">The Position of the Boss</label>
				<input name="pengalaman-jabatanAtasan" id="pengalaman-jabatanAtasan" rows="3" class="form-control" value="<?=$cet_exp['jabatanAtasan']?>" placeholder="The position of the boss">
			</div>
			<div class="form-group">
				<label for="pengalaman-telpAtasan" class="control-label">The Phone Number of the Boss</label>
				<div class="input-group">
					<div class="input-group-addon">+62</div>
					<input type="text" class="form-control" name="pengalaman-telpAtasan" id="pengalaman-telpAtasan" value="<?=$cet_exp['telpAtasan']?>" placeholder="The phone number of the boss (e.g. 08123456789)">
				</div>
			</div>
			<div class="form-group">
				<label for="pengalaman-jobdes" class="control-label">Responsibilities</label>
				<textarea name="pengalaman-jobdes" id="pengalaman-jobdes" class="form-control" value="<?=$cet_exp['jobdes']?>" placeholder="Describe briefly!"></textarea>
			</div>
	</section>
	<footer>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" id="saveExp" name="saveExp">Save</button>
			</div>
	</footer>
		</form>
</div>