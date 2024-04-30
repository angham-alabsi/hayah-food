
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}" />
        <script src="https://kit.fontawesome.com/ce59a85abb.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
      
    </head>
    <style>
        *{
            text-align: right;
        }

    </style>
    <body>
         
           <h1 >{{$data['email_subject']}}</h1>
           <p >{{$data['email_msg']}}</p>
    
    </body>
</html>