<?php
session_start();
include("connection.php");
$ad = $_SESSION["kAdi"];
$secim = "SELECT * FROM signup WHERE username='$ad'";
$calistir = mysqli_query($connection,$secim);
$row = mysqli_fetch_array($calistir);

if($row["hedef"] == ""){
  Header("Location: anasayfa.php");
}
if($_SESSION["kAdi"] == ""){

  Header("Location: loginandregister.php");

}
//print_r($row);
//echo date('Y-m-d');
$tarih1= new DateTime($row['tarih']);
//$tarih2 = date('Y-m-d', strtotime('+1 month'));
$tarih2= new DateTime("-1 month");
$interval= $tarih1->diff($tarih2);

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>FitLAB | Antrenman Programım </title>
      
      <link rel="stylesheet" href="main.css">
      <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
      
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
        
    <div class="details-antr">
   
 <div class="bodyx">

 <?php if($row["hedef"] == "ver"){ ?> 


 <?php
 //error_reporting(0);


 $kaynak = file_get_contents("http://localhost:8080/fitLAB/program/program1.json");
 $data = json_decode($kaynak,true);
 
 //echo $data['hedefbölge1'];
 
 for( $i = 1; $i<=10; $i++ ) {

 
  
 echo '<figure class="snip1137 blue">
 <img src="'.$data["resim".$i.""].'" alt="sample25" />
 
 <figcaption>
 
   <h3>'.$data["hareketismi".$i.""].' / '.$data["hedefbölge".$i.""].' </h3>
   <p>
   '.$data["acıklama".$i.""].'
   <hr width="100%" color="#664e96" size="4"></hr><br>
   <center><a href="#open-modal'.$i.'"><button  type="submit" class="outline purple-white">Video İzle </button></a></center><br>
   <hr width="100%" color="#664e96" size="4"></hr>
   <h4><center> '.$data["setsayisi"].'</center></h4>
   <hr width="100%" color="#664e96" size="4"></hr><br>
   
   </p>
 </figcaption>
</figure>

<div id="open-modal'.$i.'" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">Close</a>
    <h3  style=" font-size: 150%;margin: 0 0 15px;">'.$data["hareketismi".$i.""].' / '.$data["hedefbölge".$i.""].' </h3>
    <hr width="100%" color="#664e96" size="4"></hr><br>
    <center> <div><iframe width="300" height="400"  src="https://www.youtube.com/embed/'.$data["link".$i.""].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div></center>
    
  </div>
</div>

';


  }
 
 ?>

<?php }else{ ?>

  <?php
 


 $kaynak = file_get_contents("http://localhost:8080/fitLAB/program/program2.json");
 $data = json_decode($kaynak,true);
 
 //echo $data['hedefbölge1'];
 
 for( $i = 1; $i<=10; $i++ ) {

 
  
  echo '<figure class="snip1137 blue">
  <img src="'.$data["resim".$i.""].'" alt="sample25" />
  
  <figcaption>
  
    <h3>'.$data["hareketismi".$i.""].' / '.$data["hedefbölge".$i.""].' </h3>
    <p>
    '.$data["acıklama".$i.""].'
    <hr width="100%" color="#664e96" size="4"></hr><br>
    <center><a href="#open-modal'.$i.'"><button  type="submit" class="outline purple-white">Video İzle </button></a></center><br>
    <hr width="100%" color="#664e96" size="4"></hr>
    <h4><center> '.$data["setsayisi"].'</center></h4>
    <hr width="100%" color="#664e96" size="4"></hr><br>
    
    </p>
  </figcaption>
 </figure>
 
 <div id="open-modal'.$i.'" class="modal-window">
   <div>
     <a href="#" title="Close" class="modal-close">Close</a>
     <h3 style=" font-size: 150%;margin: 0 0 15px;">'.$data["hareketismi".$i.""].' / '.$data["hedefbölge".$i.""].' </h3>
     <hr width="100%" color="#664e96" size="4"></hr><br>
     <center> <div><iframe width="300" height="400" src="https://www.youtube.com/embed/'.$data["link".$i.""].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div></center>
     
   </div>
 </div>
 
 ';


  }
 
 ?>


  <?php } ?>
 

</div>
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


