<?php

namespace App\Http\Controllers;

use App\Media_categories;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;


class GalleryController extends Controller
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
    public function storeCateImg(Request $request)
    {
        $project=DB::select('select id  , cate_name from categories');
        $project2=DB::select('select type_id  , type_name from media_types');
        $msg=[];
        $project3=$this->validate(request(), [
            'cate_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
        ]);
        if ($request->hasFile('cate_img'))
        { 

            $test=DB::select('select media_name from media_categories where media_name=:m limit 1',['m'=>$request->cate_img->getClientOriginalName()]);
            $count=count($test);
           if($count == 0)
           {
                $file_name             = $request->cate_img->getClientOriginalName();
                $x=new Media_categories();
                $x->user_id            = $request->session()->get('user_id');
                $x->cate_id            = request('cate_id');
                
                $request->file('cate_img')->storeas('public/img',$file_name);
                $x->media_path         = 'storage/img/'.$file_name;
                $x->media_name         = $file_name;
                $x->media_status       = "متوفر";
                $x->media_size         = $request->cate_img->getSize();
                $x->media_exten        = $request->cate_img->extension();
                $x->media_status        = request('media_status');
                $x->type_id            = request('img_type');
                $x->save();
           }
           else
           {
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
            {
                
                $msg=["هذة الصورة مدخلة مسبقا"];
                     
                return view('content.cateGallery.AddCateGallery',compact('msg','project','project2'));
            }  
        }
     }
    
     return view('content.cateGallery.AddCateGallery',compact('msg','project','project2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
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
                
                return view('content.cateGallery.gallery');
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
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function editCateImg(Request $request)
    {
        $project=DB::select('select id  , cate_name from categories');
        $project2=DB::select('select type_id  , type_name from media_types');
        $project3=DB::select('select media_categories.media_id ,  media_categories.media_path , media_categories.media_status , media_types.type_id , media_types.type_name , categories.cate_name , categories.id  from media_categories , categories , media_types where media_categories.cate_id=categories.id and media_categories.type_id=media_types.type_id and media_categories.media_id=:c1',[
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
                
                return view('content.cateGallery.UpdateCateGallery' ,compact('project','project2','project3'));
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
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function updateCateImg(Request $request)
    {
       DB::update('update media_categories set cate_id=:c1 , type_id=:c2 , media_status=:c3 where media_id=:c4',[
           'c1'=>request('cate_id'),
           'c2'=>request('img_type'),
           'c3'=>request('media_status'),
           'c4'=>request('media_id')
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
                
                return redirect('/gallery/showCategoriesPhotos');
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
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        DB::update('update media_categories set media_status="غير متوفر" where media_id=:c1',[
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
                
                return redirect('/gallery/showCategoriesPhotos');
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

    public function showCateAdd(Request $request)
    {
        $project=DB::select('select id  , cate_name from categories');
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
                
                return view('content.cateGallery.AddCateGallery' , compact('project','project2'));
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

    public function showCatePhoto(Request $request)
    {
        $project=DB::select('select * from media_categories where media_status="متوفر"');
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
                
                return view('content.cateGallery.ShowCateGallery' , compact('project'));
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
    public function showCatePhoto2(Request $request)
    {
        $project=DB::select('select * from media_categories where media_status="غير متوفر"');
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
                
                return view('content.cateGallery.DeletedCateGallery' , compact('project'));
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
    public function restoreCateImg(Request $request)
    {
        DB::update('update media_categories set media_status="متوفر" where media_id=:c1',[
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
                
                return redirect('/gallery/deletedCategoriesPhotos');
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
