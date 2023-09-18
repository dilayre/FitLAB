<?php
session_start();
include("connection.php");
$ad = $_SESSION["kAdi"];
$secim = "SELECT * FROM signup WHERE username='$ad'";
$calistir = mysqli_query($connection,$secim);
$row = mysqli_fetch_array($calistir);
//print_r($row);
//echo date('Y-m-d');
$tarih1= new DateTime($row['tarih']);
//$tarih2 = date('Y-m-d', strtotime('+1 month'));
$tarih2= new DateTime("-1 month");
$interval= $tarih1->diff($tarih2);
if($_SESSION["kAdi"] == ""){

  Header("Location: loginandregister.php");

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
      <title>FitLAB | Diyet Programım </title>
      <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="main.css">
      
    <title>Ana Sayfa </title>
    
   

<script>
  window.console = window.console || function(t) {};
</script>
  </head>

<body>
    <!-- =============== Navigation ================ -->
<div class="container">
<?php include('menu.php') ;?>
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
    <style>
.diyet-yap {
    grid-area: none;
    background: white;
    /* padding: 35px 30px; */
}
</style>
<style>
/**
 * Tabs
 */
.tabs {
  display: flex;
  flex-wrap: wrap;
}

.tabs label {
  order: 1;
  display: block;
  padding: 1rem 2rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background: #9a82c9;;
  
  transition: background ease 0.2s;
}

.tabs .tab {
  order: 99;
  flex-grow: 1;
  width: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
}

.tabs input[type=radio] {
  display: none;
}

.tabs input[type=radio]:checked + label {
  background: #fff;
}

.tabs input[type=radio]:checked + label + .tab {
  display: block;
}

@media (max-width: 45em) {
  .tabs .tab,
.tabs label {
    order: initial;
  }

  .tabs label {
    width: 100%;
    margin-right: 0;
    margin-top: 0.2rem;
  }
}
/**
 * Generic Styling
*/

</style>
  
 <div class="bodyx">
 <?php
 

 if(!empty($row["diyet"])){
                    if($row["hedef"] == "ver"){
                      
                      if($row["diyet"] == ""){
                
                      $yeni1 = "ver";
                      $yenix = rand(1,2);
                      $sql = "UPDATE signup SET  diyet='$yenix'  WHERE username='$ad'";
                      $kaydet = mysqli_query($connection, $sql);
                    }
                    }else{
                      if($row["diyet"] == ""){
                
                        $yeni1 = "al";
                        $yenix = rand(1,2);
                        $sql = "UPDATE signup SET  diyet='$yenix'  WHERE username='$ad'";
                        $kaydet = mysqli_query($connection, $sql);
                      }
                    }
                  }
                    
                    ?> 


 <?php

$ben1 = $row["diyet"];
$ben2 = $row["hedef"];
//echo $ben1;
$sql = "SELECT * FROM diyet WHERE rand='".$ben1."' and hedef='".$ben2."'";

$result = $connection->query($sql);
if ($result->num_rows > 0) {
    // satırı tabloya dökmesi için
    while($row = $result->fetch_assoc()) {

    echo '<div class="tabs">
    <input type="radio" name="tabs" id="tabone" checked="checked">
    <label for="tabone">Sabah Yemeği</label>
    <div class="tab">
      
      <p>'.$row['sabah'].'</p>
      
    </div>
    
    <input type="radio" name="tabs" id="tabtwo">
    <label for="tabtwo">Öğlen Yemeği</label>
    <div class="tab">
     
      <p>'.$row['oglen'].'</p>
    </div>
    
    <input type="radio" name="tabs" id="tabthree">
    <label for="tabthree">Akşam Yemeği</label>
    <div class="tab">
      
      <p>'.$row['aksam'].'</p>
    </div>
  </div>'  ;
    
     
    }
     
    }
    else
    {
    echo '<div class="alert alert-warning" role="alert">
    Aktif diyet bulunmamaktadır.
  </div>';
  }


$connection->close();
?>


 <hr width="100%" color="#664e96" size="4"></hr><br>
 

</div>
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


