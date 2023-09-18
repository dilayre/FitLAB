<?php
session_start();

// E-posta adresini al
$email = $_POST['email'];

// Rasgele doğrulama kodu oluştur
$verificationCode = rand(1000, 9999);

// Doğrulama kodunu oturumda sakla
$_SESSION['verificationCode'] = $verificationCode;

// E-posta gönderme işlemini gerçekleştir (örneğin, PHPMailer veya mail() fonksiyonu kullanarak)
$subject = "E-posta Doğrulama";
$message = "Doğrulama kodunuz: $verificationCode";
$headers = "From: your-email@example.com"; // Gönderen e-posta adresi

mail($email, $subject, $message, $headers);

// E-posta gönderildikten sonra kullanıcıyı yönlendir
header("Location: dogrulama_formu.php");
exit;
?>