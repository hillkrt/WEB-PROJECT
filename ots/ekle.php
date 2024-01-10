<?php 
include 'baglan.php';

if (!isset($_SESSION['uye_id'])){
	header("location:giris.php?giris=yap");
}
?>

<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="styler.css">
	<script src="https://kit.fontawesome.com/6bcf6473ea.js"></script>

	<style>
		
	</style>

	<title>ÖDEV TAKİP SİSTEMİ ÖDEV EKLE - HILLY.NET</title>
</head>
<body style="background-color: #2c3e50;">

	<!--REKLAM KODALARI LOCALDE ÇALIŞTIRMA SORUN OLABİLİR -->
	
	<!-- Admatic masthead 970x250 Ad Code START -->
	<!--
	<ins data-publisher="adm-pub-141681846715" data-ad-type="masthead" class="adm-ads-area" data-ad-network="121216945463" data-ad-sid="501" data-ad-width="970" data-ad-height="250"></ins>
	<script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
-->

<!-- Admatic masthead 970x250 Ad Code END -->

<!-- Admatic interstitial 800x600 Ad Code START -->

	<!--
	<ins data-publisher="adm-pub-141681846715" data-ad-type="interstitial" class="adm-ads-area" data-ad-network="121216945463" data-ad-sid="209" data-ad-width="800" data-ad-height="600"></ins>
	<script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
-->

<!-- Admatic interstitial 800x600 Ad Code END -->

<!-- Admatic interstitial 320x480 Ad Code START -->

	<!--
	<ins data-publisher="adm-pub-141681846715" data-ad-type="interstitial" class="adm-ads-area" data-ad-network="121216945463" data-ad-sid="206" data-ad-width="320" data-ad-height="480"></ins>
	<script src="//cdn2.admatic.com.tr/showad/showad.js" async></script>
-->

<!-- Admatic interstitial 320x480 Ad Code END -->

<div id="div-ekle" class="ntd-card-ekle c-white container" style="">
	<form action="odevekle.php" method="post" autocomplete="off">
		<input type="hidden" name="odev_uyeid" value="<?php echo $_SESSION['uye_id']; ?>">
		<div class="" >
			<h3 class="card-title">Ödev Ekle</h3>
			<hr>
		</div>
		<div class="ntd-form-item-2">
			<input type="text" class="ntd-input" name="odev_ad"  required="required" placeholder="Ödev Tanımı">
		</div>
		<div class="ntd-form-item-ozel">
			<div class="row">
				<div class="col-md-2 col-sm-4 col-4">
					<select class="ntd-select"  name="odev_tgun" required="required">
						<option selected>Gün</option>
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>22</option>
						<option>23</option>
						<option>24</option>
						<option>25</option>
						<option>26</option>
						<option>27</option>
						<option>28</option>
						<option>29</option>
						<option>30</option>
						<option>31</option>
					</select>
				</div>
				<div class="col-md-2 col-sm-4 col-4">
					<select class="ntd-select" name="odev_tay" required="required">
						<option selected >Ay</option>
						<option value="01">Ocak</option>
						<option value="02">Şubat</option>
						<option value="03">Mart</option>
						<option value="04">Nisan</option>
						<option value="05">Mayıs</option>
						<option value="06">Haziran</option>
						<option value="07">Temmuz</option>
						<option value="08">Ağustos</option>
						<option value="09">Eylül</option>
						<option value="10">Ekim</option>
						<option value="11">Kasım</option>
						<option value="12">Aralık</option>
					</select>
				</div>
				<div class="col-md-2 col-sm-4 col-4">
					<select class="ntd-select" name="odev_tyil" required="required">
						<option selected >Yıl</option>
						<option>2019</option>
						<option>2020</option>
						<option>2021</option>
						<option>2022</option>
						<option>2023</option>
					</select>
				</div>

				<div class="col-md-2 col-sm-4 col-4" style="">
					<label class="containere">
						<input type="checkbox" type="checkbox" name="odev_onem" value="1">
						<span class="ntd-checkbox">Önemli</span>
					</label>
				</div>

				<div class="col-md-2 col-sm-4 col-4" style="">
					<label class="containere">
						<input type="checkbox" type="checkbox" name="odev_vurgu" value="1">
						<span class="ntd-checkbox">Vurgula</span>
					</label>
				</div>

				<div class="col-md-2 col-sm-4 col-4" style="">
					<select class="ntd-select" name="odev_vurgurenk" required="required">
						<option selected value=" ">Vurgu Rengi</option>
						<option value="red" style="color: red;">Kırmızı</option>
						<option value="yellow" style="color: yellow;">Sarı</option>
						<option value="green" style="color: green;">Yeşil</option>
						<option value="blue" style="color: blue;">Mavi</option>
						<option value="pink" style="color: pink;">Pembe</option>
						<option value="purple" style="color: purple;">Mor</option>
					</select>
				</div> 

			</div>
		</div>
		<button type="submit" class="ntd-button ntd-button-trns" name="odev_ekle">Ekle</button>
	</form>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>