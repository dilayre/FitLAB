<?php
session_start();
include("connection.php");
$ad = $_SESSION["kAdi"];
$secim = "SELECT * FROM signup WHERE username='$ad'";
$calistir = mysqli_query($connection,$secim);
$row = mysqli_fetch_array($calistir);
if($_SESSION["kAdi"] == ""){

  Header("Location: loginandregister.php");

}
if($row["hedef"] == ""){
  Header("Location: anasayfa.php");
}

if($row["yetki"] == "2"){
  Header("Location: anasayfa.php");
}

//print_r($row);


$calistir1 = mysqli_query($connection,"SELECT COUNT(*)  FROM signup");
$tek = mysqli_fetch_array($calistir1);  

$calistir2 = mysqli_query($connection,"SELECT COUNT(*)  FROM signup WHERE hedef='' ");
$tek2 = mysqli_fetch_array($calistir2);   

$calistir3 = mysqli_query($connection,"SELECT COUNT(*)  FROM signup WHERE hedef='ver' ");
$tek3 = mysqli_fetch_array($calistir3);  

$calistir4 = mysqli_query($connection,"SELECT COUNT(*)  FROM signup WHERE hedef='al' ");
$tek4 = mysqli_fetch_array($calistir4);  

       
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>FitLAB | Ana Sayfa</title>
      
      <link rel="stylesheet" href="main.css">
      
    <title>Ana Sayfa </title>
    
   

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
                    <div class="numbers"><?php echo $tek[0]; ?> </div>
                    <div class="cardName">Toplam Kayıt </div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers"><?php echo $tek2[0]; ?> </div>
                    <div class="cardName"> Hedef Seçmeyen</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?php echo $tek3[0]; ?> </div>
                    <div class="cardName"> Kilo Verenler</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers"><?php echo $tek4[0]; ?> </div>
                    <div class="cardName">Kilo Alanlar</div>
                </div>

                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

           
        </div>

        <!-- ================ Order Details List ================= -->
        
  <style id="INLINE_PEN_STYLESHEET_ID">
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800");
@import url("https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css");
* {
  box-sizing: border-box;
}

.panel {
  width: 320px;
  margin: 4rem auto;
  padding: 1.5rem;
  background: white;
  border-radius: 3px;
  box-shadow: 0 0 15px 15px rgba(0, 0, 0, 0.02);
}
.panel > h6 {
  margin: 0;
  color: rgba(0, 0, 0, 0.5);
}

.panel-lg {
  width: 100%;
}

.user-list {
  padding: 0;
  margin: 0;
}
.user-list li {
  list-style: none;
  list-style-position: inside;
  margin-top: 1rem;
  position: relative;
  padding-right: 40px;
}
.user-list li:before {
  content: "";
  display: table;
  clear: both;
}
.user-list li img {
  float: left;
  height: 50px;
  width: 50px;
  margin-right: 1rem;
  border-radius: 3px;
}
.user-list li h5 {
  margin: 7px 0 4px 0;
}
.user-list li p {
  margin: 0;
  font-size: 0.8rem;
  font-weight: 600;
  color: rgb(56 148 68 / 77%);
}
.user-list li .action-wrap .btn-action {
  display: none;
  height: 24px;
  width: 24px;
  border-radius: 50%;
  color: #333;
  background: rgba(0, 0, 0, 0.1);
  text-decoration: none;
  text-align: center;
  position: absolute;
  right: 0;
  top: calc(50% - 12px);
  transition: all 0.3s ease-in-out;
}
.user-list li .action-wrap .btn-action.active {
  display: inline-block;
}
.user-list li .action-wrap .btn-action i {
  font-size: 14px;
  line-height: 24px;
}
.user-list li .action-wrap .btn-invite {
  background: rgba(0, 0, 0, 0.7);
  color: #FFF;
}
.user-list li .action-wrap .btn-invite:hover, .user-list li .action-wrap .btn-invite:focus {
  background: rgba(0, 0, 0, 0.9);
}
.user-list li .action-wrap .btn-invited {
  background: #016699;
  color: #FFF;
}
.user-list li .action-wrap .btn-invited:hover, .user-list li .action-wrap .btn-invited:focus {
  background: #005a88;
}
.user-list li:after {
  content: "";
  display: table;
  clear: both;
}

