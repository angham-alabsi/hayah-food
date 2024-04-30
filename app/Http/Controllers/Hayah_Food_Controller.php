<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecevierMail;

class Hayah_Food_Controller extends Controller
{
    public function products_page()
    {
        $project=DB::select('select categories.cate_name , categories.cate_name_en , media_categories.media_path from categories,media_categories where categories.id = media_categories.cate_id and media_categories.type_id =1 and categories.cate_status="متوفر" and media_categories.media_status="متوفر"');
        return view('hayah_food.ar.products',compact('project'));
    }
    public function products_details_page()
    {
        $cate=request('name');
        $project=DB::select('select categories.cate_name , categories.cate_description , media_categories.media_path from categories,media_categories where categories.id = media_categories.cate_id and media_categories.type_id =4 and categories.cate_status="متوفر" and media_categories.media_status="متوفر" and categories.cate_name_en=:c1  ORDER BY RAND() limit 1',['c1'=>$cate]);
        $project2=DB::select('select products.pro_name , media_products.media_path from products,media_products where products.pro_id = media_products.pro_id and products.cate_id=(select id from categories where cate_name_en=:c1)and media_products.type_id=1 ',['c1'=>$cate]);
        return view('hayah_food.ar.details',compact('project','project2'));
    }
    public function index()
    {
        $sliders=DB::select('select media_path from media_categories where type_id=3 and media_status="متوفر" order by  rand() limit 4');
        $adv_pro1=DB::select('select media_path from media_products where type_id=2 and media_status="متوفر" order by  rand() limit 1');
        $adv_pro2=DB::select('select products.pro_name , products.pro_description , media_products.media_path  from media_products , products where media_products.pro_id=products.pro_id and media_products.type_id=4 and media_products.media_status="متوفر" and products.pro_status="متوفر"  order by  media_products.updated_at desc limit 1');
        $cate=DB::select('select categories.cate_name , media_categories.media_path FROM media_categories , categories WHERE media_categories.type_id=4 and categories.cate_name=(SELECT cate_name FROM categories WHERE id=media_categories.cate_id and cate_status="متوفر") and media_categories.media_status="متوفر" GROUP BY media_categories.cate_id ORDER BY media_categories.updated_at DESC limit 8');
        $count_pro=[count(DB::select('select pro_id from products'))];
        $count_brand =[count(DB::select('select brand_id from brands'))];
        $adv_cate=DB::select('select categories.cate_name , categories.cate_description , media_categories.media_path  from media_categories , categories where media_categories.cate_id=categories.id and media_categories.type_id=4 and media_categories.media_status="متوفر" and categories.cate_status="متوفر"  order by  media_categories.updated_at desc limit 2');
        $brand=DB::select('select media_path from media_brands where type_id=1 and media_status="متوفر"');
        return view('hayah_food.ar.index',compact('sliders','adv_pro1','adv_pro2','cate','brand','count_pro','count_brand','adv_cate'));
    }
    public function media()
    {
        $cate_ad=DB::select('select media_path from media_categories where type_id=2 and media_status="متوفر" order by rand() limit 1');
        $pro_show=DB::select('select products.pro_name , products.pro_description , media_products.media_path  from media_products , products where media_products.pro_id=products.pro_id and media_products.type_id=4 and media_products.media_status="متوفر" and products.pro_status="متوفر"  order by  media_products.updated_at desc limit 2');
        $pro_ad=DB::select('select products.pro_name , products.pro_description , media_products.media_path  from media_products , products where media_products.pro_id=products.pro_id and media_products.type_id=4 and media_products.media_status="متوفر" and products.pro_status="متوفر"  order by  media_products.updated_at desc limit 10');
        return view ('hayah_food.ar.media',compact('cate_ad','pro_show','pro_ad'));
    }

    public function contactus()
    {
        return view ('hayah_food.ar.contactus');
    }

    public function contactus_send()
    {
        $x=$this->validate(request(),
        [
            'sender_name'=>['bail','required','min:2','max:50'],
            'sender_email'=>['bail','required','email'],
            'subject'=>['bail','required'],
            'msg'=>['bail','required']
        ]);
        $data=array(
            'sender_email'=>request('sender_email'),
            'subject'=>request('subject'),
            'msg'=>request('msg')
        );
        DB::insert('insert into receivedemails (email_msg , email_sender , email_subject , email_status , email_receiver , email_type)values(:c1 , :c2 , :c3 , :c4 , :c5 , :c6 )',[
            'c1'=> request('msg'),
            'c2'=> request('sender_email'),
            'c3'=> request('subject'),
            'c4'=> 'متوفر',
            'c5'=> 'import@hayahfood.com',
            'c6'=> 'استقبال'
        ]);
        Mail::to('anghamalabsi22@gamil.com')->send(new RecevierMail($data));
        $msg2=[" تم الارسال بنجاح"];
        return view ('hayah_food.ar.contactus',compact('msg2'));
    }


}
