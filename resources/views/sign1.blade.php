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
   .signin
   {
    margin: 70px auto;
    width: 50%;
    height: 800px;
    padding: 20px;
    background-color: #fffbf2;
    box-shadow: 4px 4px 10px #424141;
    color: #ef9d68;
    position: absolute;
    top: 0;
    right: 423px;
   }
   .signin h1
   {
    text-align: center;
    margin-bottom: 50px;
    color: #3e346c;
   }
   .sign_decorate
   {
    position: fixed;
    width: 50%;
    height:860px;
    border: 4px solid #ef9d68;
    top: 42px;
    right: 390px;
    background: linear-gradient(23deg, rgba(0,3,90,0.8855742980786064)16% ,rgba(255,154,81,0.87156869583771) 90% );
   }
</style>
<body>
    <div class="sign_decorate"></div>
    <div class="signin">
        <div>
            <h1>انشاء حساب</h1>
        </div>
        <form class="form-group" action="/signin" method="POST">
            {{csrf_field() }}
            <div><label for="user_name">اسم المستخدم :</label></div>
            <div>
                <input type="text" name="user_name" id="user_name" placeholder=" &#xf007; &nbsp &nbspاسم المستخدم" class="login_info form-control" required="required">
                {{$errors->has('user_name')?'has-error':''}}
            </div>
            <div><label for="t3">كلمة المرور :</label></div>
            <div>
                <input type="password" name="t3" id="t3" placeholder="&#xf13e; &nbsp &nbspكلمة المرور" class="login_info form-control" required="required">
                {{$errors->has('t3')?'has-error':''}}
            </div>

            <div><label for="t4">تاكيد كلمة المرور :</label></div>
            <div>
                <input type="password" name="t4" id="t4" placeholder="&#xf13e; &nbsp &nbspتاكيد كلمة المرور " class="login_info form-control" required="required">
                {{$errors->has('t4')?'has-error':''}}
            </div>

            <div><label for="t5">البريد الالكتروني :</label></div>
            <div>
                <input type="email" name="t5" id="t5" placeholder="&#xf13e; &nbsp &nbspالبريد الالكتروني" class="login_info form-control" required="required">
                {{$errors->has('t1')?'has-error':''}}
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