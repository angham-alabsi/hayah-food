<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اعادة تعيين كلمة السر</title>
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
            <h1> <i class="fas fa-retweet"></i> اعادة تعيين كلمة السر</h1>
        </div>
        <form class="form-group" action="/password_reset/reset" method="POST">
            {{ csrf_field() }}
            {{method_field('GET')}}
            <div><label for="user_email">اسم المستخدم</label></div>
        <div><input type="text" name="user_name" id="user_name" placeholder=" &#xf007;&nbspاسم المستخدم" class="login_info form-control" required="required" autocomplete="off" value="{{old('user_name')}}">
            <div class="msg">
                @if (isset($msg))
                    @foreach ($msg as $item)
                        {{$item}}
                    @endforeach 
                @else
                    {{$msg=""}}
                @endif
            </div>
        </div>

            <div><label for="user_password">كلمة السر الجديدة</label></div>
            <div><input type="password" name="user_password" id="user_password" placeholder=" &#xf13e;&nbspكلمة السر" class="login_info form-control" required="required" autocomplete="off">
                <div class="msg">{{$errors->first('user_password')}}</div>
            </div>

            <div><label for="user_email">تاكيد كلمة السر </label></div>
            <div><input type="password" name="user_password_confirmation" id="user_password_confirmation" placeholder="&#xf13e;&nbspتاكيد كلمة السر" class="login_info form-control" required="required" autocomplete="off">
                <div class="msg">{{$errors->first('user_password_confirmation')}}</div>
            </div>
            <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
            <button type="submit" class=" login_sign_button">تعين</button>
            </div> 
            </div>  
        </form>
    </div>
    
    <script type="text/javascript" src="/js/bootstrap.min.min.js"></script> 
</body>
</html>