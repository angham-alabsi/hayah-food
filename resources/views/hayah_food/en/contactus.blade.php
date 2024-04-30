@extends('hayah_food.en.header')
@section('title')
    Contact Us
@endsection
@section('content')

<section class="contact" >
    <div class="contact-bg">
        <img src="/img/Contact_Bg.jpg" class="w-100" alt="contact us">
    </div>
    
    <div class="container" dir="ltr">
        <div class="row">

            <form class="form contact-form col-lg-7 p-5" action="/contactus/send/en" method="POST" dir="ltr">
                {{ csrf_field() }}
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
                <h4 class="float-left mr-3 mb-4">leave a message</h4> <i class="fas fa-mail-bulk float-right"
                    style="font-size: 30px; color:#18275c;"></i>
                <div class="form-group">
                    <input class="f-name form-control mb-2 text-left" type="text" placeholder="name" name="sender_name" value="{{old('sender_name')}}" required="required"/>
                    <div class="msg">{{$errors->first('sender_name')}}</div>
                </div>
                <div class="form-group">
                    <input class="f-email form-control mb-2 text-left" type="email" placeholder="email" name="sender_email" value="{{old('sender_email')}}" required="required"/>
                    <div class="msg">{{$errors->first('sender_email')}}</div>
                </div>
                <div class="form-group">
                    <input class="f-sub form-control mb-2 text-left" type="text" placeholder="subject" name="subject" value="{{old('subject')}}" required="required"/>
                    <div class="msg">{{$errors->first('subject')}}</div>
                </div>
                <div class="form-group">
                    <textarea class="f-msg form-control  mb-2 text-left" placeholder="message here" name="msg" required="required">
                    {{old('msg') }}   
                    </textarea>
                    <div class="msg">{{$errors->first('msg')}}</div>
                    <button type="submit" class=" btn btn-primary mb-2" style="background-color: #21a249; border:none;"><i class="fas fa-paper-plane"></i> Send</button>
                </div>
            </form>
            <div class="info col-lg-5  ">
                <div class="col-12 p-5">
                    <div class="text-center"><img class="text-center" src="/img/hayahLogo.png"></div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection