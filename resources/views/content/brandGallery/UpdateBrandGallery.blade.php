@extends('content.cateGallery.gallery')
@section('type')
    {{'تعديل '}}
@endsection

@section('gallery')
<style>
    .update_link
    {
        background-color: #fff;
    }
</style>
<!--Updategallery-->
<div class="cate_content col-md">
    @foreach ($project3 as $item)
    <form method="POST" enctype="multipart/form-data" class="cate_info" action="/gallery/updateBrandsPhotos/update2?media_id={{$item->media_id}}" onchange="loadFile(event)">
    @endforeach
        {{ csrf_field() }}
        <h4 class="cate_lable"> <i class="fa fa-refresh" aria-hidden="true"></i> تعديل صورة</h4>
        <div class="row ">
            <div class="col-md-6">
                <div>
                    @foreach ($project3 as $item)
                    <img id="output" class="img_display" src="{{url($item->media_path)}}"/>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 cate_info_right">
                
                <div>
                    <label for="brand_id"> الصنف</label>
                    <select  id="brand_id" name="brand_id" class="form-control">
                        @foreach($project3 as $item)
                            <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                        @endforeach 
                        @foreach ($project as $item)
                            <option value='{{$item->brand_id}}'>{{$item->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="img_type">نوع الصورة</label>
                            <select  id="img_type" name="img_type" class="form-control">
                                @foreach($project3 as $item)
                                <option value="{{$item->type_id}}">{{$item->type_name}}</option>
                                @endforeach 
                                @foreach ($project2 as $item)
                                  <option value="{{$item->type_id}}">{{$item->type_name}}</option> 
                                @endforeach
                            </select>
                </div>
                <div>
                    <label for="media_status">الحالة</label>
                    <select  id="media_status" name="media_status" class="form-control">
                        @foreach($project3 as $item)
                        <option>{{$item->media_status}}</option>
                        @endforeach 
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

<!--EndUpdategallery-->


@endsection