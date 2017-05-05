<?php
	error_reporting(0);
	include('component/config.php');
	$nama=$_SESSION['nama'];
	$tanggal=date('Y-m-d H:i:s');
	$compname=php_uname('n');
	
	if(isset($_POST['apply']))
	{
		$apply = mysql_query("insert into vacancyapply (
			idApply,
			createdate,
			idVacancy,
			idWorker,
			status
			) values (
			'',
			'".date('Y-m-d')."',
			'".$_POST['idvacancy']."',
			'".$_POST['idWorker']."',
			'1'
			)");
		if($apply)
		{
			$query =  mysql_query("update userWorker set 
			statusRekrut='1',
			nomorFptk = '".$_POST['nomorFptk']."'
			where idWorker='".$_POST['idWorker']."'");
		}
		/*echo "insert into vacancyapply (
			idApply,
			idVacancy
			,
			idWorker
			) values (
			'',
			'".$_POST['idvacancy']."',
			'".$_POST['idWorker']."'
			)";*/
		if($query)
		{ 
			echo"
			<script>
			alert('You have successfully applied for this job'); 
			window.location.href = '".$url."vacancy.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Failed to apply'); 
			self.history.back();
			</script>
			";	
		}
	}
	else {}
?>