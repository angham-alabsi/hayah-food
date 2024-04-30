<?php

namespace App\Http\Controllers;

use App\Media_product;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class Media_productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProductImg(Request $request)
    {
        $project=DB::select('select pro_id  , pro_name from products');
        $project2=DB::select('select type_id  , type_name from media_types');
        $msg=[];
        $project3=$this->validate(request(), [
            'pro_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
        ]);
        if ($request->hasFile('pro_img'))
        { 

            $test=DB::select('select media_name from media_products where media_name=:m limit 1',['m'=>$request->pro_img->getClientOriginalName()]);
            $count=count($test);
           if($count == 0)
           {
                $file_name             = $request->pro_img->getClientOriginalName();
                $x=new Media_product();
                $x->user_id            = $request->session()->get('user_id');
                $x->pro_id            = request('pro_id');
                
                $request->file('pro_img')->storeas('public/img',$file_name);
                $x->media_path         = 'storage/img/'.$file_name;
                $x->media_name         = $file_name;
                $x->media_status       = "متوفر";
                $x->media_size         = $request->pro_img->getSize();
                $x->media_exten        = $request->pro_img->extension();
                $x->media_status        = request('media_status');
                $x->type_id            = request('img_type');
                $x->save();
           }
           else
           {
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
            {
                
                $msg=["هذة الصورة مدخلة مسبقا"];
                     
                return view('content.productGallery.AddProductGallery',compact('msg','project','project2'));
            }  
        }
     }
    
     return view('content.productGallery.AddproductGallery',compact('msg','project','project2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media_product  $media_product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return view('content.productGallery.gallery');
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media_product  $media_product
     * @return \Illuminate\Http\Response
     */
    
    public function editProductImg(Request $request)
    {
        $project=DB::select('select pro_id  , pro_name from products');
        $project2=DB::select('select type_id  , type_name from media_types');
        $project3=DB::select('select media_products.media_id ,  media_products.media_path , media_products.media_status , media_types.type_id , media_types.type_name , products.pro_name , products.pro_id  from media_products , products , media_types where media_products.pro_id=products.pro_id and media_products.type_id=media_types.type_id and media_products.media_id=:c1',[
            'c1'=>request('media_id')
        ]);
        if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return view('content.productGallery.UpdateProductGallery' ,compact('project','project2','project3'));
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media_product  $media_product
     * @return \Illuminate\Http\Response
     */
    public function updateProductImg(Request $request)
    {
       DB::update('update media_products set pro_id=:c1 , type_id=:c2 , media_status=:c3 ,user_id=:c5 ,updated_at=:c6 where media_id=:c4',[
           'c1'=>request('pro_id'),
           'c2'=>request('img_type'),
           'c3'=>request('media_status'),
           'c4'=>request('media_id'),
           'c5'=>$request->session()->get('user_id'),
           'c6'=>date("Y-m-d H:i:s")
       ]);
       if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return redirect('/gallery/showProductsPhotos');
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media_product  $media_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        DB::update('update media_products set media_status="غير متوفر" , user_id=:c5 , updated_at=:c6 where media_id=:c1',[
            'c1'=>request('media_id'),
            'c5'=>$request->session()->get('user_id'),
            'c6'=>date("Y-m-d H:i:s")
        ]);
        if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return redirect('/gallery/showProductsPhotos');
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }

    }

    public function showProductAdd(Request $request)
    {
        $project=DB::select('select pro_id  , pro_name from products');
        $project2=DB::select('select type_id  , type_name from media_types');
        if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return view('content.productGallery.AddProductGallery' , compact('project','project2'));
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }
    }

    
    public function showProductPhoto(Request $request)
    {
        $project=DB::select('select * from media_products where media_status="متوفر"');
        if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return view('content.productGallery.ShowProductGallery' , compact('project'));
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }
    }


    public function showProductPhoto2(Request $request)
    {
        $project=DB::select('select * from media_products where media_status="غير متوفر"');
        if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return view('content.productGallery.DeletedproductGallery' , compact('project'));
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }
    }

    public function restoreProductImg(Request $request)
    {
        DB::update('update media_products set media_status="متوفر" ,updated_at=:c6 , user_id=:c5 where media_id=:c1',[
            'c1'=>request('media_id'),
            'c5'=>$request->session()->get('user_id'),
            'c6'=>date("Y-m-d H:i:s")
        ]);
        if ($request->session()->has('user_id'))
        {
            $use=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($use as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                
                return redirect('/gallery/deletedProductsPhotos');
            }
            else 
            {
                $msg=['الحساب غير مفعل'];
                return view('user.login',compact('msg'));
            }

        }
        else
        {
            $msg=['ليس لديك صلاحية الوصول'];
            return view('user.login',compact('msg'));
        }
    }
}
