@extends('content.Email.Emails')
@section('email_title')
 انشاء ايميل
@endsection
@section('email_content')
<style>
    .email_dec
    {
        margin: 40px auto;
        height: auto;
        box-shadow: 3px 6px 8px #c1c1c1;
        padding: 0;
        width: 70%;
    }
    
</style>
<div class="col-md-10 email_dec">
    <h5 class="cate_lable"> <i class="fas fa-envelope"></i> انشاء رسالة</h5>
    <form action="/email/send" method="POST" >
      {{csrf_field()}}
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
        <div class="email_lable">
        <div> 
            <label for="email_sender">الى :</label>
            <input type="email" name='email_received' id="email_sender" class="form-control"  />
            <div class="msg">{{$errors->first('email_sender')}}</div>
        </div>
        <div>
            <label for="email_subject">الموضوع :</label>
            <input type="text" name="email_subject" id="email_subject" class="form-control"  />
            <div class="msg">{{$errors->first('email_subject')}}</div>
        </div>
        <div>
            <label for="email_msg">نص الرسالة :</label>
            <textarea name="email_msg" id="email_msg" class="form-control" >
            </textarea>
            <div class="msg">{{$errors->first('email_msg')}}</div>
        </div>
        <div class="cate_btn">
            <button type="submit"  class="btn cate_btn button" >ارسال <i class="fas fa-paper-plane"></i></button>
        </div>
        </div>
    </form>
</div>
</div>
@endsection