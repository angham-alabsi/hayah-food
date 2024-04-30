@extends('welcome')
@section('title')
@yield('type')  منتجات   
@endsection
@section('content')
 
<section class="cate col-md">
  <span class="deco"></span>
      <div class="topnav" id="myTopnav" >
          <div class="dropdown">
            <div><a class="btn dropbtn" href="/products/ShowProducts">عرض المنتجات </a></div>
          </div>
          <div class="dropdown">
              <div><a class="btn dropbtn" href="/products/Addproducts"> اضافة منتج </a></div>
            </div>
            <div class="dropdown">
              <div> <a class="btn dropbtn" href="/products/DeletedProducts"> المحذوفات </a></div>
            </div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
      </div>
      @yield('product')

</section>

@endsection