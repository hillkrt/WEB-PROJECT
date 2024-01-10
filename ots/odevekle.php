<?php 

include 'baglan.php';

/*Ödev Ekleme*/

if (isset($_POST["odev_ekle"])) {

	/*
	echo  $odev_ad;
	echo "<br>";
	echo  $odev_tgun;
	echo "<br>";
	echo  $odev_tay;
	echo "<br>";
	echo  $odev_tyil;
	echo "<br>";
	echo  $odev_onem;
	echo "<br>";
	echo  $odev_vurgu;
	echo "<br>";
	echo  $odev_vurgurenk;
	echo "<br>";
	echo "<hr>";
	echo "<br>";
	*/

	$odev_uyeid			=	 	$_POST["odev_uyeid"];
	$odev_ad 			=	 	$_POST["odev_ad"];
	$odev_tgun 			=	 	$_POST["odev_tgun"];
	$odev_tay 			=	 	$_POST["odev_tay"];
	$odev_tyil 			=	 	$_POST["odev_tyil"];
	$odev_vurgurenk 	=	 	$_POST["odev_vurgurenk"];

	if (!isset($_POST["odev_vurgu"])) {
		$odev_vurgu = "0";
	}else{
		$odev_vurgu = $_POST["odev_vurgu"];
	}

	if ($odev_tgun == "Gün" || $odev_tay == "Ay" || $odev_tyil == "Yıl" ) {
		//echo "Lütfen geçerli bir tarih girin!";
		header("Location:ekle.php?hata=001");
	}elseif ($odev_vurgu == $_POST["odev_vurgu"] && $odev_vurgurenk == "Renk") {
		header("Location:ekle.php?hata=002");
	} else {

		if (!isset($_POST["odev_onem"])) {
			$odev_onem = "0";
		}else{
			$odev_onem = $_POST["odev_onem"];
		}

		if (!isset($_POST["odev_vurgu"])) {
			$odev_vurgu = "0";
		}else{
			$odev_vurgu = $_POST["odev_vurgu"];
		}

		$ekle = $db->prepare("insert into odev set odev_uyeid=?, odev_ad=?, odev_tgun=?, odev_tay=?, odev_tyil=?, odev_onem=?, odev_vurgu=?, odev_vurgurenk=?");
		$ekle->execute (array($odev_uyeid, $odev_ad, $odev_tgun, $odev_tay, $odev_tyil, $odev_onem, $odev_vurgu, $odev_vurgurenk));

		header("Location:index.php?islem=yes");
	}

}

?>