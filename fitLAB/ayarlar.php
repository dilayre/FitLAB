<?php
session_start();
error_reporting(0);
include("connection.php");
$ad = $_SESSION["kAdi"];
$secim = "SELECT * FROM signup WHERE username='$ad'";
$calistir = mysqli_query($connection,$secim);
$row = mysqli_fetch_array($calistir);
//print_r($row);
if($_SESSION["kAdi"] == ""){

  Header("Location: loginandregister.php");

}
if(empty($_POST['hedef'])){

}else{
  $adim = $_POST["ad"];
  $soyad = $_POST["soyad"];
  $email = $_POST["email"];
  $boy = $_POST["boy"];
  $kilo = $_POST["kilo"];
  $yas = $_POST["yas"];
  $hedef = $_POST["hedef"];
  $cinsiyet = $_POST["cinsiyet"];

  if(empty($boy) or empty($kilo) or empty($yas) or empty($hedef) or empty($cinsiyet) or empty($ad) or empty($soyad) or empty($email)){
  
    $kayit=  '<div class="detailsxs"><div class="alerts successful">
                <p>OLMADI</p>
                
              </div></div>';
               

}else{
  $sql = "UPDATE signup SET  boy='$boy', kilo='$kilo', hedef='$hedef', yas='$yas', cinsiyet='$cinsiyet', Ad='$adim', Soyad='$soyad', email='$email'  WHERE username='$ad'";
    $kaydet = mysqli_query($connection, $sql);

  
    $kayit=  '<div class="detailsxs"><div class="alerts successful">
                <p>Kayıt Başarılı Artık Sistemi Kullanmaya Başlayabilirsiniz.</p>
                
              </div></div>';
               
              echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLAB/cikis.php?> ';
 
}}

if(!empty($_POST['sifrem'])){
  if(empty($_POST["sifrem"])){
    $sil1 = "Parola boş geçilemez.";
}else{
    $pass = $_POST["sifrem"];
}
$secim = "SELECT * FROM signup WHERE username = '$ad'";
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
       // $_SESSION["kAdi"] = $username;

       $sonuc= mysqli_query($connection,"DELETE FROM signup WHERE username='$ad'");
        $sil1 = '<div class="detailsxs"><div class="alerts successful">
        <p>İşleminiz Başarıyla Tamamlandı Hesabınız Silindi.</p>
        <div class="close-alerts"><i class="bx bx-x"></i></div>
      </div></div>';
       
       echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLab/cikis.php?"> ';

    }
    else
    {
      $sil1 = '<div class="detailsxs"><div class="alerts error">
      <p> Şifre hatalı!</p>
      <div class="close-alerts"><i class="bx bx-x"></i></div>
    </div></div>';
    }
  }
}

if(isset($_GET["yenile"])) {
  if(isset($_POST["sifre"]))
{
  
  $username_err = $password_err = $passagain_err = "";
  
 //parola denetleme
 if(empty($_POST["password"])){
    $password_err="Parola boş geçilemez.";
}else{
    $pass = password_hash($_POST["password"],PASSWORD_DEFAULT);
}

//parola tekrar denetleme
if(empty($_POST["passagain"])){
    $passagain_err = "Lütfen parolanızı tekrar giriniz.";
}else if($_POST["password"] != $_POST["passagain"]){
    $passagain_err = "Parolalar eşleşmedi.";
}else{
    $passagain = $_POST["passagain"];
}
$username = $_POST['kAdix'];

if((!empty($pass)) && (!empty($username))){ 
$new = $_POST["password"];
  if($new == $passagain){ 
// eğer değerler boş değil ise
$sql = "UPDATE signup SET  sifre='$pass', username='$username'  WHERE username='$username'";
$kaydet = mysqli_query($connection, $sql);

echo '<meta http-equiv="refresh" content="2; url=http://localhost:8080/fitLab/cikis.php"> ';
$veri1 = '<div class="detailsxs"><div class="alerts successful">
<p> Başarılı</p>
<div class="close-alerts"><i class="bx bx-x"></i></div>
</div></div>';
}else{
    $veri1 = '<div class="detailsxs"><div class="alerts error">
    <p> Şifreler Eşleşmiyor</p>
    <div class="close-alerts"><i class="bx bx-x"></i></div>
  </div></div>';
  }

}else{
  //eğer gelen değerler boş ise
  $veri1 = '<div class="detailsxs"><div class="alerts error">
  <p> Boş alan bırakmayınız!</p>
  <div class="close-alerts"><i class="bx bx-x"></i></div>
</div></div>';
  }
}
}
$tarih1= new DateTime($row['tarih']);
//$tarih2 = date('Y-m-d', strtotime('+1 month'));
$tarih2= new DateTime("-1 month");
$interval= $tarih1->diff($tarih2);


