
<!DOCTYPE html>
<html lang="ar">
<html>

<head>
    <meta charset="UTF-8" />
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/hayahLogo.png')}}"/><!-- HEADER ICON -->
    <link rel="stylesheet" href="{{url('/css/css_hf_ar/bootstrap.min.css')}}" /> <!-- Bootstrap Style -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsive TAG -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Microsoft Browsers -->
    <link rel="canonical" href="http://www.hayahfood.com/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="HayahFood">
   <meta property="og:description" content="Natural &amp; Healthy high Quality Foodstuff. HAYAH FOOD HAYAH Foods working in producing foodstuff products which Compatible with the standards and terms of food safety from fertilizing and pesticide according to the conditions imposed by the Ministries of Health and Environment. including: Frozen vegetables and fruits Fruit Juice (Nectar and drink) Jam Ketchup Concentrates Macaroni Cheese …">
<meta property="og:url" content="http://www.hayahfood.com/">
<meta property="og:site_name" content="HAYAH FOOD">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"> <!-- Google Font -->
    <link rel="stylesheet" href="{{url('/css/css_hf_ar/main_style.css')}}" /> <!-- Style -->
    <link rel="stylesheet" href="{{url('/css/css_hf_ar/main_style1.css')}}" /> <!-- Style -->
    <link rel="stylesheet" href="{{url('/css/css_hf_ar/mediaquery.css')}}" /> <!-- MediaQuery -->

</head>

<body>


    <!--START NAVBAR-->
<div class="logo-res-img nav1">
    <img src="/img/brandHayahFood.png" alt="Hayah food "/>
</div>
<section class="navbar_block nav1" id="nav-move">
    <div class="logo text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h4>حيـــاه فوود</h4>
                    <p class="icon_close text-center" onclick="move()"><i class="fas fa-window-close"></i></p>
                </div>
            </div>
            <div class="line"></div>
            <div class="row text-center">
                <ul class="links">
                    <li><a href="/"><i class="fas fa-home"></i> الرئيسية</a></li>
                    <li><a href="/aboutus"><i class="fas fa-user-alt"></i> من نحن</a></li>
                    <li><a href="/products"><i class="fas fa-book-reader"></i> منتجاتنا</a></li>
                    <li><a href="/media"><i class="fas fa-video"></i> وسائط</a></li>
                    <li><a href=""><i class="fas fa-user-tie"></i> وكلائنا</a></li>
                    <?php /*if ($title == 'حياه فوود | الرئيسية')
                                {
                                echo '#company';
                                }  else {
                                    echo 'index.php?goto=company';
                                }*/
                    ?>
                    <li><a href="/contactus"><i class="fas fa-mobile-alt"></i> تواصل معنا</a></li>
                    <li><a href="/en"><img src="/img/Un.jpg" alt="" style="width:22px;"> EN</a></li>
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
<!--END NAVBAR-->



<!--START NAVBAR-->
<section class="navbar sticky-top navbar-expand-lg bg-my nav2"  >
    <div class="container nav-section1">
      <a class="navbar-brand " href="/"><img class="img-fluid" src="/img/hayahLogo.png"/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-list"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent"  dir="rtl">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/"><i class="fas fa-home"></i> الرئيسية</a>
          </li>
          <li class="nav-item">
            <a id="nav" class="nav-link" href="/aboutus"><i class="fas fa-user-alt"></i> من نحن</a>
          </li>
           <li class="nav-item">
            <a id="nav" class="nav-link" href="/products"><i class="fas fa-book-reader"></i> منتجاتنا</a>
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
            <a class="nav-link" href="/media"><i class="fas fa-video"></i> الوسائط</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contactus"><i class="fas fa-mobile-alt"></i> تواصل معنا</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="/en"><img src="/img/Un.jpg" alt="" style="width:22px;"> EN</a>
          </li>
        </ul>
      </div>

    </div>
</section>
<!--END NAVBAR-->


 @yield('content')

<!--START FOOTER-->
    <section class="footer_block">
        <div class="social_txt text-center">
            <div class="container" >
                <div class="row">
                    <div class="col-md  text-right p-3 footer_text  ">
                        <h2>حياة فوود</h2>
                        <h6>الجمهورية اليمنية - صنعاء </h6>
                        <!--<h6>حدة المدينة - شارع صفر , مؤسسة أبو نبيل </h6>-->
                        <h6>صندوق بريد : 1316 صنعاء </h6>
                        <h6> تلفون : 0096701511104 | 0096701416066</h6>
                        <h6>ايميل : import@hayahfood.com</h6>
                        <h6><a href="/">www.hayahfood.com</a></h6>
                    </div>
                    <div class="col-md">
                        <img src="/img/hayahLogo.png" width="40%">
                    </div>
                </div>
                <div class="col-md text-center text-white pb-3">
                        جميع الحقوق محفوظة لدى حياه فوود <i class="fas fa-copyright"></i> <?php echo date('Y');?>
                </div>
            </div>
        </div>
    </section>


    <!--END FOOTER-->
    <script src="{{url('/js/js_hf_ar/jquery-3.3.1.js')}}"></script> <!-- Jquery Js -->
    <script src="{{url('/js/js_hf_ar/jquery.counterup.min.js')}}"></script>
    <script src="{{url('/js/js_hf_ar/jquery.waypoints.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> <!-- Slide HS -->
    <script src="{{url('/js/js_hf_ar/bootstrap.min.js')}}"></script> <!-- Bootstrap Js -->
    <script src="{{url('/js/js_hf_ar/jquery.nicescroll.min.js')}}"></script> <!-- Our Js -->
    <script src="{{url('/js/js_hf_ar/our_main.js')}}"></script> <!-- Our Js -->
</body>
</html>
