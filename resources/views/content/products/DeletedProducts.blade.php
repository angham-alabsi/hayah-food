@extends('content.products.Products')
@section('type')
    {{'استعادة '}}
@endsection

@section('product')
<style>
    .deleted_link
    {
        background-color: #fff;
    }
</style>

<!--DeleteProducts-->

<section class="product_delete col-md">
    <div class="shadow_content">
        <h5 class="cate_lable" > <i class="fa fa-trash-o" aria-hidden="true"></i> المنتجات المحذوفة</h5>
        <div class="cate_search">
            <form action="/productSearch/unavaliableProducts" method="POST">
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
                <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="table_scrol">
        <table class="table table-bordered">
            <tr class="table_style">
                <th>اسم المنتج</th>
                <th>الصنف</th>
                <th>الوكالة</th>
                <th>الحالة</th>
                <th>الحدث</th>
            </tr>
            @foreach ($project as $item)
            <tr>
                <td>{{$item->pro_name}}</td>
                <td>{{$item->cate_name}}</td>
                <td>{{$item->brand_name}}</td>
                <td>{{$item->pro_status}}</td>
                <td>
                    <form action="/updateProducts/restore?pro_id={{$item->pro_id}}" method="POST" class="table_action">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <button  type="submit"  class="btn  table_action_btn"><i class="fas fa-trash-restore"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
        
    </div>
</section>

<!--EndDeleteProducts--> 



@endsection