<?php 
require_once ('./dao/dbhelper.php');
require_once ('./shared/config.php');
session_start();

if(!isset($_SESSION[S_USERNAME])) {
    header('Location: page_authentication/login.php');
}
else {
    $username = $_SESSION[S_USERNAME];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="./css/navbar.css" rel="stylesheet" >
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- header -->
    <div id="header">
        <div id="title">
            <h1>vina<span>book</span>.com</h1>
        </div>
        <div id="search">
            <input  type="text" id="search" placeholder="Tìm kiếm tựa sách, tác giả ">
            <button id="search" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="d-flex d-none d-md-flex flex-row align-items-center">
            <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                <div class="d-flex flex-column ms-2">
                    <span class="qty">0 Product</span>
                    <span class="fw-bold">$0</span>
                </div>    
        </div>           
        <ul class="navbar-nav d-flex align-items-center">
            <li class="nav-item">
                <div class="d-flex flex-row">
                    <img src="https://i.imgur.com/EYFtR83.jpg" class="rounded-circle" width="30">
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center" data-abc="true"><span><?php echo $username ?></span><i class='bx bxs-chevron-down'></i></a>
            </li>
            
        </ul> <!-- list-inline //  -->
        <div id="login_logout">
            <!-- <a href="#">Đăng nhập</a>
            <a href="#">Đăng ký</a> -->
        </div>
    </div>
<!-- MENU -->
    <div id="menu">
        <i class="fa-solid fa-bars"></i>
        <h1>Danh Mục Sách</h1>
    </div>

<!-- Container -->
    <div id="container">
        <!-- Content -->
    <div id="content">
        <div id="list">

        </div>
        <div id="image1">
            <img src="images/Capture.PNG">
        </div>
        <div id="image2">
            <div>
                <img src="images/anh2.png">
                <img src="images/anh3.png">
            </div>                       
        </div>
    </div>
<!-- Content -->
    <div class="row text-center mb-5">
        <div class="col-lg-7 mx-auto">
        <h1 class="">New books</h1>
        </div>
    </div>
<!-- introduce -->
    <div id="intro_book">
        <div id="popular">
            <div id="intro"> 
                <div id="image">
                    <img src="images/anh4.png">
                </div>           
                <div id="info">
                    <p>Tạp chí Pi tập 5</p>
                    <p>
                        <span>Tạp chí Pi do Hội</span><br>
                        <span>Toán Học Việt Nam</span><br>
                        <span>biên soạn và phát</span><br>
                        <span>hành với sự tham gia</span><br>
                        <span>của Giáo sư Ngô Bảo</span><br>
                        <span>Châu</span>
                    </p>
                    <div id="line"></div>
                    <div id="price">30.000VND</div>
                </div>
                
            </div>
            <div id="intro">
                <div id="image">
                    <img src="images/anh4.png">
                </div>
                <div id="info">
                    <p>Tạp chí Pi tập 5</p>
                    <p>
                        <span>Tạp chí Pi do Hội</span><br>
                        <span>Toán Học Việt Nam</span><br>
                        <span>biên soạn và phát</span><br>
                        <span>hành với sự tham gia</span><br>
                        <span>của Giáo sư Ngô Bảo</span><br>
                        <span>Châu</span>
                    </p>
                </div>
            </div>
            <div id="intro">
                <div id="image">
                    <img src="images/anh4.png">
                </div>
                <div id="info">
                    <p>Tạp chí Pi tập 5</p>
                    <p>
                        <span>Tạp chí Pi do Hội</span><br>
                        <span>Toán Học Việt Nam</span><br>
                        <span>biên soạn và phát</span><br>
                        <span>hành với sự tham gia</span><br>
                        <span>của Giáo sư Ngô Bảo</span><br>
                        <span>Châu</span>
                    </p>
                    
                </div>
            </div>        
        </div>
    </div>

    <!--- book list-->

    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row text-center mb-5">
          <div class="col-lg-7 mx-auto">
            <h1 class="">Book list</h1>
          </div>
        </div>
        <!-- End -->
      
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
              
              <!-- list group item-->
              <?php foreach(getAllProducts() as $product) {?>
              <li class="list-group-item" onclick="location.href='<?php echo PRODUCT_DETAIL.$product['id']?>';" style="cursor: pointer;">
                <!-- Custom content-->
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                  <div class="media-body order-2 order-lg-1">
                    <h5 class="mt-0 font-weight-bold mb-2"><?php echo $product['name']?></h5>
                    <p class="font-italic text-muted mb-0 small"><?php echo $product['description']?></p>
                    <div class="d-flex align-items-center justify-content-between mt-1">
                      <h6 class="font-weight-bold my-2"><?php echo $product['price']." VND"?></h6>
                      <ul class="list-inline small">
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                        <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                      </ul>
                    </div>
                  </div><img src="<?php echo $product['image']?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                </div>
                <!-- End -->
              </li>
              <?php } ?>
              <!-- End -->
            </ul>
            <!-- End -->
          </div>
        </div>
      </div>    
<!-- footer -->
    <div id="footer">
        <div id="logo">
            <img src="images/bocongthuong.png">
        </div>
        <div id="address">
            <h4>CÔNG TY CỔ PHẦN THƯƠNG MẠI DỊCH VỤ MÊ CÔNG COM</h4>
            <span>Địa chỉ: 52/2 Thoại ngọc Hầu, Phường Hòa Thạnh, Quận Tân Phú, Hồ Chí Minh</span><br>
            <span>MST: 0303615027 do Sở Kế Hoạch Và Đầu Tư Tp.HCM cấp ngày 10/3/2011</span><br>
            <span>Tel: 028.73008182 - Fax: 028.39733234 - Email: hotro@vinabook.com</span>
        </div>
        <div id="pay">
            <h4>Chấp nhận thanh toán</h4>
            <div id="pay_image">
                <img src="images/logo2.png">
                <img src="images/logo1.png">
            </div>
            
        </div>
        <div id="partners">
            <h4>Đối tác bán hàng</h4>
            <div id="partners_image">
                <img src="images/lazada.png">
                <img src="images/shopee.webp">
                <img src="images/amazon.jpg">
            </div>
            
        </div>
    </div>
</body>
</html>