<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register Account | LFS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    
    <style>
    .preview-image {
        max-width: 200px;
        max-height: 200px;
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
                    <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                    <span class="breadcrumb-item active">Registration</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid text-center">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Account Registration</span></h2>
        <div class="row px-xl-5">
             <div class="col-lg-7 mb-5 mx-auto">
                 <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <?php
                        if(isset($_GET['error'])){

                            if($_GET['error'] == 'accountexists'){
                                echo '<p style="color:red">Username or email is already used by someone</p>';
                            }else if($_GET['error'] == 'emailnotvalid'){
                                echo '<p style="color:red">Invalid Email</p>';

                            }else if($_GET['error'] == 'importantfieldsnotfilled'){
                                echo '<p style="color:red">Important Fields Not filled or Invalid Email</p>';

                            }
                        }
                     ?>
                    <form action="helpers/reg.php" method="POST" name="post-form" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name"
                                required="required" data-validation-required-message="Please enter your first name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" name="mname" class="form-control" id="mname" placeholder="Middle name"
                                required="required" data-validation-required-message="Please enter your middle name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name"
                                required="required" data-validation-required-message="Please enter your last name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" name="email" class="form-control" id="lname" placeholder="Email Address"
                                required="required" data-validation-required-message="Please enter your email address" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="number" name="phone" class="form-control" id="lname" placeholder="Phone Number"
                                required="required" data-validation-required-message="Please enter your phone number" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" name="username" class="form-control" id="lname" placeholder="Username"
                                required="required" data-validation-required-message="Please enter your username" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" name="password" class="form-control" id="lname" placeholder="Password"
                                required="required" data-validation-required-message="Please enter your password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" name="passwordrepeat" class="form-control" id="lname" placeholder="Repeat Password"
                                required="required" data-validation-required-message="Please enter your password" />
                            <p class="help-block text-danger"></p>
                        </div>
                                                
                        <div class="d-flex justify-content-between">
                        <div>
                            <button class="btn btn-primary py-2 px-4" name="submit" type="submit" id="sendMessageButton">Register</button>
                        </div>
                        <div>
                            <a href="login.php" class="btn btn-link" name="forgotPasswordButton">Login</a>
                        </div>
                    </div>

                    </form>
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