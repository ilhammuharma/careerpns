<?
	//session_start();
	ini_set('display_errors', 1);
	//include('component/config.php');
?>
<div class="popdown-content">
	<header>
		<h2>Language Skills</h2>
	</header>
	<section class="body">
		<form role="form" id="formLang" action="<?=$base_url?>resume-proses.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
			<?
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$lang = "select * from skillBahasaWorker where idTable='".$id."' ";
					$execlang = mysql_query($lang);
					$cet_lang = mysql_fetch_array($execlang);
				}
			?>
			<div class="form-group">
				<label for="bahasa" class="control-label">Foreign Language</label>
				<select name="bahasa" id="bahasa" class="form-control">
				<option value="" >-- Select One --</option>
				<?php
					$queryBahasa = "SELECT * FROM tableBahasa ORDER BY namaBahasa ASC";
					$execBahasa = mysql_query($queryBahasa);
					while($resultBahasa = mysql_fetch_array($execBahasa))
					{
						?><option value="<?php echo $resultBahasa['idBahasa'];?>" <?php if($resultBahasa['idBahasa'] == $cet_lang['idBahasa']){ echo "selected";}?>><?php echo $resultBahasa['namaBahasa'];?></option><?php
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="bahasa-lisan" class="control-label">Speaking</label>
				<select name="bahasa-lisan" id="bahasa-lisan" class="form-control">
				<option value="" >-- Select One --</option>
				<?php
					$queryTingkatKeahlian = "SELECT * FROM tingkatKeahlian ORDER BY gradeKeahlian";
					$execTingkatKeahlian1 = mysql_query($queryTingkatKeahlian);
					while($resultTingkatKeahlian1 = mysql_fetch_array($execTingkatKeahlian1))
					{
						?><option value="<?php echo $resultTingkatKeahlian1['gradeKeahlian'];?>" <?php if($resultTingkatKeahlian1['gradeKeahlian'] == $cet_lang['tingkatLisan']){ echo "selected";}?>><?php echo $resultTingkatKeahlian1['tingkatKeahlian'];?></option><?php
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="bahasa-menulis" class="control-label">Writing</label>
				<select name="bahasa-menulis" id="bahasa-menulis" class="form-control">
				<option value="" >-- Select One --</option>
				<?php
					$execTingkatKeahlian2 = mysql_query($queryTingkatKeahlian);
					while($resultTingkatKeahlian2 = mysql_fetch_array($execTingkatKeahlian2))
					{
						?><option value="<?php echo $resultTingkatKeahlian2['gradeKeahlian'];?>" <?php if($resultTingkatKeahlian2['gradeKeahlian'] == $cet_lang['tingkatMenulis']){ echo "selected";}?>><?php echo $resultTingkatKeahlian2['tingkatKeahlian'];?></option><?php
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="bahasa-membaca" class="control-label">Reading</label>
				<select name="bahasa-membaca" id="bahasa-membaca" class="form-control">
				<option value="" >-- Select One --</option>
				<?php
					$execTingkatAhli3 = mysql_query($queryTingkatKeahlian);
					while($resultTingkatAhli3 = mysql_fetch_array($execTingkatAhli3))
					{
						?><option value="<?php echo $resultTingkatAhli3['gradeKeahlian'];?>" <?php if($resultTingkatAhli3['gradeKeahlian'] == $cet_lang['tingkatMembaca']){ echo "selected";}?>><?php echo $resultTingkatAhli3['tingkatKeahlian'];?></option><?php
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="bahasa-keterangan" class="control-label">Description</label>
				<input type="text" name="bahasa-keterangan" class="form-control" id="bahasa-keterangan" value="<?=$cet_lang['keteranganBahasa']?>" placeholder="(The result of IELTS / TOEFL / TOEIC / others)">
			</div>
	</section>
	<footer>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" id="saveLang" name="saveLang">Save</button>
			</div>
	</footer>
		</form>
</div>