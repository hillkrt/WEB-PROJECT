<?php
include 'baglan.php';

session_start();


if (!isset($_SESSION['uye_id'])){
	header("location:giris.php?giris=yap");
}


if ($_SESSION['uye_id'] !== "1") {
	header("location:giris.php?giris=yap");
}




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$uyesor = $db->query("SELECT * FROM deneme ",PDO::FETCH_ASSOC);

foreach($uyesor->fetchAll(PDO::FETCH_ASSOC) as $uye){
	



	$mail = new PHPMailer(true);


	$mail->setLanguage('tr');
	//$mail->SMTPDebug = 2;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'destekots@gmail.com';
	$mail->Password = '192837ots';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->CharSet = 'UTF-8';

    // maili gönderen kişi
	$mail->setFrom('destekots@gmail.com', 'OTS|Nepcen.net');
	$mail->addAddress($uye['mail']);
	$mail->addReplyTo('no-reply@example.com');

	$content= "Toplu mesaj deneme";

	$mail->isHTML(true);
	$mail->Subject = 'Yenilenen Giriş Ekranı - OTS|Nepcen.net';
	$mail->Body = $content;



	if ($mail->send()) {
	//header('Location: index.php?mail=ok');
		echo "Mail gönderildi: " . $uye['mail'];
		echo "<br>";
		sleep(3);
	}else{
			//header('Location: index.php?mail=ok');
		echo "Mail gönderilmedi: " . $uye['mail'];
		echo "<br>";
		sleep(3);
	}

}
?>