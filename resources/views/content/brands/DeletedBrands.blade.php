@extends('content.brands.brands')
@section('type')
    {{'استعادة '}}
@endsection

@section('brands')
<style>
    .deleted_link
    {
        background-color: #fff;
    }
</style>

<!--DeleteBrands-->
    
<section class="cate_delete col-md">
    <div class="shadow_content">
        <h5 class="cate_lable" > <i class="fa fa-trash-o" aria-hidden="true"></i> الوكالات المحذوفة</h5>
        <div class="cate_search">
            <form action="/brandSearch/unavaliableBrands" method="POST">
                {{ csrf_field() }}
                {{method_field('GET')}}
                <div class="msg">
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
                <button type="submit" class="search_btn" ><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="table_scrol">
        <table class="table table-bordered">
            <tr class="table_style">
                <td> اسم الوكالة</td>
                <td>الحالة</td>
                <td>الحدث</td>
            </tr>
            @foreach ($project as $item)
            <tr>
                
                    <td>{{$item->brand_name}}</td>
                    <td>{{$item->brand_status}}</td>
                    <td>
                    <form action="/updatebrands/restore?brand_id={{$item->brand_id}}" method="POST" class="table_action">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
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
           
        </div>
    </div>
</section>

<!--EndDeleteBrands-->  








@endsection