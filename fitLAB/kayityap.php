<?php
include("connection.php");
error_reporting(0);
date_default_timezone_set('Europe/Istanbul');

$username_err = $password_err = $passagain_err = "";
//butona basıldığında kaydedecek

    //kullanıcı adı denetleme
    if(empty($_POST["kullanici"])){
        $username_err = "Kullanıcı adı boş geçilemez!";
    }else if(strlen($_POST["kullanici"]) < 6){
        $username_err = "Kullanıcı adı en az 6 karakterden oluşmalıdır.";
    }else if(!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullanici"])){
        $username_err = "Kullanıcı adı büyük,küçük harf ve rakamdan oluşmalıdır.";
    }else{
        $username = $_POST["kullanici"];
    }

    //parola denetleme
    if(empty($_POST["password"])){
        $password_err="Parola boş geçilemez.";
    }else{
        $pass = password_hash($_POST["password"],PASSWORD_DEFAULT);
    }

    //parola tekrar denetleme
    if(empty($_POST["passagain"])){
        $passagain_err = "Burayı boş geçemezsiniz.";
    }else if($_POST["password"] != $_POST["passagain"]){
        $passagain_err = "Parolalar eşleşmedi.";
    }else{
        $passagain = $_POST["passagain"];
    }

// Kullanıcı ekleme işlemleri
$ad = $_POST["name"];
$sname = $_POST["sname"];
$email = $_POST["email"];
$new = $_POST["password"];
$username = $_POST["username"];


   
// form elemanlarından 1 tanesi bile boş olursa veya hepsi dolu olursa uygulanacak işlemler
    if(!empty($ad) && (!empty($sname)) && (!empty($email)) && (!empty($username)) && (!empty($pass))){
        if ( filter_var($email, FILTER_VALIDATE_EMAIL) ){ 
        if($new == $passagain){
            
            $secim = "SELECT * FROM signup WHERE username = '$username' or email = '$email'";
            $calistir = mysqli_query($connection,$secim);
            $kayitsayisi = mysqli_num_rows($calistir); //çıkacak sonuç 1 veya 0 olabilir.
    
            if($kayitsayisi == 0)
            {
                
            $tarih = date('Y-m-d');
            $yetki = '2';
              $random = rand(1,2);

        // eğer değerler boş değil ise
        $sorgu = "INSERT INTO signup (Ad, Soyad, email, sifre, username, tarih, yetki, diyet) VALUES ('$ad','$sname','$email','$pass','$username','$tarih','$yetki','$random')";
        $kaydet = mysqli_query($connection, $sorgu);
        echo '<div class="alert successful">
                <p>Kayıt Başarlılı 3 sn içinde yönlendirileceksiniz.</p>
                
              </div>';
        echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLab/loginandregister.php?"> ';
        }
            else{
                echo '<div class="alert error" role="alert">Zaten kayıtlısınız. </div>';
            }
       // Header("Location: loginpage.php?bilgi=yeni");
        }else {
       echo '<div class="alert info" role="alert">
            Girdiğiniz şifreler eşleşmiyor
            </div>';

        }
    }else{
        //eğer gelen değerler boş ise
        print '<div class="alert info" role="alert">Lütfen geçerli bir e-posta adresi giriniz. </div>';
     
    }
   
} else {
    echo  '<div class="alert error" role="alert">
    Lütfen boş alan bırakmayınız.
  </div>';
}

?>
