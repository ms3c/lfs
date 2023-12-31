<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lost found Systems</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                        <input type="text" class="form-control" placeholder="Search for items">
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
                        <input type="text" class="form-control" placeholder="Search for items">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Logged In</p>
                <h5 class="m-0">System Admin</h5>
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
                            <a href="post.php" class="nav-item nav-link">Post an Item</a>
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
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form action="helpers/handler.php" method="POST" enctype="multipart/form-data" name="post-form" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" name="item" class="form-control" id="name" placeholder="Item Name"
                                required="required" data-validation-required-message="Please enter your item name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" name="place" class="form-control" id="email" placeholder="Place of Lost"
                                required="required" data-validation-required-message="Please enter the palce you lost this item" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="date" name="date" class="form-control" id="email" placeholder="Date of Lost"
                                required="required" data-validation-required-message="Please enter the palce you lost this item" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="file" name="photo" id="photo-upload" accept="image/*" onchange="previewPhoto(event)" class="form-control"  placeholder="Place of Lost"
                                required="required" data-validation-required-message="Please enter the palce you lost this item" />
                            <p class="help-block text-danger"></p>
                            <div id="photo-preview"></div>
                        </div>
                        <div class="control-group">
                        <select class="form-control" name="cotegory" id="subject" required="required" data-validation-required-message="Please select a subject">
                            <option value="">Select a Category</option>
                            <option value="Digital Item">Digital Item</option>
                            <option value="Identity Cards">Identity Cards</option>
                            <option value="Books">Books</option>
                            <option value="Wallets">Wallets</option>
                        </select>
                        <p class="help-block text-danger"></p>
                        
                    </div>

                        <div class="control-group">
                            <textarea class="form-control" name="description" rows="8" id="message" placeholder="Brief description about the item"
                                required="required"
                                data-validation-required-message="Please your item description"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        
                        <div>
                            <button class="btn btn-primary py-2 px-4" name="submit" type="submit" id="sendMessageButton">Post The Item</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31694.32560429699!2d39.25912291833345!3d-6.795301685654447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4b113fc2db53%3A0x1735d30e3398bba!2sInstitute%20of%20Finance%20Management%20(IFM)!5e0!3m2!1sen!2stz!4v1685446080478!5m2!1sen!2stz"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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
    <!--<script src="mail/contact.js"></script>-->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    function previewPhoto(event) {
        var input = event.target;
        var preview = document.getElementById("photo-preview");

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var image = document.createElement("img");
                image.setAttribute("src", e.target.result);
                image.setAttribute("class", "preview-image");

                preview.innerHTML = "";
                preview.appendChild(image);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = "";
        }
    }
</script>
</body>

</html>