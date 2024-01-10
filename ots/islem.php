<?php 

include 'baglan.php';

echo "Burda olamaman gerekiyor.";

/*Ödevin Yapıldığını işleme*/

if (isset($_POST['odevguncelle'])) {
	
	$odev_yapildi 	= 	$_POST["odev_yapildi"];
	$odev_id 		=	$_POST["odev_id"];

	$odevkaydet = $db-> prepare("UPDATE odev SET 
		odev_yapildi=?
		WHERE odev_id=?
		");

	$odevguncelle = $odevkaydet->execute(array(
		$odev_yapildi,
		$odev_id
	));

	if($odevguncelle) {
		header("Location:index.php");
		exit();

	} else {
		//print_r (error_reporting(E_ALL)); 
		header("Location:index.php?hata=003");
		exit();

	}

}










/*Ödevin Silinmesi*/


if (isset($_POST["odevsil"])) {
	
	$odev_id 	=	$_POST["odev_id"];
	$odev_sil	=	$_POST["odev_sil"];

	$odevisil = $db-> prepare("UPDATE odev SET 
		odev_sil=?
		WHERE odev_id=?
		");

	$odevsil = $odevisil->execute(array(
		$odev_sil,
		$odev_id
	));

	if($odevsil) {
		header("Location:index.php");
		exit();

	} else {
		//print_r (error_reporting(E_ALL)); 
		header("Location:index.php?hata=003");
		exit();

	}

}



/*Üye Kaydı*/


if (isset($_POST["uyekayit"])) {
	$uye_ad = $_POST["uye_ad"];
	$uye_soyad = $_POST["uye_soyad"];
	$uye_kadi = $_POST["uye_kadi"];
	$uye_email = $_POST["uye_email"];
	$uye_sifre = md5($_POST["uye_sifre"]);


	$sr1 = $db->query("SELECT * FROM uye WHERE uye_email = '{$uye_email}'",PDO::FETCH_ASSOC);

	$var1 = $sr1->fetchAll(PDO::FETCH_ASSOC);


	if ($var1) {

		header("Location:giris.php?hata=006");

	}elseif (!$var1) {
		
		$sr2 = $db->query("SELECT * FROM uye WHERE uye_kadi = '{$uye_kadi}'",PDO::FETCH_ASSOC);

		$var2 = $sr2->fetchAll(PDO::FETCH_ASSOC);

		if ($var2) {

			header("Location:giris.php?hata=007");

		}elseif (!$var2) {

			$kaydet = $db->prepare("insert into uye set uye_ad=?, uye_soyad=?, uye_kadi=?, uye_email=?, uye_sifre=?");

			$kaydet->execute (array($uye_ad, $uye_soyad, $uye_kadi, $uye_email, $uye_sifre));

			header("Location:yenikayit.php?ad=$uye_ad&soyad=$uye_soyad&kadi=$uye_kadi&email=$uye_email");

		}else{

			header("Location:giris.php?kayit=no");

		}

	}else{
		header("Location:giris.php?hata=404");
	}


}

/*



*/




/*Üye Giriş Sorgusu*/


if (isset($_POST['uyegiris'])) {
	$uye_kadi = $_POST["uye_kadi"];
	$uye_sifre = md5($_POST["uye_sifre"]);



	$kadivarmi = $db->query("SELECT * FROM uye WHERE uye_kadi = '{$uye_kadi}'",PDO::FETCH_ASSOC);

	$varmi = $kadivarmi->fetchAll(PDO::FETCH_ASSOC);

	if (!$varmi) {

		header("Location:giris.php?hata=004");

	}elseif ($varmi) {

		$uyesor = $db->query("SELECT * FROM uye WHERE uye_kadi = '{$uye_kadi}'",PDO::FETCH_ASSOC);

		foreach ($uyesor->fetchAll(PDO::FETCH_ASSOC) as $sor) {
			if ($uye_sifre == $sor["uye_sifre"]) {

				$_SESSION["uye_id"] = $sor["uye_id"];
				header("Location:index.php");

			}else{

				header("Location:giris.php?hata=005");

			}
		}
	}else{
		header("Location:giris.php?hata=404");
	}







}










?>