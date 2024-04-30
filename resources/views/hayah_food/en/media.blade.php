@extends('hayah_food.en.header')
@section('title')
    Our Products 
@endsection
@section('content')

<!---------------------HEAD IMAGE---------->

<section class="media_block">
    <img src="/img/food1.jpg">

</section>

<!---------------------END HEAD IMAGE---------->

<div class="container ">

    <!-------------------INTERDUSE------------->

    <div class="row col-md-12 col-sm-12 m-0">
        <div class="card col-md-3 col-sm-12">
            <h2>Media</h2>

            <a href="/en">
                <h3 id="heading3"><i class="fas fa-home"></i> Home</h3>
            </a>
            <a href="/products/en">
                <h3 id="heading1"><i class="fas fa-book-reader"></i> Our Products</h3>
            </a>
            <a href="/aboutus/en">
                <h3 id="heading2"><i class="fas fa-video"></i> About us</h3>
            </a>
        </div>


        <div class="col-md-9 col-sm-12 para-pro m-0">
            <h3>The best products in the food field</h3>
            <p>Hayah Food realizes that providing a varied menu of food products that meet the needs of all family members begins with a wide choice of high-quality ingredients. Therefore, the high quality level is a legacy and renewed quality in our products, which gives the consumer confidence and reassurance. 

            </p>
        </div>
    </div>

    <!-------------------End INTERDUSE------------->
<!-- Start News -->
<section class="news_block all-pro1">
        <h4 class="text-left">Last News</h4>
        <div class="container text-left">
            <div class="row">
                <div class="col-md-4">
                    <img style="width: 65%;" src="/img/ziad.jpg" alt="news1">
                </div>
                <div class="col-md-8">
                    <h5 style="text-align: justify;">Within the activities of the "Golf Food" exhibition, which takes place in the UAE in the Dubai World Trade Center. Hayat Food had a share of the prominent presence represented by Mr. Ziyad Al-Qurmani, CEO of the company.
This Golf Food Exhibition is considered one of the largest food exhibitions in the Middle East, as it attracts many companies and factories interested in manufacturing and producing food of all kinds.</h5>
                </div>
            </div>
        </div>
    </section>
<!-- End News -->
    <!---------------------Section 1--------------->

    <div class="all-pro1 text-left">
        <div class="row col-md-12 col-sm-12 m-0 ">
            <div class="col-md-12 col-sm-12  p-0 m-0 ">
                <h4>Our Products</h4>
                @foreach ($cate_ad as $item)
                <img src="/{{$item->media_path}}" width="100%" alt="all product"/> 
                @endforeach
            </div>
        </div>

        <div class="row col-md-12 col-sm-12 m-0 ">
            <div class="col-md-12 col-sm-12 all-pro2">
                <h5>Different Product</h5>
                <p>
                Hayah Food pays special attention to innovation in the food culture, because of its firm conviction of continuous development in providing new recipes, distinct flavors and better health options to consumers, carefully selected and meticulously taken care of to meet the desires of people who seek to challenge the familiar and love to discover everything that is new in this accelerating world. 
                </p>
            </div>
        </div>
    </div>
</div>

<!-------------------End Section 1------------->

<!---------------------SLIDERS---------------->
{{--<section class="slide-content">
    <div class="container  mt-5">
        <div id="carousel-media" class="carousel slide" data-ride="carousel-media">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row slide-pro">

                        <div class="col-md-7 col-sm-5 ">
                            <h5>Basma beans</h5>
                            <p>You can use white beans in soups or serve them with rice or other cereals. White beans make up a nutritious, healthy and delicious Middle Eastern meal.</p>
                        </div>
                        <div class="col-md-5 col-sm-5 m-0 p-0 text-center">
                            <img src="../layout/imgs/media/b2.png" alt="" />
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row slide-pro">
                        <div class="col-md-7 col-sm-5 ">
                            <h5>Basma beans</h5>
                            <p>You can use white beans in soups or serve them with rice or other cereals. White beans make up a nutritious, healthy and delicious Middle Eastern meal.</p>
                        </div>
                        <div class="col-md-5 col-sm-5 text-center ">
                            <img src="../layout/imgs/media/b2.png" alt="" />
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row  slide-pro">

                        <div class="col-md-7 col-sm-5 ">
                            <h5>Albustan Flour</h5>
                            <p>You can use white beans in soups or serve them with rice or other cereals. White beans make up a nutritious, healthy and delicious Middle Eastern meal.</p>
                        </div>
                        <div class="col-md-5 col-sm-5 text-center">
                            <img src="../layout/imgs/media/f1.png" alt="" />
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</section>--}}

<section class="slide-content">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($pro_ad as $key => $slider1)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <div class="row  slide-pro">
                    <div class="col-md-1 col-sm-5 " ></div>
                    <div class="col-md-5 col-sm-5 ">
                    <h5> {{$slider1->pro_name_en}}</h5>
                        <p>
                            {{$slider1->pro_description_en}}
                        </p>
                    </div>
                    <div class="col-md-5 col-sm-5 m-0 p-0 text-center">
                        <img src="/{{$slider1->media_path}}"  alt="Hayah food"/>
                    </div> 
                    <div class="col-md-1 col-sm-5 " ></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</section>

<!-------------------END SLIDERS------------->

<!-------------------SECTION 2------------->

<div class="container adv">
    <h3>The latest Products </h3>
        <div class="row col-md-12 col-sm-12 adv-part text-center m-0">
            @foreach ($pro_show as $item)
                <div class="col-md col-sm-12 ">
                <h4>{{$item->pro_name_en}}</h4>
                    <p>
                        {{$item->pro_description_en}}     
                    </p> 
                </div>
            @endforeach
            <div class="row col-md-12 col-sm-12 text-center m-0">
                @foreach ($pro_show as $item)
                <div class="col-md col-sm-12 text-center">
                <img src="/{{$item->media_path}}" alt="hayah_food"/>
                </div>
                @endforeach  
            </div> 
        </div>
</div>

<!-------------------END SECTION 2------------->

@endsection