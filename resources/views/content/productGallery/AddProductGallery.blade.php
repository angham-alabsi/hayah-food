@extends('content.cateGallery.gallery')
@section('type')
    {{'اضافة '}}
@endsection

@section('gallery')
<!--Addgallery-->
<div class="cate_content col-md">
    
    <form method="POST" enctype="multipart/form-data" class="cate_info" action="/gallery/addProductsPhotos/add" onchange="loadFile(event)">
        {{ csrf_field() }}
        <h4 class="cate_lable">ادخال صورة</h4>
        <div class="row ">
            
            <div class="col-md-6">
                <div>
                    <img id="output" class="img_display"/>
                </div>
                <div >
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
            <div class="col-md-6 cate_info_right p-0 pl-4">
                
                <div class="pt-2">
                    <label for="pro_id"> المنتج</label>
                    <select  id="pro_id" name="pro_id" class="form-control">
                        @foreach ($project as $item)
                            <option value='{{$item->pro_id}}'>{{$item->pro_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="pt-2">
                    <label for="img_type">نوع الصورة</label>
                            <select  id="img_type" name="img_type" class="form-control">
                                @foreach ($project2 as $item)
                                  <option value="{{$item->type_id}}">{{$item->type_name}}</option> 
                                @endforeach
                            </select>
                </div>
                <div class="pt-2">
                    <label for="media_status">الحالة</label>
                    <select  id="media_status" name="media_status" class="form-control">
                        <option>متوفر</option>
                        <option>غير متوفر</option>
                    </select>
                </div>
                
            </div>
        </div>  
        <div class="cate_btn">
            <button type="submit" class="btn btn-outline-success">حفظ</button>
        </div>
    </form>      
</div> 

<!--EndAddgallery-->



@endsection