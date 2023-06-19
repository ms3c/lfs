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
     <!--<script async src="utilities/chat-widget.js"></script> -->

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
                <a href="index.php" class="text-decoration-none">
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
                            <a href="myclaims.php" class="nav-item nav-link">My Claims</a>
                            <a href="mislayed.php" class="nav-item nav-link">Mislayed Items </a>
                            <a href="chat/login.php" class="nav-item nav-link">Chat </a>

                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Item</a>
                    <?php

                        $id = $_GET['id'];
                        $itme_name = "";

                        include 'helpers/dbcon.inc.php';
                        $query = "SELECT item_name FROM items WHERE item_id = $id";
                        $res = $conn->query($query);

                        while($row = mysqli_fetch_assoc($res)){

                            $item_name = $row['item_name'];

                        }
                       echo '<span class="breadcrumb-item active">'.$item_name.'</span>';
                        ?>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                    <?php

                    $id = $_GET['id'];
                    $itme_name = "";

                    include 'helpers/dbcon.inc.php';
                    $query = "SELECT image FROM items WHERE item_id = $id";
                    $res = $conn->query($query);

                    while($row = mysqli_fetch_assoc($res)){

                        $image = $row['image'];

                    }

                    echo '<div class="carousel-item active">
                    <img class="w-100 h-100" src="'.$image.'" alt="Image">
                    </div>';


                    ?>

                        
                       
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                <?php

                    $id = $_GET['id'];
                    $itme_name = "";

                    include 'helpers/dbcon.inc.php';
                    $query = "SELECT item_name FROM items WHERE item_id = $id";
                    $res = $conn->query($query);

                    while($row = mysqli_fetch_assoc($res)){

                        $itme_name = $row['item_name'];

                    }
                    echo '<h3>'.$itme_name.'</h3>';
                    ?>
                    
                 
                    <?php

                    $id = $_GET['id'];
                    $descr = "";

                    include 'helpers/dbcon.inc.php';
                    $query = "SELECT description FROM items WHERE item_id = $id";
                    $res = $conn->query($query);

                    while($row = mysqli_fetch_assoc($res)){

                        $descr = $row['description'];

                    }
                    echo '<p class="mb-4">'.$descr.'</p>';

                    $sql = "SELECT items.*, users.*
                    FROM items
                    INNER JOIN users ON items.postedby = users.id
                    WHERE items.item_id = $id";

                    $result = $conn->query($sql);

                        $row = $result->fetch_assoc();
                        $postedby = $row['first_name'] .' '. $row['lastname'];
                        $date = $row['date_found'];
                        $place =  $row['location_found'];
                        $phone = $row['phone'];
                        $type = $row['type'];
                        $chatid = $row['chatid'];
                        $postedbyid = $row['postedby'];
                    

                        


                    echo '<p class="mb-2">Posted By: '.$postedby.'</p>';
                    echo '<p class="mb-2">Date: '.$date.'</p>';
                    echo '<p class="mb-2">Location: '.$place.'</p>';
                    echo '<p class="mb-2">Phone: '.$phone.'</p>';

                    echo '<div class="d-flex align-items-center mb-4 pt-2">';
                    
                    if($type == 'Found'){

                    if(isset($_SESSION['id'])){
                        if($postedbyid != $_SESSION['id']){

                            echo "<a href='account/claimitem.php?itemid=$id'><button class='btn btn-primary px-3'><i class='fa fa-hand-paper mr-1'></i>Claim This Item</button></a>";
                            
                            
                        }
                    }

                    }else if($type == 'Lost'){

                    if(isset($_SESSION['id'])){

                        if($postedbyid == $_SESSION['id']){
                            echo '<a href="account/founditem.php?itemid='.$id.'"><button class="btn btn-success px-3"><i class="fa fa-hand-paper mr-1"></i>I Found My Item</button></a>';

                        }else if($postedby  != $_SESSION['id']){

                            echo '<a href="account/founditem.php?itemid='.$id.'"><button class="btn btn-success px-3"><i class="fa fa-hand-paper mr-1"></i>I Found This Item</button></a>';

                        }

                    }
                    }
                    
                    
                    
                    echo '</div>';

                    echo '<div class="d-flex align-items-center mb-4 pt-2">';
                    if($type == 'Found'){

                    if(isset($_SESSION['id'])){

                        if($postedbyid != $_SESSION['id']){

                            echo '<a href="chat/chat.php?user_id='.$chatid.'" class="btn btn-success px-3"><i class="fa fa-phone mr-1"></i>Chat with the Person who found this item</a>';

                        }
                    }

                    }else if($type == 'Lost'){

                if(isset($_SESSION['id'])){

                        if($postedbyid != $_SESSION['id']){

                            echo '<a href="chat/chat.php?user_id='.$chatid.'" class="btn btn-success px-3"><i class="fa fa-phone mr-1"></i>Chat with the person who lost this item</a>';

                        }
                    }

                }
                    echo '</div>';

                    
                    ?>
                    
               
                    
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Item Description</h4>
                            <?php

                                $id = $_GET['id'];
                                $descr = "";

                                include 'helpers/dbcon.inc.php';
                                $query = "SELECT description FROM items WHERE item_id = $id";
                                $res = $conn->query($query);

                                while($row = mysqli_fetch_assoc($res)){

                                    $descr = $row['description'];

                                }
                                echo "<p>$descr</p>";
                                ?>
                        </div>
                       
                        <div class="tab-pane fade" id="tab-pane-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Other Items</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    
                    
                <?php

                include 'helpers/dbcon.inc.php';
                $query = "SELECT * FROM items ORDER BY item_id DESC LIMIT 4";
                $res = $conn->query($query);

                while($row = mysqli_fetch_assoc($res)){

                    echo '<div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="'.$row['image'].'" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="detail.php?id='.$row['item_id'].'"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">'.$row['item_name'].'</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                            </div>
                       
                        </div>
                    </div>';

                    }
                    ?>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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