<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lost found Systems FAQs</title>
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
                            <a href="profile.php" class="nav-item nav-link">Profile </a>

                        </div>

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
    
    <!-- Products End -->


    <!-- Offer Start -->
    <!-- Offer End -->


    <!-- Products Start -->
    <h1>Lost and Found System FAQ</h1>

<h3>Q: What is the purpose of this lost and found system?</h3>
<p>A: The lost and found system is designed to provide a platform where users can post and report lost items, increasing the chances of reuniting lost items with their rightful owners.</p>

<h3>Q: How does the system work?</h3>
<p>A: Users can create an account and log in to the system. They can then post details about a lost item, including a description, location, and any relevant information. Other users who come across a lost item can search the system and report a found item to potentially match it with a posted lost item.</p>

<h3>Q: Is there a fee for using the lost and found system?</h3>
<p>A: No, the use of the lost and found system is completely free for all users.</p>

<h3>Q: Can I report a found item without creating an account?</h3>
<p>A: No, you need to create an account and log in to the system in order to report a found item. This helps us maintain the security and integrity of the system.</p>

<h3>Q: How long will my lost item posting be visible on the system?</h3>
<p>A: By default, lost item postings remain visible until is claimed or returned. After that, they are automatically removed from the system. However, you can manually remove your posting if your lost item has been found or if you no longer wish to keep it active.</p>
    
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