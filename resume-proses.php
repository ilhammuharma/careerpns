<?php
	error_reporting(0);
	include('component/config.php');
	$nama=$_SESSION['nama'];
	$tanggal=date('Y-m-d H:i:s');
	$compname=php_uname('n');
	
	if(isset($_POST['save']))
	{
		$query=mysql_query("insert into userWorker (
			posisi,
			gender,
			kewarganegaraan,
			tempatLahir,
			tanggalLahir,
			noKtp,
			noNpwp,
			noPonsel,
			otherPonsel,
			golonganDarah,
			agama,
			usia,
			alamatKtp,
			alamatSekarang,
			domisili,
			headline,
			summary,
			citaCita,
			motivasiBekerja,
			alasanBekerja,
			expSalary,
			negosiasiGaji,
			tunjanganFasilitas,
			waktuBekerja,
			jenisPekerjaanDisukai1,
			jenisPekerjaanDisukai2,
			jenisPekerjaanDisukai3,
			jenisPekerjaanDisukai4,
			jenisPekerjaanDisukai5,
			lingKerDisukai1,
			lingKerDisukai2,
			lingKerDisukai3,
			lingKerDisukai4,
			lingKerDisukai5,
			lingKerDisukai6,
			lokasiKerja1,
			lokasiKerja2,
			lokasiKerja3,
			mutasi,
			dinasLuarKota,
			penempatanOki,
			tipeOrang,
			menghadapiMasalah,
			kondisiSulit,
			sumberInternal,
			sumberEksternal
			) values (
			'',
			'',
			'".$_POST['posisi']."',
			'".$_POST['gender']."',
			'".$_POST['kewarganegaraan']."',
			'".$_POST['tempatLahir']."',
			'".$_POST['tanggalLahir']."',
			'".$_POST['noKtp']."',
			'".$_POST['noNpwp']."',
			'".$_POST['noPonsel']."',
			'',
			'".$_POST['golonganDarah']."',
			'".$_POST['agama']."',
			'".$_POST['usia']."',
			'".$_POST['alamatKtp']."',
			'".$_POST['alamatSekarang']."',
			'".$_POST['domisili']."',
			'".$_POST['headline']."',
			'".$_POST['summary']."',
			'".$_POST['citaCita']."',
			'".$_POST['motivasiBekerja']."',
			'".$_POST['alasanBekerja']."',
			'".$_POST['expSalary']."',
			'".$_POST['negosiasiGaji']."',
			'".$_POST['tunjanganFasilitas']."',
			'".$_POST['waktuBekerja']."',
			'".$_POST['jenisPekerjaanDisukai1']."',
			'".$_POST['jenisPekerjaanDisukai2']."',
			'".$_POST['jenisPekerjaanDisukai3']."',
			'".$_POST['jenisPekerjaanDisukai4']."',
			'".$_POST['jenisPekerjaanDisukai5']."',
			'".$_POST['lingKerDisukai1']."',
			'".$_POST['lingKerDisukai2']."',
			'".$_POST['lingKerDisukai3']."',
			'".$_POST['lingKerDisukai4']."',
			'".$_POST['lingKerDisukai5']."',
			'".$_POST['lingKerDisukai6']."',
			'".$_POST['lokasiKerja1']."',
			'".$_POST['lokasiKerja2']."',
			'".$_POST['lokasiKerja3']."',
			'".$_POST['mutasi']."',
			'".$_POST['dinasLuarKota']."',
			'".$_POST['penempatanOki']."',
			'',
			'".$_POST['menghadapiMasalah']."',
			'".$_POST['kondisiSulit']."',
			'',
			''
			)");
		/*echo "insert into userWorker (
			posisi,
			gender,
			kewarganegaraan,
			tempatLahir,
			tanggalLahir,
			noKtp,
			noNpwp,
			noPonsel,
			otherPonsel,
			golonganDarah,
			agama,
			usia,
			alamatKtp,
			alamatSekarang,
			domisili,
			headline,
			summary,
			citaCita,
			motivasiBekerja,
			alasanBekerja,
			expSalary,
			negosiasiGaji,
			tunjanganFasilitas,
			waktuBekerja,
			jenisPekerjaanDisukai1,
			jenisPekerjaanDisukai2,
			jenisPekerjaanDisukai3,
			jenisPekerjaanDisukai4,
			jenisPekerjaanDisukai5,
			lingKerDisukai1,
			lingKerDisukai2,
			lingKerDisukai3,
			lingKerDisukai4,
			lingKerDisukai5,
			lingKerDisukai6,
			lokasiKerja1,
			lokasiKerja2,
			lokasiKerja3,
			mutasi,
			dinasLuarKota,
			penempatanOki,
			tipeOrang,
			menghadapiMasalah,
			kondisiSulit,
			sumberInternal,
			sumberEksternal
			) values (
			'',
			'',
			'".$_POST['posisi']."',
			'".$_POST['gender']."',
			'".$_POST['kewarganegaraan']."',
			'".$_POST['tempatLahir']."',
			'".$_POST['tanggalLahir']."',
			'".$_POST['noKtp']."',
			'".$_POST['noNpwp']."',
			'".$_POST['noPonsel']."',
			'',
			'".$_POST['golonganDarah']."',
			'".$_POST['agama']."',
			'".$_POST['usia']."',
			'".$_POST['alamatKtp']."',
			'".$_POST['alamatSekarang']."',
			'".$_POST['domisili']."',
			'".$_POST['headline']."',
			'".$_POST['summary']."',
			'".$_POST['citaCita']."',
			'".$_POST['motivasiBekerja']."',
			'".$_POST['alasanBekerja']."',
			'".$_POST['expSalary']."',
			'".$_POST['negosiasiGaji']."',
			'".$_POST['tunjanganFasilitas']."',
			'".$_POST['waktuBekerja']."',
			'".$_POST['jenisPekerjaanDisukai1']."',
			'".$_POST['jenisPekerjaanDisukai2']."',
			'".$_POST['jenisPekerjaanDisukai3']."',
			'".$_POST['jenisPekerjaanDisukai4']."',
			'".$_POST['jenisPekerjaanDisukai5']."',
			'".$_POST['lingKerDisukai1']."',
			'".$_POST['lingKerDisukai2']."',
			'".$_POST['lingKerDisukai3']."',
			'".$_POST['lingKerDisukai4']."',
			'".$_POST['lingKerDisukai5']."',
			'".$_POST['lingKerDisukai6']."',
			'".$_POST['lokasiKerja1']."',
			'".$_POST['lokasiKerja2']."',
			'".$_POST['lokasiKerja3']."',
			'".$_POST['mutasi']."',
			'".$_POST['dinasLuarKota']."',
			'".$_POST['penempatanOki']."',
			'',
			'".$_POST['menghadapiMasalah']."',
			'".$_POST['kondisiSulit']."',
			'',
			''
			)";*/
		/*if($query)
		{ 
			echo"
			<script>
			alert('Data successfully saved'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Data could not be saved'); 
			self.history.back();
			</script>
			";	
		}*/
	}
	
	/*else if(isset($_SESSION['nama']) && !empty($_SESSION['nama']))
	{
		$nama = $_SESSION['nama'];
		$edit_row = mysql_fetch_array(mysql_query("select * from userWorker where namaUser='".$nama."'"));
		extract($edit_row);
	}*/
	
	else if(isset($_POST['edit']))
	{
		$posisiTanggal = date("Y-m-d", strtotime($_POST['posisiTanggal']));
		$imgFile = $_FILES['foto']['name'];
		$tmp_dir = $_FILES['foto']['tmp_name'];
		$imgSize = $_FILES['foto']['size'];
		$posisi = $_POST['posisi'];
		$gender = $_POST['gender'];
		$kewarganegaraan = $_POST['kewarganegaraan'];
		$tempatLahir = $_POST['tempatLahir'];
		$tanggalLahir = $_POST['tanggalLahir'];
		$noKtp = $_POST['noKtp'];
		$noNpwp = $_POST['noNpwp'];
		$noPonsel = $_POST['noPonsel'];
		$golonganDarah = $_POST['golonganDarah'];
		$agama = $_POST['agama'];
		$usia = $_POST['usia'];
		$alamatKtp = $_POST['alamatKtp'];
		$alamatSekarang = $_POST['alamatSekarang'];
		$domisili = $_POST['domisili'];
		$headline = $_POST['headline'];
		$summary = $_POST['summary'];
		$citaCita = $_POST['citaCita'];
		$motivasiBekerja = $_POST['motivasiBekerja'];
		$alasanBekerja = $_POST['alasanBekerja'];
		$expSalary = $_POST['expSalary'];
		$negosiasiGaji = $_POST['negosiasiGaji'];
		$tunjanganFasilitas = $_POST['tunjanganFasilitas'];
		$waktuBekerja = $_POST['waktuBekerja'];
		$jenisPekerjaanDisukai1 = $_POST['jenisPekerjaanDisukai1'];
		$jenisPekerjaanDisukai2 = $_POST['jenisPekerjaanDisukai2'];
		$jenisPekerjaanDisukai3 = $_POST['jenisPekerjaanDisukai3'];
		$jenisPekerjaanDisukai4 = $_POST['jenisPekerjaanDisukai4'];
		$jenisPekerjaanDisukai5 = $_POST['jenisPekerjaanDisukai5'];
		$lingKerDisukai1 = $_POST['lingKerDisukai1'];
		$lingKerDisukai2 = $_POST['lingKerDisukai2'];
		$lingKerDisukai3 = $_POST['lingKerDisukai3'];
		$lingKerDisukai4 = $_POST['lingKerDisukai4'];
		$lingKerDisukai5 = $_POST['lingKerDisukai5'];
		$lingKerDisukai6 = $_POST['lingKerDisukai6'];
		$lokasiKerja1 = $_POST['lokasiKerja1'];
		$lokasiKerja2 = $_POST['lokasiKerja2'];
		$lokasiKerja3 = $_POST['lokasiKerja3'];
		$mutasi = $_POST['mutasi'];
		$dinasLuarKota = $_POST['dinasLuarKota'];
		$penempatanOki = $_POST['penempatanOki'];
		$menghadapiMasalah = $_POST['menghadapiMasalah'];
		$kondisiSulit = $_POST['kondisiSulit'];
		
		if($imgFile)
		{
			$edit_row = mysql_fetch_array(mysql_query("select * from userWorker where namaUser='".$nama."'"));
			extract($edit_row);
			$upload_dir = 'image/'; // upload directory 
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{   
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['foto']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less than 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, and PNG files are allowed.";  
			} 
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['foto']; // old image from database
		}
		
		if(!isset($errMSG))
		{
			$query = mysql_query("update userworker set 
			foto = '$userpic',
			posisi = '$posisi',
			gender = '$gender',
			kewarganegaraan = '$kewarganegaraan',
			tempatLahir = '$tempatLahir',
			tanggalLahir = '$tanggalLahir',
			noKtp = '$noKtp',
			noNpwp = '$noNpwp',
			noPonsel = '$noPonsel',
			golonganDarah = '$golonganDarah',
			agama = '$agama',
			usia = '$usia',
			alamatKtp = '$alamatKtp',
			alamatSekarang = '$alamatSekarang',
			domisili = '$domisili',
			headline = '$headline',
			summary = '$summary',
			citaCita = '$citaCita',
			motivasiBekerja = '$motivasiBekerja',
			alasanBekerja = '$alasanBekerja',
			expSalary = '$expSalary',
			negosiasiGaji = '$negosiasiGaji',
			tunjanganFasilitas = '$tunjanganFasilitas',
			waktuBekerja = '$waktuBekerja',
			jenisPekerjaanDisukai1 = '$jenisPekerjaanDisukai1',
			jenisPekerjaanDisukai2 = '$jenisPekerjaanDisukai2',
			jenisPekerjaanDisukai3 = '$jenisPekerjaanDisukai3',
			jenisPekerjaanDisukai4 = '$jenisPekerjaanDisukai4',
			jenisPekerjaanDisukai5 = '$jenisPekerjaanDisukai5',
			lingKerDisukai1 = '$lingKerDisukai1',
			lingKerDisukai2 = '$ingKerDisukai2',
			lingKerDisukai3 = '$lingKerDisukai3',
			lingKerDisukai4 = '$lingKerDisukai4',
			lingKerDisukai5 = '$lingKerDisukai5',
			lingKerDisukai6 = '$lingKerDisukai6',
			lokasiKerja1 = '$lokasiKerja1',
			lokasiKerja2 = '$lokasiKerja2',
			lokasiKerja3 = '$lokasiKerja3',
			mutasi = '$mutasi',
			dinasLuarKota = '$dinasLuarKota',
			penempatanOki = '$penempatanOki',
			menghadapiMasalah = '$menghadapiMasalah',
			kondisiSulit = '$kondisiSulit'
			where namaUser = '".$_POST['nama']."'");
			
			/*echo "update userworker set 
			posisi='".$_POST['posisi']."',
			gender='".$_POST['gender']."',
			kewarganegaraan='".$_POST['kewarganegaraan']."',
			tempatLahir='".$_POST['tempatLahir']."',
			tanggalLahir='".$_POST['tanggalLahir']."',
			noKtp='".$_POST['noKtp']."',
			noNpwp='".$_POST['noNpwp']."',
			noPonsel='".$_POST['noPonsel']."',
			golonganDarah='".$_POST['golonganDarah']."',
			agama='".$_POST['agama']."',
			usia='".$_POST['usia']."',
			alamatKtp='".$_POST['alamatKtp']."',
			alamatSekarang='".$_POST['alamatSekarang']."',
			domisili='".$_POST['domisili']."',
			headline='".$_POST['headline']."',
			summary='".$_POST['summary']."',
			citaCita='".$_POST['citaCita']."',
			motivasiBekerja='".$_POST['motivasiBekerja']."',
			alasanBekerja='".$_POST['alasanBekerja']."',
			expSalary='".$_POST['expSalary']."',
			negosiasiGaji='".$_POST['negosiasiGaji']."',
			tunjanganFasilitas='".$_POST['tunjanganFasilitas']."',
			waktuBekerja='".$_POST['waktuBekerja']."',
			jenisPekerjaanDisukai1='".$_POST['jenisPekerjaanDisukai1']."',
			jenisPekerjaanDisukai2='".$_POST['jenisPekerjaanDisukai2']."',
			jenisPekerjaanDisukai3='".$_POST['jenisPekerjaanDisukai3']."',
			jenisPekerjaanDisukai4='".$_POST['jenisPekerjaanDisukai4']."',
			jenisPekerjaanDisukai5='".$_POST['jenisPekerjaanDisukai5']."',
			lingKerDisukai1='".$_POST['lingKerDisukai1']."',
			lingKerDisukai2='".$_POST['lingKerDisukai2']."',
			lingKerDisukai3='".$_POST['lingKerDisukai3']."',
			lingKerDisukai4='".$_POST['lingKerDisukai4']."',
			lingKerDisukai5='".$_POST['lingKerDisukai5']."',
			lingKerDisukai6='".$_POST['lingKerDisukai6']."',
			lokasiKerja1='".$_POST['lokasiKerja1']."',
			lokasiKerja2='".$_POST['lokasiKerja2']."',
			lokasiKerja3='".$_POST['lokasiKerja3']."',
			mutasi='".$_POST['mutasi']."',
			dinasLuarKota='".$_POST['dinasLuarKota']."',
			penempatanOki='".$_POST['penempatanOki']."',
			menghadapiMasalah='".$_POST['menghadapiMasalah']."',
			kondisiSulit='".$_POST['kondisiSulit']."'
			where namaUser='".$_POST['nama']."'";*/		
			if($query)
			{ 
				echo"
				<script>
				alert('Data has been updated'); 
				window.location.href = '".$url."resume-detail.php';
				</script>
				";
			}
			else
			{
				echo"
				<script>
				alert('Update failed'); 
				self.history.back();
				</script>
				";	
			}
		}
	}
	
	else if(isset($_GET['del']))
	{
		$query=mysql_query("DELETE from userWorker WHERE namaUser = '".$_GET['del']."';");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been deleted'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Delete failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['saveEdu']))
	{
		$id=$_POST['id'];
		$query=mysql_query("insert into pendidikanWorker (
			idWorker,
			namaInstansi,
			lokasiInstansi,
			kualifikasiPendidikan,
			jurusanPendidikan,
			nilai,
			tahunMasuk,
			tahunLulus
			) values (
			'$id',
			'".$_POST['namaInstansi']."',
			'".$_POST['lokasiInstansi']."',
			'".$_POST['kualifikasiPendidikan']."',
			'".$_POST['jurusanPendidikan']."',
			'".$_POST['nilai']."',
			'".$_POST['tahunMasuk']."',
			'".$_POST['tahunLulus']."'
			)");
		
		/*echo "insert into pendidikanWorker (
			idWorker,
			namaInstansi,
			lokasiInstansi,
			kualifikasiPendidikan,
			jurusanPendidikan,
			nilai,
			tahunLulus
			) values (
			'$id',
			'".$_POST['namaInstansi']."',
			'".$_POST['lokasiInstansi']."',
			'".$_POST['kualifikasiPendidikan']."',
			'".$_POST['jurusanPendidikan']."',
			'".$_POST['nilai']."',
			'".$_POST['tahunLulus']."'
			)";*/
		if($query)
		{ 
			echo"
			<script>
			alert('Data successfully saved'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Data could not be saved'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['editEdu']))
	{
		$query=mysql_query("update pendidikanWorker set 
			namaInstansi='".$_POST['namaInstansi']."',
			lokasiInstansi='".$_POST['lokasiInstansi']."',
			kualifikasiPendidikan='".$_POST['kualifikasiPendidikan']."',
			jurusanPendidikan='".$_POST['jurusanPendidikan']."',
			nilai='".$_POST['nilai']."',
			tahunMasuk='".$_POST['tahunMasuk']."',
			tahunLulus='".$_POST['tahunLulus']."'
			where idPendidikan='".$_POST['id']."'");	
			
		/*echo "update pendidikanWorker set 
			namaInstansi='".$_POST['namaInstansi']."',
			lokasiInstansi='".$_POST['lokasiInstansi']."',
			kualifikasiPendidikan='".$_POST['kualifikasiPendidikan']."',
			jurusanPendidikan='".$_POST['jurusanPendidikan']."',
			nilai='".$_POST['nilai']."',
			tahunMasuk='".$_POST['tahunMasuk']."',
			tahunLulus='".$_POST['tahunLulus']."'
			where idPendidikan='".$_POST['id']."'";*/
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been updated'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Update failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_GET['delEdu']))
	{
		$query=mysql_query("DELETE from pendidikanWorker WHERE idWorker = '".$_GET['del']."';");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been deleted'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Delete failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['saveExp']))
	{
		$id=$_POST['id'];
		$awalKerja = date("Y-m-d", strtotime($_POST['start-date-work']));
		$akhirKerja = date("Y-m-d", strtotime($_POST['end-date-work']));
		$query=mysql_query("insert into pengalamanWorker (
			idWorker,
			namaPerusahaan,
			bidangUsaha,
			posisi,
			lokasi,
			awalKerja,
			akhirKerja,
			gaji,
			grossNett,
			jumlahBawahan,
			deskripsi,
			namaAtasan,
			telpAtasan,
			jabatanAtasan,
			jobdes
			) values (
			'$id',
			'".$_POST['pengalaman-perusahaan']."',
			'".$_POST['pengalaman-bidang']."',
			'".$_POST['pengalaman-posisi']."',
			'".$_POST['pengalaman-lokasi']."',
			'$awalKerja',
			'$akhirKerja',
			'".$_POST['pengalaman-gaji']."',
			'".$_POST['pengalaman-grossNett']."',
			'".$_POST['pengalaman-bawahan']."',
			'".$_POST['pengalaman-alasan']."',
			'".$_POST['pengalaman-namaAtasan']."',
			'".$_POST['pengalaman-telpAtasan']."',
			'".$_POST['pengalaman-jabatanAtasan']."',
			'".$_POST['pengalaman-jobdes']."'
			)");
		/*echo "insert into pengalamanWorker (
			idWorker,
			namaPerusahaan,
			bidangUsaha,
			posisi,
			lokasi,
			awalKerja,
			akhirKerja,
			gaji,
			grossNett,
			jumlahBawahan,
			deskripsi,
			namaAtasan,
			telpAtasan,
			jabatanAtasan,
			jobdes
			) values (
			'$id',
			'".$_POST['pengalaman-perusahaan']."',
			'".$_POST['pengalaman-bidang']."',
			'".$_POST['pengalaman-posisi']."',
			'".$_POST['pengalaman-lokasi']."',
			'".$_POST['start-date-work']."',
			'".$_POST['end-date-work']."',
			'".$_POST['pengalaman-gaji']."',
			'".$_POST['pengalaman-gross']."',
			'".$_POST['pengalaman-bawahan']."',
			'".$_POST['pengalaman-alasan']."',
			'".$_POST['pengalaman-namaAtasan']."',
			'".$_POST['pengalaman-telpAtasan']."',
			'".$_POST['pengalaman-jabatanAtasan']."',
			'".$_POST['pengalaman-jobdes']."'
			)";*/
			
		if($query)
		{ 
			echo"
			<script>
			alert('Data successfully saved'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Data could not be saved'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['editExp']))
	{
		$awalKerja = date("Y-m-d", strtotime($_POST['start-date-work']));
		$akhirKerja = date("Y-m-d", strtotime($_POST['end-date-work']));
		$query=mysql_query("update pengalamanWorker set 
			namaPerusahaan='".$_POST['pengalaman-perusahaan']."',
			bidangUsaha='".$_POST['pengalaman-bidang']."',
			posisi='".$_POST['pengalaman-posisi']."',
			lokasi='".$_POST['pengalaman-lokasi']."',
			awalKerja='".$awalKerja."',
			akhirKerja='".$akhirKerja."',
			gaji='".$_POST['pengalaman-gaji']."',
			grossNett='".$_POST['pengalaman-gross']."',
			jumlahBawahan='".$_POST['pengalaman-bawahan']."',
			deskripsi='".$_POST['pengalaman-alasan']."',
			namaAtasan='".$_POST['pengalaman-namaAtasan']."',
			telpAtasan='".$_POST['pengalaman-telpAtasan']."',
			jabatanAtasan='".$_POST['pengalaman-jabatanAtasan']."',
			jobdes='".$_POST['pengalaman-jobdes']."'
			where idWorker='".$_POST['id']."'");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been updated'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Update failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_GET['delExp']))
	{
		$query=mysql_query("DELETE from pengalamanWorker WHERE idWorker = '".$_GET['del']."';");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been deleted'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Delete failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['saveFamilies']))
	{
		$id=$_POST['id'];
		$query=mysql_query("insert into keluarga (
			idWorker,
			hubungan,
			nama,
			gender,
			tempatLahir,
			tanggalLahir,
			pendidikan,
			pekerjaan,
			perusahaan
			) values (
			'$id',
			'".$_POST['hubungan']."',
			'".$_POST['namaanggota']."',
			'".$_POST['gender']."',
			'".$_POST['tempatLahir']."',
			'".$_POST['tanggalLahir']."',
			'".$_POST['pendidikan']."',
			'".$_POST['pekerjaan']."',
			'".$_POST['perusahaan']."'
			)");
		
		/*echo "insert into keluarga (
			idWorker,
			hubungan,
			nama,
			gender,
			tempatLahir,
			tanggalLahir,
			pendidikan,
			pekerjaan,
			perusahaan
			) values (
			'$id',
			'".$_POST['hubungan']."',
			'".$_POST['namaanggota']."',
			'".$_POST['gender']."',
			'".$_POST['tempatLahir']."',
			'".$_POST['tanggalLahir']."',
			'".$_POST['pendidikan']."',
			'".$_POST['pekerjaan']."',
			'".$_POST['perusahaan']."'
			)";*/
		if($query)
		{ 
			echo"
			<script>
			alert('Data successfully saved'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Data could not be saved'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['editFamilies']))
	{
		$query=mysql_query("update keluarga set 
			namaInstansi='".$_POST['namaInstansi']."',
			lokasiInstansi='".$_POST['lokasiInstansi']."',
			kualifikasiPendidikan='".$_POST['kualifikasiPendidikan']."',
			jurusanPendidikan='".$_POST['jurusanPendidikan']."',
			nilai='".$_POST['nilai']."',
			tahunMasuk='".$_POST['tahunMasuk']."',
			tahunLulus='".$_POST['tahunLulus']."'
			where idWorker='".$_POST['id']."'");	
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been updated'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Update failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_GET['delFamilies']))
	{
		$query=mysql_query("DELETE from keluarga WHERE idWorker = '".$_GET['del']."';");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been deleted'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Delete failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['saveLang']))
	{
		$id=$_POST['id'];
		$query=mysql_query("insert into skillBahasaWorker (
			idWorker,
			idBahasa,
			tingkatLisan,
			tingkatMenulis,
			tingkatMembaca,
			keteranganBahasa
			) values (
			'$id',
			'".$_POST['bahasa']."',
			'".$_POST['bahasa-lisan']."',
			'".$_POST['bahasa-menulis']."',
			'".$_POST['bahasa-membaca']."',
			'".$_POST['bahasa-keterangan']."'
			)");
		/*echo "insert into skillBahasaWorker (
			idWorker,
			idBahasa,
			tingkatLisan,
			tingkatMenulis,
			tingkatMembaca,
			keteranganBahasa
			) values (
			'$id',
			'".$_POST['bahasa']."',
			'".$_POST['bahasa-lisan']."',
			'".$_POST['bahasa-menulis']."',
			'".$_POST['bahasa-membaca']."',
			'".$_POST['bahasa-keterangan']."'
			)";*/
			
		if($query)
		{ 
			echo"
			<script>
			alert('Data successfully saved'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Data could not be saved'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['editLang']))
	{
		$query=mysql_query("update skillBahasaWorker set
			idBahasa='".$_POST['bahasa']."',
			tingkatLisan='".$_POST['bahasa-lisan']."',
			tingkatMenulis='".$_POST['bahasa-menulis']."',
			tingkatMembaca='".$_POST['bahasa-membaca']."',
			keteranganBahasa='".$_POST['bahasa-keterangan']."'
			where idWorker='".$_POST['id']."'");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been updated'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Update failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_GET['delLang']))
	{
		$query=mysql_query("DELETE from skillBahasaWorker WHERE idWorker = '".$_GET['del']."';");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been deleted'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Delete failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['saveOskill']))
	{
		$id=$_POST['id'];
		$query=mysql_query("insert into skillWorker (
			idWorker,
			namaSkill,
			tingkatSkill,
			keteranganSkill
			) values (
			'$id',
			'".$_POST['skill']."',
			'".$_POST['tingkat-skill']."',
			'".$_POST['otherskill-keterangan']."'
			)");
		/*echo "insert into skillWorker (
			idWorker,
			namaSkill,
			tingkatSkill,
			keteranganSkill
			) values (
			'$id',
			'".$_POST['skill']."',
			'".$_POST['tingkat-skill']."',
			'".$_POST['otherskill-keterangan']."'
			)";*/
			
		if($query)
		{ 
			echo"
			<script>
			alert('Data successfully saved'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Data could not be saved'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['editOskill']))
	{
		$query=mysql_query("update skillWorker set
			idBahasa='".$_POST['bahasa']."',
			tingkatLisan='".$_POST['bahasa-lisan']."',
			tingkatMenulis='".$_POST['bahasa-menulis']."',
			tingkatMembaca='".$_POST['bahasa-membaca']."',
			keteranganBahasa='".$_POST['bahasa-keterangan']."'
			where idWorker='".$_POST['id']."'");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been updated'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Update failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_GET['delOskill']))
	{
		$query=mysql_query("DELETE from skillWorker WHERE idWorker = '".$_GET['del']."';");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been deleted'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Delete failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['saveTraining']))
	{
		$id=$_POST['id'];
		$query=mysql_query("insert into skillTrainingWorker (
			idWorker,
			namaTraining,
			penyelenggaraTraining,
			tahunTraining,
			keteranganTraining
			) values (
			'$id',
			'".$_POST['nama_training']."',
			'".$_POST['penyelenggara_training']."',
			'".$_POST['tahun_training']."',
			'".$_POST['keterangan_training']."'
			)");
		/*echo "insert into skillTrainingWorker (
			idWorker,
			namaTraining,
			penyelenggaraTraining,
			tahunTraining,
			keteranganTraining
			) values (
			'$id',
			'".$_POST['nama_training']."',
			'".$_POST['penyelenggara_training']."',
			'".$_POST['tahun_training']."',
			'".$_POST['keterangan_training']."'
			)";*/
			
		if($query)
		{ 
			echo"
			<script>
			alert('Data successfully saved'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Data could not be saved'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_POST['editTraining']))
	{
		$query=mysql_query("update skillTrainingWorker set
			idBahasa='".$_POST['bahasa']."',
			tingkatLisan='".$_POST['bahasa-lisan']."',
			tingkatMenulis='".$_POST['bahasa-menulis']."',
			tingkatMembaca='".$_POST['bahasa-membaca']."',
			keteranganBahasa='".$_POST['bahasa-keterangan']."'
			where idWorker='".$_POST['id']."'");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been updated'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Update failed'); 
			self.history.back();
			</script>
			";	
		}
	}
	
	else if(isset($_GET['delTraining']))
	{
		$query=mysql_query("DELETE from skillTrainingWorker WHERE idWorker = '".$_GET['del']."';");
		if($query)
		{ 
			echo"
			<script>
			alert('Data has been deleted'); 
			window.location.href = '".$url."resume-detail.php';
			</script>
			";
		}
		else
		{
			echo"
			<script>
			alert('Delete failed'); 
			self.history.back();
			</script>
			";	
		}
	}
?>