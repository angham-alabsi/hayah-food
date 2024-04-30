@extends('content.brands.brands')
@section('type')
    {{'اضافة '}}
@endsection

@section('brands')
<style>
    .add_link
    {
        background-color: #fff;
    }
</style>

<!--Addcategories-->
<div class="cate_content">
    
    <form method="POST" enctype="multipart/form-data" class="cate_info" action="/brands/Addbrands/add" onchange="loadFile(event)">
        {{ csrf_field() }}
        <h4 class="cate_lable"> <i class="fas fa-folder-plus"></i> ادخال الوكالة</h4>
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
            <div class="col-md-6 cate_info_right">
                    <div>
                        <label for="brand_name" >اسم الوكالة بالعربي</label>
                    <input type="text" id="brand_name" name="brand_name" class="form-control" value="{{old('brand_name')}}"/>
                        <div class="msg">{{$errors->first('brand_name')}}</div>
                    </div>
                    <div>
                        <label for="brand_name_en" >اسم الوكالة بالانجليزي</label>
                    <input type="text" id="brand_name_en" name="brand_name_en" class="form-control" value="{{old('brand_name_en')}}"/>
                        <div class="msg">{{$errors->first('brand_name_en')}}</div>
                    </div>
                    <div>
                        <label for="brand_status">الحالة</label>
                        <select  id="brand_status" name="brand_status" class="form-control">
                            <option>متوفر</option>
                            <option>غير متوفر</option>
                        </select>
                    </div>
            </div>
            <div class="col-md-6">
                <div >
                    <img id="output" class="img_display"/>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="brand_img" >اختار صورة</label>
                            <input type="file" name="brand_img" id="brand_img"/>
                            <div class="msg">{{$errors->first('brand_img')}}</div> 
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
        </div>  
        <div class="cate_btn">
            <button type="submit" class="btn btn-outline-success">حفظ</button>
        </div>
    </form>      
</div> 
</section>
<!--EndAddcategories-->





@endsection