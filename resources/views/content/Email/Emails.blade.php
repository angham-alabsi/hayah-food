@extends('welcome')
@section('title')
  @yield('email_title')   
@endsection
@section('content')
  
<!--Emails-->
<section class="cate col-md">
  <span class="deco"></span>
      <div class="topnav" id="myTopnav" >
          <div class="dropdown">
            <div><a class="btn dropbtn" href="/email">انشاء رسالة</a></div>
          </div>
          <div class="dropdown">
              <div><a class="btn dropbtn" href="/email/sended"> الرسائل المرسلة</a></div>
            </div>
            <div class="dropdown">
              <div> <a class="btn dropbtn" href="/email/received"> الرسائل المستلمة</a></div>
            </div>
            <div class="dropdown">
              <div> <a class="btn dropbtn" href="/email/deleted">المحذوفات </a></div>
            </div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
      </div>
      @yield('email_content')

</section>

  <!--EndEmails-->


    
@endsection