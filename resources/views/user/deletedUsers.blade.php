@extends('user.user')
@section('type')
    {{'عرض '}}
@endsection

@section('user')
<style>
    .deleted_link
    {
        background-color: #fff;
    }
</style>
<!--Showcategories-->
    
<section class="cate_show col-md">
    <div class="shadow_content">
        <h5 class="cate_lable" > <i class="fas fa-user-times"></i> المستخدمين الغير مفعلين</h5>
        <div class="cate_search">
            <form action="/userSearch/unactiveUsers" method="POST">
                {{ csrf_field() }}
                {{method_field('GET')}}
                <div class="msg2">
                    @if (isset($msg))
                        @foreach ($msg as $item)
                        <div class="alert alert-danger text-center " role="alert">
                            {{$item}}
                          </div>
                        @endforeach 
                    @else
                        {{$msg=""}}
                    @endif
                </div>
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
                <input type="text" id="search_exited_cate" name="search_exited_cate" />
                <button type="submit"  class="search_btn" ><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="table_scrol">
        <table class="table table-bordered">
            <tr class="table_style">
                <th>اسم المستخدم</th>
                <th>الايميل</th>
                <th>الحالة</th>
                <th>تاريخ الحذف</th>
                <th>الحدث</th>
            </tr>
            @foreach ($project as $item)
            <tr>
                
                    <td>{{$item->user_name}}</td>
                    <td>{{$item->user_email}}</td>
                    <td>{{$item->user_status}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                    <form action="/users/updateUsers/restore?user_id={{$item->user_id}}" method="POST" class="table_action">
                        {{ csrf_field() }}
                        {{ method_field('GET')}}
                        <button  type="submit"  class="btn  table_action_btn"><i class="fas fa-trash-restore"></i></button>
                    </form>
                    </td>
            </tr>
           @endforeach
        </table>
    </div>
       
        <!--<div class="page_transfer">
            <div class="page_right btn"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
            <div class="page_center">...</div>
            <div class="page_left btn"><i class="fa fa-angle-double-left" aria-hidden="true"></i></div>
        </div>-->
        <div class="pages text-center">
           {{--$project->links()--}}
        </div>
    </div>
    
</section>

<!--EndShowcategories-->




@endsection