@extends('welcome')
@section('title')
@yield('type')  الوكالات   
@endsection
@section('content')
    <!--Brands-->

<section class="cate col-md">
    <span class="deco"></span>
        <div class="topnav" id="myTopnav" >
            <div class="dropdown">
                <div><a class="btn dropbtn" href="/brands/ShowBrands">عرض الوكالات</a></div>
            </div>
            <div class="dropdown">
                <div><a class="btn dropbtn" href="/brands/AddBrands"> اضافة وكالة  </a></div>
                </div>
                <div class="dropdown">
                <div> <a class="btn dropbtn" href="/brands/DeletedBrands">  المحذوفات</a></div>
                </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        @yield('brands')
    
    </section>

    <!--EndCategories-->
@endsection