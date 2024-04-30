$(document).ready(function(){
    $(".lines_btn").click(function(){
        $(".left_aside").slideToggle('slow');
    });

    $(".user_info").click(function(){
        $(".user_card").slideToggle('slow');
    });
    });

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
      };


      
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });


    /*$(document).ready(function(){
        $("#cate").click(function(){
          $(".cate_show").css("display","block");
          });

        });

    $(document).ready(function(){
    $(".left_aside a").click(function(){
    var test;
    test=$(this).text();
    switch (test)
    {
        case "الاحصائيات":
        $(".statistics").show();
        $(".cate").hide();
        $(".brand").hide();
        $(".product").hide();
        $(".emails").hide();
        $("").hide();
        
        break;

        case "الاصناف":
        $(".cate").show();
        $(".statistics").hide();
        $(".brand").hide();
        $(".product").hide();
        $(".emails").hide();
        $("").hide();
        
        //window.location.replace('http://127.0.0.1:8000/welcome/categorie');
        //location.reload(false);
        //location.reload(true);
        break;
        
        case "الوكالات":
        $(".brand").show();
        $(".statistics").hide();
        $(".cate").hide();
        $(".product").hide();
        $(".emails").hide();
        $("").hide();
        break;

        case "المنتجات":
        $(".product").show();
        $(".statistics").hide();
        $(".cate").hide();
        $(".brand").hide();
        $(".emails").hide();
        $("").hide();
        break;

        case "المستخدمين":
        $("").show();
        $(".statistics").hide();
        $(".cate").hide();
        $(".brand").hide();
        $("product").hide();
        $(".emails").hide();
        break;

        case "الايميل":
        $(".emails").show();
        $(".statistics").hide();
        $(".cate").hide();
        $(".brand").hide();
        $("product").hide();
        $("").hide();
        break;
        default:
        $(".statistics").show();

    }

    });

    });*/
   