
<!DOCTYPE html>
<html lang="en">
<html>

<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('/css/css_hf_en/bootstrap.min.css')}}" /> <!-- Bootstrap Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive TAG -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Microsoft Browsers -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <!-- Font Awesome CDN -->
   <link rel="canonical" href="http://www.hayahfood.com/">
   <meta property="og:locale" content="en_SA">
   <meta property="og:type" content="website">
   <meta property="og:title" content="HAYAH FOOD">
   <meta property="og:description" content="Natural &amp; Healthy high Quality Foodstuff. HAYAH FOOD HAYAH Foods working in producing foodstuff products which Compatible with the standards and terms of food safety from fertilizing and pesticide according to the conditions imposed by the Ministries of Health and Environment. including: Frozen vegetables and fruits Fruit Juice (Nectar and drink) Jam Ketchup Concentrates Macaroni Cheese …">
    <meta property="og:url" content="http://www.hayahfood.com/">
    <meta property="og:site_name" content="HAYAH FOOD">
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('/css/css_hf_en/main_style.css')}}" /> <!-- Style -->
    <link rel="stylesheet" href="{{url('/css/css_hf_en/main_style1.css')}}" /> <!-- Style -->
    <link rel="stylesheet" href="{{url('/css/css_hf_en/mediaquery.css')}}" /> <!-- MediaQuery -->
    <link rel="icon" href="/img/titleLogo.png"> <!-- HEADER ICON -->

</head>

<body>
<div class="logo-res-img nav1">
    <img src="/img/brandHayahFood.png" alt="Hayah food "/>
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
          <li><a href="/en"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="/aboutus/en"><i class="fas fa-user-alt"></i> About us</a></li>
          <li><a href="/products/en"><i class="fas fa-book-reader"></i> Our Products</a></li>
          <li><a href="/media/en"><i class="fas fa-video"></i> Media</a></li>
          <li><a href="<?php /* if ($title == 'حياه فوود | الرئيسية')
                                {
                                echo '#company';
                                }  else {
                                    echo 'index.php?goto=company';
                                }
                        */?>"><i class="fas fa-user-tie"></i> Our Brands</a></li>
          <li><a href="/contactus/en"><i class="fas fa-mobile-alt"></i> Contact us</a></li>
          <li><a href="/"><img src="/img/yem.jpg" alt="" style="width:22px;"> العربية</a></li>
        </ul>
      </div>
      <div class="line"></div>
      <div class="img_height">
        <img src="/img/hayahLogo.png" alt="HAYAHFOOD" />
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
          <a class="nav-link " href="/en"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a id="nav" class="nav-link" href="/aboutus/en"><i class="fas fa-user-alt"></i> About us</a>
        </li>
        <li class="nav-item">
          <a id="nav" class="nav-link" href="/products/en"><i class="fas fa-book-reader"></i> Our Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/media/en"><i class="fas fa-video"></i> Media</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contactus/en"><i class="fas fa-mobile-alt"></i> Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/"><img src="/img/yem.jpg" alt="" style="width:22px;">
            العربية</a>
        </li>
      </ul>
    </div>
    <a class="navbar-brand text-right" href="/en"><img class="img-fluid" src="/img/hayahLogo.png" /></a>
  </div>
</section>
<!--END NAVBAR-->

 @yield('content')

 <!--START FOOTER-->
 <section class="footer_block">
            <div class="social_txt text-center">
                <div class="container" >
                    <div class="row">
                        <div class="col-md  text-left p-3 footer_text  "> 
                            <h2>HAYAH FOOD</h2>
                            <h6>Republic Of Yemen</h6>
                            <h6>POST OFFICE: 1316 SANAA</h6>
                            <h6>PHONE: 0096701511104 | 0096701416066</h6>
                            <h6>EMAIL: import@hayahfood.com</h6>
                            <h6><a href="/en">www.hayahfood.com</a></h6>
                        </div>
                        <div class="col-md">
                            <img src="/img/hayahLogo.png" width="40%">
                            
                        
                        </div>
                    </div>
                    <div class="col-md text-center text-white pb-3">
                            All copy right resaved to hayah food <i class="fas fa-copyright"></i> <?php echo date('Y');?>
                    </div>
                </div>
            </div>

        </section>

        <!--END FOOTER-->
        <script src="{{url('/js/js_hf_en/jquery-3.3.1.js')}}"></script> <!-- Jquery Js -->
        <script src="{{url('/js/js_hf_en/jquery.counterup.min.js')}}"></script>
        <script src="{{url('/js/js_hf_en/jquery.waypoints.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> <!-- Slide HS -->
        <script src="{{url('/js/js_hf_en/bootstrap.min.js')}}"></script> <!-- Bootstrap Js -->
        <script src="{{url('/js/js_hf_en/jquery.nicescroll.min.js')}}"></script> <!-- Our Js -->
        <script src="{{url('/js/js_hf_en/our_main.js')}}"></script> <!-- Our Js -->
    </body>
</html>