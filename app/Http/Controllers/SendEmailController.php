<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class SendEmailController extends Controller
{
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
                return view('content.Email.FormEmail');
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

    public function send(Request $request)
    {
        $this->validate(request(),
            [
                'email_received'=>['bail','required','email'],
                'email_subject'=>['bail','required'],
                'email_msg'=>['bail','required']
            ]);
            $data=array(
                'email_received'=>request('email_received'),
                'email_subject'=>request('email_subject'),
                'email_msg'=>request('email_msg')
            );
            DB::insert('insert into sendedemails (email_msg , email_sender , email_subject , email_status , email_receiver , email_type)values(:c1 , :c2 , :c3 , :c4 , :c5 , :c6 )',[
                'c1'=> request('email_msg'),
                'c2'=> 'import@hayahfood.com',//email of the company
                'c3'=> request('email_subject'),
                'c4'=> 'متوفر',
                'c5'=> request('email_received'),
                'c6'=> 'ارسال'
            ]);
            Mail::to(request('email_received'))->send(new SendMail($data));
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
               {
                   $msg2=[" تم الارسال بنجاح"];
                   return view('content.Email.FormEmail',compact('msg2'));
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
                        return view('content.Email.Emails',compact('msg2'));
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


    public function sended(Request $request)
    {
        $project=DB::select('select * from sendedemails where email_status=:c2',[
            'c2'=>'متوفر'
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
                
                return view('content.Email.SendedEmails',compact('project'));
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
    public function received(Request $request)
    {
        $project=DB::select('select * from receivedemails where email_status=:c2',[
            'c2'=>'متوفر',
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
                return view('content.Email.ReceivedEmails',compact('project'));
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
    public function deletedSended(Request $request)
    {
        DB::update('update sendedemails set email_status=:c1 where email_id=:c2',[
            'c1'=>'غير متوفر',
            'c2'=>request('email_id')
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
                $msg2=[" تم الحذف بنجاح"];
                $project=DB::select('select * from sendedemails where email_status=:c2',[
                    'c2'=>'متوفر'
                ]);
                return view('content.Email.SendedEmails',compact('msg2','project'));
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
    public function deletedReceived(Request $request)
    {
        DB::update('update receivedemails set email_status=:c1 where email_id=:c2',[
            'c1'=>'غير متوفر',
            'c2'=>request('email_id')
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
                $msg2=[" تم الحذف بنجاح"];
                $project=DB::select('select * from receivedemails where email_status=:c2',[
                    'c2'=>'متوفر'
                ]);
                return view('content.Email.ReceivedEmails',compact('msg2','project'));
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
    public function trash(Request $request)
    {
        $project1=DB::select('select * from sendedemails  where email_status=:c1',[
            'c1'=>'غير متوفر'
        ]);
        $project2=DB::select('select * from receivedemails  where email_status=:c1',[
            'c1'=>'غير متوفر'
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
                return view('content.Email.DeletedEmails',compact('project1','project2'));
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
        if (request('email_type') == 'send')
        {
            DB::update('update sendedemails set email_status=:c1 where email_id=:c2',[
                'c1'=>'متوفر',
                'c2'=>request('email_id')
            ]);

        }
        else
        {
            DB::update('update receivedemails set email_status=:c1 where email_id=:c2',[
                'c1'=>'متوفر',
                'c2'=>request('email_id')
            ]);
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
                $msg2=['تم الاستعادة بنجاح'];
                $project1=DB::select('select * from sendedemails  where email_status=:c1',[
                    'c1'=>'غير متوفر'
                ]);
                $project2=DB::select('select * from receivedemails  where email_status=:c1',[
                    'c1'=>'غير متوفر'
                ]);
                return view('content.Email.DeletedEmails',compact('project1','project2','msg2'));
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
    public function find_sended(Request $request)
    {
        $x=request('search_exited_cate');
        $project=DB::select('select * from sendedemails where email_status=:c1 and email_sender like  "%'.$x.'%"',[
            'c1'=>'متوفر'
        ]);
        $msg=[];
        if(count($project)==0)
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
                return view('content.Email.SendedEmails',compact('project','msg'));
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
    public function find_received(Request $request)
    {
        $x=request('search_exited_cate');
        $project=DB::select('select * from receivedemails where email_status=:c1 and email_sender like  "%'.$x.'%"',[
            'c1'=>'متوفر'
        ]);
        $msg=[];
        if(count($project)==0)
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
                return view('content.Email.ReceivedEmails',compact('project','msg'));
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
    public function find_trash(Request $request)
    {
        $x=request('search_exited_cate');
        $project1=DB::select('select * from sendedemails where email_status=:c1 and email_sender like "%'.$x.'%"',[
            'c1'=>'غير متوفر'
        ]);
        $project2=DB::select('select * from receivedemails where email_status=:c1 and email_sender like "%'.$x.'%"',[
            'c1'=>'غير متوفر'
        ]);
        $msg=[];
        if(count($project1)==0 and count($project2)==0)
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
                return view('content.Email.DeletedEmails',compact('project1','project2','msg'));
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
