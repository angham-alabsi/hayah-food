@extends('hayah_food.ar.header')
@section('title')
    منتجاتنا
@endsection
@section('content')

<!--START PRODUCTS-->

<section class="product_block">
    <div class="pro_img text-center">
        <h3>منتجات حياه فوود</h3>
    </div>
    <div class="container">

        <!--TXT WITH CARD-->

        <div class="row col-md-12 col-sm-12  m-0 p-0">
            <!-- CARD-->
            <div class="card col-md-4 col-sm-12 ">
                <h2>منتجاتنا </h2>

                <a href="/"><h3 id="heading3"><i class="fas fa-home"></i> الرئيسية</h3></a>
                <a href="/aboutus"><h3 id="heading1"><i class="fas fa-user-alt"></i> من نحن</h3></a> 
                <a href="/media"><h3 id="heading2"><i class="fas fa-video"></i> الوسائط</h3></a> 
            </div>
            <!--END CARD-->
            <div class="para-pro col-md-8 col-sm-12 ">
                <h2>منتجاتنا</h2>
                <p>
                    بالنسبة لكثير من المستهلكين، فإن تقديم وجبة لذيذةٍ لأسرهم هي إنجاز كبير، ولكن توفير وجبة لذيذة
                    ومختلفة كل يوم هو التحدي الكبير ..!
                </p>
            </div>
        </div>

        <!--END TXT WITH CARD-->

        <!--PRODUCT-->
       
        <div class="row col-md-12 col-sm-12 text-center m-0 p-0 mt-1">
            @foreach ($project as $item)
            <div class=" col-md-4 col-sm-12 m-0 p-0 ">
                <div class="container-pro">
                <img src="{{$item->media_path}}" alt="{{$item->cate_name_en}}" class="img-pro image-pro" />
                    <div class="overlay-pro1">
                    </div>
                    <div class="overlay-pro2">
                        <a href="/details?name={{$item->cate_name_en}}">
                            <h3 class="text-pro ">تفاصيل</h3>
                        </a>
                    </div>
                </div>
                <h3 ><a href="/details?name={{$item->cate_name_en}}" class="font-s" >{{$item->cate_name}}</a></h3>
            </div>
            @endforeach
        </div>  
    </div>
</section>

<!--END PRODUCTS-->



    
@endsection


