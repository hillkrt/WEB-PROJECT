<?php

//echo "Burda olamaman gerekiyor.";

ob_start();
session_start();


try {

  $db = new PDO("mysql:host=localhost;dbname=odev;charset=utf8",'root','');

    //echo "Veritabanı bağlantısı başarılı";

} catch (PDOException $e) {

  echo $e->getMessage();
}


?> 