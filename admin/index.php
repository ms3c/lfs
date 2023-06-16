<!DOCTYPE html>
<?php 
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | LFS</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">LFMS</h1>
                </div>
                <div class="p-1 flex flex-row items-center">


                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="dist/images/download.php@1x_1.jpg" alt="">
                    <?php
                    
                    if(isset($_SESSION['role']) && $_SESSION['role'] == '1'){
                        $names = $_SESSION['first_name'].' '.$_SESSION['lastname'];
                        echo '<a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">'.$names.'</a>';
                    }
                    ?>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                        <ul class="list-reset">
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                          <li><hr class="border-t mx-2 border-grey-ligght"></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="index.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="items.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Items
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="users.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Users
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    
                        </ul>
                    </li>
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Stats Row Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                    <?php

                                        include '../helpers/dbcon.inc.php';
                                        $sql = "SELECT COUNT(item_id) as total FROM items WHERE type = 'Lost'";

                                        $res = $conn->query($sql);

                                        $row = mysqli_fetch_assoc($res);

                                        $total = $row['total'];

                                        echo $total;


                                    ?>
                                    
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    All Losts
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                <?php

                                        include '../helpers/dbcon.inc.php';
                                        $sql = "SELECT COUNT(item_id) as total FROM items WHERE type = 'Found'";

                                        $res = $conn->query($sql);

                                        $row = mysqli_fetch_assoc($res);

                                        $total = $row['total'];

                                        echo $total;


                                        ?>
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    All Found
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                <?php

                                    include '../helpers/dbcon.inc.php';
                                    $sql = "SELECT COUNT(item_id) as total FROM items";

                                    $res = $conn->query($sql);

                                    $row = mysqli_fetch_assoc($res);

                                    $total = $row['total'];

                                    echo $total;


                                    ?>
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total
                                </a>
                            </div>
                        </div>

                        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
                            <div class="p-4 flex flex-col">
                                <a href="#" class="no-underline text-white text-2xl">
                                <?php

                                    include '../helpers/dbcon.inc.php';
                                    $sql = "SELECT COUNT(id) as total FROM users";

                                    $res = $conn->query($sql);

                                    $row = mysqli_fetch_assoc($res);

                                    $total = $row['total'];

                                    echo $total;


                                    ?>
                                </a>
                                <a href="#" class="no-underline text-white text-lg">
                                    Total Users
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- /Stats Row Ends Here -->

                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Lates Posts</div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Posted By</th>
                                        <th scope="col">Place</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                        include '../helpers/dbcon.inc.php';
                                        $sql = "SELECT items.*, users.*
                                        FROM items
                                        INNER JOIN users ON items.postedby = users.id ORDER BY items.item_id DESC";

                                        $res = $conn->query($sql);

                                        while($row = mysqli_fetch_assoc($res)){

                                            $id = $row['item_id'];

                                            $item = $row['item_name'];

                                            $postedby = $row['first_name'] . ' ' . $row['lastname'];

                                            $place = $row['location_found'];

                                            $date = $row['date_found'];

                                            $type = $row['type'];

                                            echo "<tr>
                                            <th scope='row'>$id</th>
                                            <td>$item</td>
                                            <td>$postedby</td>
                                            <td>$place</td>
                                            <td>$date</td>
                                            <td>$type</td>
                                            </tr>";
                                

                                        };

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->

                    <!-- Progress Bar -->
                   
                    <!--Profile Tabs-->
                    
                    <!--/Profile Tabs-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; IFM LFS</div>
        </footer>
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>
</body>

</html>