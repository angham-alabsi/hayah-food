@extends('welcome')
@section('title')
@yield('type')  صور   
@endsection
@section('content')
    <!--Gallery-->
    <style>
        .map_gal
        {
            width: 100%;
            height: 40px;
            background-color: #00000017;
            padding-left: 10px;
            padding-right: 10px;
            display: inline;
        }
        .map_gal div 
        {
            padding: 0 !important;
        }
        .map_gal a
        {
            padding-bottom: 20px;
            padding-top: 6px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            color: #f69340;
            text-decoration: none;
            
        }
        
        .gal_link
        {
            margin: 0;
            padding: 0;  
        }
        .gal_link h6
        {
            display: inline-block;
        }
        .cate_gal
        {
            padding: 0;
            margin: 0;
            position: relative;
            top: 7px;
            padding-left: 10px;
            padding-right: 10px;
            display: inline-block;
            
        }
        .cate_gal ul
        {
            color: #18275c;
            padding-right: 5px;
            padding-left: 5px;
            border-left: 2px solid #f69340;
            border-bottom: 2px solid #f69340;
            display: inline-block;
        }
        .cate_gal li
        {
            padding: 10px;
            list-style: none;
            display:block;
        }

     </style>
{{--<section class="cate col-md">
    <div class=" row ">
      <div class=" map_gal col-md-10"> 
          <a href="/gallery/AddPhotos" class=" gal_link"> 
            <h6>  الاصناف</h6>
                <div class="cate_gal">
                    <ul>
                        <a href="/gallery/addCategoriesPhotos"><li><i class="fas fa-plus-circle"></i>  اضافة صورة</li></a>
                        <a href="/gallery/showCategoriesPhotos"><li><i class="fas fa-images"></i>  عرض صور</li></a>
                    </ul>
                </div>
          </a>
          <a href="/gallery/ShowPhotos" class=" gal_link" >
            <h6>  المنتجات</h6>
                <div class="cate_gal">
                    <ul>
                        <a href="/gallery/addProductsPhotos/"><li><i class="fas fa-plus-circle"></i>  اضافة صورة</li></a>
                        <a><li><i class="fas fa-images"></i>  عرض صور</li></a>
                    </ul>
                </div>
        </a>
          <a href="/gallery/DeletedPhotos" class=" gal_link">
            <h6> العلامات التجارية</h6>
                <div class="cate_gal">
                    <ul>
                        <a href="/gallery/addBrandsPhotos"><li><i class="fas fa-plus-circle"></i>  اضافة صورة</li></a>
                        <a><li><i class="fas fa-images"></i>  عرض صور</li></a>
                    </ul>
                </div>
            </a>
      </div> 

      
    </div>--}}
@yield('gallery')

    <!--EndGallery-->
@endsection