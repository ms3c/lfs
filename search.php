<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lost found Systems</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <style>
    .lost-badge {
      display: inline-block;
      background-color: #FF0000;
      color: #FFFFFF;
      font-size: 10px;
      padding: 4px;
      border-radius: 50%;
      text-transform: uppercase;
    }
    .found-badge {
      display: inline-block;
      background-color: #00FF00;
      color: #FFFFFF;
      font-size: 10px;
      padding: 4px;
      border-radius: 50%;
      text-transform: uppercase;
    }
    
   
  </style>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
       
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">IFM</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1"> LFS</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="search.php">
                    <div class="input-group">
                        <input name="query" type="text" class="form-control" placeholder="Search for items">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <?php
                if(isset($_SESSION['username'])){
                    $fname = $_SESSION['first_name'] .' '. $_SESSION['lastname'];

                   echo '<p class="m-0"><a class="btn btn-danger" href="helpers/logout.php">Log out</a></p>
                    <h5 class="m-0">'.$fname.'</h5>';
                }else{
                    echo '<p class="m-0"><a class="btn btn-primary" href="login.php">Login</a></p>
                    <h5 class="m-0">Guest</h5>';
                }

               
                ?>
               
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">IFM</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">LFS</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="post.php" class="nav-item nav-link">Post</a>
                            <a href="myaccount.php" class="nav-item nav-link">My Account</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <a href="post.php"><h1 class="fa fa-plus text-primary m-0 mr-3"></h1></a>
                    <h5 class="font-weight-semi-bold m-0">Post ad</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <a href="#"><h1 class="fa fa-handshake text-primary m-0 mr-2"></h1></a>
                    <h5 class="font-weight-semi-bold m-0">Found Item</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <a href="#"><h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1></a>
                    <h5 class="font-weight-semi-bold m-0">Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <a href="#"><h1 class="fa fa-question-circle text-primary m-0 mr-3"></h1></a>
                    <h5 class="font-weight-semi-bold m-0">Get Help</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
           
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <a href="items.php?sortedby=Identity Cards"><img class="img-fluid" src="img/id-3.jpg" alt=""></a>
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Identity Cards</h6>
                            <?php
                            include 'helpers/dbcon.inc.php';
                            $sql = "SELECT COUNT(item_id) AS count FROM items WHERE category = 'Identity Cards'";
                            $result = $conn->query($sql);

                            if($result)
                                $row = $result->fetch_assoc();
                                $count = $row['count'];
                                echo '<small class="text-body">'.$count.'</small>';
                            ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                   <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <a href="items.php?sortedby=Digital Item"><img class="img-fluid" src="img/cat-4.jpg" alt=""></a>
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Digital Items</h6>
                            <?php
                            include 'helpers/dbcon.inc.php';
                            $sql = "SELECT COUNT(item_id) AS count FROM items WHERE category = 'Digital Item'";
                            $result = $conn->query($sql);

                            if($result)
                                $row = $result->fetch_assoc();
                                $count = $row['count'];
                                echo '<small class="text-body">'.$count.'</small>';
                            ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <a href="items.php?sortedby=Wallets"><img class="img-fluid" src="img/cat-1.jpg" alt=""></a>
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Wallets</h6>
                            <?php
                            include 'helpers/dbcon.inc.php';
                            $sql = "SELECT COUNT(item_id) AS count FROM items WHERE category = 'Wallets'";
                            $result = $conn->query($sql);

                            if($result)
                                $row = $result->fetch_assoc();
                                $count = $row['count'];
                                echo '<small class="text-body">'.$count.'</small>';
                            ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <a href="items.php?sortedby=Books"><img class="img-fluid" src="img/cat-3.jpg" alt=""></a>
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Books</h6>
                             <?php
                            include 'helpers/dbcon.inc.php';
                            $sql = "SELECT COUNT(item_id) AS count FROM items WHERE category = 'Books'";
                            $result = $conn->query($sql);

                            if($result)
                                $row = $result->fetch_assoc();
                                $count = $row['count'];
                                echo '<small class="text-body">'.$count.'</small>';
                            ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Category</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                    <?php    
                    include 'helpers/dbcon.inc.php';
                    $query = "SELECT * FROM categories";
                    $res = $conn->query($query);

                    while($row = mysqli_fetch_assoc($res)){
                        $category_name = $row['category_name'];

                        echo '<div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <a href="#" style="color:black"><label class="custom-control-label" for="price-all">'.$category_name.'</label></a>
                        </div>';

                    }

                      
                        
                    ?>
                        
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Places</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                    <?php    
                    include 'helpers/dbcon.inc.php';
                    $query = "SELECT * FROM places";
                    $res = $conn->query($query);

                    while($row = mysqli_fetch_assoc($res)){
                        $place = $row['place_name'];

                        echo '<div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <a href="#" style="color:black"><label class="custom-control-label" for="price-all">'.$place.'</label></a>
                        </div>';

                    }

                      
                        
                    ?>
                        
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Category</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" href="#">8</a>
                                        <a class="dropdown-item" href="#">16</a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <?php

        include 'helpers/dbcon.inc.php';

        $search = $_GET['query'];

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $itemsPerPage = 8;

        // Calculate the offset
        $offset = ($page - 1) * $itemsPerPage;

        // Construct the SQL query with pagination
        $query = "SELECT * FROM items WHERE item_name LIKE '%$search%' LIMIT $itemsPerPage OFFSET $offset";
        //$query = "SELECT * FROM items ORDER BY item_id DESC";
        $res = $conn->query($query);
       

        while($row = mysqli_fetch_assoc($res)){
            $badg = '';

            if($row["type"] === 'Found'){
                $badg = '<span class="found-badge">Found</span>';
            }else if($row["type"] === 'Lost'){

                $badg = '<span class="lost-badge">Lost</span>';


            }

            echo '<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="' . $row["image"] .' " alt="">
                        <div class="product-action">

                            <a class="btn btn-outline-dark btn-square" href="detail.php?id='.$row["item_id"].'"><i class="fa fa-search"></i></a>

                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">' . $row["item_name"] .'<img src="img/new_flash.gif" width="44px" height="33px"> </a>'.$badg.'<br>
                        <a class="h6 text-decoration-none text-truncate" href="">' . 'Place: '.$row["location_found"] .' </a>

                
                    </div>
                </div>
            </div>';

        }
        
            ?>
                    
                   
                    
                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="search.php?page=1">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="search.php?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="search.php?page=3">3</a></li>
                            <li class="page-item"><a class="page-link" href="search.php?page=2">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
            <!-- Shop Product End -->
        </div>
    </div>
    
    <!-- Products End -->


    <!-- Vendor Start -->
    
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">If you have any Enqueries do not hesitate to get in touch with us</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>IFMSO, 3rd Floor, IMC</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>lost@ifm.ac.tz</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+255 693338637</p>
            </div>
        
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="ifm.ac.tz">IFM LFS</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://ifm.ac.tz">ODCS Class Of 2021/2023</a>
                </p>
            </div>
           
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
<script defer async>
  document.addEventListener('DOMContentLoaded', function() {
    // setting global variables
    window.botId = 1644
    
    // create div with id = sarufi-chatbox
    const div = document.createElement("div")
    div.id = "sarufi-chatbox"
    document.body.appendChild(div)

    // create and attach script tag
    const script = document.createElement("script")
    script.crossOrigin = true
    script.type = "module"
    script.src = "https://cdn.jsdelivr.net/gh/flexcodelabs/sarufi-chatbox/example/vanilla-js/script.js"
    document.head.appendChild(script)

    // create and attach css
    const style = document.createElement("link")
    style.crossOrigin = true
    style.rel = "stylesheet"
    style.href = "https://cdn.jsdelivr.net/gh/flexcodelabs/sarufi-chatbox/example/vanilla-js/style.css"
    document.head.appendChild(style)
  });
</script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>