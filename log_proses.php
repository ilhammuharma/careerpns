<?
session_start();
include('component/config.php');
//echo $base_url;
if(isset($_POST['register'])){
	//echo "haha";
	$email=$_POST['email'];
	$cek=mysql_num_rows(mysql_query("select `email` from userworker where `email`='$email'"));
	if($cek==0){
	require 'PHPMailer/PHPMailerAutoload.php';
	include ('PHPMailer/header.php');
	$mail->addAddress($_POST['email'],$_POST['nama']);   // Add a recipient
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('tama.priambodo@pns.co.id');

	$mail->isHTML(true);  // Set email format to HTML
	//$bodyContent = '<p>kirim email</p>';
	$bodyContent = '<p>Hi '.$_POST['name'].',</p>';
	$bodyContent .= '<p>Thank you for register at PT. Pratama Nusantara Sakti Career website, please confirm your email account with clicking link below:<br></p>';
	$bodyContent .= '<p><a href="http://career.pratamanusantara.co.id/log_proses.php?confirm='.md5($_POST['email']).'">http://career.pratamanusantara.co.id/log_proses.php?confirm='.md5($_POST['email']).'<a></p>';
	$bodyContent .= '<br><br><p>Best Regards,<br>PNS Administrator</p>';
	

	$mail->Subject = 'Confirm your email address';
	$mail->Body    = $bodyContent;

	if(!$mail->send()) {
		$_SESSION['reg']="Email service is in trouble, please try register again later or contact hrd@pns.co.id!";
		echo"
		<script>
		window.location.href = '".$base_url."register.php';
		</script>
		";
	} else {
		$_SESSION['reg']="Confirmation message has been sent to your email. Please check!";
		mysql_query("insert into userworker (namaUser, email, password, confirm_email) value ('".$_POST['name']."','".$_POST['email']."','".md5($_POST['password'].'MONSTERPNS')."','".md5($_POST['email'])."')");
		echo"
		<script>
		window.location.href = '".$base_url."login.php';
		</script>
		";
	}
	}else{
		$_SESSION['reg']="Your email ".$_POST['email']." is already user before, please choose another email.";
		$_SESSION['name']=$_POST['name'];
		echo"
		<script>
		window.location.href = '".$base_url."register.php';
		</script>
		";
	}
}else if(isset($_GET['confirm'])){
	$data=mysql_query("update userworker set active='1' where confirm_email='".$_GET['confirm']."'");
	if($data){
		$_SESSION['reg']="Thank you for your confirmation, please login and join our company";
		
		echo"
		<script>
		window.location.href = '".$base_url."login.php';
		</script>
		";
	}else{
		$_SESSION['reg']="Your link confirmation is not valid, please try again or contact hrd@pns.co.id.";
		
		echo"
		<script>
		window.location.href = '".$base_url."register.php';
		</script>
		";
	} 
}else if(isset($_POST['login'])){
	$cek=mysql_num_rows(mysql_query("select idWorker from userworker where email='".$_POST['email']."' and password='".md5($_POST['password'].'MONSTERPNS')."'"));
	$data=mysql_fetch_array(mysql_query("select idWorker, namaUser, email from userworker where email='".$_POST['email']."' and password='".md5($_POST['password'].'MONSTERPNS')."'"));
	if($cek!=0){
		$_SESSION['id']=$data['idWorker'];
		$_SESSION['nama']=$data['namaUser'];
		$_SESSION['email']=$data['email'];
		echo"
		<script>
		window.location.href = '".$base_url."';
		</script>
		";
	}else{
		$_SESSION['email']=$_POST['email'];
		echo"
		<script>
		window.location.href = '".$base_url."login.php';
		</script>
		";
	}
}
?>