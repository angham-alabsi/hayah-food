@extends('hayah_food.ar.header')
@section('title')
    الوسائط
@endsection
@section('content')

<section class="m_block">
<!---------------------HEAD IMAGE---------->

<section class="media_block">
    <img src="/img/food1.jpg">
    
</section>

<!---------------------END HEAD IMAGE---------->

<div class="container ">
    
<!-------------------INTERDUSE------------->    
    
    <div class="row col-md-12 col-sm-12 m-0 ">
        <div class="card col-md-3 col-sm-12">
                <h2>الوسائط</h2>

                <a href="index.php"><h3 id="heading3"><i class="fas fa-home"></i> الرئيسية</h3></a>
                <a href="products.php"><h3 id="heading1"><i class="fas fa-book-reader"></i> منتجاتنا</h3></a> 
                <a href="aboutus.php"><h3 id="heading2"><i class="fas fa-video"></i> من نحن</h3></a> 
        </div>
        
        
        <div class="col-md-9 col-sm-12 para-pro">
            <h3>أفضل المنتجات في مجال الغذاء</h3>
            <p>تدرك حياة فوود أن توفير قائمة متنوعة من المنتجات الغذائية التي تلبي احتياجات جميع أفراد الأسرة يبدأ مع وجود خيارات واسعة من المكونات عالية الجودة. ولذلك فإن مستوى الجودة العالية هي صفة متوارثة ومتجددة في منتجاتنا، مما يمنح المستهلك الثقة والاطمئنان، 
            </p>
        </div>
    </div>
    
<!-------------------End INTERDUSE-------------> 

<!-- Start News -->
    <section class="news_block all-pro1">
        <h4 class="text-right">أخر الأخبار</h4>
        <div class="container text-right">
            <div class="row">
                <div class="col-md-4">
                    <img style="width: 65%;" src="/img/ziad.jpg" alt="news1">
                </div>
                <div class="col-md-8">
                    <h5 style="text-align: justify;">ضمن فعاليات معرض (غولف فوود)،  والذي يقام بدولة الامارات في مركز دبي التجاري العالمي. كان لحياة فوود نصيب من الحضور البارز ممثلة بالسيد زياد القرماني المدير التجاري للشركة .
هذا ويعتبر معرض غولف فوود من اكبر المعارض الغذائية في الشرق الاوسط كونه يستقطب العديد من الشركات والمصانع المهتمة في مجال التصنيع وانتاج المواد الغذائية بكافة أنواعها.
</h5>
                </div>
            </div>
        </div>
    </section>
<!-- End News -->
<!---------------------Section 1---------------> 
    
    <div class="all-pro1">
    <div class="row col-md-12 col-sm-12 m-0  ">
        <div class="col-md-12 col-sm-12  p-0 m-0 ">
            <h4 >منتجاتنا</h4>
            @foreach ($cate_ad as $item)
            <img src="{{$item->media_path}}" width="100%" alt="all product"/> 
            @endforeach
        </div>
    </div>
    
    <div class="row col-md-12 col-sm-12 m-0 ">
        <div class="col-md-12 col-sm-12 all-pro2">
            <h5>منتجات متنوعة</h5>
            <p>
                وتولّي حياة فوود اهتماماً خاصاً بالابتكار في ثقافة الطعام، لقناعتها الراسخة بالتطور المستمر في تقديم وصفات جديدة ونكهات مميزة وخيارات صحية أفضل للمستهلكين، يتم اختيارها بدقة تامة وعناية فائقة لتلبية رغبات الأشخاص الذين يسعون إلى تحدي المألوف ويعشقون اكتشاف كل ما هو جديد في هذا العالم المتسارع.
                
            </p>
        </div>
    </div>
    </div>
 </div>
    
<!-------------------End Section 1-------------> 

<!---------------------SLIDERS----------------> 
{{--<section class="slide-content">
<div class="container  mt-5">
    <div id="carousel-media" class="carousel slide" data-ride="carousel-media">

        <div class="carousel-inner">
            @foreach ($pro_ad as $item)
            <div class="carousel-item active">
                <div class="row  slide-pro">
                    <div class="col-md-7 col-sm-5 ">
                    <h5> {{$item->pro_name}}</h5>
                        <p>
                            {{$item->pro_description}}
                        </p>
                    </div>
                    <div class="col-md-5 col-sm-5 m-0 p-0 text-center">
                        <img src="{{$item->media_path}}"  alt="Hayah food"/>
                    </div> 
                </div>
            </div>
            @endforeach
        </div>


    </div>
</div>
</section>--}}

<section class="slide-content">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($pro_ad as $key => $slider1)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <div class="row  slide-pro">
                    <div class="col-md-1 col-sm-5 " ></div>
                    <div class="col-md-5 col-sm-5 ">
                    <h5> {{$slider1->pro_name}}</h5>
                        <p>
                            {{$slider1->pro_description}}
                        </p>
                    </div>
                    <div class="col-md-5 col-sm-5 m-0 p-0 text-center">
                        <img src="/{{$slider1->media_path}}"  alt="Hayah food"/>
                    </div> 
                    <div class="col-md-1 col-sm-5 " ></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
<!-------------------END SLIDERS-------------> 

<!-------------------SECTION 2-------------> 
    
<div class="container adv">
    <h3>اخر المنتجات</h3>
        <div class="row col-md-12 col-sm-12 adv-part text-center m-0">
            @foreach ($pro_show as $item)
                <div class="col-md col-sm-12 ">
                <h4>{{$item->pro_name}}</h4>
                    <p>
                        {{$item->pro_description}}     
                    </p> 
                </div>
            @endforeach
            <div class="row col-md-12 col-sm-12 text-center m-0">
                @foreach ($pro_show as $item)
                <div class="col-md col-sm-12 text-center">
                <img src="{{$item->media_path}}" alt="hayah_food"/>
                </div>
                @endforeach  
            </div> 
        </div>
</div>

<!-------------------END SECTION 2-------------> 
</section>      
    


@endsection