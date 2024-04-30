<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}" />
        <script src="https://kit.fontawesome.com/ce59a85abb.js" crossorigin="anonymous"></script>
</head>
<style>
   .form-control
   {
    border-color: #fff;
    border-bottom: 2px solid #8080804f;
   }
</style>
<body>
    {{--<div class="decorate"></div>--}}
    <div class="login">
        <div>
            <h1> <i class="fas fa-sign-in-alt"></i> تسجيل الدخول</h1>
        </div>
        <form class="form-group" action="/login" method="POST">
            {{ csrf_field() }}
            {{method_field('GET')}}
            <div class="msg2">
                @if (isset($msg2))
                    @foreach ($msg2 as $item)
                    <div class="alert alert-success text-center " role="alert">
                        {{$item}}
                      </div>
                    @endforeach 
                @else
                    {{$msg2=""}}
                @endif
            </div>
            <div class="msg">
                @if (isset($msg))
                    @foreach ($msg as $item)
                    <div class="alert alert-danger text-center " role="alert">
                        {{$item}}
                      </div>
                    @endforeach 
                @else
                    {{$msg=""}}
                @endif
            </div>
            <div>
                <label for="user_name">اسم المستخدم :</label>
            </div>
            <div>
                <input type="text" name="user_name" id="user_name" placeholder=" &#xf007; &nbsp &nbspاسم المستخدم" class="login_info form-control"  autocomplete="off">
            </div>
            <div>
                <label for="user_password">كلمة المرور :</label>
            </div>
            <div>
                <input type="password" name="user_password" id="user_password" placeholder="&#xf13e; &nbsp &nbspكلمة المرور" class="login_info form-control"  autocomplete="new-password"/>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <a  class="login_pass_link" href="/password_reset"> هل نسيت كلمة المرور ؟</a>
                    {{--<a  class="login_pass_link" href="/signin">ليس لدي حساب بعد ؟</a>--}}
                </div>
                
                <div class="col-md-4 p-0">
                    <button type="submit" class=" login_sign_button">تسجيل الدخول</button>
                </div>
                
            </div>
        </form>
       
    </div>
    
    <script type="text/javascript" src="/js/bootstrap.min.min.js"></script> 
</body>
</html>