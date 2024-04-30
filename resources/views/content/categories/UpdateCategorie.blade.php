@extends('content.categories.Categories')
@section('type')
    {{'تعديل '}}
@endsection

@section('categorie')

<!--Updatecategories-->
<section class="update_cate col-md">
    <div class=" cate_content">
        
        @foreach ($categorie as $item)
            <form method="POST" enctype="multipart/form-data" class="cate_info" action="/updatecategories?cate_id={{$item->id}}" onchange="loadFile(event)">
        @endforeach
            {{ csrf_field() }}
            <h4 class="cate_lable"> <i class="fa fa-refresh" aria-hidden="true"></i> تعديل صنف</h4>
            <div class="row ">
                <div class="col-md-6 cate_info_right">
                        <div>
                            <label for="cate_name" > اسم الصنف بالعربي</label>
                                @foreach($categorie as $item)
                                <input type="text" id="cate_name" name="cate_name" class="form-control" 
                                value="{{$item->cate_name }}"/>
                                @endforeach 
                            <div class="msg">{{$errors->first('cate_name')}}</div>
                        </div>
                        <div>
                            <label for="cate_name" >اسم الصنف بالانجليزي</label>
                                @foreach($categorie as $item)
                                <input type="text" id="cate_name_en" name="cate_name_en" class="form-control" 
                                value="{{$item->cate_name_en }}"/>
                                @endforeach 
                            <div class="msg">{{$errors->first('cate_name_en')}}</div>
                        </div>
                        <div>
                            <label for="cate_status">الحالة</label>
                            <select  id="cate_status" name="cate_status" class="form-control">
                                @foreach($categorie as $item)
                                <option value="{{$item->cate_status}}" >{{$item->cate_status}}</option>
                                @endforeach 
                                <option>متوفر</option>
                                <option>غير متوفر</option>
                            </select>
                        </div>
                        <div>
                            <label for="cate_description">وصف الصنف بالعربي</label>
                            <textarea id="cate_description" name="cate_description" class="form-control" required>
                                @foreach($categorie as $item)
                                {{$item->cate_description}}
                                @endforeach
                            </textarea>
                            <div class="msg">{{$errors->first('cate_description')}}</div>
                        </div>
                        <div>
                            <label for="cate_description_en">وصف الصنف بالانجليزي</label>
                            <textarea id="cate_description_en" name="cate_description_en" class="form-control" required>
                                @foreach($categorie as $item)
                                {{$item->cate_description_en}}
                                @endforeach
                            </textarea>
                            <div class="msg">{{$errors->first('cate_description_en')}}</div>
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
                                <label for="cate_img">اختار صورة</label>
                                <input type="file" name="cate_img" id="cate_img"/>
                                <div class="msg">{{$errors->first('cate_img')}}</div>
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