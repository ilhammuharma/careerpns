    <?
	

	
	//echo $_SERVER['REQUEST_URI'];
	?>
	<nav class="navbar">
      <div class="container">

        <!-- Logo -->
        <div class="pull-left">
          <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

          <div class="logo-wrapper">
            <a class="logo" href="<?=$base_url?>"><img src="assets/img/logo.png" alt="logo"></a>
            <a style="margin-top:-10px;" class="logo-alt" href="index.html"><img src="assets/img/logo1.png" alt="logo-alt"></a>
          </div>

        </div>
        <!-- END Logo -->
		<div class="pull-right user-login">
        <!-- User account -->
		<? if(isset($_SESSION['nama'])){ ?>
		<div class="dropdown user-account">
			<strong><?=$_SESSION['nama']?></strong>
            <a class="dropdown-toggle" style="margin-left:5px;" href="#" data-toggle="dropdown">
              <img src="assets/img/logo-envato.png" alt="avatar">
            </a>
			
            <ul class="dropdown-menu dropdown-menu-right text-right">

              <li style="text-align:right;"><a href="<?=$base_url?>logout.php">LOGOUT</a></li>
            </ul>
          </div>
		<? }else{ ?>
        
          <a class="btn btn-sm btn-primary" href="login.php">LOGIN</a> or <a href="register.php" style="margin-left:5px;">REGISTER</a>
       
		<? }?>
		 </div>
        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
          <li><a <? if($_SERVER['REQUEST_URI']=='/'){echo 'class="active"';}?> href="<?=$base_url?>">HOME</a></li>
          <li><a <?if (strpos($_SERVER['REQUEST_URI'], 'vacancy') !== false) { echo 'class="active"';}?> href="<?=$base_url?>vacancy.php">JOB VACANCY</a></li>
		  <? if(isset($_SESSION['nama'])){ ?><li><a <?if (strpos($_SERVER['REQUEST_URI'], 'resume') !== false) { echo 'class="active"';}?> href="<?=$base_url?>resume-detail.php">MY RESUME</a></li><?}?>
          <!--<li><a <?//if (strpos($_SERVER['REQUEST_URI'], 'news') !== false) { echo 'class="active"';}?> href="<?//=$base_url?>news">NEWS</a></li>-->
        </ul>
        <!-- END Navigation menu -->

      </div>
    </nav>