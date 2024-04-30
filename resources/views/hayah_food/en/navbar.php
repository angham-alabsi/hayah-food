<!--START NAVBAR-->
<div class="logo-res-img nav1">
    <img src="../layout/imgs/new/brandHayahFood.png" alt="Hayah food "/>
</div>
<section class="navbar_block nav1" id="nav-move">
  <div class="logo text-center">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h4>Hayah Food</h4>
          <p class="icon_close text-center" onclick="move()"><i class="fas fa-window-close"></i></p>
        </div>
      </div>
      <div class="line"></div>
      <div class="row text-center">
        <ul class="links">
          <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="aboutus.php"><i class="fas fa-user-alt"></i> About us</a></li>
          <li><a href="products.php"><i class="fas fa-book-reader"></i> Our Products</a></li>
          <li><a href="media.php"><i class="fas fa-video"></i> Media</a></li>
          <li><a href="<?php if ($title == 'حياه فوود | الرئيسية')
                                {
                                echo '#company';
                                }  else {
                                    echo 'index.php?goto=company';
                                }
                        ?>"><i class="fas fa-user-tie"></i> Our Brands</a></li>
          <li><a href="contactus.php"><i class="fas fa-mobile-alt"></i> Contact us</a></li>
          <li><a href="../index.php"><img src="../layout/imgs/new/yem.jpg" alt="" style="width:22px;"> العربية</a></li>
        </ul>
      </div>
      <div class="line"></div>
      <div class="img_height">
        <img src="../layout/imgs/new/hayahLogo.png" alt="HAYAHFOOD" />
      </div>
    </div>
  </div>
</section>
<section class="burger_icon nav1" onclick="move()">
  <div class="b1"></div>
  <div class="b2"></div>
  <div class="b3"></div>
</section>
<section class="navbar sticky-top navbar-expand-lg bg-my nav2">
  <div class="container nav-section1">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fas fa-list"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link " href="index.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a id="nav" class="nav-link" href="aboutus.php"><i class="fas fa-user-alt"></i> About us</a>
        </li>
        <li class="nav-item">
          <a id="nav" class="nav-link" href="products.php"><i class="fas fa-book-reader"></i> Our Products</a>
        </li>
        <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-product-hunt"></i> منتجاتنا
            </a>
            <div class="dropdown-menu text-right m-0" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="products.php">الزيوت</a>
              <a class="dropdown-item" href="products.php">البقوليات</a>
              <a class="dropdown-item" href="products.php">االالبان</a>
              <a class="dropdown-item" href="products.php">جميع المنتجات</a>
            </div>
          </li>-->
        <li class="nav-item">
          <a class="nav-link" href="media.php"><i class="fas fa-video"></i> Media</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php"><i class="fas fa-mobile-alt"></i> Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php"><img src="../layout/imgs/new/yem.jpg" alt="" style="width:22px;">
            العربية</a>
        </li>
      </ul>
    </div>
    <a class="navbar-brand text-right" href="index.php"><img class="img-fluid" src="../layout/imgs/new/hayahLogo.png" /></a>
  </div>
</section>
<!--END NAVBAR-->