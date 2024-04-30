<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}" />
        {{-- <script src="https://kit.fontawesome.com/ce59a85abb.js" crossorigin="anonymous"></script> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        {{-- <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script> --}}

        <!-- Styles -->
        <style>
            .row
            {
                margin: 0;
                padding: 0;
            }

        </style>
        <!-- Styles -->
    </head>
    <body>
<!--headers-->
    <section class="header">
        <div class="row header_h">
            <div class="col-md-10">
                <a href="http://hayahfood.com/"><img class="header_logo" src="/img/hayahLogo.png" alt="hayah_logo"></a>
                <i class="fas fa-align-justify lines_btn"></i>
            </div >

            <div class="col-md-2 row user_information">
                @if(Session::has('media_path'))
                    <img class="user_img" src="/{{Session::get("media_path")}}" alt="user_img"/>
                @endif
                    <div class="user_info ">
                   <p>
                       @if(Session::has('user_name'))
                        {{ Session::get('user_name')}}
                       @endif
                   </p>
                    <i class="fas fa-caret-down"></i>
                </div>

            </div>

        </div>
        <div class="user_card">
            <div>
                 <img class="user_card_img" src="/{{Session::get("media_path")}}" alt="user_img"/>
                <p>
                    @if(Session::has('user_name'))
                      {{ Session::get('user_name')}}
                    @endif
                </p>
            </div>
            <div class="user_card_info" >
                <div><a href="/user/userProfile">البروفايل</a> </div>
                <div><a href="">اعدادات الحساب</div>
                <div><a href="/login">تسجيل الخروج</div>
            </div>
        </div>
    </section>
<!--Endheaders-->

<script>

</script>

<div class="row">
<!--LeftAside-->
       <section class="col-md-2 left_aside">
            <ul >
                <li class="choice" id="state"  value="l1"><a href="/statistics"                >الاحصائيات </a></li>
                <li class="choice" id="cate"   value="l2"><a href="/categories/ShowCateogries" >الاصناف    </a></li>
                <li class="choice" id="brand"  value="l3"><a href="/brands/ShowBrands"         >الوكالات   </a></li>
                <li class="choice" id="pro"    value="l4"><a href="/products/ShowProducts"     >المنتجات  </a></li>
                <li class="choice" id="user"   value="l5"><a href="/users/ShowUsers"           >المستخدمين</a></li>
                <li class="choice" id="mail"   value="l6"><a href="/email"                     >الايميل     </a></li>
                <li class="choice" id="gallery"value="l6"><a href='/gallery/showCategoriesPhotos'                       >المعرض     </a></li>
            </ul>
        </section>
<!--EndLeftAside-->
<!--/gallery-->
<!--rightAside-->
@yield('content')

<!--EndrightAside-->
</div>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

</body>
</html>
