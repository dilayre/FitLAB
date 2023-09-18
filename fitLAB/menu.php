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
          <a href="hesapla.php">
            <span class="icon">
            <ion-icon name="sparkles-outline"></ion-icon>

            </span>
            <span class="title">Hesaplama Araçları</span>
          </a>
        </li>

        <li>
          <a href="antrenman.php">
            <span class="icon">
            <ion-icon name="fitness-outline"></ion-icon>

            </span>
            <span class="title">Antrenman Programım</span>
          </a>
        </li>
        <li>
          <a href="ye.php">
            <span class="icon">
            <ion-icon name="checkbox-outline"></ion-icon>

            </span>
            <span class="title">Diyet Programım</span>
          </a>
        </li>


        <li>
          <a href="ayarlar.php">
            <span class="icon">
            <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Ayarlar</span>
          </a>
        </li>
      
        <?php if($row["yetki"] == "1"){ ?>

          <li>
          <a href="yetkili.php">
            <span class="icon">
            <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Üye Listesi</span>
          </a>
        </li>
      <?php  } ?>

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
