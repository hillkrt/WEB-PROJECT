<?php 
include 'baglan.php';


if (!isset($_SESSION['uye_id'])){
	header("location:giris.php?giris=yap");
}
?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="styler.css">
	<script src="https://kit.fontawesome.com/6bcf6473ea.js"></script>
	<script src="https://npmcdn.com/minigrid@3.0.1/dist/minigrid.min.js"></script>
	<script type="text/javascript">

		function cik(){
			window.location = "cikis.php"
		}
		function ekle(){
			window.location = "ekle.php?id=<?php echo $_SESSION["uye_id"]; ?>"
		}


		(function(){
			var grid;
			function init() {
				grid = new Minigrid({
					container: '.cards',
					item: '.card',
					gutter: 6
				});
				grid.mount();
			}

  // mount
  function update() {
  	grid.mount();
  }

  document.addEventListener('DOMContentLoaded', init);
  window.addEventListener('resize', update);
})();

</script>

<style type="text/css">

	*{
		box-sizing: border-box;
	}

	.card {
		width: 31%;
		margin: 1%;
		padding: 10px;
		color: #2c3e50;
		-webkit-box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.3);
		-moz-box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.3);
		box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.3);
	}

	@media (max-width: 768px){
		.card{
			width: 48%;

		}
	}   

	@media (max-width: 576px){
		.card{
			width: 95%;
		}

		.cards{
			max-width: 540px!important;
		}
	} 



	.cards {
		width: 100%;
		max-width: 1040px;
		margin: 0 auto;
		text-align: center;
	}
</style>

<title>ÖDEV TAKİP SİSTEMİ - HILLY.NET</title>
</head>
<body style="background-color: #2c3e50;">


	<div class="container" style="max-width: 1040px;">
		<div id="" class="ntd-card-cnt" style="background-color: #ecf0f1; color: #2c3e50;">
			<div class="row">
				<div class="col-md-8 col-sm-12 col-12">
					<h3><b> 
						<?php 

						$uye_id = $_SESSION["uye_id"]; 
						$isimne = $db->query("SELECT * FROM uye WHERE uye_id = '{$uye_id}'",PDO::FETCH_ASSOC);

						foreach($isimne->fetchAll(PDO::FETCH_ASSOC) as $isim){
							echo "Merhaba " . $isim['uye_ad'] . "! İşte Ödevlerin.";
						}
						?>
					</b></h3>
				</div>  
				<div class="col-md-2 col-sm-6 col-6" style="text-align: center;">
					<h4 style="margin-top: 5px;">
						<span class="buton-spn spn-ekle" onclick="ekle()">+Ekle</span>
					</h4>
				</div>  
				<div class="col-md-2 col-sm-6 col-6" style="text-align: center;">
					<h4 style="margin-top: 5px;">
						<span class="buton-spn spn-cik" onclick="cik()">Çıkış</span>
					</h4>
				</div>
			</div>
		</div>

		<br>
	</div>


	<div class="cards">

		<?php  

		$id = $_SESSION["uye_id"];

		$bir = "1";
		$sifir = "0";

		$odevcek = $db->query("SELECT * FROM odev WHERE odev_uyeid = '{$id}'AND odev_onem = '{$bir}' AND odev_vurgu = '{$bir}' AND odev_yapildi = '{$sifir}'",PDO::FETCH_ASSOC);

		foreach($odevcek->fetchAll(PDO::FETCH_ASSOC) as $odev) {?> 


			<div class="card <?php 
			if ($odev['odev_vurgu'] == 1) {
				echo "ntd-card-". $odev['odev_vurgurenk'];
			}else{echo "nts-card-dflt";} ?>">
			<div class="ntd-card-head">
				<h4><?php echo $odev['odev_ad']; ?></h4>
			</div>
			<div class="ntd-card-body">
				<h5><?php echo $odev['odev_tgun'] . "." . $odev['odev_tay'] . "." . $odev['odev_tyil']; ?></h5>
			</div>
			<div class="ntd-card-footer">
				<form action="islem.php" method="post">
					<input type="text" name="odev_id" value="<?php echo $odev['odev_id']; ?>" hidden="">
					<input type="text" name="odev_yapildi" value="1" hidden="">
					<button type="submit" class="ntd-button <?php 
					if ($odev['odev_vurgu'] == 1) {
						echo "ntd-button-". $odev['odev_vurgurenk'];
					}else{echo "ntd-button-dflt";} ?>" name="odevguncelle" style="">Yapıldı</button>
				</form>
			</div>
		</div>


		<?php 
	}


	$bir = "1";
	$sifir = "0";

	$odevcek2 = $db->query("SELECT * FROM odev WHERE odev_uyeid = '{$id}'AND odev_onem = '{$bir}' AND odev_vurgu = '{$sifir}' AND odev_yapildi = '{$sifir}'",PDO::FETCH_ASSOC);

	foreach($odevcek2->fetchAll(PDO::FETCH_ASSOC) as $odev2) {?> 


		<div class="card <?php 
		if ($odev2['odev_vurgu'] == 1) {
			echo "ntd-card-". $odev2['odev_vurgurenk'];
		}else{echo "nts-card-dflt";} ?>">
		<div class="ntd-card-head">
			<h4><?php echo $odev2['odev_ad']; ?></h4>
		</div>
		<div class="ntd-card-body">
			<h5><?php echo $odev2['odev_tgun'] . "." . $odev2['odev_tay'] . "." . $odev2['odev_tyil']; ?></h5>
		</div>
		<div class="ntd-card-footer">
			<form action="islem.php" method="post">
				<input type="text" name="odev_id" value="<?php echo $odev2['odev_id']; ?>" hidden="">
				<input type="text" name="odev_yapildi" value="1" hidden="">
				<button type="submit" class="ntd-button <?php 
				if ($odev2['odev_vurgu'] == 1) {
					echo "ntd-button-". $odev2['odev_vurgurenk'];
				}else{echo "ntd-button-dflt";} ?>" name="odevguncelle" style="">Yapıldı</button>
			</form>
		</div>
	</div>


	<?php 
}


