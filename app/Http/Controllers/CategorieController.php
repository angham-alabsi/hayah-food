<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;


class CategorieController extends Controller
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
                $project = DB::table('categories')->where('cate_status','متوفر')->paginate(10);
                return view('content.categories.ShowCateogries', ['project' => $project]);
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
                $project = DB::table('categories')->where('cate_status','غير متوفر')->paginate(10);
                return view('content.categories.DeletedCateogries', ['project' => $project]);
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
                return view('content.categories.AddCategories');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg=[];
        $project=$this->validate(request(), [
            'cate_name'=>['bail','required','max:100','string','unique:categories','regex:/^[\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}\x{10E60}\x{10E60}—\x{10E7F}\x{1EE00}—\x{1EEFF}]+$/u'],
            'cate_name_en'=>['bail','required','max:100','string','unique:categories','regex:/^[A-Za-z]+(?:[ ][A-Za-z]+)*$/'],
            'cate_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif'] ,
            'cate_description'=>['bail','required','string'],
            'cate_description_en'=>['bail','required','string'] 
        ]);
        if ($request->hasFile('cate_img'))
        { 
           $test=DB::select('select media_name from media_categories where media_name=:m limit 1',['m'=>$request->cate_img->getClientOriginalName()]);
            $count=count($test);
           if($count == 0)
           {
                $x=new Categorie();
                $x->user_id              =$request->session()->get('user_id');
                $x->cate_name            =request('cate_name');
                $x->cate_name_en         =request('cate_name_en');
                $x->cate_status          =request('cate_status');
                $x->cate_description     =request('cate_description');
                $x->cate_description_en  =request('cate_description_en');
                $x->save();
                $c=DB::select('select id from categories where cate_name=:u limit 1',['u'=>request('cate_name')]);
                foreach($c as $y)
                {
                   $cate_id=$y->id;
                }
                $file_name=$request->cate_img->getClientOriginalName();
                $request->file('cate_img')->storeas('public/img',$file_name);
                DB::insert('insert into media_categories (media_path,media_name,media_status,media_size,media_exten,cate_id,type_id,user_id)values(:media_path,:media_name,:media_status,:media_size,:media_exten,:cate_id,:type_id,:user_id)',
                ['media_path'   =>  'storage/img/'.$file_name,
                 'media_name'   =>   $request->cate_img->getClientOriginalName(),
                 'media_status' =>   "متوفر",
                 'media_size'   =>   $request->cate_img->getSize(),
                 'media_exten'  =>   $request->cate_img->extension(),
                 'cate_id'      =>   $cate_id,
                 'type_id'      =>   '1',
                 'user_id'      =>   $request->session()->get('user_id') 
                ]);  
           }
           else
           {
               if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
               {
                   
                   $msg=["هذة الصورة مدخلة مسبقا"];
                        
                   return view('content.categories.AddCategories',compact('msg'));
               }  
           }
        }
       $msg2=['تم الاضافة بنجاح'];
       return view('content.categories.AddCategories',compact('msg2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
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
                
                return view('content.categories.AddCategories');
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
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $cate_id=$request->get('cate_id');
        $categorie=DB::select('select * from categories where id=:i',['i'=>$cate_id]);
        $img_path=DB::select('select media_path from media_categories where type_id=:c1 and cate_id=:c2 order by updated_at  limit 1',['c1'=> 1 ,'c2'=>$cate_id]);
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
                
                return view('content.categories.UpdateCategorie',compact('categorie','img_path'));
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
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $msg=[];
        $cate_id=$request->get('cate_id');
        $categorie=DB::select('select cate_name , cate_name_en from categories where id=:i',['i'=>$cate_id]);
        foreach($categorie as $item)
        {
            $cate=$item->cate_name;
            $cate_en=$item->cate_name_en;

        }
        if ($cate != request('cate_name'))
        {
            $this->validate(request(),
            [
                'cate_name'=>['bail','required','max:100','string','unique:categories','regex:/^[\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}\x{10E60}\x{10E60}—\x{10E7F}\x{1EE00}—\x{1EEFF}]+$/u']
            ]);
            DB::update('update categories set cate_name=:n where id =:i ',
            [
                'n'=>request('cate_name'),
                'i'=>$cate_id
            ]);
        }
        if ($cate_en != request('cate_name_en'))
        {
            $this->validate(request(),
            [
                'cate_name_en'=>['bail','required','max:100','string','unique:categories','regex:/^[A-Za-z]+(?:[ ][A-Za-z]+)*$/']
            ]);
            DB::update('update categories set cate_name_en=:e where id =:i ',
            [
                'e'=>request('cate_name_en'),
                'i'=>$cate_id
            ]);
        }
        DB::update('update categories set cate_status=:s ,updated_at=:u , cate_description=:d1 , cate_description_en=:d2  where id =:i ',
        [
            's'   => request('cate_status'),
            'u'   => date("Y-m-d H:i:s"),
            'i'   => $cate_id,
            'd1'  => request('cate_description'),
            'd2'  => request('cate_description_en')
        ]);
        if ($request->hasFile('cate_img'))
        {
            $this->validate(request(),
            [
                'cate_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
            ]);
            $test=DB::select('select media_name from media_categories where media_name=:m limit 1',['m'=>$request->cate_img->getClientOriginalName()]);
             $count=count($test);
            if($count == 0)
            {
            $file_name=$request->cate_img->getClientOriginalName();
            $request->file('cate_img')->storeas('public/img',$file_name);
            DB::update('update media_categories set media_path=:p , media_name=:n , media_status=:s,  media_exten=:t , updated_at=:u , user_id=:d where cate_id=:i',
            [
                'p'  =>  'storage/img/'.$file_name ,
                'n'  =>  $file_name ,
                's'  =>  "متوفر" ,
                't'  =>  $request->cate_img->extension() ,
                'i'  =>  $cate_id,
                'u'  =>  date("Y-m-d H:i:s"),
                'd'  =>  $request->session()->get('user_id')
            ]);
            }
            else
            {
                if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
                {
                    $msg=["هذة الصورة مدخلة مسبقا"];
                    $cate_id=$request->get('cate_id');
                    $categorie=DB::select('select * from categories where id=:i',['i'=>$cate_id]);
                    $img_path=DB::select('select media_path from media_categories where type_id=:c1 and cate_id=:c2 order by updated_at  limit 1',['c1'=> 1 ,'c2'=>$cate_id]);
                    return view('content.categories.UpdateCategorie',compact('categorie','img_path','msg'));
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
                $project = DB::select('select * from categories where cate_status=:c1',[
                    'c1'=>'متوفر'
                ]);
                return view('content.categories.ShowCateogries', ['project' => $project,'msg2'=>$msg2]);
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
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         DB::update("update categories set cate_status='غير متوفر' , updated_at=:u where id=:c",
         ['c'=>$request->cate_id,
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
                $msg2=['تم الحذف  بنجاح'];
                $project = DB::select('select * from categories where cate_status=:c1',[
                    'c1'=>'متوفر'
                ]);
                return view('content.categories.ShowCateogries', ['project' => $project,'msg2'=>$msg2]);
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
         DB::update("update categories set cate_status='متوفر' , updated_at=:u where id=:c",
         ['c'=>$request->cate_id,
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
                $project = DB::select('select * from categories where cate_status=:c1',[
                    'c1'=>'غير متوفر'
                ]);
                return view('content.categories.DeletedCateogries', ['project' => $project,'msg2'=>$msg2]);
                return redirect('/categories/DeletedCateogries');
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
        $project=DB::table('categories')->where('cate_name','like','%'.$x.'%')->where('cate_status','=','متوفر')->paginate(10);
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
                return view('content.categories.ShowCateogries', ['project' => $project,'msg'=>$msg]);
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
        $project=DB::table('categories')->where('cate_name','like','%'.$x.'%')->where('cate_status','=','غير متوفر')->paginate(10);
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
                return view('content.categories.DeletedCateogries', ['project' => $project,'msg'=>$msg]);
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
