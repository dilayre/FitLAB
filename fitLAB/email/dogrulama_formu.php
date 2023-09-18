<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  

  
  <title>email doğrula </title>

  
  
  
  
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

:root{
	--white: #fff;
	--text-clr: #000024;
	--primary: #9456cd;
	--secondary: #c0c1d2;
	--input-bg: #f1f1ff;
	--btn-hvr: #660d6ab3;
}

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	outline: none;
	font-family: 'Open Sans', sans-serif;
}

body{
	background: var(--primary);
	font-size: 14px;
	color: var(--text-clr);
}

.wrapper{
	width: 100%;
	padding: 0 10px;
	margin-top: 20px;
	display: flex;
	justify-content: center;
}

.r_form_wrap{
	width: 500px;
	max-width: 100%;
}

.r_form_wrap .title{
	padding: 25px;
	background: var(--white);
	border-radius: 3px;
	margin-bottom: 20px;
}

.r_form_wrap .title p{
	font-size: 25px;
	text-align: center;
}

.r_form{
	padding: 40px;
	border-radius: 3px;
	background: var(--white);
}

.r_form .input_wrap{
	width: 100%;
	margin-bottom: 25px;
}

.r_form .input_wrap label{
	display: block;
	margin-bottom: 5px;
}

.r_form .input_wrap .input_item{
	position: relative;
	width: 100%;
}

.r_form .input_wrap .input_item .input{
	width: 100%;
	border-radius: 3px;
	height: 40px;
	border: 2px solid var(--input-bg);
	background: var(--input-bg);
	padding: 10px 20px;
	padding-left: 50px;
	transition: 0.5s ease;
	color: var(--secondary);
}

.r_form .input_wrap .input_item .input:focus{
	border-color: var(--primary);
}

.r_form .input_wrap .input_item .icon{
	position: absolute;
	top: 12px;
	left: 20px;
	color: var(--secondary);
	font-size: 16px;
}

.r_form .input_wrap .input_radio{
	display: flex;
}

.r_form .input_wrap .input_radio .input_radio_item{
	background: var(--input-bg);
	margin-right: 25px;
	padding: 20px;
	border-radius: 3px;
	position: relative;
	width: 100px;
}

.r_form .input_wrap .input_radio .input_radio_item .radio_mark{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	color: var(--secondary);
	border: 2px solid transparent;
	border-radius: 3px;
	margin: 0;
	cursor: pointer;
	transition: 0.5s ease;
}

.r_form .input_wrap .input_radio .input_radio_item .radio_mark .i{
	margin-right: 5px;
	display: inline-block;
}

.r_form .input_wrap .input_radio .input_radio_item .radio{
	position: absolute;
	top: 0;
	left: 0;
	opacity: 0;
}

.r_form .input_wrap .input_radio .input_radio_item .radio:checked ~ .radio_mark{
	color: var(--primary);
	border-color: var(--primary);
}

button{
	width: 100%;
	border: 0;
	background: var(--primary);
	padding: 10px;
	border-radius: 3px;
	height: 40px;
	color: var(--white);
	cursor: pointer;
	transition: 0.5s ease;
}

button:hover{
	background: var(--btn-hvr);
}
</style>

  

  
  
</head>

<body translate="no">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<div class="wrapper">
	<div class="r_form_wrap">
		
		<div class="title">
			<p><?php 

session_start();
include("../connection.php");
$ad = $_SESSION["kAdi"];
$secim = "SELECT * FROM signup WHERE username='$ad'";
$calistir = mysqli_query($connection,$secim);
$row = mysqli_fetch_array($calistir);
//print_r($row);
if($_SESSION["kAdi"] == ""){

  Header("Location: ../loginandregister.php");

}


if($_POST){
// Kullanıcının girdiği doğrulama kodunu al
$userVerificationCode = $_POST['verificationCode'];

// Oturumdaki doğrulama kodunu al
$verificationCode = $_SESSION['verificationCode'];

// Doğrulama kodlarını karşılaştır
if ($userVerificationCode == $verificationCode) {
  $dogru = "Doğrulama başarılı!";
  $sql = "UPDATE signup SET  mailonay='1'  WHERE username='$ad'";
$kaydet = mysqli_query($connection, $sql);
echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/fitLAB/anasayfa.php"> ';
  // Doğrulama başarılıysa yapılacak işlemleri buraya yazabilirsiniz
} else {
    $dogru = "Doğrulama başarısız!";
}
}

echo 'Mail adresimize gidecek kod : '.$_SESSION['verificationCode'];
echo '<br>'.@$dogru;

?></p>
		</div>

		<div class="r_form">
       


        <form method="POST" action="">
				<div class="input_wrap">
					<label for="yourname">Doğrulama Kodu : </label>
					<div class="input_item">
						<span class="icon">
							<ion-icon name="person-sharp"></ion-icon>
						</span>
						<input name="verificationCode" placeholder="Doğrulama Kodu" required class="input" >
					</div>
				</div>
				

				<button type="submit">Doğrula</button>
			</form>
		</div>

	</div>
</div>
  
  
  
  
</body>

</html>
