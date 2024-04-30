@extends('hayah_food.ar.header')
@section('title')
    @foreach ($project as $item)
        {{$item->cate_name}}
    @endforeach
@endsection
@section('content')
<section class="details_block">

    <!-- HEAD IMAGE-->
    <div class="head-img text-center">
        <h3 class="" style="width: 30%; background-color: #ffa746; margin: 50px auto; display:inline-block; min-height:50px; line-height:50px; color:#fff; border-radius:5px; ">تفاصيل المنتج</h3>
    </div>
    <!-- END HEAD IMAGE-->

    @foreach ($project as $item)
    <div class="container">
        <h2 class="text-center" style="width: 100%; background-color: #ffa746; margin-top:20px; display:inline-block; height:50px; line-height:50px; color:#fff; border-radius:5px; ">{{$item->cate_name}}</h2>
            <div class="row col-md-12 col-sm-12  m-0 p-0">
                <!-- CARD-->
                <div class="card col-md-4 col-sm-12 ">
                    <h2>حياه فوود</h2>
                    <a href="/"><h3 id="heading3"><i class="fas fa-home"></i> الرئيسية</h3></a>
                    <a href="/products"><h3 id="heading1"><i class="fas fa-utensils"></i> منتجاتنا</h3></a> 
                    <a href="/media"><h3 id="heading2"><i class="fas fa-video"></i> الوسائط</h3></a> 
                </div>
                <!--END CARD-->
    
                <div class="para-pro col-md-8 col-sm-12 tuna-pro ">
                    <img src="{{$item->media_path}}" alt="Background" />
                    <p class="p-3">
                        {{$item->cate_description}} 
                    </p>
                    <div class="row col-md-12 col-sm-12 text-center m-0"> 
                        @foreach ($project2 as $item2)
                            <div class="col-md-4 col-sm-12 tuna-img-pro ">
                                <img src="{{$item2->media_path}}" alt="{{$item2->pro_name}}" class="img-pro"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    @endforeach 
</section>
@endsection



