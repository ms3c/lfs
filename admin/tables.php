<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->

<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'><link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Tables | Tailwind Admin</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan</a>
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
                <div class="flex">

                </div>
                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border ">
                        <a href="index.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="forms.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-wpforms float-left mx-2"></i>
                            Forms
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="buttons.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-grip-horizontal float-left mx-2"></i>
                            Buttons
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="tables.php"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tables
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="ui.html"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fab fa-uikit float-left mx-2"></i>
                            Ui components
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-300-border">
                        <a href="modals.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-square-full float-left mx-2"></i>
                            Modals
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2">
                        <a href="#"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="far fa-file float-left mx-2"></i>
                            Pages
                            <span><i class="fa fa-angle-down float-right"></i></span>
                        </a>
                        <ul class="list-reset -mx-2 bg-white-medium-dark">
                            <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                <a href="login.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Login Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="register.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Register Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                            <li class="border-t border-light-border w-full h-full px-2 py-3">
                                <a href="404.html"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    404 Page
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    
                    <!-- /Cards Section Ends Here -->

                    <!--Grid Form-->

                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                                Full Table
                            </div>
                            <div class="p-3">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Description</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Alphabet puzzle</td>
                                            <td>2016/01/15</td>
                                            <td>Done</td>
                                            <td data-order="1000">€1.000,00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Layout for poster</td>
                                            <td>2016/01/31</td>
                                            <td>Planned</td>
                                            <td data-order="1834">€1.834,00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Image creation</td>
                                            <td>2016/01/23</td>
                                            <td>To Do</td>
                                            <td data-order="1500">€1.500,00</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Create font</td>
                                            <td>2016/02/26</td>
                                            <td>Done</td>
                                            <td data-order="1200">€1.200,00</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Sticker production</td>
                                            <td>2016/02/18</td>
                                            <td>Planned</td>
                                            <td data-order="2100">€2.100,00</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Glossy poster</td>
                                            <td>2016/03/17</td>
                                            <td>To Do</td>
                                            <td data-order="899">€899,00</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Beer label</td>
                                            <td>2016/05/28</td>
                                            <td>Confirmed</td>
                                            <td data-order="2499">€2.499,00</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Shop sign</td>
                                            <td>2016/04/19</td>
                                            <td>Offer</td>
                                            <td data-order="1099">€1.099,00</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>X-Mas decoration</td>
                                            <td>2016/10/31</td>
                                            <td>Confirmed</td>
                                            <td data-order="1750">€1.750,00</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Halloween invite</td>
                                            <td>2016/09/12</td>
                                            <td>Planned</td>
                                            <td data-order="400">€400,00</td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>Wedding announcement</td>
                                            <td>2016/07/09</td>
                                            <td>To Do</td>
                                            <td data-order="299">€299,00</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>Member pasport</td>
                                            <td>2016/06/22</td>
                                            <td>Offer</td>
                                            <td data-order="149">€149,00</td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>Drink tickets</td>
                                            <td>2016/11/01</td>
                                            <td>Confirmed</td>
                                            <td data-order="199">€199,00</td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>Album cover</td>
                                            <td>2017/03/15</td>
                                            <td>To Do</td>
                                            <td data-order="4999">€4.999,00</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>Shipment box</td>
                                            <td>2017/02/08</td>
                                            <td>Offer</td>
                                            <td data-order="1399">€1.399,00</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>16</td>
                                            <td>Wooden puzzle</td>
                                            <td>2017/01/11</td>
                                            <td>Done</td>
                                            <td data-order="1000">€1.000,00</td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>Fashion Layout</td>
                                            <td>2016/01/30</td>
                                            <td>Planned</td>
                                            <td data-order="1834">€1.834,00</td>
                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td>Toy creation</td>
                                            <td>2016/01/10</td>
                                            <td>To Do</td>
                                            <td data-order="1550">€1.550,00</td>
                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td>Create stamps</td>
                                            <td>2016/02/26</td>
                                            <td>Done</td>
                                            <td data-order="1220">€1.220,00</td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>Sticker design</td>
                                            <td>2017/02/18</td>
                                            <td>Planned</td>
                                            <td data-order="2100">€2.100,00</td>
                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>Poster rock concert</td>
                                            <td>2017/04/17</td>
                                            <td>To Do</td>
                                            <td data-order="899">€899,00</td>
                                        </tr>
                                        <tr>
                                            <td>22</td>
                                            <td>Wine label</td>
                                            <td>2017/05/28</td>
                                            <td>Confirmed</td>
                                            <td data-order="2799">€2.799,00</td>
                                        </tr>
                                        <tr>
                                            <td>23</td>
                                            <td>Shopping bag</td>
                                            <td>2017/04/19</td>
                                            <td>Offer</td>
                                            <td data-order="1299">€1.299,00</td>
                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td>Decoration for Easter</td>
                                            <td>2017/10/31</td>
                                            <td>Confirmed</td>
                                            <td data-order="1650">€1.650,00</td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>Saint Nicolas colorbook</td>
                                            <td>2017/09/12</td>
                                            <td>Planned</td>
                                            <td data-order="510">€510,00</td>
                                        </tr>
                                        <tr>
                                            <td>26</td>
                                            <td>Wedding invites</td>
                                            <td>2017/07/09</td>
                                            <td>To Do</td>
                                            <td data-order="399">€399,00</td>
                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td>Member pasport</td>
                                            <td>2017/06/22</td>
                                            <td>Offer</td>
                                            <td data-order="249">€249,00</td>
                                        </tr>
                                        <tr>
                                            <td>28</td>
                                            <td>Drink tickets</td>
                                            <td>2017/11/01</td>
                                            <td>Confirmed</td>
                                            <td data-order="199">€199,00</td>
                                        </tr>
                                        <tr>
                                            <td>29</td>
                                            <td>Blue-Ray cover</td>
                                            <td>2018/03/15</td>
                                            <td>To Do</td>
                                            <td data-order="1999">€1.999,00</td>
                                        </tr>
                                        <tr>
                                            <td>30</td>
                                            <td>TV carton</td>
                                            <td>2019/02/08</td>
                                            <td>Offer</td>
                                            <td data-order="1369">€1.369,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script><script  src="./script.js"></script>
</body>

</html>