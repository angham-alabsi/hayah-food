@extends('content.products.Products')
@section('type')
    {{'تعديل '}}
@endsection

@section('product')
<style>
    .update_link
    {
        background-color: #fff;
    }
</style>
<!--Addcategories-->
<div class="cate_content">
    
    @foreach ($project as $item)
         <form method="POST" enctype="multipart/form-data" class="cate_info" action="/updateproducts?pro_id={{$item->pro_id}}" onchange="loadFile(event)">
    @endforeach
        {{ csrf_field() }}
        <h4 class="cate_lable"> <i class="fa fa-refresh" aria-hidden="true"></i> ادخال المنتج</h4>
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
                            <label for="pro_name" >اسم المنتج بالعربي</label>
                            @foreach ($project as $item)
                        <input type="text" id="pro_name" name="pro_name" class="form-control" value="{{$item->pro_name}}"/>
                            @endforeach 
                            <div class="msg">{{$errors->first('pro_name')}}</div>
                        </div>
                        <div>
                            <label for="pro_name_en" >اسم المنتج بالانجليزي</label>
                            @foreach ($project as $item)
                            <input type="text" id="pro_name_en" name="pro_name_en" class="form-control" value="{{$item->pro_name_en}}"/>
                            @endforeach 
                            <div class="msg">{{$errors->first('pro_name_en')}}</div>
                        </div>
                        <div>
                            <label for="cate_name">الصنف</label>
                            <select  id="cate_name" name="cate_name" class="form-control">
                            <option value="{{$item->cate_id}}">{{$item->cate_name}}</option>
                            @foreach ($categorie as $item1)
                            <option value="{{$item1->id}}">{{$item1->cate_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="brand_name">الوكالة</label>
                            <select  id="brand_name" name="brand_name" class="form-control">
                                <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                @foreach ($brand as $item1)
                                <option value="{{$item1->brand_id}}">{{$item1->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="row ">
                            <div class="col-md-4">
                            <label for="pro_status">الحالة</label>
                            <select  id="pro_status" name="pro_status" class="form-control">
                                @foreach ($project as $item)
                                <option>{{$item->pro_status}}</option>
                                @endforeach
                                <option>متوفر</option>
                                <option>غير متوفر</option>
                            </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pro_unit">الوحدة</label>
                                <select  id="pro_unit" name="pro_unit" class="form-control">
                                @foreach ($project as $item)
                                <option>{{$item->pro_unit}}</option> 
                                @endforeach
                                <option >كيلو</option>
                                <option >جرام</option>
                            </select>
                            </div>
                            <div class="col-md-4">
                                <label for="pro_weight">الوزن</label>
                            @foreach ($project as $item)
                            <input type="number"  id="pro_weight" name="pro_weight" class="form-control" required value="{{$item->pro_weight}}"/>
                            @endforeach
                                <div class="msg">{{$errors->first('pro_weight')}}</div>
                            </div>
                        </div>
                        <div>
                            <label for="pro_description" >وصف المنتج بالعربي</label>
                            <textarea id="pro_description" name="pro_description" class="form-control" required >
                                @foreach ($project as $item)
                                {{$item->pro_description}}
                                @endforeach
                            </textarea>
                            <div class="msg">{{$errors->first('pro_description')}}</div>
                        </div>
                        <div>
                            <label for="pro_description_en" >وصف المنتج بالانجليزي</label>
                            <textarea id="pro_description_en" name="pro_description_en" class="form-control" required >
                                @foreach ($project as $item)
                                {{$item->pro_description_en}}
                                @endforeach
                            </textarea>
                            <div class="msg">{{$errors->first('pro_description_en')}}</div>
                        </div>
                </div>
    
                <div class="col-md-6">
                        @foreach ($img_path as $item)
                            <div >
                                <img id="output" class="img_display" src="{{url($item->media_path)}}" alt="hayah_food"/>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-6">
                                <label for="pro_img" >اختار صورة</label>
                                <input type="file" name="pro_img" id="pro_img" />
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
<!--EndAddProducts-->


@endsection



