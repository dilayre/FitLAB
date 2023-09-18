<?php
session_start();
include("connection.php");
$ad = $_SESSION["kAdi"];
$secim = "SELECT * FROM signup WHERE username='$ad'";
$calistir = mysqli_query($connection,$secim);
$row = mysqli_fetch_array($calistir);
//print_r($row);
if($_SESSION["kAdi"] == ""){

  Header("Location: loginandregister.php");

}
if($row["tarih"] == ""){

  Header("Location: loginandregister.php");

}
if(empty($_POST)){

}else{

  $antrenor = $_POST["antrenor"];
  $boy = $_POST["boy"];
  $kilo = $_POST["kilo"];
  $yas = $_POST["yas"];
  $hedef = $_POST["hedef"];
  $cinsiyet = $_POST["cinsiyet"];

  if(empty($boy) or empty($kilo) or empty($yas) or empty($hedef) or empty($cinsiyet) or empty($antrenor)){
  
    $kayit=  '<div class="alert successful">
                <p>OLMADI</p>
                
              </div>';
               
               
  
   

}else{
  $sql = "UPDATE signup SET  boy='$boy', antrenor='$antrenor', kilo='$kilo', hedef='$hedef', yas='$yas', cinsiyet='$cinsiyet'  WHERE username='$ad'";
    $kaydet = mysqli_query($connection, $sql);

    $kayit=  '<div class="detailsxs"><div class="alerts successful">
    <p> Kayıt başarılı! Artık sistemi kullanmaya başlayabilirsiniz. </p>
    <div class="close-alerts"><i class="bx bx-x"></i></div>
    </div></div>';
               
               echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLab/anasayfa.php?"> ';
 
}}
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
      <title>FitLAB | Ana Sayfa</title>
      
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
        <div class="detailsxs">  <?php echo  @$kayit;?>
        <?php
                    if($row["mailonay"] == ""){
                      echo '<div class="alerts error" role="alert">
                      <p>E- Posta adresinizi onaylayınız ! <a href="email">TIKLA</a></p>
                      <div class="close-alerts"><i class="bx bx-x"></i></div>
                    </div>';}?>
      </div>
    
        <?php
                    if($row["yas"] == ""){ ?>

<div class="detailsxs">

        <form action="" method="post">
  <h1>Son Adım</h1>
  <p>Sizi daha iyi tanıyabilmemiz adına lütfen aşağıdaki formu doldurunuz.</p>

  <label for="the-reason">Lütfen Antrenör Seçiniz</label>
    <select name="antrenor">
    <option value="">Lütfen Seçiniz.</option>
    <option value="Diloş">Dilara</option>
    <option value="Batu">Batuhan</option>
    <option value="Haktan">Haktan</option>
    <option value="Leyla">Leyla</option>
  
  </select> 
    <label for="the-name">Boyunuz:</label>
    <input type="text" name="boy">

    <label for="the-email">Kilonuz:</label>
    <input type="text" name="kilo">

    <label for="the-phone">Yaşınız:</label>
    <input type="text" name="yas">

    <label for="the-reason">Cinsiyetiniz:</label>
    <select name="cinsiyet">
    <option value="">Lütfen Seçiniz.</option>
    <option value="female">Bayan</option>
    <option value="male">Bay</option>
  
  </select>


    <label for="the-reason">Sistemimize kayıt olma amacınız nedir?</label>
    <select name="hedef">
    <option value="">Lütfen Seçiniz.</option>
    <option value="ver">Kilo vermek istiyorum</option>
    <option value="al">Kilo almak istiyorum</option>
  
  </select>
  <br> <hr width="100%" color="#664e96" size="4"></hr><br>
  <button type="submit" class="outline purple-white">Kaydet </button>
</form>
</div>

<?php
   }else{ ?>
         
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
    <div class="details">
 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="sex">Cinsiyet</label>
          <select id="sex" class="custom-select">
          <?php
                    if($row["cinsiyet"] == "male"){
                echo '<option value="male">Erkek</option>';

                    }else{

                      echo '<option value="female">Kadın</option>';
                    }
                    
                    ?>
          
            
           
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="age">Yaş</label>
          <input type="number" id="age" class="custom-select" min="1" max="120" value="<?php echo  $row["yas"];?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="weight">Kilo (kg)</label>
          <input type="number" id="weight" class="custom-select" min="1" max="500" value="<?php echo  $row["kilo"];?>">
        </div>
        <div class="form-group col-md-6">
          <label for="height">Boy (cm)</label>
          <input type="number" id="height" class="custom-select" min="1" max="300" value="<?php echo  $row["boy"];?>">
          
        </div>
        
      </div>
     
      <br> 
      <div class="bg-orange-200 mb-10 p-6 rounded-lg shadow">
    <div class="md:flex">
    <div class="md:w-1/2">
      <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-2 leading-tight">Sevgili <b><?php echo  $row["Ad"];?> </b> Hoşgeldiniz</h2>
      <br> 
      <p class="text-gray-700 mb-4">
        <?php
        $soz[1] = "Yüksek bir tepeye tırmandığında daha tırmanacak çok tepe olduğunu göreceksin."; 
        $soz[2] = "Bugün sahip oldukların için teşekkür et ve yarın sahip olacakların için savaşmaya başla";  
        $soz[3] = "Gerçek olmak için doğdun mükemmel olmak için değil."; 
        $soz[4] = "Sizi gerçekten motive edebilen tek kişi kendinizdir."; 
        $soz[5] = "Bugün içinde bulunduğunuz mücadele, yarın ihtiyacınız olan gücü geliştiriyor."; 
        $karistir = rand(1,5); 
        echo "$soz[$karistir]"; 
        ?>
        </p>
    </div>
    <div class="md:w-1/2">
        
        <svg class="w-64 h-48 object-cover mx-auto" id="f61e7f2c-3df8-44b9-b514-d2b672d0e0d5" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1100.99998 666.0509"><title>dev_focus</title><circle cx="633.92942" cy="214.02012" r="36.39575" fill="#2f2e41"></circle><path d="M693.56939,295.60077a36.40082,36.40082,0,0,1,32.03938,53.66882,36.38708,36.38708,0,1,0-60.45438-39.98247A36.306,36.306,0,0,1,693.56939,295.60077Z" transform="translate(-49.50001 -116.97455)" fill="#2f2e41"></path><circle cx="565.91872" cy="107.03051" r="106.9125" fill="#2f2e41"></circle><path d="M531.5098,157.67094A106.89328,106.89328,0,0,1,679.677,146.461c-.87424-.83106-1.73925-1.66885-2.64768-2.47643A106.91251,106.91251,0,0,0,534.96321,303.79182c.90844.80758,1.84178,1.56849,2.76952,2.33937A106.89337,106.89337,0,0,1,531.5098,157.67094Z" transform="translate(-49.50001 -116.97455)" fill="#2f2e41"></path><circle cx="565.01268" cy="144.17807" r="68.8589" fill="#ffb8b8"></circle><path d="M565.58663,282.89754s9.06039,83.35551-5.43622,92.41589,83.35551,21.74492,83.35551,21.74492-14.49662-90.60382,21.74491-114.16081Z" transform="translate(-49.50001 -116.97455)" fill="#ffb8b8"></path><path d="M652.5663,360.81682s26.98248-12.60018-11.87783-8.11216-72.38788-12.72672-72.38788-12.72672-11.77434-11.77849-13.58641.906,5.43623,36.24153-34.42945,39.86568-76.10721-7.2483-90.60382,19.93284-7.2483,144.9661-7.2483,144.9661,27.18114,97.85213,48.92606,112.34874,212.01292-5.43623,212.01292-5.43623L737.73388,554.709V440.54818s-7.2483-39.86568-57.98644-28.99322c0,0-32.61737-7.24831-30.8053-23.557S652.5663,360.81682,652.5663,360.81682Z" transform="translate(-49.50001 -116.97455)" fill="#d0cde1"></path><path d="M478.55,727.24542c1.12-4.88,1.87-7.64,1.87-7.64l-.57995-3.97-5.97-40.54-2.51-17.1c21.74-9.06,27.18-50.74,27.18-50.74l.82-.49,3.71-2.22v-.01l13.32-7.99.27-.16,5.38,3.58,10.93,7.29c38.24,28.12,77.18,27.62,101.21,23.19,14.69-2.71,23.82-6.88,23.82-6.88l26.36-8.79.82-.27.81.12,15.46,2.34.28.05,1.28.19-3.58,24.75-5.19,35.97c13.71,7.26,25.9,20.9,36.56,37.71q3.54,5.58,6.86,11.61c2.88,5.2,5.63,10.61,8.25,16.15.32.66.63,1.33.94,2,1.01,2.17,2.01,4.36,2.98005,6.56H473.75c.36-2.21.72-4.32,1.07-6.35a1.54822,1.54822,0,0,0,.04-.21c.13-.68.25-1.34.36-2C476.44,736.79541,477.62,731.28546,478.55,727.24542Z" transform="translate(-49.50001 -116.97455)" fill="#2f2e41"></path><path d="M467.73451,378.93759s19.93284,36.24152,12.68454,81.54343S502.164,618.13166,502.164,618.13166l21.74492-5.43623s-14.49661-94.228-10.87246-115.97289,3.62415-106.9125-14.49661-117.78495S467.73451,378.93759,467.73451,378.93759Z" transform="translate(-49.50001 -116.97455)" fill="#2f2e41"></path><path d="M678.47286,416.59979l7.61685,200.62583,14.49661,9.06038s20.83888-220.16727,9.96642-220.16727H688.4302A9.97043,9.97043,0,0,0,678.47286,416.59979Z" transform="translate(-49.50001 -116.97455)" fill="#2f2e41"></path><circle cx="462.63037" cy="487.56653" r="9.06038" fill="#4299e1"></circle><circle cx="643.838" cy="496.62692" r="9.06038" fill="#4299e1"></circle><polygon points="506.12 58.104 506.12 126.963 522.067 126.963 542.362 105.218 539.644 126.963 610.133 126.963 605.784 105.218 614.482 126.963 625.717 126.963 625.717 58.104 506.12 58.104" fill="#2f2e41"></polygon><ellipse cx="495.24775" cy="129.68146" rx="5.43623" ry="9.96642" fill="#ffb8b8"></ellipse><ellipse cx="634.77762" cy="129.68146" rx="5.43623" ry="9.96642" fill="#ffb8b8"></ellipse><path d="M721.4252,612.69543s-82.44948-15.40265-87.8857,11.77849,91.50985,15.40265,91.50985,15.40265Z" transform="translate(-49.50001 -116.97455)" fill="#ffb8b8"></path><path d="M719.61312,426.05157S917.12944,583.70221,880.88791,621.75581,706.92859,648.937,706.92859,648.937l9.06038-45.3019,79.73135-9.06038L755.85465,554.709l-36.24153,3.62415Z" transform="translate(-49.50001 -116.97455)" fill="#d0cde1"></path><path d="M427.86884,688.80263l25.36906,19.93284s18.12077,56.17437,45.30191,39.86568S473.17074,674.306,473.17074,674.306l-30.80529-10.87246Z" transform="translate(-49.50001 -116.97455)" fill="#ffb8b8"></path><path d="M453.2379,397.05835l-25.30065,7.61381s-175.83982,130.104-183.08812,166.34551S279.27858,627.192,279.27858,627.192l157.65064,74.29513,16.30868-43.48983-74.29513-38.05361s5.43623-10.87245-16.30868-12.68453S337.265,581.89013,337.265,581.89013s43.48983-67.04682,67.04682-52.55021,30.8053,25.36907,30.8053,25.36907Z" transform="translate(-49.50001 -116.97455)" fill="#d0cde1"></path><path d="M814.1,733.45544v6.07a13.34008,13.34008,0,0,1-.91,4.87,13.68227,13.68227,0,0,1-.97,2,13.4373,13.4373,0,0,1-11.55,6.56H354.12a13.43736,13.43736,0,0,1-11.55-6.56,13.68842,13.68842,0,0,1-.97-2,13.34153,13.34153,0,0,1-.91-4.87v-6.07a13.42641,13.42641,0,0,1,13.43-13.43h25.74v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.4v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.4v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.56-.56h105.2a.55908.55908,0,0,1,.56.56v2.83h8.4v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.56552.56552,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h8.4v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.557.557,0,0,1,.55.56v2.83h8.4v-2.83a.55908.55908,0,0,1,.56-.56H738a.55908.55908,0,0,1,.56.56v2.83h8.39v-2.83a.55908.55908,0,0,1,.56-.56h13.43a.55908.55908,0,0,1,.56.56v2.83h39.17A13.42636,13.42636,0,0,1,814.1,733.45544Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><rect x="161.44819" y="627.41618" width="732.99951" height="2" fill="#3f3d56"></rect><path d="M778.14246,477.82126H611.69957v-3.43053H536.22789v3.43053h-167.129a11.25861,11.25861,0,0,0-11.25861,11.25861v227.9115A11.25864,11.25864,0,0,0,369.09889,728.25H778.14246a11.25864,11.25864,0,0,0,11.25861-11.25865V489.07987A11.2586,11.2586,0,0,0,778.14246,477.82126Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><circle cx="524.44819" cy="440.41618" r="25" fill="none" stroke="#d0cde1" stroke-miterlimit="10" stroke-width="2"></circle><circle cx="516.44819" cy="449.41618" r="25" fill="#d0cde1"></circle><rect x="26.02015" y="663.55077" width="189" height="2.26159" fill="#3f3d56"></rect><rect x="851.02015" y="663.55077" width="189" height="2.26159" fill="#3f3d56"></rect><path d="M185.63919,707.69176c-19.911,32.5064-13.06067,72.9409-13.06067,72.9409s39.1325-12.26879,59.04353-44.7752,13.06067-72.9409,13.06067-72.9409S205.55022,675.18536,185.63919,707.69176Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><path d="M171.76594,780.90107l-1.13209-.17932c-.40938-.06491-41.158-6.81651-65.56214-36.01491-24.40427-29.19937-23.817-70.4997-23.809-70.91351l.02429-1.14573,1.13209.17932c.40939.06492,41.158,6.81651,65.56228,36.01588h0c24.40414,29.19841,23.81684,70.49874,23.80885,70.91255Z" transform="translate(-49.50001 -116.97455)" fill="#4299e1"></path><path d="M173.37365,781.92912l-1.09375-.34277c-.39551-.124-39.7207-12.75586-59.59766-45.20605-19.87695-32.45118-13.26269-73.22266-13.19433-73.63086l.1914-1.12989,1.09375.34278c.39551.124,39.72071,12.75586,59.59766,45.207h0c19.87695,32.45019,13.2627,73.22168,13.19434,73.62988Zm-72.081-117.67773c-.90528,6.84277-4.51368,42.33594,13.09472,71.084,17.60938,28.74707,50.86719,41.65821,57.373,43.96192.90527-6.84278,4.51367-42.33594-13.09473-71.083h0C141.05627,679.46623,107.79846,666.5551,101.2926,664.25139Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><circle cx="124.32091" cy="536.32762" r="22" fill="#3f3d56"></circle><polygon points="399.789 258.254 273.582 131.051 214 131.051 214 129.051 274.417 129.051 274.711 129.348 401.211 256.848 399.789 258.254" fill="#3f3d56"></polygon><polygon points="696.211 254.254 822.417 127.051 882 127.051 882 125.051 821.582 125.051 821.289 125.348 694.789 252.848 696.211 254.254" fill="#3f3d56"></polygon><rect x="0.00009" y="68.33964" width="145.99988" height="28.87712" fill="#d0cde1"></rect><rect x="0.00009" y="112.65108" width="145.99988" height="28.87712" fill="#d0cde1"></rect><rect x="0.00009" y="156.96251" width="145.99988" height="28.87712" fill="#d0cde1"></rect><rect x="0.0001" y="68.33965" width="60.39875" height="28.87712" opacity="0.15"></rect><rect y="112.65105" width="19.55356" height="28.87712" opacity="0.15"></rect><rect x="0.00009" y="156.96251" width="97.33325" height="28.87712" opacity="0.15"></rect><rect x="954.7761" y="74.82702" width="146.22388" height="13.02985" fill="#d0cde1"></rect><rect x="899.99998" y="73.14045" width="28.95522" height="28.95522" fill="#4299e1"></rect><rect x="899.99998" y="116.57329" width="28.95522" height="28.95522" fill="#4299e1"></rect><rect x="899.99998" y="160.00612" width="28.95522" height="28.95522" fill="#4299e1"></rect><path d="M986.45507,213.07037H955.5V182.1148h30.95508Zm-28.95508-2h26.95508V184.1148H957.5Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><rect x="954.7761" y="118.25985" width="146.22388" height="13.02985" fill="#d0cde1"></rect><path d="M986.45507,256.503H955.5V225.54791h30.95508Zm-28.95508-2h26.95508V227.54791H957.5Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><rect x="954.7761" y="161.69269" width="146.22388" height="13.02985" fill="#d0cde1"></rect><path d="M986.45507,299.93561H955.5V268.98053h30.95508Zm-28.95508-2h26.95508V270.98053H957.5Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><circle cx="188.99998" cy="83.0509" r="16" fill="#4299e1"></circle><circle cx="188.99998" cy="131.0509" r="16" fill="#4299e1"></circle><circle cx="188.99998" cy="174.0509" r="16" fill="#4299e1"></circle><path d="M230.5,213.02545a17,17,0,1,1,17-17A17.019,17.019,0,0,1,230.5,213.02545Zm0-32a15,15,0,1,0,15,15A15.017,15.017,0,0,0,230.5,181.02545Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><path d="M230.5,261.02545a17,17,0,1,1,17-17A17.019,17.019,0,0,1,230.5,261.02545Zm0-32a15,15,0,1,0,15,15A15.017,15.017,0,0,0,230.5,229.02545Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><path d="M230.5,304.02545a17,17,0,1,1,17-17A17.019,17.019,0,0,1,230.5,304.02545Zm0-32a15,15,0,1,0,15,15A15.017,15.017,0,0,0,230.5,272.02545Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><path d="M1038.5,713.02545h-2v-15a3.00328,3.00328,0,0,1,3-3h5a1.00067,1.00067,0,0,0,1-1v-10a1.00067,1.00067,0,0,0-1-1h-5a3.00328,3.00328,0,0,1-3-3v-5a1.00067,1.00067,0,0,0-1-1h-9a3.00328,3.00328,0,0,1-3-3v-1a1.00067,1.00067,0,0,0-1-1h-36a1.00067,1.00067,0,0,0-1,1v1a3.00328,3.00328,0,0,1-3,3h-9a1.00067,1.00067,0,0,0-1,1v5a3.00328,3.00328,0,0,1-3,3h-5a1.00067,1.00067,0,0,0-1,1v10a1.00067,1.00067,0,0,0,1,1h6a3.00328,3.00328,0,0,1,3,3v15h-2v-15a1.00067,1.00067,0,0,0-1-1h-6a3.00328,3.00328,0,0,1-3-3v-10a3.00328,3.00328,0,0,1,3-3h5a1.00067,1.00067,0,0,0,1-1v-5a3.00328,3.00328,0,0,1,3-3h9a1.00067,1.00067,0,0,0,1-1v-1a3.00328,3.00328,0,0,1,3-3h36a3.00328,3.00328,0,0,1,3,3v1a1.00067,1.00067,0,0,0,1,1h9a3.00328,3.00328,0,0,1,3,3v5a1.00067,1.00067,0,0,0,1,1h5a3.00328,3.00328,0,0,1,3,3v10a3.00328,3.00328,0,0,1-3,3h-5a1.00067,1.00067,0,0,0-1,1Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><path d="M1035.5,783.02545h-61a3.00328,3.00328,0,0,1-3-3v-43h2v43a1.00067,1.00067,0,0,0,1,1h61a1.00067,1.00067,0,0,0,1-1v-43h2v43A3.00328,3.00328,0,0,1,1035.5,783.02545Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><rect x="921.99998" y="603.0509" width="79" height="24" rx="2" fill="#4299e1"></rect><path d="M1042,738.02545H967a3.00328,3.00328,0,0,1-3-3v-20a3.00328,3.00328,0,0,1,3-3h75a3.00328,3.00328,0,0,1,3,3v20A3.00328,3.00328,0,0,1,1042,738.02545Zm-75-24a1.00067,1.00067,0,0,0-1,1v20a1.00067,1.00067,0,0,0,1,1h75a1.00067,1.00067,0,0,0,1-1v-20a1.00067,1.00067,0,0,0-1-1Z" transform="translate(-49.50001 -116.97455)" fill="#3f3d56"></path><path d="M1002.5,660.02545v0a249.6283,249.6283,0,0,1-2.09463-54.11121L1002.5,576.02545h0c-11.54175,22.96553-8.93335,53.1922,0,83.99993Z" transform="translate(-49.50001 -116.97455)" fill="#d0cde1"></path><path d="M1011.5,665.02545v0a183.49687,183.49687,0,0,1-1.00779-32.20905L1011.5,615.02545h0c-5.55309,13.67-4.29811,31.662,0,50Z" transform="translate(-49.50001 -116.97455)" fill="#d0cde1"></path></svg>
        
    </div>
  </div>
  </div>
  
    </form>
    
    
    <div class="recentOrders">
  <div class="cardHeader">
    <h2>Kalori Hesapla</h2>
    
  </div>
  
    <table id="results-table">
      <thead>
        <tr>
          <th>Besin</th>
          <th>Miktar</th>
        </tr>
      </thead>
      <tbody>
        <tr>
      <td>Karbonhidrat</td>
      <td id="carbs-amount">-</td>
    </tr>
    <tr>
      <td>Su</td>
      <td id="water-amount">-</td>
    </tr>
    <tr>
      <td>Protein</td>
      <td id="protein-amount">-</td>
    </tr>
    <tr>
      <td>Yağ</td>
      <td id="fat-amount">-</td>
    </tr>
    <tr>
      <td>Mineraler</td>
      <td id="minerals-amount">-</td>
    </tr>
    <tr>
      <td>Vitamin</td>
      <td id="vitamins-amount">-</td>
    </tr>
    <tr>
      <td>Et</td>
      <td id="meat-amount">-</td>
    </tr>
    <tr>
      <td>Yumurta</td>
      <td id="egg-amount">-</td>
    </tr>
    <tr>
      <td>Süt</td>
      <td id="milk-amount">-</td>
    </tr>
    <tr>
      <td>Şeker</td>
      <td id="sugar-amount">-</td>
    </tr>
    <tr>
      <td>Tuz</td>
      <td id="salt-amount">-</td>
    </tr>
  </tbody>
</table>
</div>

  <script>
    $(document).ready(function() {
      // Get input elements
      const sexInput = $('#sex');
      const ageInput = $('#age');
      const weightInput = $('#weight');
      const heightInput = $('#height');

      // Get result elements
      const carbsAmount = $('#carbs-amount');
      const waterAmount = $('#water-amount');
      const proteinAmount = $('#protein-amount');
      const fatAmount = $('#fat-amount');
      const mineralsAmount = $('#minerals-amount');
      const vitaminsAmount = $('#vitamins-amount');
      const meatAmount = $('#meat-amount');
      const eggAmount = $('#egg-amount');
      const milkAmount = $('#milk-amount');
      const sugarAmount = $('#sugar-amount');
      const saltAmount = $('#salt-amount');

      // Calculate function
   function calculate() {
  const sex = sexInput.val();
  const age = ageInput.val();
  const weight = weightInput.val();
  const height = heightInput.val();

  const bmr = sex === 'male'
    ? 88.36 + (13.4 * weight) + (4.8 * height) - (5.7 * age)
    : 447.6 + (9.2 * weight) + (3.1 * height) - (4.3 * age);

  const carbs = Math.round(bmr * 0.4 / 4);
  const water = Math.round(weight * 30);
  const protein = Math.round(bmr * 0.3 / 4);
  const fat = Math.round(bmr * 0.3 / 9);
  const minerals = Math.round(weight / 2.2);
  const vitamins = Math.round(weight * 0.75);
  const meat = Math.round(protein / 25);
  const egg = Math.round(protein / 7);
  const milk = Math.round(bmr / 17);
  const sugar = Math.round(bmr * 0.1 / 4);
  const salt = Math.round(weight / 2.2);

  // Update result elements
  carbsAmount.text(carbs);
  waterAmount.text(water);
  proteinAmount.text(protein);
  fatAmount.text(fat);
  mineralsAmount.text(minerals);
  vitaminsAmount.text(vitamins);
  meatAmount.text(meat);
  eggAmount.text(egg);
  milkAmount.text(milk);
  sugarAmount.text(sugar);
  saltAmount.text(salt);
}


  // Calculate on input change
  sexInput.on('change', calculate);
  ageInput.on('change', calculate);
  weightInput.on('change', calculate);
  heightInput.on('change', calculate);
});
 </script>

  
</div>

</div>
<?php   }?>
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

 
  let toggle = document.querySelector(".toggle");
  let navigation = document.querySelector(".navigation");
  let main = document.querySelector(".main");

  toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
  };

</script>
</html>
