<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> FitLAB </title>

  <link rel="stylesheet" href="loginreg.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<style>
    .alert {
    width: 100%;
    height: 50px;
    display: flex;
    justify-content: left;
    align-items: center;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 40px;
    font-size: 18px;
    margin-bottom: 10px;
    margin-top: 10px;
    box-shadow: rgba(0, 0, 0, 0.06) 0px 0px 10px;
  }
  .close-alert {
    color: #000000;
    font-size: 25px;
    display: flex;
    align-items: center;
    position: absolute;
    right: 15px;
    cursor: pointer;
  }
  .close-alert:hover {
    color: #000000;
    background: #f1f1f1;
    border-radius: 50%;
  }
  .successful.alert {
    border-left: 6px solid #02c302;
    background: white;
  }
  
  .successful.alert:before {
    content: "\ece4";
    color: #02c302;
    font-size: 25px;
    font-family: "boxicons" !important;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    padding-right: 10px;
  }
  
  .error.alert {
    border-left: 6px solid #ff0000;
    background: white;
  }
  
  .error.alert:before {
    content: "\eeb0";
    color: #ff0000;
    font-size: 25px;
    font-family: "boxicons" !important;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    padding-right: 10px;
  }
  
  .info.alert {
    border-left: 6px solid #1acfff;
    background: white;
  }
  
  .info.alert:before {
    content: "\eda7";
    color: #1acfff;
    font-size: 25px;
    font-family: "boxicons" !important;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    padding-right: 10px;
  }
  
  .warning.alert {
    border-left: 6px solid #ffc107;
    background: white;
  }
  
  .warning.alert:before {
    content: "\ed57";
    color: #ffc107;
    font-size: 25px;
    font-family: "boxicons" !important;
    font-weight: normal;
    font-style: normal;
    font-variant: normal;
    line-height: 1;
    display: inline-block;
    text-transform: none;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    padding-right: 10px;
  }
  
</style>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form id="login" class="sign-in-form">
          <h2 class="title">Giriş Yap</h2>
          <div id="sonuc"></div>
          <div class="input-field">
            
            <i class="fas fa-user"></i>
            <input type="text" name="kullanici" autocomplete="username" placeholder="Kullanıcı Adı" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password"name="password" autocomplete="current-password" placeholder="Şifre" id="id_password" required="yes">
            
          </div>
          <button type="button" id="loginbuton" class="btn solid"> Giriş Yap </button>

        </form>
        <form id="register" class="sign-up-form">
          <h2 class="title">Kayıt Ol</h2>
          <div id="sonuc1"></div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="name" id="name"  placeholder="Ad" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="sname" id="surname"   placeholder="Soyad" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" id="username" name="username"  placeholder="Kullanıcı Adı" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="mail"  placeholder="Email" required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password"  id="password" name="password" placeholder="Şifre"  required="yes">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="passagain"  placeholder="Şifre Tekrarı"  required="yes">
          </div>
          <button type="button" id="regbuton" class="btn solid"" name="signup"> Hesap Oluştur</button>
        </form>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Hesabınız yok mu?</h3>
          <p>Kayıt Olun</p>
          <button class="btn transparent" id="sign-up-btn">Kayıt Ol</button>
        </div>
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>Zaten hesabınız var mı?</h3>
          <br>
          <button class="btn transparent" id="sign-in-btn">Giriş Yap</button>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

const htmlEl = document.getElementsByTagName("html")[0];
const currentTheme = localStorage.getItem("theme")
  ? localStorage.getItem("theme")
  : null;
if (currentTheme) {
  htmlEl.dataset.theme = currentTheme;
}
const toggleTheme = (theme) => {
  htmlEl.dataset.theme = theme;
  localStorage.setItem("theme", theme);
};





$(document).ready(function(){
	$("#loginbuton").on("click", function(){ // buton idli elemana tıklandığında
		var gonderilenform = $("#login").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
		
		$.ajax({
			url:'loginyap.php', // serileştirilen değerleri ajax.php dosyasına
			type:'POST', // post metodu ile 
			data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
			success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
				$("#sonuc").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
			}
		});
		
	});
});

$(document).ready(function(){
	$("#regbuton").on("click", function(){ // buton idli elemana tıklandığında
		var gonderilenform = $("#register").serialize(); // idsi gonderilenform olan formun içindeki tüm elemanları serileştirdi ve gonderilenform adlı değişken oluşturarak içine attı
		
		$.ajax({
			url:'kayityap.php', // serileştirilen değerleri ajax.php dosyasına
			type:'POST', // post metodu ile 
			data:gonderilenform, // yukarıda serileştirdiğimiz gonderilenform değişkeni 
			success:function(e){ // gonderme işlemi başarılı ise e değişkeni ile gelen değerleri aldı
				$("#sonuc1").html("").html(e); // div elemanını her gönderme işleminde boşalttı ve gelen verileri içine attı
			}
		});
		
	});
});

</script>

</html>