<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
                $project2=DB::select('select pro_name from products where brand_id in (select brand_id from brands group by brand_id)');
                $project = DB::select('select * from brands where brand_status="متوفر"');
                return view('content.brands.ShowBrands', ['project' => $project,'project2'=>$project2]);
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

    public function index2(Request $request)
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
                $project = DB::table('brands')->where('brand_status','غير متوفر')->paginate(10);
                return view('content.brands.DeletedBrands', ['project' => $project]);
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
    public function store(Request $request)
    {
        $msg=[];
        $project=$this->validate(request(), [
            'brand_name'=>['bail','required','max:100','string','unique:brands','regex:/^[\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}\x{10E60}\x{10E60}—\x{10E7F}\x{1EE00}—\x{1EEFF}]+$/u'],
            'brand_name_en'=>['bail','required','max:100','string','unique:brands','regex:/^[A-Za-z]+(?:[ ][A-Za-z]+)*$/'],
            'brand_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif'] , 
        ]);
        if ($request->hasFile('brand_img'))
        { 
           $test=DB::select('select media_name from media_brands where media_name=:m limit 1',['m'=>$request->brand_img->getClientOriginalName()]);
            $count=count($test);
           if($count == 0)
           {
                $x=new Brand();
                $x->user_id=$request->session()->get('user_id');
                $x->brand_name=request('brand_name');
                $x->brand_name_en=request('brand_name_en');
                $x->brand_status=request('brand_status');
                $x->save();
                $c=DB::select('select brand_id from brands where brand_name=:u limit 1',['u'=>request('brand_name')]);
                foreach($c as $y)
                {
                   $brand_id=$y->brand_id;
                }
                $file_name=$request->brand_img->getClientOriginalName();
                $request->file('brand_img')->storeas('public/img',$file_name);
                DB::insert('insert into media_brands (media_path,media_name,media_status,media_size,media_exten,brand_id,type_id,user_id)values(:media_path,:media_name,:media_status,:media_size,:media_exten,:brand_id,:type_id,:user_id)',
                ['media_path'    =>  'storage/img/'.$file_name,
                 'media_name'    =>   $request->brand_img->getClientOriginalName(),
                 'media_status'  =>   "متوفر",
                 'media_size'    =>   $request->brand_img->getSize(),
                 'media_exten'   =>   $request->brand_img->extension(),
                 'brand_id'      =>   $brand_id,
                 'type_id'       =>   1 ,
                 'user_id'       =>   $request->session()->get('user_id')
                ]);  
           }
           else
           {
               if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
               {
                   
                   $msg=["هذة الصورة مدخلة مسبقا"];
                   return view('content.brands.AddBrands',compact('msg'));
               }  
           }
        }
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
                $msg2=['تم الاضافة بنجاح'];
                return view('content.brands.AddBrands',compact('msg2'));
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
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
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
                
                return view('content.brands.AddBrands');
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
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $brand_id=$request->get('brand_id');
        $brand=DB::select('select * from brands where brand_id=:i',['i'=>$brand_id]);
        $img=DB::select('select * from media_types where type_id=(select type_id from media_brands where brand_id=:n)',['n'=>$brand_id]);
        $type=DB::select('select * from media_types');
        $img_path=DB::select('select media_path from media_brands where type_id=:c1 and brand_id=:c2 order by updated_at  limit 1',['c1'=> 1 ,'c2'=>$brand_id]);
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
                return view('content.brands.Updatebrands',compact('brand','img','type','img_path'));
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
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $msg=[];
        $brand_id=$request->get('brand_id');
        $brand=DB::select('select brand_name , brand_name_en from brands where brand_id=:i',['i'=>$brand_id]);
        foreach($brand as $item)
        {
            $brand=$item->brand_name;
            $brand_en=$item->brand_name_en;

        }
        if ($brand != request('brand_name'))
        {
            $this->validate(request(),
            [
                'brand_name'=>['bail','required','max:100','string','unique:brands','regex:/^[\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}\x{10E60}\x{10E60}—\x{10E7F}\x{1EE00}—\x{1EEFF}]+$/u']
            ]);
            DB::update('update brands set brand_name=:n where brand_id =:i ',
            [
                'n'=>request('brand_name'),
                'i'=>$brand_id
            ]);
        }
        if ($brand_en != request('brand_name_en'))
        {
            $this->validate(request(),
            [
                'brand_name_en'=>['bail','required','max:100','string','unique:brands','regex:/^[A-Za-z]+(?:[ ][A-Za-z]+)*$/']
            ]);
            DB::update('update brands set brand_name_en=:e where brand_id =:i ',
            [
                'e'=>request('brand_name_en'),
                'i'=>$brand_id
            ]);
        }
        DB::update('update brands set brand_status=:s ,updated_at=:u where brand_id =:i ',
        [
            's'=>request('brand_status'),
            'u'=>date("Y-m-d H:i:s"),
            'i'=>$brand_id
        ]);
        if ($request->hasFile('brand_img'))
        {
            $this->validate(request(),
            [
                'brand_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
            ]);
            $test=DB::select('select media_name from media_brands where media_name=:m limit 1',['m'=>$request->brand_img->getClientOriginalName()]);
             $count=count($test);
            if($count == 0)
            {
            $file_name=$request->brand_img->getClientOriginalName();
            $request->file('brand_img')->storeas('public/img',$file_name);
            DB::update('update media_brands set media_path=:p , media_name=:n , media_status=:s,  media_exten=:t , updated_at=:u , user_id=:d where brand_id=:i',
            [
                'p'  =>  'storage/img/'.$file_name ,
                'n'  =>  $file_name ,
                's'  =>  "متوفر" ,
                't'  =>  $request->brand_img->extension() ,
                'i'  =>  $brand_id,
                'u'  =>  date("Y-m-d H:i:s"),
                'd'  =>  $request->session()->get('user_id')
            ]);
            }
            else
            {
                if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
                {
                    $msg=["هذة الصورة مدخلة مسبقا"];
                    $brand_id=$request->get('brand_id');
                    $brand=DB::select('select * from brands where brand_id=:i',['i'=>$brand_id]);
                    $img_path=DB::select('select media_path from media_brands where type_id=:c1 and brand_id=:c2 order by updated_at  limit 1',['c1'=> 1 ,'c2'=>$brand_id]);
                    return view('content.brands.updatebrands',compact('brand','img_path','msg'));
                }  
            } 
        }
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
                $msg2=['تم التعديل بنجاح'];
                $project = DB::select('select * from brands where brand_status=:c1',[
                    'c1'=>'متوفر'
                ]);
                return view('content.brands.ShowBrands', ['project' => $project,'msg2'=>$msg2]);
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
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::update("update brands set brand_status='غير متوفر' , updated_at=:u where brand_id=:c",
         ['c'=>$request->brand_id,
          'u'=>date("Y-m-d H:i:s")
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
                    $msg2=['تم الحذف بنجاح'];
                    $project = DB::select('select * from brands where brand_status="متوفر"');
                    return view('content.brands.ShowBrands', ['project' => $project,'msg2'=>$msg2]);
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

    public function restore(Request $request)
    {
        DB::update("update brands set brand_status='متوفر' , updated_at=:u where brand_id=:c",
         ['c'=>$request->brand_id,
          'u'=>date("Y-m-d H:i:s")
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
                    $msg2=['تم الاستعادة بنجاح'];
                    $project = DB::select('select * from brands where brand_status="غير متوفر"');
                    return view('content.brands.DeletedBrands', ['project' => $project,'msg2'=>$msg2]);
                    
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

    public function search_available(Request $request)
    {
        $x=$request->get('search_exited_cate');
        $project=DB::table('brands')->where('brand_name','like','%'.$x.'%')->where('brand_status','=','متوفر')->paginate(10);
        $conuter=count($project);
        $msg=[];
        if ($conuter == 0)
        {
            $msg=["لا توجد نتائج مشابهة"];
        }
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
                return view('content.brands.ShowBrands', ['project' => $project,'msg'=>$msg]);
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

    public function search_unavailable(Request $request)
    {
        $x=$request->get('search_exited_cate');
        $project=DB::table('brands')->where('brand_name','like','%'.$x.'%')->where('brand_status','=','غير متوفر')->paginate(10);
        $conuter=count($project);
        $msg=[];
        if ($conuter == 0)
        {
            $msg=["لا توجد نتائج مشابهة"];
        }
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
                return view('content.brands.DeletedBrands', ['project' => $project,'msg'=>$msg]);
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

