@extends('content.cateGallery.gallery')
@section('type')
    {{'اضافة '}}
@endsection

@section('gallery')
<style>
    .add_link
    {
        background-color: #fff;
    }
</style>
<!--Addgallery-->
<div class="cate_content col-md">
    <form method="POST" enctype="multipart/form-data" class="cate_info" action="/gallery/addBrandsPhotos/add" onchange="loadFile(event)">
        {{ csrf_field() }}
        <h4 class="cate_lable"><i class="fas fa-folder-plus"></i>  ادخال صورة</h4>
        <div class="row ">
            <div class="col-md-6">
                <div>
                    <img id="output" class="img_display"/>
                </div>
            </div>
            <div class="col-md-6 cate_info_right">
                
                <div>
                    <label for="brand_id"> الصنف</label>
                    <select  id="brand_id" name="brand_id" class="form-control">
                        @foreach ($project as $item)
                            <option value='{{$item->brand_id}}'>{{$item->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="img_type">نوع الصورة</label>
                            <select  id="img_type" name="img_type" class="form-control">
                                @foreach ($project2 as $item)
                                  <option value="{{$item->type_id}}">{{$item->type_name}}</option> 
                                @endforeach
                            </select>
                </div>
                <div>
                    <label for="media_status">الحالة</label>
                    <select  id="media_status" name="media_status" class="form-control">
                        <option>متوفر</option>
                        <option>غير متوفر</option>
                    </select>
                </div>
                <div >
                    <label for="brand_img" >اختار صورة</label>
                    <input type="file" name="brand_img" id="brand_img" required/>
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
        <div class="cate_btn">
            <button type="submit" class="btn btn-outline-success">حفظ</button>
        </div>
    </form>      
</div> 

<!--EndAddgallery-->



@endsection