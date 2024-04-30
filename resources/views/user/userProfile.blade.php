@extends('user.user')
@section('type')
    {{'تعديل '}}
@endsection

@section('user')
<style>
  
</style>

<!--Addcategories-->
<div class="cate_content">
    
        <div class="row cate_info">
            
            <div class="col-md-12 p-0 ">
            <h4 class="cate_lable m-0 "> <i class="fas fa-user"></i> بروفايل المستخدم</h4> 
                
                <table class="table table-bordered profile_table">
                    <tr>
                        <td rowspan=5 class="img_display_userPro">
                            <div>
                                @foreach ($use2 as $item)
                                <img id="output"  src="{{url($item->media_path)}}" />
                                @endforeach   
                            </div>
                        </td>
                        <th>اسم المستخدم</th>
                        @foreach ($use1 as $item)
                        <td>{{$item->user_name}}</td>
                        @endforeach   
                    </tr>
                    <tr>
                        <th> اسم المستخدم كامل</th>
                        @foreach ($use2 as $item)
                        <td>{{$item->user_fullname}}</td>
                        @endforeach 
                    </tr>
                    <tr>
                        <th>الايميل</th>
                        @foreach ($use1 as $item)
                        <td>{{$item->user_email}}</td>
                        @endforeach 
                    </tr>
                    <tr>
                        <th>نوع الحساب</th>
                        @foreach ($use1 as $item)
                        <td>{{$item->user_type}}</td>
                        @endforeach   
                    </tr>
                    <tr>
                        <th>حالة الحساب</th>
                        @foreach ($use1 as $item)
                        <td>{{$item->user_status}}</td>
                        @endforeach 
                    </tr>
                    
                </table>

            </div> 
            @foreach ($use1 as $item)
            <form action="/users/updateUsers?user_id={{$item->user_id}}" method="POST" class="table_action">
                {{ csrf_field() }}
                {{ method_field('GET')}}
                <div class="cate_btn">
                    <button type="submit" class="btn btn-outline-success">تعديل</button>
                </div>
            </form>
        @endforeach
        </div>
        
        
</div>

<!--EndAddcategories-->


@endsection