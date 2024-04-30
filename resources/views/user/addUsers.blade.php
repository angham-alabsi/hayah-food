@extends('user.user')
@section('type')
    {{'اضافة '}}
@endsection

@section('user')
<style>
    .add_link
    {
        background-color: #fff;
    }
</style>

<!--Addcategories-->
<div class="cate_content">
    <form method="POST" enctype="multipart/form-data" class="cate_info" action="/users/AddUsers/add" onchange="loadFile(event)">
        {{ csrf_field() }}
        <h4 class="cate_lable"> <i class="fas fa-user-plus"></i> اضافة مستخدم</h4>
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
        <div class="row ">
            <div class="col-md-4">
                <div>
                    <img id="output" class="img_display_user"/>
                </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="user_img" >اختار صورة</label>
                            <input type="file" name="user_img" id="user_img"/>
                            <div class="msg">{{$errors->first('user_img')}}</div> 
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
                    </div>
            </div>
            <div class="col-md-8 cate_info_right">
                    <div>
                        <label for="user_name" >اسم المستخدم</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" value="{{old('user_name')}}" required/>
                        <div class="msg">{{$errors->first('user_name')}}</div>
                    </div>
                    <div>
                        <label for="user_fullname" >اسم المستخدم كامل</label>
                    <input type="text" id="user_fullname" name="user_fullname" class="form-control" value="{{old('user_fullname')}}"required/>
                        <div class="msg">{{$errors->first('user_fullname')}}</div>
                    </div>
                    <div>
                        <label for="user_email" >الايميل</label>
                    <input type="email" id="user_email" name="user_email" class="form-control" value="{{old('user_email')}}" required/>
                        <div class="msg">{{$errors->first('user_email')}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <label for="user_password" >كلمة السر</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" value="{{old('user_password')}}" required/>
                            <div class="msg">{{$errors->first('user_password')}}</div>
                        </div>
                        <div class="col-md">
                            <label for="user_password_con" >تاكيد كلمة السر</label>
                        <input type="password" id="user_password_confirmation" name="user_password_confirmation" class="form-control" value="{{old('user_password_confirmation')}}" required/>
                            <div class="msg">{{$errors->first('user_password_confirmation')}}</div>
                        </div>
                    </div>
            </div>
                    <div class="row col-md-12">
                        <div class="col-md-3">
                            <label for="user_gander" >الجنس </label>
                            <select id="user_gander" name="user_gander" class="form-control">
                                <option>ذكر</option>
                                <option>انثئ</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="user_birthday" >تاريخ الميلاد</label>
                            <input type="date" id="user_birthday" name="user_birthday" class="form-control" value="{{old('user_brithday')}}"/>
                            <div class="msg">{{$errors->first('user_birthday')}}</div>
                        </div>

                        <div class="col-md-3">
                            <label for="user_type" >نوع الحساب</label>
                            <select id="user_type" name="user_type" class="form-control">
                                <option>مسؤول</option>
                                <option>مستخدم</option>
                            </select>
                            <div class="msg">{{$errors->first('user_type')}}</div>
                        </div>

                        <div class="col-md-3">
                            <label for="user_status">الحالة</label>
                            <select  id="user_status" name="user_status" class="form-control">
                                <option>مفعل</option>
                                <option>غير مفعل</option>
                            </select>
                        </div>

                    </div> 
        </div>  
        <div class="cate_btn">
            <button type="submit" class="btn btn-outline-success">حفظ</button>
        </div>
    </form>      
</div> 
</section>
<!--EndAddcategories-->


@endsection