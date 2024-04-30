@extends('content.cateGallery.gallery')
@section('type')
    {{'عرض '}}
@endsection

@section('gallery')
<style>
    .add_link
    {
        background-color: #fff;
    }
   
    .gal_show 
    {
        width: 200px;
        height: 200px;
        padding: 20px;
        text-align: center; 
        padding-bottom: 42px;  
    }
    .gal_show img
    {
        width: 100%;
        height: 100%;
    }
    .gal_show_icons
    {
        text-align: center;
        display: block;
    }
</style>
<!--ShowCateGallery-->

<section class="cate col-md" >
    <h4 class="cate_lable"><i class="fas fa-images"></i>  معرض الصور</h4>
    <div class="row gal_dec">
        @foreach ($project as $item)
        <div class="col-md-3 gal_show ">
              <img src="/{{$item->media_path}}"alt="hayah food"/>
              <div class="row gal_show_icons">
                    <form action="/gallery/updateBrandsPhotos/update?media_id={{$item->media_id}}" method="POST"   class="table_action">
                        {{ csrf_field() }}
                        {{ method_field('GET')}}
                        <button type="submit" class="btn  table_action_btn"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </form>
                    <form action="/gallery/updateBrandsPhotos/delete?media_id={{$item->media_id}}" method="POST" class="table_action">
                        {{ csrf_field() }}
                        {{ method_field('GET')}}
                        <button  type="submit"  class="btn  table_action_btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </form>
              </div>
        </div>
        @endforeach
    </div>


</section>



@endsection