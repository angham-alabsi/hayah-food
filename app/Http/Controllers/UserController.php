<?php

namespace App\Http\Controllers;

use App\User;
use App\User_details;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//---------------Users-----------------
    public function index3(Request $request)
    {
        if ($request->session()->has('user_id'))
        {
            $project=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($project as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                return view('user.user');
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

    public function showUsers(Request $request)
    {
        $project=DB::select('select * from users where user_status=:c1',[
            'c1'=>"مفعل"]);
        if ($request->session()->has('user_id'))
        {
            $p=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($p as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                return view('user.showUsers',compact('project'));
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

    public function showDeletedUsers(Request $request)
    {
        $project=DB::select('select * from users where user_status=:c1',[
            'c1'=>"غير مفعل "]);
        if ($request->session()->has('user_id'))
        {
            $p=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($p as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status ==  'مفعل')
            {
                return view('user.deletedUsers',compact('project'));
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

    public function addUserShow(Request $request)
    {
        if ($request->session()->has('user_id'))
        {
            $p=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($p as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                return view('user.addUsers');
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

    public function storeUser(Request $request)
    {
        $msg=[];
        $msg2=[];
        $project=$this->validate(request(), [
            'user_name'=>['bail','required','max:100','string','unique:users'],
            'user_fullname'=>['bail','required','max:200','string'],
            'user_password'=>['bail','required','min:6','string','confirmed'],
            'user_email'=>['bail','required','string','email','max:100'],
            'user_birthday'=>['bail','required','date'],
            'user_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
        ]);
         if ($request->hasFile('user_img'))
        { 
           /*$test=DB::select('select media_name from user_details where media_name=:m limit 1',['m'=>$request->user_img->getClientOriginalName()]);
            $count=count($test);
           if($count == 0)
           {*/
                $x=new User();
                $x->user_name      = request('user_name');
                $x->user_password  = sha1(request('user_password'));
                $x->user_email     = request('user_email');
                $x->user_type      = request('user_type');
                $x->user_status    = request('user_status');
                $x->save();
                $c=DB::select('select user_id from users where user_name=:u limit 1',['u'=>request('user_name')]);
                foreach($c as $y)
                {
                   $user_id=$y->user_id;
                }
                $file_name=$request->user_img->getClientOriginalName();
                $request->file('user_img')->storeas('public/img',$file_name);
                $y=new User_details();
                $y->user_gander     = request('user_gander');
                $y->user_birthday   = request('user_birthday');
                $y->user_fullname   = request('user_fullname');
                $y->user_fullname   = request('user_fullname');
                $y->user_id         = $user_id;
                $y->media_path      = 'storage/img/'.$file_name;
                $y->media_name      =  $file_name;
                $y->media_size      =  $request->user_img->getSize();
                $y->media_exten     =  $request->user_img->extension();
                $y->save();  
           /*}
           else
           {
               if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
               {
                   
                   $msg=["هذة الصورة مدخلة مسبقا"];
                        
                   return view('user.addUsers',compact('msg'));
               }  
            }*/
        }
        $msg2=["تم الاضافة بنجاح"];
        return view('user.addUsers',compact('msg2'));
    }

    public function editUsers(Request $request)
    {
        $user_id=$request->get('user_id');

        $project2=DB::select('select * from users where user_id=:i',['i'=>$user_id]);
        $project1=DB::select('select * from user_details where user_id=:n',['n'=>$user_id]);
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
                
                return view('user.updateUsers',compact('project1','project2'));
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

    public function updateUser(Request $request)
    {
        $msg=[];
        $msg2=[];
        $user_id=$request->get('user_id');
        $users=DB::select('select user_name from users where user_id=:i limit 1',['i'=>$user_id]);
        foreach($users as $item)
        {
            $user=$item->user_name;
        }
        
        if ($user != request('user_name'))
        {
            $this->validate(request(),
            [
                'user_name'=>['bail','required','max:100','string','unique:users'],
            ]);
            DB::update('update users set user_name=:c1 , updated_at=:c8 where user_id =:i ',
            [
                'c1'=>request('user_name'),
                'c8'=>date("Y-m-d H:i:s"),
                'i'=>$user_id
            ]);
        }
        $this->validate(request(),
            [
                'user_fullname'=>['bail','required','max:200','string'],
                'user_email'=>['bail','required','string','email','max:100'],
                'user_birthday'=>['bail','required','date']
            ]);
        DB::update('update users set user_email=:c3 ,user_type=:c6 , user_status=:c7 , updated_at=:c8 where user_id =:i ',
        [
            'c3'=>request('user_email'),
            'c6'=>request('user_type'),
            'c7'=>request('user_status'),
            'c8'=>date("Y-m-d H:i:s"),
            'i'=>$user_id
        ]);
        DB::update('update user_details set  user_fullname=:c2 , user_gander=:c5 , user_birthday=:c4 ,  updated_at=:c8 where user_id =:i ',
        [
            'c4'=>request('user_birthday'),
            'c5'=>request('user_gander'),
            'c2'=>request('user_fullname'),
            'c8'=>date("Y-m-d H:i:s"),
            'i'=>$user_id
        ]);
        if ($request->hasFile('user_img'))
        {
            $this->validate(request(),
            [
                'user_img'=>['bail','required','max:120000','mimes:jpg,jpeg,png,gif']
            ]);
            $test=DB::select('select media_name from user_details where media_name=:m limit 1',['m'=>$request->user_img->getClientOriginalName()]);
             $count=count($test);
            if($count == 0)
            {
            $file_name=$request->user_img->getClientOriginalName();
            $request->file('user_img')->storeas('public/img',$file_name);
            DB::update('update user_details set media_path=:p , media_name=:n , media_size=:s , media_exten=:t , updated_at=:u  where user_id=:i',
            [
                'p'  =>  'storage/img/'.$file_name ,
                'n'  =>  $file_name ,
                's'  =>  $request->user_img->getSize(),
                't'  =>  $request->user_img->extension() ,
                'i'  =>  $user_id,
                'u'  =>  date("Y-m-d H:i:s")
            ]);
            }
            else
            {
                if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
                {
                    $msg=["هذة الصورة مدخلة مسبقا"];
                    $user_id=$request->get('user_id');
                    $project2=DB::select('select * from users where user_id=:i',['i'=>$user_id]);
                    $project1=DB::select('select * from user_details where user_id=:n',['n'=>$user_id]);
                    return view('users.UpdateUsers',compact('project1','project2','msg'));
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
                $project=DB::select('select * from users where user_status=:c1',[
                    'c1'=>"مفعل"]);
                return view('user.showUsers',compact('msg2','project'));
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

    public function deletedUser(Request $request)
    {
        DB::update("update users set user_status='غير مفعل' , updated_at=:u where user_id=:c",
         ['c'=>request('user_id'),
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
                $msg2=['تم الغاء تفعيل الحساب'];
                $project=DB::select('select * from users where user_status=:c1',[
                    'c1'=>"مفعل"]);
                return view('user.showUsers',compact('msg2','project'));
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


    public function restoreUser(Request $request)
    {
        DB::update("update users set user_status='مفعل' , updated_at=:u where user_id=:c",
         ['c'=>request('user_id'),
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
                $msg2=['تم تفعيل الحساب'];
                $project=DB::select('select * from users where user_status=:c1',[
                    'c1'=>"غير مفعل"]);
                return view('user.deletedUsers',compact('msg2','project'));
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
        $msg2=[];
        $x=$request->get('search_exited_cate');
        $project=DB::table('users')->where('user_name','like','%'.$x.'%')->where('user_status','=','مفعل')->paginate(10);
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
                return view('user.ShowUsers', ['project' => $project,'msg'=>$msg2]);
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
        $msg2=[];
        $x=$request->get('search_exited_cate');
        $project=DB::table('users')->where('user_name','like','%'.$x.'%')->where('user_status','=','غيرمفعل')->paginate(10);
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
                return view('user.deletedUsers', ['project' => $project,'msg'=>$msg]);
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

    public function userProfile(Request $request)
    {
        if ($request->session()->has('user_id'))
        {
                $user_id=$request->session()->get('user_id');
                $use1=DB::select('select * from users where user_id=:c1',[
                'c1'=>$user_id]);
                $use2=DB::select('select * from user_details where user_id=:c1',[
                    'c1'=>$user_id]);
                foreach($use1 as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                return view('user.userProfile', ['use1' => $use1,'use2'=>$use2]);
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


//---------------Users-----------------

    public function index(Request $request)
    {
         $x=DB::select('select user_id,user_name,user_password from users where user_name=:u and user_password=:p limit 1',['u'=>request('user_name'),'p'=>sha1(request('user_password'))]);
         $count =count($x);
        if ($count > 0)
        {
            foreach($x as $y)
            {
                $request->session()->put('user_id',$y->user_id);
                $request->session()->put('user_name',$y->user_name);
            }
            $z=DB::select('select media_path from user_details where user_id=(select user_id from users where user_id=:c1 limit 1)',['c1'=>$request->session()->get('user_id')]);
            foreach($z as $y2)
            {
                $request->session()->put('media_path',$y2->media_path);
            }
            
            return redirect('/statistics');
        }
        
        else
        {
            $msg=[];
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
            {$msg=['اسم المستخدم او كلمة السر التي ادخلتها غير صحيح'];}
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
        //return view('user.signin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*$project=$this->validate(request(), [
            'user_name'=>['bail','required','max:100','string','unique:users'],
            'user_password'=>['bail','required','min:6','string','confirmed'],
            'user_email'=>['bail','required','string','email','max:100']
        ]);
         $x=new User();
         $x->user_name=request('user_name');
         $x->user_password=sha1(request('user_password'));
         $x->user_email=request('user_email');
         $x->user_type=request('t6');
         $x->user_status='مفعل';
         $x->save();
         //return redirect('/login');*/  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function passwordResetShow(Request $request)
    {
        return view('user.password_reset');
    }

    public function passwordReset(Request $request)
    {
        $x=DB::select('select user_name from users where user_name=:e  limit 1',['e'=>request('user_name')]);   
        $count = count($x);
        if ($count > 0)
        {
            $project=$this->validate(request(), [
                
                'user_password'=>['bail','required','min:6','string','confirmed'],
            ]);
            DB::update('update users set user_password=:c1 ',['c1'=>sha1(request('user_password'))]);
            $msg2=['تم تغير كلمة السر بالامكان تسجيل الدخول'];
            return view('user.login',compact('msg2'));
        }
        else
        {
            $msg=[];
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
            $msg=['اسم المستخدم غير صحيح'];
            return view('user.password_reset',compact('msg'));

        }

    }
    public function index2()
    {
        if ($request->session()->has('user_id'))
        {
            $project=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($project as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                return view('welcome',compact('project'));
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
    public function check(Request $request)
    {
        if ($request->session()->has('user_id'))
        {
            $project=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($project as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                return view('welcome',compact('project'));
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

    public function showstats(Request $request)
    {
        if ($request->session()->has('user_id'))
        {
            $project=DB::select('select * from users where user_id=:c1',[
                'c1'=>$request->session()->get('user_id')]);
                foreach($project as $item)
                {
                    $user_status=$item->user_status;
                }
            if( $user_status == 'مفعل')
            {
                DB::update('update hf_info set user_count=(select count(user_id) from users) , brand_count=(select count(brand_id) from brands), product_count=(select count(pro_id) from products), cate_count=(select count(id) from categories), db_size=(SELECT SUM(ROUND(((DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024), 2)) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "hayah_fp") where info_id=1' );
                $project=DB::select('select * from hf_info  where info_id=1');
                return view('content.statistics.statistics',compact('project'));
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
