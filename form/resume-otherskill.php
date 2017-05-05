<?
	//session_start();
	ini_set('display_errors', 1);
	//include('component/config.php');
?>
<div class="popdown-content">
	<header>
		<h2>Additional Skills</h2>
	</header>
	<section class="body">
		<form role="form" id="formOskill" action="<?=$base_url?>resume-proses.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
			<div class="form-group">
				<label for="skill" class="control-label">Skill Name</label>
				<input type="text" name="skill" class="form-control" id="skill" placeholder="Skill Name" required>
			</div>
			<div class="form-group">
				<label for="tingkat-skill" class="control-label">Ability Level</label>
				<select name="tingkat-skill" id="tingkat-skill" class="form-control">
				<option value="" >-- Select One --</option>
				<?php
					$queryTingkatKeahlian = "SELECT * FROM tingkatKeahlian ORDER BY gradeKeahlian";
					$execTingkatKeahlian3 = mysql_query($queryTingkatKeahlian);
					while($resultTingkatKeahlian3 = mysql_fetch_array($execTingkatKeahlian3))
					{
						?>
							<option value="<?php echo $resultTingkatKeahlian3['gradeKeahlian'];?>"><?php echo $resultTingkatKeahlian3['tingkatKeahlian'];?></option>
						<?php
					}
					
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="otherskill-keterangan" class="control-label">Description</label>
				<input type="text" name="otherskill-keterangan" class="form-control" id="otherskill-keterangan">
			</div>
	</section>
	<footer>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" id="saveOskill" name="saveOskill">Save</button>
				<button type="button" class="btn btn-default" onclick="javascript:location.href='<?=$base_url?>resume-detail.php'">Cancel</button>
			</div>
	</footer>
		</form>
</div>