<?php  
require_once ('./../dao/dbhelper.php');
require_once ('./../shared/config.php');
session_start();

if (!empty($_GET)) {
    if(isset($_GET[PARA_USER_ID])) {
        $productId = $_GET[PARA_USER_ID];
        $productRow = getProductDetail($productId);

        //print_r($productRow);
    }
}

$username = $_SESSION[S_USERNAME];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>eCommerce Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="css/navbar.css" rel="stylesheet" >
  </head>
  <body>
  <header class="section-header">
        <nav class="navbar navbar-dark navbar-expand p-0 bg-dark">
        <div class="container-fluid">
        <ul class="navbar-nav d-none d-md-flex mr-auto">
            <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Cash On Delivery</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Free Delivery</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Cash Backs</a></li>
        </ul>
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
    </div> <!-- navbar-collapse .// -->
    <!-- container //  -->
    </nav> <!-- header-top-light.// -->

    <section class="header-main border-bottom bg-white">
        <div class="container-fluid">
        <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
            <div class="col-md-2">
                <img  class="d-none d-md-flex" src="https://i.imgur.com/R8QhGhk.png" width="100">
            </div>
            <div class="col-md-8">
            <div class="d-flex form-inputs">
            <input class="form-control" type="text" placeholder="Search any product...">
            <i class="bx bx-search"></i>
            </div>
            </div>
            
            <div class="col-md-2">
                <div class="d-flex d-none d-md-flex flex-row align-items-center">
                    <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                    <div class="d-flex flex-column ms-2">
                        <span class="qty">0 Product</span>
                        <span class="fw-bold">$0</span>
                    </div>    
                </div>           
            </div>
        </div>
        </div> 
    </section>
    </header>

    <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">men's shoes fashion</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="price">current price: <span>$180</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