if(isset($_GET["yenile"])) {
  if(isset($_POST["antrenorxd"])){
  
  
$username = $_POST['kAdix'];
$antrenor = $_POST['antrenor'];
//echo $antrenor;

if((!empty($username))){ 

$sql = "UPDATE signup SET  antrenor='$antrenor', degisiklik='1'  WHERE username='$username'";
$kaydet = mysqli_query($connection, $sql);

//echo $antrenor;
$veri2 = '<div class="detailsxs"><div class="alerts successful">
<p>Antrenor Değişimi Başarılı </p>
<div class="close-alerts"><i class="bx bx-x"></i></div>
</div></div>';

echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLAB/ayarlar.php?yenile=antrenor"> ';

}else{
  //eğer gelen değerler boş ise
  $veri2 = '<div class="detailsxs"><div class="alerts error">
  <p> Boş alan bırakmayınız!</p>
  <div class="close-alerts"><i class="bx bx-x"></i></div>
</div></div>';
  }
}
}
if($row["yas"] == ""){
  Header("Location: anasayfa.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLAB | Ayarlar </title>
    
    <link rel="stylesheet" href="main.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    

    <script>
      window.console = window.console || function(t) {};
    </script>
  </head>

  <body>
    <!-- =============== Navigation ================ -->
<div class="container">
    <div class="navigation">
    <ul>
        <li>
          <a href="#">
            <span class="icon">
            <ion-icon name="accessibility-outline"></ion-icon>

            </span>
            <h1 class="title">FitLAB</h1>
          </a>
        </li>

        <li>
          <a href="anasayfa.php">
            <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Ana Sayfa</span>
          </a>
        </li>


        <li>
          <a href="?yenile=sifre">
            <span class="icon">
            <ion-icon name="key-outline"></ion-icon>

            </span>
            <span class="title">Şifremi Yenile</span>
          </a>
        </li>

        <li>
          <a href="?yenile=antrenor">
            <span class="icon">
            <ion-icon name="attach-outline"></ion-icon>

            </span>
            <span class="title">Antrenörümü Değiş</span>
          </a>
        </li>

        <li>
          <a href="cikis.php">
            <span class="icon">
            <ion-icon name="log-out-outline"></ion-icon>
            </span>
            <span class="title">Çıkış Yap</span>
          </a>
        </li>
        
    </ul>
        
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            
        </div>
    
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">Üyelik Türü </div>
                    <div class="cardName"> <?php
                    if($row["yetki"] == "2"){
                echo "Normal Üyelik";

                    }else{

                      echo "Admin";
                    }
                    
                    ?></div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">Üyelik Tarihi</div>
                    <div class="cardName"><?php echo  $row["tarih"];?></div>
                </div>

                <div class="iconBx">
                <ion-icon name="calendar-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">Kalan Gün</div>
                    <div class="cardName"><?php echo $interval->format('%a gün');?></div>
                </div>

                <div class="iconBx">
                    <ion-icon name="time-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">Eğitmen İsmi
                    </div>
                    <div class="cardName"><?php echo  $row["antrenor"];?></div>
                </div>

                <div class="iconBx">
                    <ion-icon name="person-outline"></ion-icon>
                </div>
            </div>
        </div>

        <!-- ================ Order Details List ================= -->
        
    <div class="detailsxs">

    <?php
                    if($row["mailonay"] == ""){
                      echo '<div class="alerts error" role="alert">
                      <p>E- Posta adresinizi onaylayınız ! <a href="email">TIKLA</a></p>
                      <div class="close-alerts"><i class="bx bx-x"></i></div>
                    </div>';}else{
                      echo '<div class="alerts successful" role="alert">
                      <p> E-Posta adresiniz onaylı! </p>
                      <div class="close-alerts"><i class="bx bx-x"></i></div>
                    </div>';
                    }?>
 
    <?php if(@$_GET['yenile'] == "sifre"){ ?>
      <?php echo  @$veri1;?>
      <div class="alert alert-ayar alert-dismissible fade show">
        <form action="" method="post">
  <h1>Şifremi Yenile</h1>
  
  <input value="<?php echo $ad; ?>" type="hidden" class="form-control"  name="kAdix">
    <label for="the-name">Şifre:</label>
    <input type="password" class="form-control
            <?php
                if(!empty($password_err)){
                    echo "is-invalid";
                }
            ?>
            " id="password" name="password">
            <div class="invalid-feedback">
      <?php echo @$password_err ?>
    </div>

    <label for="the-name">Şifre Tekrar:</label>
    <input type="password" class="form-control
            <?php
                if(!empty($passagain_err)){
                    echo "is-invalid";
                }
            ?>
            " id="password" name="passagain">
            <div class="invalid-feedback">
      <?php echo @$passagain_err ?>
    </div>
              
    
  <br><hr width="100%" color="#664e96" size="4"></hr><br>
  <button type="submit" name="sifre" class="outline purple-white"> Yenile </button> 
  <a href="ayarlar.php"><button type="button" class="outline green-white" > Geri Dön</button></a>
  
 
</form>
</div>
    
      <?php }elseif(@$_GET['yenile'] == "antrenor"){ ?>

       
        
 
        <?php echo  @$veri2;?>
      <div class="alert alert-ayar alert-dismissible fade show">
      <?php if($row['degisiklik'] == ""){
        echo '<div class="detailsxs"><div class="alerts info">
        <p>Antrenörünüzü 1 kerelik değişebilirsiniz. </p>
        
        </div></div>';

        }else{
          echo '<div class="detailsxs"><div class="alerts error">
          <p>Değişim hakkınız doldu. </p>
          
          </div></div>';
        }
        ?>
        <form action="" method="post">
  <h1>Antrenor Yenile</h1>
  
  <input value="<?php echo $ad; ?>" type="hidden" class="form-control"  name="kAdix">
    <label for="the-name">Kullanıcı Adınız:</label>
    <input type="text" class="form-control" value="<?php echo $ad; ?>" readonly>
            

    <label for="the-reason">Lütfen Antrenör Seçiniz</label>
    <select name="antrenor">
    <option value="">Lütfen Seçiniz.</option>
    <option value="Diloş">Dilara</option>
    <option value="Batu">Batuhan</option>
    <option value="Haktan">Haktan</option>
    <option value="Leyla">Leyla</option>
    
  </select> 
            
  <br><hr width="100%" color="#664e96" size="4"></hr><br>
  <?php if($row['degisiklik'] == ""){
        echo  '<button type="submit" name="antrenorxd" class="outline purple-white"> Yenile </button> ';

        }
        ?>
 
  <a href="ayarlar.php"><button type="button" class="outline green-white" > Geri Dön</button></a>
  
 
</form>
</div>

        <?php }else {?>
  

     <?php echo  @$kayit;?> <?php echo  @$sil1;?>
  
    <div class="alert alert-ayar alert-dismissible fade show">
        <form action="" method="post">
  <h1>AYARLAR</h1>
  

    <label for="the-name">Ad:</label>
    <input type="text" name="ad" value="<?php echo  $row["Ad"];?>">

    <label for="the-name">Soyad:</label>
    <input type="text" name="soyad" value="<?php echo  $row["Soyad"];?>">
              
    <label for="the-name">Email:</label>
    <input type="text" name="email" value="<?php echo  $row["email"];?>">

    <label for="the-name">Boyunuz:</label>
    <input type="text" name="boy" value="<?php echo  $row["boy"];?>">

    <label for="the-email">Kilonuz:</label>
    <input type="text" name="kilo" value="<?php echo  $row["kilo"];?>">

    <label for="the-phone">Yaşınız:</label>
    <input type="text" name="yas" value="<?php echo  $row["yas"];?>">

    <label for="the-reason">Cinsiyetiniz:</label>
    <select name="cinsiyet">
    <option value="<?php echo  $row["cinsiyet"];?>"><?php if($row["cinsiyet"] == "male"){ echo 'Bay';}else{ echo 'Bayan';}?></option>
    <option value="female">Bayan</option>
    <option value="male">Bay</option>
  
  </select>


    <label for="the-reason">Sitemize kayıt olma amacınız ?</label>
    <select name="hedef">
    <option value="<?php echo  $row["hedef"];?>"><?php if($row["hedef"] == "ver"){ echo 'Kilo Vermek İstiyorum';}else{ echo 'Kilo Almak İstiyorum';}?></option>
    <option value="ver">Kilo Vermek İstiyorum</option>
    <option value="al">Kilo Almak İstiyorum</option>
  
  </select>
  <br><hr width="100%" color="#664e96" size="4"></hr><br>
  <button type="submit" class="outline purple-white"> Kaydet </button> 
  
  <button type="button" class="shows outline green-white" id="success" style="float: right;"> Hesabımı Sil </button>
</form>
</div>
</div>
<?php } ?>

	<div class="popup" id="popup">
		<div class="popup-container">
    <form action="" method="post">
			<h1>Eminmisiniz ?</h1>
      <br><hr width="100%" color="#664e96" size="4"></hr><br>
      <label for="the-email">Şifrenizi Giriniz :</label>
      <input type="text" name="sifrem" value="">
      <br>
      <button type="submit" class="outline green-white" > Evet </button>
      <button id="hide" class="outline purple-white">  Hayır </button> 
      </form>
		</div>
	</div>
 
  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
  
<script src="assets/js/main.js"></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script id="rendered-js" >
/*
написать небольшую библиотеку для работы с попапами. Она должна уметь создавать попап из переданного HTML, уметь показать попап и уметь скрыть попап. Решение в виде кодпена.
*/

$(document).ready(function(){
  $("#hide").click(function(){
    $("#popup").fadeOut(500);
  });
  $(".shows").click(function(){
    $("#popup").fadeIn(500);
  });
  
});
let popupLib = {
  show: function show(openControlId, popupSelector, message) {
    let getOpenControl = document.getElementById(openControlId);
    getOpenControl.addEventListener("click", function (event) {
      let getPopup = document.querySelector(popupSelector);
      getPopup.classList.add("is-visible");
      //document.querySelector("h1").textContent = message;
    });
  },close: function closePopup(closeControlId, popupSelector) {
    let getCloseControl = document.getElementById('popup');
    getCloseControl.addEventListener("click", function (event) {
      let getPopup = document.querySelector(popupSelector);
      getPopup.classList.remove("is-visible");
    });
  } };


popupLib.show("success", ".popup", "success");
popupLib.show("alert", ".popup", "alert");
popupLib.close("close", ".popup");

    </script>


  <script id="rendered-js" >
  let list = document.querySelectorAll(".navigation li");

  function activeLink() {
    list.forEach(item => {
      item.classList.remove("hovered");
    });
    this.classList.add("hovered");
  }

  list.forEach(item => item.addEventListener("mouseover", activeLink));

  // Menu Toggle
  let toggle = document.querySelector(".toggle");
  let navigation = document.querySelector(".navigation");
  let main = document.querySelector(".main");

  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };
//# sourceURL=pen.js
</script>
</html>


