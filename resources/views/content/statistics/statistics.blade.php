@extends('welcome')
@section('title')
@yield('type')  احصائيات   
@endsection
@section('content')
    <!--Statistics-->
    <style>
        .stat
        {
            width: 80%;
            margin: 20px auto;  
        }
        .stat div
        {
            text-align: center;
            padding-top: 20px;
            height: 140px;
            margin: 20px;

        }
        .stat_user
        {
            background-color:#229c48; 
            border: 2px solid #229c48; 
            padding: 0;
            box-shadow: 0px 2px 4px #229c48;
        }
        .stat_user h6
        {
            background-color: #fff;
            margin: 0;
            padding: 0;
            height: 23px;
            color: #229c48;

        }
        .stat_brand
        {
            background-color:#f69340; 
            border: 2px solid #f69340; 
            padding: 0;
            box-shadow: 0px 2px 4px #f69340;
        }
        .stat_brand h6
        {
            background-color: #fff;
            margin: 0;
            padding: 0;
            height: 23px;
            color: #f69340;

        }
        .stat_product
        {
            background-color:#e01e31; 
            border: 2px solid #e01e31; 
            padding: 0;
            box-shadow: 0px 2px 4px #e01e31;
        }
        .stat_product h6
        {
            background-color: #fff;
            margin: 0;
            padding: 0;
            height: 23px;
            color: #e01e31;

        }
        .stat_db
        {
            background-color: #17a2b8;
            border: 2px solid #17a2b8;
            padding: 0;
            box-shadow: 0px 2px 4px #17a2b8;
        }
        .stat_db h6
        {
            background-color: #fff;
            margin: 0;
            padding: 0;
            height: 23px;
            color: #17a2b8;

        }
        
        
        .stat_user i,.stat_brand i,.stat_product i , .stat_db i
        {
            font-size: 60px;
            color: #fff;
            padding-bottom: 10px;
        }
    </style>
<section class="cate col-md">
    <div class="row stat">
        {{--@foreach ($project as $item)--}}
            <div class="col-md stat_user">
                <i class="fas fa-users"></i>
                <h6>{{--$item->user_count--}}</h6>
                <h6>users</h6> 
            </div>
            <div class="col-md stat_brand">
                <i class="fas fa-copyright"></i>
                <h6>{{--$item->brand_count--}}</h6>
                <h6>brands</h6> 
            </div>
            <div class="col-md stat_product">
                <i class="fas fa-barcode"></i>
                <h6>{{--$item->product_count--}}</h6>
                <h6>products</h6> 
            </div>
            <div class="col-md stat_db">
                <i class="fas fa-database"></i>
                <h6>{{--$item->db_size--}}</h6>
                <h6>Database</h6>
            </div>
        {{--@endforeach--}}
    </div>


    <!--EndStatistics-->
@endsection