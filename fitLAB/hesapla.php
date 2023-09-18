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
if(empty($_POST)){

}else{

  $boy = $_POST["boy"];
  $kilo = $_POST["kilo"];
  $yas = $_POST["yas"];
  $hedef = $_POST["hedef"];
  $cinsiyet = $_POST["cinsiyet"];

  if(empty($boy) or empty($kilo) or empty($yas) or empty($hedef) or empty($cinsiyet)){
  
    $kayit=  '<div class="alert successful">
                <p>OLMADI</p>
                
              </div>';
               
               
  
   

}else{
  $sql = "UPDATE signup SET  boy='$boy', kilo='$kilo', hedef='$hedef', yas='$yas', cinsiyet='$cinsiyet'  WHERE username='$ad'";
    $kaydet = mysqli_query($connection, $sql);

    $kayit=  '<div class="alert successful">
                <p>Kayıt Başarılı Artık Sistemi Kullanmaya Başlayabilirsiniz.</p>
                
              </div>';
               
               echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLab/anasayfa.php?"> ';
 
}}
//echo date('Y-m-d');
$tarih1= new DateTime($row['tarih']);
//$tarih2 = date('Y-m-d', strtotime('+1 month'));
$tarih2= new DateTime("-1 month");
$interval= $tarih1->diff($tarih2);
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
      <title>FitLAB | Hesaplama Araçları </title>
      
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

        <div class="detailsxs">  <?php echo  @$kayit;?></div>
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
        <h1 class='title'>Vücut Kitle İndexi Hesaplayıcı</h1>
        <br><hr width="100%" color="#664e96" size="4"></hr><br>
        <div class="col-md-4">
			  	<!-- input form -->
			  	<form>
				Boy: <br>
				<input type="text" id="height" value="<?php echo  $row["boy"];?>">
				<br>
				Kilo: <br>
				<input type="text" id="weight" value="<?php echo  $row["kilo"];?>">
			  	<br><br>
			  	<!-- button linked to js function -->
			  	<button type="button" onclick="calculate()" class="outline purple-white">Hesapla</button>
				</form><!-- form end -->
			</div><!-- col2 -->
			<br><hr width="100%" color="#664e96" size="4"></hr><br>
				<div>
					<h2 id="yourNumb"></h2>
					<h3 id="rating"></h3>
					<p id="info"></p>
				</div><!-- results -->

        </div>

        <div class='app'>
  <div class='container'>
    <h1 class='title'>Ketojenik Beslenme Hesaplayıcı</h1>
    <p class='instructions'>Aşağıya her bir makronun gramını girin</p>
    <div class='inputs'>
      <div class='inputBlock text-green'>
        <label for='fat'>YAĞ</label>
        <input type='number' id='fat' class='nutritionInput'></input>
      </div>
      <div class='inputBlock text-yellow'>
        <label for='protein'>PROTEIN</label>
        <input type='number' id='protein' class='nutritionInput'></input>
      </div>
      <div class='inputBlock text-red'>
        <label for='carbs'>TOPLAM KARBONHİDRAT</label>
        <input type='number' id='carbs' class='nutritionInput'></input>
      </div>
    </div>
    <div class='results'>
      <h1 class='title'>Breakdown</h1>
      <div class='stats'>
        <div class='statBlock'>
          <h3 class='text-green'>YAĞ</h3>
          <span id='fatOutput'>0</span>%
        </div>
        <div class='statBlock'>
          <h3 class='text-yellow'>PROTEIN</h3>
          <span id='proteinOutput'>0</span>%
        </div>
        <div class='statBlock'>
          <h3 class='text-red'>KARBONHİDRAT</h3>
          <span id='carbsOutput'>0</span>%
        </div>
        <div class='statBlock'>
          <h3>TOPLAM KALORİ</h3>
          <span id='calorieOutput'>0</span>
        </div>
      </div>
    </div>
  </div>
  
</div>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

  
      <script id="rendered-js" >
const recalculateNumbers = e => {
  const inputs = document.querySelectorAll('.nutritionInput');
  let inputData = { totalCalories: 0 };

  inputs.forEach(function (elm) {
    const id = elm.id;
    const val = elm.value;
    inputData[id] = val > 0 ? val : 0;
    let calories = 0;
    if (id === 'fat') {
      calories = val * 9;
    } else {
      calories = val * 4;
    }
    inputData.totalCalories += calories;
  });

  const percentOf = (val, total) => {
    if (val === 0) {
      return 0;
    }
    return Math.round(val / total * 100);
  };
  const updateOutput = (elm, val) => {
    document.getElementById(elm).innerHTML = val;
  };

  const fatPercent = percentOf(inputData.fat * 9, inputData.totalCalories);
  const proteinPercent = percentOf(inputData.protein * 4, inputData.totalCalories);
  const carbsPercent = percentOf(inputData.carbs * 4, inputData.totalCalories);

  updateOutput('calorieOutput', inputData.totalCalories);
  updateOutput('fatOutput', fatPercent);
  updateOutput('proteinOutput', proteinPercent);
  updateOutput('carbsOutput', carbsPercent);
};

