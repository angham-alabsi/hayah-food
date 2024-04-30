@extends('content.brands.brands')
@section('type')
    {{'تعديل '}}
@endsection

@section('brands')

<!--Updatecategories-->
<section class="update_cate col-md">
    <div class=" cate_content">
        @foreach ($brand as $item)
        <form method="POST" action="/updatebrands/update?brand_id={{$item->brand_id}}" enctype="multipart/form-data" class="cate_info"  onchange="loadFile(event)">
        @endforeach
            {{ csrf_field() }}
            <h4 class="cate_lable"> <i class="fa fa-refresh" aria-hidden="true"></i> تعديل وكالة</h4>
            <div class="row ">
                <div class="col-md-6 cate_info_right">
                        <div>
                            <label for="brand_name" > اسم الوكالة بالعربي</label>
                                @foreach($brand as $item)
                                <input type="text" id="brand_name" name="brand_name" class="form-control" 
                                value="{{$item->brand_name }}"/>
                                @endforeach 
                            <div class="msg">{{$errors->first('brand_name')}}</div>
                        </div>
                        <div>
                            <label for="brand_name_en" >اسم الوكالة بالانجليزي</label>
                                @foreach($brand as $item)
                                <input type="text" id="brand_name_en" name="brand_name_en" class="form-control" 
                                value="{{$item->brand_name_en }}"/>
                                @endforeach 
                            <div class="msg">{{$errors->first('brand_name_en')}}</div>
                        </div>
                        <div>
                            <label for="brand_status">الحالة</label>
                            @foreach($brand as $item)
                            <select  id="brand_status" name="brand_status" class="form-control">
                                <option>{{$item->brand_status}}</option>
                                @endforeach 
                                <option>متوفر</option>
                                <option>غير متوفر</option>
                            </select>
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
                                <label for="brand_img">اختار صورة</label>
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
<!--EndUpdatecategories-->
@endsection