<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}" />
        <script src="https://kit.fontawesome.com/ce59a85abb.js" crossorigin="anonymous"></script>
</head>
<style>
    
</style>
<body>
    <div class="decorate"></div>
    <div class="login">
        <div>
            <h1> تعين كلمة السر</h1>
        </div>
        <form class="form-group">
            <div><label for="t1">كلمة السر الجديدة :</label></div>
            <div><input type="password" name="t1" id="t1" placeholder=" &#xf13e; &nbsp&nbsp  كلمة المرور" class="login_info form-control" required="requiered"></div>
            <div><label for="t2">تاكيد كلمة المرور  :</label></div>
            <div><input type="password" name="t2" id="t2" placeholder="&#xf13e; &nbsp &nbsp كلمة المرور الجديدة" class="login_info form-control" required="requiered"></div>
            <button type="submit" class="login_sign_button">تاكيد</button></div>   
        </form>
    </div>
    
    <script type="text/javascript" src="/js/bootstrap.min.min.js"></script> 
</body>
</html>