document.querySelectorAll('.nutritionInput').forEach(function (elm) {
  elm.addEventListener("change", recalculateNumbers);
});
//# sourceURL=pen.js
    </script>

<script>
  // calculates bmi from user input
function calculate (height, weight) {
	var height = document.getElementById("height").value
	var weight = document.getElementById("weight").value
	var bmindex = (weight/(height*height/10000));
	console.log(bmindex);


	// display bmi on page
	var yourNumb = document.getElementById("yourNumb")
	yourNumb.innerHTML="VKİ'niz : " + bmindex.toFixed(2)

	// gives different message based on range of bmi
	var info = document.getElementById("info")
	var rating = document.getElementById("rating")
	if(bmindex <= 18.5){
		rating.innerHTML="Zayıf"
		info.innerHTML="Zayıf bir BMI, kilonuzun çok düşük olabileceğini gösterebilir. Kilo almanız gerekip gerekmediğini belirlemek için doktorunuza danışmalısınız, çünkü düşük vücut kütlesi vücudunuzun bağışıklık sistemini azaltabilir, bu da adet görmenin (kadınlarda) kaybolması, kemik kaybı, yetersiz beslenme ve diğer durumlar gibi hastalıklara yol açabilir. BMI'niz ne kadar düşükse, bu riskler o kadar artar."
	}
	else if(bmindex > 18.5 && bmindex < 25){
		rating.innerHTML="Normal Kilo"
		info.innerHTML="BMI 18,5 ila 24,9 arasında olan insanlar, en uzun yaşama, en düşük ciddi hastalık insidansı ve ayrıca BMI'si daha yüksek veya daha düşük aralıklarda olan insanlardan daha fiziksel olarak daha çekici olarak algılanma ile ilişkili ideal vücut ağırlığı miktarına sahiptir. Ancak Bel Çevrenizi kontrol etmeniz ve tavsiye edilen sınırlar içinde tutmanız iyi bir fikir olabilir."
	}
	else if(bmindex > 24.99 && bmindex < 30){
		rating.innerHTML="Kilolu"
		info.innerHTML="Bu BMI aralığına düşen kişiler aşırı kilolu kabul edilir ve kilolarını azaltmak için diyet ve egzersiz gibi sağlıklı yollar bulmaktan fayda görürler. Bu aralığa giren bireyler, çeşitli hastalıklar için yüksek risk altındadır. BMI'niz 27-29,99 ise sağlık sorunları riskiniz artar. Son zamanlarda yapılan bir çalışmada, kan basıncı, diyabet ve kalp hastalığı oranlarında artış, kadınlar için 27.3 ve erkekler için 27.8 olarak kaydedildi. Bel Çevrenizi kontrol etmek ve önerilen sınırlar ile karşılaştırmak iyi bir fikir olabilir."
	}
	else if(bmindex > 29.99 && bmindex < 35){
		rating.innerHTML="Obezite (Sınıf 1)"
		info.innerHTML="BKİ'si 30-34,99 olan kişiler fiziksel olarak sağlıksız durumdadır ve bu da onları kalp hastalığı, diyabet, yüksek tansiyon, safra kesesi hastalığı ve bazı kanserler gibi ciddi hastalıklara yakalanma riskine sokar. Bu, özellikle tavsiye edilenden daha büyük bir Bel Bedeniniz varsa geçerlidir. Bu insanlar yaşam tarzlarını değiştirerek büyük fayda sağlayacaktır. İdeal olarak, doktorunuza görünün ve kilonuzu yüzde 5-10 oranında azaltmayı düşünün. Böyle bir ağırlık azaltma, önemli sağlık iyileştirmelerine yol açacaktır."
	}
	else if(bmindex > 34.99 && bmindex < 40){
		rating.innerHTML="Obezite (Sınıf 2)"
		info.innerHTML="BMI'niz 35-39.99 ise, kiloyla ilgili sağlık sorunları ve hatta ölüm riskiniz çok fazladır. Doktorunuza görünün ve kilonuzu daha düşük bir VKİ'ye indirin."
	}
	else if(bmindex >= 40){
		rating.innerHTML="Morbid Obezite"
		info.innerHTML="40+ BMI ile aşırı derecede yüksek kiloyla ilişkili hastalık ve erken ölüm riskiniz vardır. Aslında, zaten kiloyla ilgili bir durumdan muzdarip olabilirsiniz. Sağlığınız için doktorunuzu görmeniz ve durumunuz için uzmanlardan yardım almanız çok önemlidir."
	}

}
	
</script>
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
