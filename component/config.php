<?
	$server = "localhost";
	$username = "adminit";
	$password = "ruangit";
	$db = "zadmin_career";
	mysql_connect($server, $username, $password);
	mysql_select_db($db);
	mysqli_connect("localhost", "adminit", "ruangit", "zadmin_career");
	date_default_timezone_set('Asia/Jakarta');
	$base_url = "http://career.pratamanusantara.co.id/";
	$mysqlConnection=mysql_connect($server, $username, $password);
	if (!$mysqlConnection)
	{
	  echo "Please try later.";
	}
	else
	{
	mysql_select_db($db, $mysqlConnection);
	}
	
	/*function tanggal($data)
	{
		$datetime=explode(" ", $data);
		$date=explode("-",$datetime[0]);
		$time=explode(":",$datetime[1]);
		if($date[1]=="01"){$bulan="January";}
		else if($date[1]=="02"){$bulan="February";}
		else if($date[1]=="03"){$bulan="March";}
		else if($date[1]=="04"){$bulan="April";}
		else if($date[1]=="05"){$bulan="May";}
		else if($date[1]=="06"){$bulan="June";}
		else if($date[1]=="07"){$bulan="July";}
		else if($date[1]=="08"){$bulan="August";}
		else if($date[1]=="09"){$bulan="September";}
		else if($date[1]=="10"){$bulan="October";}
		else if($date[1]=="11"){$bulan="November";}
		else if($date[1]=="12"){$bulan="December";}
		echo $datetime[1]."<br>".$date[2]." $bulan ".$date[0];
	}*/
	
	function tanggal2($data)
	{
		$datetime=explode(" ", $data);
		$date=explode("-",$datetime[0]);
		if($date[1]=="01"){$bulan="January";}
		else if($date[1]=="02"){$bulan="February";}
		else if($date[1]=="03"){$bulan="March";}
		else if($date[1]=="04"){$bulan="April";}
		else if($date[1]=="05"){$bulan="May";}
		else if($date[1]=="06"){$bulan="June";}
		else if($date[1]=="07"){$bulan="July";}
		else if($date[1]=="08"){$bulan="August";}
		else if($date[1]=="09"){$bulan="September";}
		else if($date[1]=="10"){$bulan="October";}
		else if($date[1]=="11"){$bulan="November";}
		else if($date[1]=="12"){$bulan="December";}
		echo $date[2]." $bulan ".$date[0];
	}
	
	/*function tanggal4($data)
	{
		if($data=='0000-00-00 00:00:00')
		{}
		else
		{
			$datetime=explode(" ", $data);
			$date=explode("-",$datetime[0]);
			$time=explode(":",$datetime[1]);
			if($date[1]=="01"){$bulan="January";}
			else if($date[1]=="02"){$bulan="February";}
			else if($date[1]=="03"){$bulan="March";}
			else if($date[1]=="04"){$bulan="April";}
			else if($date[1]=="05"){$bulan="May";}
			else if($date[1]=="06"){$bulan="June";}
			else if($date[1]=="07"){$bulan="July";}
			else if($date[1]=="08"){$bulan="August";}
			else if($date[1]=="09"){$bulan="September";}
			else if($date[1]=="10"){$bulan="October";}
			else if($date[1]=="11"){$bulan="November";}
			else if($date[1]=="12"){$bulan="December";}
			echo $date[2]." $bulan ".$date[0]." ".$datetime[1];
		}
	}
	
	function hari($hari)
	{
		if($hari=='Sunday'){echo "Minggu";}
		else if($hari=='Monday'){echo "Senin";}
		else if($hari=='Tuesday'){echo "Selasa";}
		else if($hari=='Wednesday'){echo "Rabu";}
		else if($hari=='Thursday'){echo "Kamis";}
		else if($hari=='Friday'){echo "Jumat";}
		else if($hari=='Saturday'){echo "Sabtu";}
	}
	
	function bilangRatusan($x)
	{
		$kata = array('', 'Satu ', 'Dua ', 'Tiga ' , 'Empat ', 'Lima ', 'Enam ', 'Tujuh ', 'Delapan ', 'Sembilan ');
		$string = '';
		$ratusan = floor($x/100);
		$x = $x % 100;
		if ($ratusan > 1) $string .= $kata[$ratusan]."Ratus ";
		else if ($ratusan == 1) $string .= "Seratus ";
		$puluhan = floor($x/10);
		$x = $x % 10;
		if ($puluhan > 1)
		{
			$string .= $kata[$puluhan]."Puluh ";
			$string .= $kata[$x];
		}
		else if (($puluhan == 1) && ($x > 0)) $string .= $kata[$x]."Belas ";
		else if (($puluhan == 1) && ($x == 0)) $string .= $kata[$x]."Sepuluh ";
		else if ($puluhan == 0) $string .= $kata[$x];
		return $string;
	}
	
	function terbilang($x)
	 
	{
		$x = number_format($x, 0, "", ".");
		$pecah = explode(".", $x);
		$string = "";
		for($i = 0; $i <= count($pecah)-1; $i++)
		{
			if ((count($pecah) - $i == 5) && ($pecah[$i] != 0)) $string .= bilangRatusan($pecah[$i])."Triliyun ";
			else if ((count($pecah) - $i == 4) && ($pecah[$i] != 0)) $string .= bilangRatusan($pecah[$i])."Milyar ";
			else if ((count($pecah) - $i == 3) && ($pecah[$i] != 0)) $string .= bilangRatusan($pecah[$i])."Juta ";
			else if ((count($pecah) - $i == 2) && ($pecah[$i] == 1)) $string .= "Seribu ";
			else if ((count($pecah) - $i == 2) && ($pecah[$i] != 0)) $string .= bilangRatusan($pecah[$i])."Ribu ";
			else if ((count($pecah) - $i == 1) && ($pecah[$i] != 0)) $string .= bilangRatusan($pecah[$i]);
		}
		return $string;
	}*/
?>