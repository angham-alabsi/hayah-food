@extends('welcome')
@section('title')
@yield('type')  صور   
@endsection
@section('content')
    <!--Gallery-->
    <style>
        
        

     </style>
<section class="cate col-md">
    <span class="deco"></span>
        <div class="topnav" id="myTopnav" >
            
            <div class="dropdown">
              <div class="dropbtn">الاصناف 
                
              </div>
              <div class="dropdown-content">
                
                <a href="/gallery/addCategoriesPhotos"><i class="fas fa-plus-circle"></i> اضافة صورة </a>
                <a href="/gallery/showCategoriesPhotos"><i class="fas fa-images"></i> عرض الصور </a>
                <a href="/gallery/deletedCategoriesPhotos"><i class="fas fa-trash"></i> المحذوفات</a>
                
              </div>
            </div>

            <div class="dropdown">
                <div class="dropbtn">المنتجات
                  
                </div>
                <div class="dropdown-content">
                  
                    <a href="/gallery/addProductsPhotos"><i class="fas fa-plus-circle"></i> اضافة صورة </a>
                    <a href="/gallery/showProductsPhotos"><i class="fas fa-images"></i> عرض الصور </a>
                    <a href="/gallery/deletedProductsPhotos"><i class="fas fa-trash"></i> المحذوفات</a>
                    
                </div>
              </div>

              <div class="dropdown">
                <div class="dropbtn">العلامات التجارية
                  
                </div>
                <div class="dropdown-content">
                  
                    <a href="/gallery/addBrandsPhotos"><i class="fas fa-plus-circle"></i> اضافة صورة </a>
                    <a href="/gallery/showBrandsPhotos"><i class="fas fa-images"></i> عرض الصور </a>
                    <a href="/gallery/deletedBrandsPhotos"><i class="fas fa-trash"></i> المحذوفات</a>
                    
                </div>
              </div>
            
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
          </div>


    @yield('gallery')

</section>


    <!--EndGallery-->
@endsection