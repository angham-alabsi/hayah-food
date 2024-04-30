<?php

namespace App\Http\Controllers;

use App\Media_brands;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class Media_brands_Controller extends Controller
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
    public function storeBrandImg(Request $request)
    {
        $project=DB::select('select brand_id  , brand_name from brands');
        $project2=DB::select('select type_id  , type_name from media_types');
        $msg=[];
        $project3=$this->validate(request(), [
            'brand_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
        ]);
        if ($request->hasFile('brand_img'))
        { 

            $test=DB::select('select media_name from media_brands where media_name=:m limit 1',['m'=>$request->brand_img->getClientOriginalName()]);
            $count=count($test);
           if($count == 0)
           {
                $file_name             = $request->brand_img->getClientOriginalName();
                $x=new Media_brands();
                $x->user_id            = $request->session()->get('user_id');
                $x->brand_id            = request('brand_id');
                
                $request->file('brand_img')->storeas('public/img',$file_name);
                $x->media_path         = 'storage/img/'.$file_name;
                $x->media_name         = $file_name;
                $x->media_status       = "متوفر";
                $x->media_size         = $request->brand_img->getSize();
                $x->media_exten        = $request->brand_img->extension();
                $x->media_status        = request('media_status');
                $x->type_id            = request('img_type');
                $x->save();
           }
           else
           {
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
            {
                
                $msg=["هذة الصورة مدخلة مسبقا"];
                     
                return view('content.brandGallery.AddBrandGallery',compact('msg','project','project2'));
            }  
        }
     }
    
     return view('content.brandGallery.AddbrandGallery',compact('msg','project','project2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media_brands  $media_brands
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
                
                return view('content.brandGallery.gallery');
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
     * @param  \App\Media_brands  $media_brands
     * @return \Illuminate\Http\Response
     */
    public function editBrandImg(Request $request)
    {
        $project=DB::select('select brand_id  , brand_name from brands');
        $project2=DB::select('select type_id  , type_name from media_types');
        $project3=DB::select('select media_brands.media_id ,  media_brands.media_path , media_brands.media_status , media_types.type_id , media_types.type_name , brands.brand_name , brands.brand_id  from media_brands , brands , media_types where media_brands.brand_id=brands.brand_id and media_brands.type_id=media_types.type_id and media_brands.media_id=:c1',[
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
                
                return view('content.brandGallery.UpdateBrandGallery' ,compact('project','project2','project3'));
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
     * @param  \App\Media_brands  $media_brands
     * @return \Illuminate\Http\Response
     */
    public function updateBrandImg(Request $request)
    {
       DB::update('update media_brands set brand_id=:c1 , type_id=:c2 , media_status=:c3 ,user_id=:c5 ,updated_at=:c6 where media_id=:c4',[
           'c1'=>request('brand_id'),
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
                
                return redirect('/gallery/showBrandsPhotos');
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
     * @param  \App\Media_brands  $media_brands
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        DB::update('update media_brands set media_status="غير متوفر" , user_id=:c5 , updated_at=:c6 where media_id=:c1',[
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
                
                return redirect('/gallery/showBrandsPhotos');
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

    public function showBrandAdd(Request $request)
    {
        $project=DB::select('select brand_id  , brand_name from brands');
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
                
                return view('content.brandGallery.AddBrandGallery' , compact('project','project2'));
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

    public function showBrandPhoto(Request $request)
    {
        $project=[];

        $project=DB::select('select * from media_brands where media_status="متوفر"');
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
                
                return view('content.brandGallery.ShowBrandGallery' , compact('project'));
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

    public function showBrandPhoto2(Request $request)
    {
        $project=DB::select('select * from media_brands where media_status="غير متوفر"');
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
                
                return view('content.brandGallery.DeletedbrandGallery' , compact('project'));
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

    public function restoreBrandImg(Request $request)
    {
        DB::update('update media_brands set media_status="متوفر" ,updated_at=:c6 , user_id=:c5 where media_id=:c1',[
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
                
                return redirect('/gallery/deletedBrandsPhotos');
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
