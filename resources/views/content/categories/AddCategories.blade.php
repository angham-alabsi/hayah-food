@extends('content.categories.Categories')
@section('type')
    {{'اضافة '}}
@endsection

@section('categorie')
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
        <h4 class="cate_lable"> <i class="fas fa-folder-plus"></i> ادخال صنف</h4>
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
                        <label for="cate_name" >اسم الصنف بالعربي</label>
                    <input type="text" id="cate_name" name="cate_name" class="form-control" value="{{old('cate_name')}}" required/>
                        <div class="msg">{{$errors->first('cate_name')}}</div>
                    </div>
                    <div>
                        <label for="cate_name" >اسم الصنف بالانجليزي</label>
                    <input type="text" id="cate_name_en" name="cate_name_en" class="form-control" value="{{old('cate_name_en')}}" required/>
                        <div class="msg">{{$errors->first('cate_name_en')}}</div>
                    </div>
                    <div>
                        <label for="cate_status">الحالة</label>
                        <select  id="cate_status" name="cate_status" class="form-control">
                            <option>متوفر</option>
                            <option>غير متوفر</option>
                        </select>
                    </div>
                    <div>
                        <label for="cate_description">وصف الصنف بالعربي</label>
                        <textarea id="cate_description" name="cate_description" class="form-control" required>
                            {{old('cate_description')}}
                        </textarea>
                        <div class="msg">{{$errors->first('cate_description')}}</div>
                    </div>
                    <div>
                        <label for="cate_description_en">وصف الصنف بالانجليزي</label>
                        <textarea id="cate_description_en" name="cate_description_en" class="form-control" required>
                            {{old('cate_description_en')}}
                        </textarea>
                        <div class="msg">{{$errors->first('cate_description_en')}}</div>
                    </div>
            </div>
            <div class="col-md-6">
                <div>
                    <img id="output" class="img_display"/>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cate_img" >اختار صورة</label>
                            <input type="file" name="cate_img" id="cate_img" required/>
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
<!--EndAddcategories-->



@endsection