<?php
include("connection.php");
session_start();
error_reporting(0);
ob_start();
$username_err = $password_err = "";


//butona basıldığında kaydedecek
if(isset($_POST))
{
    //kullanıcı adı denetleme
    if(empty($_POST["kullanici"])){
        $username_err = "Kullanıcı adı boş geçilemez!";
    }else{
        $username = $_POST["kullanici"];
        
    }

    //parola denetleme
    if(empty($_POST["password"])){
        $password_err = "Parola boş geçilemez.";
    }else{
        $pass = $_POST["password"];
    }

///////////////////////////////////////////////////////////////////////////////////
    if(isset($username) && isset($pass)){
        $secim = "SELECT * FROM signup WHERE username = '$username'";
        $calistir = mysqli_query($connection,$secim);
        $kayitsayisi = mysqli_num_rows($calistir); //çıkacak sonuç 1 veya 0 olabilir.
        
        if($kayitsayisi > 0)
        {
            //echo 'girdimzz1';
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashpass = $ilgilikayit["sifre"];
            //echo $hashpass;
            if(password_verify($pass,$hashpass))
            {
                $_SESSION["kAdi"] = $username;
                echo '<div class="alert successful">
                <p>Giriş Başarılı! Lütfen bekleyiniz.</p>
                
              </div>';
               
               echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLab/anasayfa.php?"> ';

            }
            else
            {
              echo '<div class="alert error">
               Kullanıcı adı veya şifre hatalı!
              </div>';
            }

        }
        else
        {
            echo '<div class="alert info">
            Böyle bir kullanıcı yok!
          </div>';
        }

    }

    
}

?>