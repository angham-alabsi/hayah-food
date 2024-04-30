@extends('content.products.Products')
@section('type')
    {{'اضافة '}}
@endsection

@section('product')
<style>
    .add_link
    {
        background-color: #fff;
    }
</style>
<!--Addcategories-->
<div class="cate_content">
    
    <form method="POST" enctype="multipart/form-data" class="cate_info" action="/categories/AddCateogries/add" onchange="loadFile(event)">
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
        
        <div class="row ">
            
            <div class="col-md-6 cate_info_right">
                <h4 class="cate_lable">ادخال المنتج</h4>
                <div>
                    <label for="pro_name" >اسم المنتج بالعربي</label>
                <input type="text" id="pro_name" name="pro_name" class="form-control" required value="{{old('pro_name')}}"/>
                    <div class="msg">{{$errors->first('pro_name')}}</div>
                </div>
                <div>
                    <label for="pro_name_en" >اسم المنتج بالانجليزي</label>
                    <input type="text" id="pro_name_en" name="pro_name_en" class="form-control" required value="{{old('pro_name_en')}}"/>
                    <div class="msg">{{$errors->first('pro_name_en')}}</div>
                </div>
                <div>
                    <label for="cate_name">الصنف</label>
                    <select  id="cate_name" name="cate_name" class="form-control">
                    @foreach ($categorie as $item)
                    <option value="{{$item->id}}">{{$item->cate_name}}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label for="brand_name">الوكالة</label>
                    <select  id="brand_name" name="brand_name" class="form-control">
                        @foreach ($brand as $item)
                        <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row ">
                    <div class="col-md-4">
                    <label for="pro_status">الحالة</label>
                    <select  id="pro_status" name="pro_status" class="form-control">
                        <option>متوفر</option>
                        <option>غير متوفر</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                        <label for="pro_unit">الوحدة</label>
                        <select  id="pro_unit" name="pro_unit" class="form-control">
                        <option >كيلو</option>
                        <option >جرام</option>
                        <option >لتر</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                        <label for="pro_weight">الوزن</label>
                    <input type="number"  id="pro_weight" name="pro_weight" class="form-control" required value="{{old('pro_weight')}}"/>
                        <div class="msg">{{$errors->first('pro_weight')}}</div>
                    </div>
                </div>
                <div>
                    <label for="pro_description" >وصف المنتج بالعربي</label>
                    <textarea id="pro_description" name="pro_description" class="form-control" required value="{{old('pro_description')}}">
                    </textarea>
                    <div class="msg">{{$errors->first('pro_description')}}</div>
                </div>
                <div>
                    <label for="pro_description_en" >وصف المنتج بالانجليزي</label>
                    <textarea id="pro_description_en" name="pro_description_en" class="form-control" required value="{{old('pro_description_en')}}">
                    </textarea>
                    <div class="msg">{{$errors->first('pro_description_en')}}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div >
                    <img id="output" class="img_display"/>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="pro_img" >اختار صورة</label>
                            <input type="file" name="pro_img" id="pro_img" required/>
                            <div class="msg">{{$errors->first('pro_img')}}</div>
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