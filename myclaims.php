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
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">My Account</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Item</th>
                            <th>Place</th>
                            <th>Status</th>
                            <th>Confirm</th>
                            <th>Claim</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
                    include 'helpers/dbcon.inc.php';

                    $uid = $_SESSION['id'];
                    
                    $sql = "SELECT items.*, users.*
                    FROM items
                    INNER JOIN users ON items.claimed_by = users.id WHERE users.id = $uid ORDER BY item_id DESC";


                    $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()){

                            $item = $row['item_name'];
                            $image = $row['image'];
                            $id = $row['item_id'];

                            $postedby = $row['first_name'] .' '. $row['lastname'];
                            $date = $row['date_found'];
                            $place =  $row['location_found'];
                            $phone = $row['phone'];
                            $type = $row['type'];
                            $claimstatus = $row['status'];
                            if ($claimstatus == 0){

                                $icon = 'fa-exclamation-triangle';
                                $color = 'warning';
                                $disabled = '';

                            }else if($claimstatus == 1){
                                $icon = 'fa-check';
                                $color = 'success';
                                $disabled = 'disabled';

                            }
                            echo "
                            <tr>
                            <td class='align-middle'><img src='$image' alt='' style='width: 50px;'></td>
                            <td class='align-middle'>$item</td>
                            <td class='align-middle'>$place</td>
                            <td class='align-middle'>$type</td>
                            <td class='align-middle'><a href='account/confirmitem.php?itemid=$id'><button $disabled class='btn btn-sm btn-success'><i class='fa fa-check'></i></button></a></td>
                            <td class='align-middle'><button class='btn btn-sm btn-$color'><i class='fa $icon'></i></button></td>
                            </tr>";

                        }
                      

                    ?>
                       
                        
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <!-- Cart End -->


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