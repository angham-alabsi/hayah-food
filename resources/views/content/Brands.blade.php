@extends('content_layout')
@section('title')
    الوكلات   
@endsection
@section('content')
<!--Start Brands-->
<section class="brand col-md">
    <div class="map ">
        <div class="arb ">ع</div> 
        <div class="line"></div> 
        <div class="eng">E</div>   
    </div>
    
    <div class=" cate_content">
        <h4 class="cate_lable">ادخال الوكالة</h4>
        <form method="POST" enctype="multipart/form-data" class="cate_info">
            <div class="row ">
                <div class="col-md-6 cate_info_right">
                        <div>
                            <label for="cate_name" >اسم الوكالة</label>
                            <input type="text" id="cate_name" name="cate_name" class="form-control"/>
                        </div>
                        <div>
                            <label for="cate_status">الحالة</label>
                            <select  id="cate_name" name="cate_name" class="form-control">
                                <option value="available">متوفر</option>
                                <option value="unavailable">غير متوفر</option>
                            </select>
                        </div>
                </div>
    
                <div class="col-md-6">
                    <div class="img_display"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cate_img" >اختار صورة</label>
                                <input type="file" name="cate_img" id="cate_img"/>
                            </div>
                        
                            <div class=" col-md-6">
                                <label for="img_type">نوع الصورة</label>
                                <select  id="img_type" name="img_type" class="form-control">
                                    <option value="">اساسية</option>
                                    <option value="">اعلان</option>
                                    <option value="">سلايد</option>
                                    <option value="">ايحاء</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>  
            <div class="cate_btn">
                <button type="submit" class="btn btn-outline-success">التالي</button>
            </div>
        </form>      
    </div> 
    </section>
    <!--EndAddBrands-->
    
    

<!--DeleteBrands-->

<section class="brand_delete col-md">
    <div class="shadow_content">
        <h5 class="cate_lable" >الوكالات المحذوفة</h5>
        <div class="cate_search">
            
            <form>
                <input type="text" id="search_exited_cate" name="search_exited_cate" />
                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>اسم الوكالة</th>
                <th>الحالة</th>
                <th>الحدث</th>
            </tr>
            <tr>
                <td>...</td>
                <td>...</td>
                <td>
                    <a class="btn  table_action_btn"><i class="fas fa-trash-restore"></i></a>
                </td>
            </tr>
        </table>
        <div class="page_transfer">
            
            
            <div class="page_right btn"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>
            <div class="page_center">...</div>
            <div class="page_left btn"><i class="fa fa-angle-double-left" aria-hidden="true"></i></div>
        </div>
    </div>
</section>

<!--EndDeleteBrands--> 

<!--End Brands-->
@endsection