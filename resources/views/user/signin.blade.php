<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
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
    <div class="sign_decorate"></div>
    <div class="signin">
        <div>
            <h1>انشاء حساب</h1>
        </div>
        <form class="form-group" action="/signin" method="POST">
            {{csrf_field()}}
            <div><label for="user_name">اسم المستخدم :</label></div>
            <div>
                <input type="text" name="user_name" id="user_name" placeholder=" &#xf007; &nbsp &nbspاسم المستخدم" class="login_info form-control" required="required" autocomplete="none">
                <div class="msg">{{$errors->first('user_name')}}</div>
            </div>
            <div><label for="user_password">كلمة المرور :</label></div>
            <div>
                <input type="password" name="user_password" id="user_password" placeholder="&#xf13e; &nbsp &nbspكلمة المرور" class="login_info form-control" required="required" autocomplete="new-password">
                <div class="msg">{{$errors->first('user_password')}}</div>
            </div>

            <div><label for="t4">تاكيد كلمة المرور :</label></div>
            <div>
                <input type="password" name="user_password_confirmation" id="user_password_confirmation" placeholder="&#xf13e; &nbsp &nbspتاكيد كلمة المرور " class="login_info form-control" required="required">
                <div class="msg">{{$errors->first('user_password_confirmation')}}</div>
            </div>

            <div><label for="user_email">البريد الالكتروني :</label></div>
            <div>
                <input type="email" name="user_email" id="user_email" placeholder="&#xf0e0; &nbsp &nbspالبريد الالكتروني" class="login_info form-control" required="required">
                <div class="msg">{{$errors->first('user_email')}}</div>
            </div>

            <div><label for="t6">نوع الحساب :</label></div>
            <div>
                <select class="login_info form-control" name="t6" id="t6">
                    <option value="admin">مسؤول</option>
                    <option value="admin" selected>مستخدم</option>
                </select>
            </div>
    
            <button type="submit" class=" login_sign_button">تسجيل الدخول</button></div>   
        </form>
        
    </div>
    
    <script type="text/javascript" src="/js/bootstrap.min.min.js"></script> 
</body>
</html>