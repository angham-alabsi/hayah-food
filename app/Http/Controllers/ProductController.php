<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project = DB::select('select products.pro_id , products.pro_status , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and products.pro_status="متوفر"');
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
                
                return view('content.products.ShowProducts', ['project' => $project]);
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
        $project = DB::select('select products.pro_id , products.pro_status , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and products.pro_status="غير متوفر"');
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
                return view('content.products.DeletedProducts', ['project' => $project]);
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
    public function create(Request $request)
    {
        $categorie=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
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
                return view('content.products.AddProducts',compact('categorie','brand'));
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
        $categorie=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        $project=$this->validate(request(),
        [
            'pro_name'=>['bail','required','max:100','string','unique:products','regex:/^[\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}\x{10E60}\x{10E60}—\x{10E7F}\x{1EE00}—\x{1EEFF}]+$/u'],
            'pro_name_en'=>['bail','required','max:100','string','unique:products','regex:/^[A-Za-z]+(?:[ ][A-Za-z]+)*$/'],
            'pro_weight'=>['required'],
            'pro_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
        ]);
        if ($request->hasFile('pro_img'))
        { 
           $test=DB::select('select media_name from media_products where media_name=:m limit 1',['m'=>$request->pro_img->getClientOriginalName()]);
            $count=count($test);
           if($count == 0)
           {
                $x=new Product();
                $x->user_id=$request->session()->get('user_id');
                $x->pro_name=request('pro_name');
                $x->pro_name_en=request('pro_name_en');
                $x->pro_status=request('pro_status');
                $x->cate_id=request('cate_name');
                $x->brand_id=request('brand_name');
                $x->pro_unit=request('pro_unit');
                $x->pro_weight=request('pro_weight');
                $x->pro_description=request('pro_description');
                $x->pro_description_en=request('pro_description_en');
                $x->save();
                $c=DB::select('select pro_id from products where pro_name=:u limit 1',['u'=>request('pro_name')]);
                foreach($c as $y)
                {
                   $pro_id=$y->pro_id;
                }
                $file_name=$request->pro_img->getClientOriginalName();
                $request->file('pro_img')->storeas('public/img',$file_name);
                DB::insert('insert into media_products (media_path,media_name,media_status,media_size,media_exten,pro_id,type_id,user_id)values(:media_path,:media_name,:media_status,:media_size,:media_exten,:pro_id,:type_id,:user_id)',
                ['media_path'   =>  'storage/img/'.$file_name,
                 'media_name'   =>   $request->pro_img->getClientOriginalName(),
                 'media_status' =>   "متوفر",
                 'media_size'   =>   $request->pro_img->getSize(),
                 'media_exten'   =>  $request->pro_img->extension(),
                 'pro_id'       =>   $pro_id,
                 'type_id'      =>   1 ,
                 'user_id'      =>   $request->session()->get('user_id')
                ]);  
           }
           else
           {
               if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
               {
                   $msg=["هذة الصورة مدخلة مسبقا"];
                   return view('content.products.AddProducts',compact('categorie','brand','msg'));
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
                return view('content.products.AddProducts',compact('categorie','brand','msg2'));
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Request $request)
    {
        $pro_id=request('pro_id');
        $categorie=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        $project = DB::select('select products.pro_id , products.cate_id , products.brand_id , products.pro_name_en , products.pro_status , products.pro_unit , products.pro_weight , products.pro_description , products.pro_description_en , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and pro_id=:p',['p'=>$pro_id]);
        $img_path=DB::select('select media_path from media_products where type_id=:c1 and pro_id=:c2 order by updated_at  limit 1',['c1'=> 1 ,'c2'=>$pro_id]);
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
                return view('content.products.UpdateProducts',compact('project','categorie','brand','img_path'));
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $msg=[];
        $pro_id=$request->get('pro_id');
        $product=DB::select('select pro_name , pro_name_en from products where pro_id=:i',['i'=>$pro_id]);
        foreach($product as $item)
        {
            $pro_name=$item->pro_name;
            $pro_name_en=$item->pro_name_en;

        }
        if ($pro_name != request('pro_name'))
        {
            $this->validate(request(),
            [
                'pro_name'=>['bail','required','max:100','string','unique:products','regex:/^[\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}\x{10E60}\x{10E60}—\x{10E7F}\x{1EE00}—\x{1EEFF}]+$/u']
            ]);
            DB::update('update products set pro_name=:n where pro_id =:i ',
            [
                'n'=>request('pro_name'),
                'i'=>$pro_id
            ]);
        }
        if ($pro_name_en != request('pro_name_en'))
        {
            $this->validate(request(),
            [
                'pro_name_en'=>['bail','required','max:100','string','unique:products','regex:/^[A-Za-z]+(?:[ ][A-Za-z]+)*$/']
            ]);
            DB::update('update products set pro_name_en=:e where pro_id =:i ',
            [
                'e'=>request('pro_name_en'),
                'i'=>$pro_id
            ]);
        }
        DB::update('update products set pro_status=:s , updated_at=:u , cate_id=:c , brand_id=:b , pro_unit=:n , pro_weight=:w , pro_description=:d , pro_description_en=:de where pro_id =:i ',
        [
            's'=>request('pro_status'),
            'u'=>date("Y-m-d H:i:s"),
            'i'=>$pro_id,
            'c'=>request('cate_name'),
            'b'=>request('brand_name'),
            'n'=>request('pro_unit'),
            'w'=>request('pro_weight'),
            'd'=>request('pro_description'),
            'de'=>request('pro_description_en')
        ]);
        if ($request->hasFile('pro_img'))
        {
            $this->validate(request(),
            [
                'pro_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
            ]);
            $test=DB::select('select media_name from media_products where media_name=:m limit 1',['m'=>$request->pro_img->getClientOriginalName()]);
             $count=count($test);
            if($count == 0)
            {
            $file_name=$request->pro_img->getClientOriginalName();
            $request->file('pro_img')->storeas('public/img',$file_name);
            DB::update('update media_products set media_path=:p , media_name=:n , media_status=:s , media_size=:ms ,  media_exten=:t where pro_id=:i',
            [
                'p'  =>  'storage/img/'.$file_name ,
                'n'  =>  $file_name ,
                's'  =>  "متوفر" ,
                't'  =>  $request->pro_img->extension() ,
                'i'  =>  $pro_id,
                'ms' =>  $request->pro_img->getSize()
            ]);
            }
            else
            {
                if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
                {
                    $msg=["هذة الصورة مدخلة مسبقا"];  
                    $pro_id=$request->get('pro_id');
                    $pro_id=request('pro_id');
                    $categorie=DB::table('categories')->get();
                    $brand=DB::table('brands')->get();
                    $project = DB::select('select products.pro_id , products.cate_id , products.brand_id , products.pro_name_en , products.pro_status , products.pro_unit , products.pro_weight , products.pro_description , products.pro_description_en , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and pro_id=:p',['p'=>$pro_id]);
                    $img_path=DB::select('select media_path from media_products where type_id=:c1 and pro_id=:c2 order by updated_at  limit 1',['c1'=> 1 ,'c2'=>$pro_id]);
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
                            return view('content.products.UpdateProducts',compact('categorie','img_path','brand','project','msg'));
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
                    $project = DB::select('select products.pro_id , products.pro_status , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and products.pro_status="متوفر"');
                    return view('content.products.ShowProducts', ['project' => $project,'msg2'=>$msg2]);
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         DB::update("update products set pro_status='غير متوفر' , updated_at=:u where pro_id=:c",
         ['c'=>$request->pro_id,
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
                    $project = DB::select('select products.pro_id , products.pro_status , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and products.pro_status="متوفر"');
                    return view('content.products.ShowProducts', ['project' => $project,'msg2'=>$msg2]);
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
         DB::update("update products set pro_status='متوفر' , updated_at=:u where pro_id=:c",
         ['c'=>$request->pro_id,
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
                    $project = DB::select('select products.pro_id , products.pro_status , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and products.pro_status="غير متوفر"');
                    return view('content.products.DeletedProducts', ['project' => $project,'msg2'=>$msg2]);
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
        $project = DB::select('select products.pro_id , products.pro_status , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and products.pro_status="متوفر" and products.pro_name like "%'.$x.'%" ');
        /*$project=DB::table('products')->where('pro_name','like','%'.$x.'%')->where('pro_status','=','متوفر')->paginate(10);*/
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
                    return view('content.products.ShowProducts', ['project' => $project,'msg'=>$msg]);
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
        $x=$request->get('search_exited_cate');
        $project = DB::select('select products.pro_id , products.pro_status , products.pro_name , categories.cate_name , brands.brand_name from products,categories,brands where  products.cate_id=categories.id and products.brand_id=brands.brand_id and products.pro_status="غير متوفر" and products.pro_name like "%'.$x.'%" ');
        /*$project=DB::table('products')->where('pro_name','like','%'.$x.'%')->where('pro_status','=','غير متوفر')->paginate(10);*/
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
                return view('content.products.DeletedProducts', ['project' => $project,'msg'=>$msg]);
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
