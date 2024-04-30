@extends('hayah_food.en.header')
@section('title')
    @foreach ($project as $item)
    {{$item->cate_name_en}}
    @endforeach 
@endsection
@section('content')

<section class="details_block">

    <!-- HEAD IMAGE-->
    <div class="head-img text-center">
        <h3 class="text-center" >Product Details</h3>
    </div>
    <!-- END HEAD IMAGE-->
    
    @foreach ($project as $item)
    <div class="container">
    <h2 class="product-lable" >{{$item->cate_name_en}}</h2>
        <div class="row col-md-12 col-sm-12  m-0 p-0">
            <!-- CARD-->
            <div class="card col-md-4 col-sm-12 ">
                <h2>Hayah Food</h2>
                <a href="/en"><h3 id="heading3"><i class="fas fa-home"></i> Home</h3></a>
                <a href="/products/en"><h3 id="heading1"><i class="fas fa-utensils"></i> Products</h3></a> 
                <a href="/media/en"><h3 id="heading2"><i class="fas fa-video"></i> Media</h3></a> 
            </div>
            <!--END CARD-->

            <div class="para-pro col-md-8 col-sm-12 tuna-pro">
                <img src="/{{$item->media_path}}" alt="Background" />
                <p> 
                    {{$item->cate_description_en}}
                </p>
                <div class="row col-md-12 col-sm-12 text-center">
                    @foreach ($project2 as $item2)
                            <div class="col-md-4 col-sm-12 tuna-img-pro ">
                                <img src="/{{$item2->media_path}}" alt="{{$item2->pro_name_en}}" class="img-pro"/>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>


    </div>
    @endforeach 
</section>

@endsection