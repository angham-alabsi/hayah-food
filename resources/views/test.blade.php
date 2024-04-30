
<html>
    <head>
      <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}" />
        <script src="https://kit.fontawesome.com/ce59a85abb.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        
        <style>
           
            .topnav {
            overflow: hidden;
            }
            .topnav a {
            float: left;
            display: block;
            color: #f69340;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            }
            .topnav .icon {
            display: none;
            }

            /* Dropdown container - needed to position the dropdown content */
            .dropdown {
            float: right;
            overflow: hidden;
            }

            /* Style the dropdown button to fit inside the topnav */
            .dropdown .dropbtn {
            font-size: 17px;
            border: none;
            outline: none;
            color: #f69340;
            padding: 14px 50px;
            padding-right: 15px;
            background-color: inherit;
            font-family: inherit;
            font-weight: bolder;
            margin: 0;
            }


            .dropdown:hover 
            {
              cursor: pointer;
            }

            /* Style the dropdown content (hidden by default) */
            .dropdown-content {
            display: none;
            right:0 ;
            position: absolute;
            max-width:150px;
            z-index: 1;
            border-left: 2px solid #f69340;
            border-bottom: 2px solid #f69340;
            box-shadow: 5px 10px #888888;
height: 155px;
            }

            /* Style the links inside the dropdown */
            .dropdown-content a {
            float: none;
            color: #18275c;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: right;
           
            }
            .dropdown-content a:hover
            {
              box-shadow: 5px 5px 5px #88888847;

            }

            /* Add a dark background on topnav links and the dropdown button on hover */
            .topnav a:hover, .dropdown:hover .dropbtn {
            
            }

            /* Add a grey background to dropdown links on hover */
            .dropdown-content a:hover {
           
            }

            /* Show the dropdown menu when the user moves the mouse over the dropdown button */
            .dropdown:hover  .dropdown-content {
            display: block;
            position: relative;
            
            }
            .deco
            {
              background-color: grey;
              display: block;
              position: relative;
              top: 52px;
              height: 50px;
            }

          
        </style>
    </head>
    <body>
        <span class="deco"></span>
        <div class="topnav" id="myTopnav" >
            
            <div class="dropdown">
              <div class="dropbtn">الاصناف 
                
              </div>
              <div class="dropdown-content">
                <div class="aa">
                <a href="/gallery/addCategoriesPhotos"><i class="fas fa-plus-circle"></i> اضافة صورة </a>
                <a href="/gallery/showCategoriesPhotos"><i class="fas fa-images"></i> عرض الصور </a>
                <a href="/gallery/deletedCategoriesPhotos"><i class="fas fa-trash"></i> المحذوفات</a>
                </div>
              </div>
            </div>

            <div class="dropdown">
                <div class="dropbtn">المنتجات
                  
                </div>
                <div class="dropdown-content">
                  <div class="aa">
                    <a href="/gallery/addProductsPhotos"><i class="fas fa-plus-circle"></i> اضافة صورة </a>
                    <a href="/gallery/showProductsPhotos"><i class="fas fa-images"></i> عرض الصور </a>
                    <a href="/gallery/deletedProductsPhotos"><i class="fas fa-trash"></i> المحذوفات</a>
                    </div>
                </div>
              </div>

              <div class="dropdown">
                <div class="dropbtn">العلامات التجارية
                  
                </div>
                <div class="dropdown-content">
                  <div class="aa">
                    <a href="/gallery/addBrandsPhotos"><i class="fas fa-plus-circle"></i> اضافة صورة </a>
                    <a href="/gallery/showBrandsPhotos"><i class="fas fa-images"></i> عرض الصور </a>
                    <a href="/gallery/deletedBrandsPhotos"><i class="fas fa-trash"></i> المحذوفات</a>
                    </div>
                </div>
              </div>
            
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
          </div>
    </body>
</html>