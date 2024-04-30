@extends('user.user')
@section('type')
    {{'تعديل '}}
@endsection

@section('user')
<style>
  
</style>

<!--Addcategories-->
<div class="cate_content">
    @foreach ($project1 as $item)
    <form method="POST" enctype="multipart/form-data" class="cate_info" action="/users/updateUsers/update?user_id={{$item->user_id}}" onchange="loadFile(event)">
        @endforeach  
        {{ csrf_field() }}
        <h4 class="cate_lable"> <i class="fas fa-user-edit"></i> تعديل مستخدم</h4>
        <div class="row ">
            <div class="col-md-4">
                <div>
                    @foreach ($project1 as $item)
                <img id="output" class="img_display_user" src="{{url($item->media_path)}}" />
                    @endforeach   
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
                @foreach ($project2 as $item2)
                    <div>
                        <label for="user_name" >اسم المستخدم</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" value="{{$item2->user_name}}" required/>
                        <div class="msg">{{$errors->first('user_name')}}</div>
                    </div>
                    <div>
                        <label for="user_fullname" >اسم المستخدم كامل</label>
                        @foreach ($project1 as $item)
                            <input type="text" id="user_fullname" name="user_fullname" class="form-control" value="{{$item->user_fullname}}"required/>
                        @endforeach
                    <div class="msg">{{$errors->first('user_fullname')}}</div>
                    </div>
                    <div>
                        <label for="user_email" >الايميل</label>
                        <input type="email" id="user_email" name="user_email" class="form-control" value="{{$item2->user_email}}" required/>
                        <div class="msg">{{$errors->first('user_email')}}</div>
                    </div>
                @endforeach 
            </div>
            @foreach ($project1 as $item)
            <div class="row col-md-12">
                <div class="col-md-3">
                    <label for="user_gander" >الجنس </label>
                    <select id="user_gander" name="user_gander" class="form-control">
                        <option>{{$item->user_gander}}</option>
                        <option>ذكر</option>
                        <option>انثئ</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="user_birthday" >تاريخ الميلاد</label>
                <input type="date" id="user_birthday" name="user_birthday" class="form-control" value="{{$item->user_birthday}}"/>
                    <div class="msg">{{$errors->first('user_birthday')}}</div>
                </div>

                <div class="col-md-3">
                    <label for="user_type" >نوع الحساب</label>
                    <select id="user_type" name="user_type" class="form-control">
                        @foreach ($project2 as $item2)
                        <option>{{$item2->user_type}}</option> 
                        @endforeach
                        <option>مسؤول</option>
                        <option>مستخدم</option>
                    </select>
                    <div class="msg">{{$errors->first('user_type')}}</div>
                </div>

                <div class="col-md-3">
                    <label for="user_status">الحالة</label>
                    <select  id="user_status" name="user_status" class="form-control">
                        @foreach ($project2 as $item2)
                        <option>{{$item2->user_status}}</option> 
                        @endforeach
                        <option>مفعل</option>
                        <option>غير مفعل</option>
                    </select>
                </div>

            </div> 
            @endforeach
                    
        </div>  
        <div class="cate_btn">
            <button type="submit" class="btn btn-outline-success">حفظ</button>
        </div>
    </form>      
</div> 
</section>
<!--EndAddcategories-->


@endsection