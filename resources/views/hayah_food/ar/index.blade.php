@extends('hayah_food.ar.header')
@section('title')
    حياة فوود
@endsection
@section('content')

<!--START SLIDER-->
<section class="slider_block">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2" ></li>
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <img src="{{$slider->media_path}}" class="d-block w-100" style="height: 100vh;"  alt="...">
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--End SLIDER-->

<section class="container">
    <div class="container home-about">
        <div class="row text-center">
            <div class="flip-card f2 col-sm-6  col-md-6">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="fa fa-eye" style="font-size:40px"></i>
                        <h1>رؤيتنا</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>نتطلع لتوسيع حصتنا المحلية وكذلك الاقليمية والسعي باستمرار لتسويق وبيع اغلب أنواع المواد
                            الغذائية الاساسية والإستهلاكية، عالية الجودة لتلبية الاحتياجات المختلفة للستهلك.<a
                                href="aboutus"> المزيد </a></p>

                    </div>
                </div>
            </div>
            <div class="flip-card f1 col-sm-6 col-md-6">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <i class="fas fa-question" style="font-size:40px"></i>
                        <h1>من نحن</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>حياة فود هي إحدى قطاعات مجموعة حياة للتجارة والإستثمار والتي تقدم تشكيلة واسعة من المواد
                            الغذائية المتنوعة التي تلبي كافة الاحتياجات ومختارة بعناية من مكونات عالية الجودة. منتجات
                            بسمة ذات الجودة العالية
                            <a href="aboutus">المزيد </a></p>

                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!--END ABOUT-->
<!--END ABOUT US-->


<!--START ADV-->
@foreach ($adv_pro1 as $item)
<div class="a">
    <img src="{{$item->media_path}}" alt="hayahfood" />
</div>
@endforeach

<section class="about_block">

    <div class="container">

        <div class="row">
            @foreach ($adv_pro2 as $key )
                <div class="col-md text-center">
                    <img src="{{$key->media_path}}" alt="Food" class="pro_img1" />
                </div>
                <div class="col-md text-right">
                    <h2>{{$key->pro_name}}</h2>
                    <p>
                        {{$key->pro_description}}
                    </p>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!--END ADV-->

<!--START PRODUCT-->
<section class="pro_block text-center" id="products">
    <div class="container">
        <h1>منتجاتنا <i class="fas fa-utensils" style="color: #18275c; text-align: right !important;"></i></h1>
        <div class="row">
            @foreach ($cate as $item)
                <div class="col-sm">
                    <a href="/details?name={{$item->cate_name}}">
                        <div class="imgblock">
                            <img src="{{$item->media_path}}" alt="Product1">
                            <div class="txt">
                                <p>{{$item->cate_name}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--END PRODUCT-->



<!--START COMPANIES-->
<section class="company_block" id="company" name="company">
    <!--START COUNTER-->

    <section class="stat p-5" dir="rtl">
        <div class="container-fluid">
            <div class="row col-md-12 col-sm-12 m-0">

                <div class="box col-md-4 col-sm-6 text-center">
                    <div class="counter-ico col-md-12 col-sm-12">
                        <i class="fas fa-barcode ico-in" style="color: #fff;"></i>
                    </div>
                    <div class="counter-box">
                            <span class="counter">{{$count_pro[0]}}</span>
                        <h5>المنتجات</h5>
                    </div>
                </div>
                <div class="box col-md-4 col-sm-6 text-center">
                    <div class="counter-ico col-md-12 col-sm-12">
                        <i class="fas fa-copyright ico-in " style="color: #fff;"></i>
                    </div>
                    <div class="counter-box ">
                            <span class="counter">{{$count_brand[0]}}</span>
                        <h5>العلامات التجارية</h5>
                    </div>
                </div>

                <div class="box col-md-4 col-sm-6 text-center">
                    <div class="counter-ico col-md-12 col-sm-12">
                        <i class="fas fa-building ico-in" style="color: #fff;"></i>
                    </div>
                    <div class="counter-box ">
                        <span class="counter">5</span>
                        <h5>الفروع</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<!--END COUNTER-->


<!--END COMPANIES-->

<!--START OIL-->
<section class="oil_block">
    <div class="container">
        <div class="row">
            @foreach ($adv_cate as $item)
            <div class="col-md-6 text-right mt-3">
                <h2>{{$item->cate_name}}</h2>
                <p>
                    {{$item->cate_description}}
                </p>
            </div>
            @endforeach
        </div>
        <div class="row text-center">
            @foreach ($adv_cate as $item)
            <div class="col-md-6">
                <img  src="{{$item->media_path}}" alt="Product5">
            </div>
            @endforeach
        </div>
    </div>

</section>
<!--END OIL-->
<section class="company_block" id="company" name="company">
    <div class="container">
        <h1>العلامات التجارية <i class="fas fa-user-tie" style="color: #18275c; text-align: right !important;"></i></h1>
        <section class="customer-logos slider">
            @foreach ($brand as $item)
            <div class="slide"><a href="#" data-toggle="collapse" data-target="#basma_products"><img src="{{$item->media_path}}"></a></div>
            @endforeach
            @foreach ($brand as $item)
            <div class="slide"><a href="#"><img src="{{$item->media_path}}"></a></div>
            @endforeach


        </section>
    </div>
</section>






@endsection
