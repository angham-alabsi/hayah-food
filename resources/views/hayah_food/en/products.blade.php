@extends('hayah_food.en.header')
@section('title')
    Our Products 
@endsection
@section('content')

<!--START PRODUCTS-->

<section class="product_block">
    <div class="pro_img text-center">
        <h3>Hayah Food Products</h3>
    </div>
    <div class="container">

        <!--TXT WITH CARD-->

        <div class="row col-md-12 col-sm-12  m-0 p-0 ">
            <!-- CARD-->
            <div class="card col-md-4 col-sm-12 ">
                <h2>Products</h2>

                <a href="/en"><h3 id="heading3"><i class="fas fa-home"></i> Home</h3></a>
                <a href="/aboutus/en"><h3 id="heading1"><i class="fas fa-book-reader"></i> About us</h3></a> 
                <a href="/media/en"><h3 id="heading2"><i class="fas fa-video"></i> Media</h3></a> 
            </div>
            <!--END CARD-->
            <div class="para-pro col-md-8 col-sm-12 ">
                <h2>Our Products</h2>
                <p>For many consumers, providing a delicious meal for their family is a major achievement, but providing a different and delicious meal every day is a big challenge ..!
                </p>
            </div>
        </div>

        <!--END TXT WITH CARD-->

        <!--PRODUCT-->
        <div class="row col-md-12 col-sm-12 text-center m-0 p-0 mt-1">
            @foreach ($project as $item)
            <div class=" col-md-4 col-sm-12 m-0 p-0 ">
                <div class="container-pro">
                <img src="/{{$item->media_path}}" alt="{{$item->cate_name_en}}" class="img-pro image-pro" />
                    <div class="overlay-pro1">
                    </div>
                    <div class="overlay-pro2">
                        <a href="/details/en?name={{$item->cate_name_en}}">
                            <h3 class="text-pro ">details</h3>
                        </a>
                    </div>
                </div>
                <h3 ><a href="/details/en?name={{$item->cate_name_en}}" class="font-s" >{{$item->cate_name_en}}</a></h3>
            </div>
            @endforeach
        </div>  
    </div>
</section>

<!--END PRODUCTS-->

@endsection