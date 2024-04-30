@extends('welcome')
@section('title')
@yield('type')  المستخدمين   
@endsection
@section('content')
    <!--Users-->
<section class="cate col-md">
    <span class="deco"></span>
        <div class="topnav" id="myTopnav" >
            <div class="dropdown">
            <div><a class="btn dropbtn" href="/users/ShowUsers">عرض المستخدمين</a></div>
            </div>
            <div class="dropdown">
                <div><a class="btn dropbtn" href="/users/AddUsers"> اضافة مستخدم</a></div>
            </div>
            <div class="dropdown">
                <div> <a class="btn dropbtn" href="/users/DeletedUsers" style="width:200px;"> المستخدمين الغير مفعلين</a></div>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        @yield('user')

</section>

    <!--EndUsers-->
@endsection