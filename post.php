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
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="post.php">Post Item</a>
                    <a class="breadcrumb-item text-dark" href="myaccount.php">My Account</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
    <div class="container-fluid h-100">
        <div class="row px-xl-5 h-100">
            <div class="col-lg-8 mx-auto text-center align-self-center">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Post a Lost Item</span></h5>
                <form action="helpers/handler.php" method="POST" enctype="multipart/form-data">
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Item Name</label>
                                <input name="item" class="form-control" type="text" placeholder="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Place of lost/found</label>
                                <input name="place" class="form-control" type="text" placeholder="">
                            </div>
                            <div class="col-md-6 form-group">
                            <label>Near Location</label>
                        <select class="form-control" name="nearby" id="subject" required="required" data-validation-required-message="Please select a subject">
                            <option value="">Nearby</option>
                            <?php 
                 

                                include 'helpers/dbcon.inc.php';
                                $sql = "SELECT * FROM places";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    echo '<option value="'.$row['place_name'].'">'.$row['place_name'].'</option>';
                                }
                                ?>
                         
                        </select>
                        
                        
                            </div>
                            <div class="col-md-6 form-group">
                            <label>Category</label>
                        <select class="form-control" name="cotegory" id="subject" required="required" data-validation-required-message="Please select a subject">
                            <option value="">Select a Category</option>

                            <?php 
                 

                            include 'helpers/dbcon.inc.php';
                            $sql = "SELECT * FROM categories";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
                            }
                            ?>
                       
                        </select>
                            </div>
                            <div class="col-md-6 form-group">
                            <label>Type</label>
                        <select class="form-control" name="type" id="subject" required="required" data-validation-required-message="Please select a subject">
                            <option value="">Select a Type</option>
                            <option value="Lost">Lost</option>
                            <option value="Found">Found</option>
                         
                        </select>
                        
                        
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <label>Date</label>
                                <input name="date" class="form-control" type="date" placeholder="">
                            </div>
                            
                            <div class="col-md-6 form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input name="photo" class="custom-file-input" type="file" id="imageInput">
                                <label class="custom-file-label" for="imageInput">Choose image</label>
                            </div>
                        </div>

                        </div>
                        
                    </div>
                    <div class="collapse mb-5" id="shipping-address">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                        <div class="bg-light p-30">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="John">
                                </div>
                                <!-- Other form fields for shipping address -->
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" name="description" rows="8" id="message" placeholder="Additional description about the item"
                            data-validation-required-message="Please enter your item description"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>


                    <div>
                        <button class="btn btn-primary py-2 px-4" name="submit" type="submit" id="sendMessageButton">Post The Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Checkout End -->


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
    <script>
    tinymce.init({
        selector: 'textarea',
        menubar: false,
        plugins: [
            'advlist autolink lists link image imagetools charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }'
    });
</script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>