.user-list-col li {
  float: left;
  min-width: 46.7%;
  margin: 1rem 3rem 0 0;
}
.user-list-col li:nth-child(even) {
  margin-right: 0;
}
.user-list-col:after {
  content: "";
  display: table;
  clear: both;
}


  </style>
    <div class="detailsxs">
    
    <?php


if(@$_GET['uye']){
  $yeniname= $_GET['uye'];
  if(@$_GET['sil'] == "ok"){
    //güncelleme için SQL sorgumuzu yazıyoruz.
   $sonuc= mysqli_query($connection,"DELETE FROM signup WHERE username='$yeniname'");
   echo  '<div class="alert successful">
                  <p>Silme işlemi gerçekleşti.</p>
                  
                </div>';
                echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLab/yetkili.php"> ';
    }

  if(empty($_POST['hedef'])){
 
  }else{
  
    $hedef = $_POST["hedef"];
    $yetki = $_POST["yetki"];
    $antrenor = $_POST["antrenor"];
    //echo $yetki;

    $sqlxx = "UPDATE signup SET  hedef='$hedef',  antrenor='$antrenor', yetki='$yetki'  WHERE username='$yeniname'";
      $kaydetxx = mysqli_query($connection, $sqlxx);
  
      echo  '<div class="alert successful">
                  <p>Kayıt Başarılı Artık Sistemi Kullanmaya Başlayabilirsiniz.</p>
                  
                </div>';
                 
                 echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLab/yetkili.php"> ';
   
  }



$calistirxd = mysqli_query($connection,"SELECT * FROM signup WHERE username='$yeniname'");
$veri = mysqli_fetch_array($calistirxd);

echo '<div class="alert alert-ayar alert-dismissible fade show">
<form action="" method="post">
<h1>Üye Düzenle</h1>
<center><p style="color: teal;">'.$yeniname.' kullanıcısını düzenliyorsun</p></center>

<input value="'.$yeniname.'" type="hidden" class="form-control"  name="kAdiP">

<label for="the-reason">Sitemize kayıt olma amacınız ?</label>
    <select name="hedef">
    <option value="">Lütfen Seçiniz</option>
    <option value="ver">Kilo Vermek İstiyor</option>
    <option value="al">Kilo Almak İstiyor</option>
  
  </select>

  <label for="the-reason">Yetkilendir</label>
    <select name="yetki">
    <option value="">Lütfen Seçiniz</option>
    <option value="2">Normal Üye</option>
    <option value="1">Admin</option>
  
  </select>

  <label for="the-reason">Lütfen Antrenör Seçiniz</label>
    <select name="antrenor">
    <option value="">Lütfen Seçiniz.</option>
    <option value="Dilara">Dilara</option>
    <option value="Batuhan">Batuhan</option>
    <option value="Haktan">Haktan</option>
    <option value="Leyla">Leyla</option>
    
  </select> 

<br><hr width="100%" color="#664e96" size="4"></hr><br>
<button type="submit" name="duzenle" class="outline purple-white"> Kaydet </button> 
<a href="?uye='.$yeniname.'&sil=ok"><button type="button" name="sil" class="outline blue-white"> Sil </button> </a>
<a href="yetkili.php"><button type="button" class="outline green-white" style="float: right;" > Geri Dön</button></a>


</form>
</div>';

  

}else{
    ?>
    <div class="panel panel-lg">
		<h6>Kayıtlı Üyeler</h6>
		<ul class="user-list user-list-col">
        <?php
$sql = "SELECT * FROM signup";

$result = $connection->query($sql);
if ($result->num_rows > 0) {
    // satırı tabloya dökmesi için
    while($row = $result->fetch_assoc()) {
      
      echo '	<li>
				<h5>'.$row['Ad'].' '.$row['Soyad'].'</h5>
      <p>'.$row['email'].'</p>
      <p>'.$row['tarih'].' tarihinde kayıt olmuş</p>
      <p>Kilo '.$row['hedef'].' istiyor.</p>
      <p>Yetki '.$row['yetki'].'</p>
      <div class="action-wrap"><br><hr width="100%" color="#664e96" size="3"></hr><br>
      <a href="yetkili.php?uye='.$row['username'].'"><button type="button" name="sifre" class="outline purple-white" style="border-radius: 1px; padding: 2px 10px;"> Düzenle </button></a> 
      
      </div>
  </li>';
    }
     
    }
    else
    {
    echo '<div class="alert alert-warning" role="alert">
    Aktif Üye bulunmamaktadır.
  </div>';
  }

$connection->close();
}
?>
	
		</ul>
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


