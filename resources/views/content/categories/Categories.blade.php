@extends('welcome')
@section('title')
@yield('type')  الفئات   
@endsection
@section('content')
    <!--categories-->
<section class="cate col-md">
    <span class="deco"></span>
        <div class="topnav" id="myTopnav" >
            <div class="dropdown">
                <div><a class="btn dropbtn" href="/categories/ShowCateogries">عرض الاصناف</a></div>
            </div>
            <div class="dropdown">
                <div><a class="btn dropbtn" href="/categories/AddCateogries"> اضافة صنف  </a></div>
                </div>
                <div class="dropdown">
                <div> <a class="btn dropbtn" href="/categories/DeletedCateogries">  المحذوفات</a></div>
                </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        @yield('categorie')
    
    </section>

    <!--EndCategories-->
@endsection