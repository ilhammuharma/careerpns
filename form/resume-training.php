<?
	//session_start();
	ini_set('display_errors', 1);
	//include('component/config.php');
?>
<div class="popdown-content">
	<header>
		<h2>Training / Seminar / Workshop</h2>
	</header>
	<section class="body">
		<form role="form" id="formTraining" action="<?=$base_url?>resume-proses.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
			<?
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$training = "select * from skillTrainingWorker where idTraining='".$id."' ";
					$exectraining = mysql_query($training);
					$cet_training = mysql_fetch_array($exectraining);
				}
			?>
			<div class="form-group">
				<label for="nama_training" class="control-label">Training / Seminar / Workshop</label>
				<input type="text" name="nama_training" class="form-control" id="nama_training" value="<?=$cet_training['namaTraining']?>" placeholder="Training / seminar / workshop" required>
			</div>
			<div class="form-group">
				<label for="penyelenggara_training" class="control-label">Institutional Organizers</label>
				<input type="text" name="penyelenggara_training" class="form-control" id="penyelenggara_training" value="<?=$cet_training['penyelenggaraTraining']?>" placeholder="Institutional organizers" required>
			</div>
			<div class="form-group">
				<label for="tahun_training" class="control-label">Year</label>
				<input type="text" name="tahun_training" class="form-control" id="tahun_training" value="<?=$cet_training['tahunTraining']?>" placeholder="Year (e.g. 2017)" required>
			</div>
			<div class="form-group">
				<label for="keterangan_training" class="control-label">Description</label>
				<select name="keterangan_training" id="keterangan_training" class="form-control">
				<option value="" >-- Select One --</option>
				<?php
					$queryKetTraining = "SELECT * FROM tingkatKetTraining";
					$execKetTraining = mysql_query($queryKetTraining);
					while($listKetTraining = mysql_fetch_array($execKetTraining))
					{
						?><option value="<?php echo $listKetTraining['idKetTraining']?>" <?php if($listKetTraining['idKetTraining'] == $cet_training['keteranganTraining']){ echo "selected";}?>><?php echo $listKetTraining['tingkatKetTraining'];?></option><?php
					}
				?>
				</select>
			</div>
	</section>
	<footer>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" id="saveTraining" name="saveTraining">Save</button>
			</div>
	</footer>
		</form>
</div>