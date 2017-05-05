<? 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="keywords" content="">

    <title>Login | Career PT. Pratama Nusantara Sakti</title>

    <!-- Styles -->
    <link href="assets/css/app.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
	<link rel="icon" href="assets/img/logo-icon.png" sizes="32x32" />
	<link rel="icon" href="assets/img/logo-icon.png" sizes="192x192">
  </head>

  <body class=" login-page nav-on-header smart-nav "  style="background-image: url(assets/img/h7.jpg);">

    <!-- Navigation bar -->
	<? if(isset($_SESSION['reg'])){ ?>
    <div class="alert alert-success text-center" id="float-bar"style="padding:5px 0px;" role="alert">
	<?=$_SESSION['reg']?>
    </div>
	<? }else if(isset($_SESSION['email'])){ ?>
	<div class="alert alert-danger text-center" id="float-bar"style="padding:5px 0px;" role="alert">
	Email or password not valid!
    </div>
	<? } ?>
	<main>
		
      <div class="login-block" style="margin:-50px 0px 0px 0px; padding:20px 30px; overflow:hidden; width:100%; background-color:rgba(255, 255, 255, 0.8);">
        <a href="index.php"><img src="assets/img/logo-login2.png" alt="" style="width:60%"></a>
        <br>
		<br>

        <form action="<?=$base_url?>log_proses.php" method="post">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <input type="text" name="email" class="form-control" placeholder="Email" value="<? if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>">
            </div>
          </div>
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
          </div>

          <button class="btn btn-primary btn-block" style="border-radius:0px;" type="submit" name="login">Login</button>

          <div class="col-xs-6" style="text-align:left; padding:5px 0px;">
				  <font style="font-size:14px;"><a href="register.php">Register an account</a></font>
			</div>
			<div class="col-xs-6" style="text-align:right; padding:5px 0px;">
				  <font style="font-size:14px;"><a href="forgot.php">Forgot password?</a></font>
			</div>

        </form>
		
          
      </div>


    </main>
	<? if (isset($_SESSION['reg'])){ unset($_SESSION['reg']); }?>
	<? if (isset($_SESSION['name'])){ unset($_SESSION['name']); }?>
    


    <!-- Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/custom.js"></script>
	<script type='text/javascript'>
		$(document).ready(function(){
		$('#float-bar').slideDown(445,function(){
		$(this).show(function(){
		setTimeout(function (){
		$('#float-bar').slideUp(445);
		},4000);
		});
		});
		});
		
	</script>
  </body>

</html>