$bir = "1";
$sifir = "0";

$odevcek3 = $db->query("SELECT * FROM odev WHERE odev_uyeid = '{$id}'AND odev_onem = '{$sifir}' AND odev_vurgu = '{$bir}' AND odev_yapildi = '{$sifir}'",PDO::FETCH_ASSOC);

foreach($odevcek3->fetchAll(PDO::FETCH_ASSOC) as $odev3) {?> 


	<div class="card <?php 
	if ($odev3['odev_vurgu'] == 1) {
		echo "ntd-card-". $odev3['odev_vurgurenk'];
	}else{echo "nts-card-dflt";} ?>">
	<div class="ntd-card-head">
		<h4><?php echo $odev3['odev_ad']; ?></h4>
	</div>
	<div class="ntd-card-body">
		<h5><?php echo $odev3['odev_tgun'] . "." . $odev3['odev_tay'] . "." . $odev3['odev_tyil']; ?></h5>
	</div>
	<div class="ntd-card-footer">
		<form action="islem.php" method="post">
			<input type="text" name="odev_id" value="<?php echo $odev3['odev_id']; ?>" hidden="">
			<input type="text" name="odev_yapildi" value="1" hidden="">
			<button type="submit" class="ntd-button <?php 
			if ($odev3['odev_vurgu'] == 1) {
				echo "ntd-button-". $odev3['odev_vurgurenk'];
			}else{echo "ntd-button-dflt";} ?>" name="odevguncelle" style="">Yapıldı</button>
		</form>
	</div>
</div>


<?php 
}



$bir = "1";
$sifir = "0";

$odevcek4 = $db->query("SELECT * FROM odev WHERE odev_uyeid = '{$id}'AND odev_onem = '{$sifir}' AND odev_vurgu = '{$sifir}' AND odev_yapildi = '{$sifir}'",PDO::FETCH_ASSOC);

foreach($odevcek4->fetchAll(PDO::FETCH_ASSOC) as $odev4) {?> 


	<div class="card <?php 
	if ($odev4['odev_vurgu'] == 1) {
		echo "ntd-card-". $odev4['odev_vurgurenk'];
	}else{echo "nts-card-dflt";} ?>">
	<div class="ntd-card-head">
		<h4><?php echo $odev4['odev_ad']; ?></h4>
	</div>
	<div class="ntd-card-body">
		<h5><?php echo $odev4['odev_tgun'] . "." . $odev4['odev_tay'] . "." . $odev4['odev_tyil']; ?></h5>
	</div>
	<div class="ntd-card-footer">
		<form action="islem.php" method="post">
			<input type="text" name="odev_id" value="<?php echo $odev4['odev_id']; ?>" hidden="">
			<input type="text" name="odev_yapildi" value="1" hidden="">
			<button type="submit" class="ntd-button <?php 
			if ($odev4['odev_vurgu'] == 1) {
				echo "ntd-button-". $odev4['odev_vurgurenk'];
			}else{echo "ntd-button-dflt";} ?>" name="odevguncelle" style="">Yapıldı</button>
		</form>
	</div>
</div>


<?php 
}


$bir = "1";
$sifir = "0";

$odevcek5 = $db->query("SELECT * FROM odev WHERE odev_uyeid = '{$id}'AND odev_yapildi = '{$bir}' AND odev_sil = '{$sifir}'",PDO::FETCH_ASSOC);

foreach($odevcek5->fetchAll(PDO::FETCH_ASSOC) as $odev5) {?> 


	<div class="card <?php 
	if ($odev5['odev_vurgu'] == 1) {
		echo "ntd-card-". $odev5['odev_vurgurenk'];
	}else{echo "nts-card-dflt";} ?>" style="opacity: 0.3;">
	<div class="ntd-card-head">
		<h4><?php echo $odev5['odev_ad']; ?></h4>
	</div>
	<div class="ntd-card-body">
		<h5><?php echo $odev5['odev_tgun'] . "." . $odev5['odev_tay'] . "." . $odev5['odev_tyil']; ?></h5>
	</div>
	<div class="ntd-card-footer">
		<form action="islem.php" method="post">
			<input type="text" name="odev_id" value="<?php echo $odev5['odev_id']; ?>" hidden="">
			<input type="text" name="odev_sil" value="1" hidden="">
			<button type="submit" class="ntd-button <?php 
			if ($odev5['odev_vurgu'] == 1) {
				echo "ntd-button-". $odev5['odev_vurgurenk'];
			}else{echo "ntd-button-dflt";} ?>" name="odevguncelle" style="">Sil</button>
		</form>
	</div>
</div>


<?php 
}

?>









</div>


<!--

<div class="card ntd-card-red">
		<div class="ntd-card-head">
			<h4>Challenger Geometri 3-4-5. Testler</h4>
		</div>
		<div class="ntd-card-body">
			<h5>09.10.2019</h5>
		</div>
		<div class="ntd-card-footer">
			<button type="submit" class="ntd-button ntd-button-red" name="uyegiris" style="">Yapıldı</button>
		</div>
</div>
-->





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>