<?php
session_start();
if (isset($_POST['price'])) {

   // set connection variables
   $server = "localhost";
   $username = "root";
   $password = "";

   // create a database connection
   $con = mysqli_connect($server, $username, $password);

   // check for connection success
   if (!$con) {
      die("connection to the server failed due to " . mysqli_connect_error());
   }
   // echo"Success connecting to the db";

   $cloud_services = $_POST['cloud-services'];
   $pricing_mode = $_POST['pricing-mode'];
   $price = $_POST['price'];
   $storage = $_POST['storage'];

   $sql = "SELECT * FROM `cms` . `" . $cloud_services . "` WHERE `price` <= '" . $price . "' AND `pricing_mode`='" . $pricing_mode . "'";
   
   if ($cloud_services == 'iaas') {
      $sql = "SELECT * FROM `cms` . `" . $cloud_services . "` WHERE `price` <= '" . $price . "' AND `pricing_mode`='" . $pricing_mode . "' AND `storage` <= '".$storage."'";
   }

   $result = $con->query($sql);

   if ($result->num_rows > 0) {
      // output data of each row

?>

      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Pricing Mode</th>
                  <th scope="col">Establishment Year</th>
                  <th scope="col">Version</th>
                  <th scope="col">Price</th>
                  <th scope="col">Compatible Browser</th>
                  <?php
                        if ($cloud_services == 'iaas' || $cloud_services == 'paas') {
                           ?>
                              <th scope="col">Application</th>
                           <?php
                        }
                     ?>
                     <?php
                        if ($cloud_services == 'iaas') {
                           ?>
                              <th scope="col">Storage</th>
                              <th scope="col">Run Time</th>
                           <?php
                        }
                     ?>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <?php
                  while ($row = $result->fetch_assoc()) {

                  ?>

                     <td><?php echo $row["name"] ?></td>
                     <td><?php echo $row["pricing_mode"] ?></td>
                     <td><?php echo $row["establishment_year"] ?></td>
                     <td><?php echo $row["version"] ?></td>
                     <td><?php echo $row["price"] ?></td>
                     <td><?php echo $row["compatible_browser"] ?></td>
                     <?php
                        if ($cloud_services == 'iaas' || $cloud_services == 'paas') {
                           ?>
                              <td><?php echo $row["application"] ?></td>
                           <?php
                        }
                     ?>
                     <?php
                        if ($cloud_services == 'iaas') {
                           ?>
                              <td><?php echo $row["storage"] . ' GB' ?></td>
                              <td><?php echo $row["runtime"] ?></td>
                           <?php
                        }
                     ?>

                  <?php
                  }
                  ?>
               </tr>
            </tbody>
         </table>
      </div>

<?php

   }
   // close the connection
   // $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Cloud-Inspector</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <style>

      .compare-service-div {
         height: 100%;
      }

      .compare-service-table td:nth-child(1) {  
         font-weight: bold;
      }

   </style>
</head>
<!-- body -->

<body class="main-layout">

   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="header_to d_none">
            <div class="container">
               <div class="row">
                  
               </div>
            </div>
         </div>
         <div class="header_midil">
            <div class="container">
               <div class="row d_flex">
                  
                  <div class="col-md-4 col-sm-4 ">
                     <a class="logo" href="#"><img src="images/logo.png" alt="#" /></a>
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="header_bo">
            <div class="container">
               <div class="row">
                  <div class="col-md-9 col-sm-7">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="index.html"> Home </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">Cloud Services</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="service.php">Services We Offer</a>
                              </li>
                              
                              <li class="nav-item">
                                 <a class="nav-link" href="FAQ.php">FAQ</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.php"> Contact us </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="logout.php"> <?php if ($_SESSION) {
                                                                           echo "Logout";
                                                                        } ?> </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="dashboard.php"> 
                                    <?php 
                                       if ($_SESSION) {
                                          if ($_SESSION['role'] == 'admin') {
                                             echo "Dashboard";
                                          }
                                       } 
                                    ?> 
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end header inner -->
   <!-- end header -->

   <?php
   if ($_SESSION) {
   ?>

      <!-- service section -->
      <div id="service" class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2><strong class="yellow">serviceS offered by us</strong><br> WE PROVIDE VERY IMPORTANT FEATURES, </BR> TO LET THE USER COMPARE TWO SERVICES OR SEARCH FOR THE REQUIRED CLOUD SERVICE</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-sm-6">
                  <div id="ho_color" class="service_box">
                     <img src="images/service_icon5.png" alt="#" />
                     <h3 data-toggle="modal" data-target="#exampleModal" style="cursor: pointer">SEARCH FOR THE CLOUD SERVICE</h3>
                     <p>Easily search and view cloud service and the specifications of the cloud services.</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="ho_color" class="service_box">
                     <img src="images/service_icon6.png" alt="#" />
                     <h3 data-toggle="modal" data-target="#comparisonModal" style="cursor: pointer">COMPARISON SYSTEM</h3>
                     <p>Easily compare cloud services, and decide which is best for your business.</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="ho_color" class="service_box">
                     <img src="images/service_icon6.png" alt="#" />
                     <h3 data-toggle="modal" data-target="#rankingModal" style="cursor: pointer">Ranking System</h3>
                     <p>Easily rank cloud services, and decide which is best for your business.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>


      <!-- Search Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Suggest Best Cloud Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">

                  <form method="POST">
                     <div class="form-group">
                        <label for="cloud-services">Cloud Services</label><br>
                        <select id="cloud-services" name="cloud-services">
                           <option value="">Select your Cloud Services</option>
                           <option value="iaas">IAAS</option>
                           <option value="paas">PAAS</option>
                           <option value="saas">SAAS</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="pricing-mode">Pricing Mode</label><br>
                        <select id="pricing-mode" name="pricing-mode">
                           <option value="">Select your Cloud Services Pricing Mode</option>
                           <option value="Hourly">Hourly</option>
                           <option value="Monthly">Monthly</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="price">Price</label><br>
                        <input id="price" placeholder="Price" name="price" />
                     </div>
                     <div class="form-group" style="display: none" id="storage-div">
                        <label for="storage">Storage</label><br>
                        <input type="text" id="storage" placeholder="Storage" name="storage">
                     </div>

                     <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

               </div>

            </div>
         </div>
      </div>
      <!-- Search Modal Ends -->

      <!-- Comparison Modal -->

      <div class="modal fade" id="comparisonModal" tabindex="-1" role="dialog" aria-labelledby="comparisonModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="comparisonModalLabel">Compare Cloud Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">

                  <div class="compare-services">

                     <h4>Choose the service that you want to compare:</h4>

                     <select id="cloud-service-select" name="cloud-service-select">
                        <option value="">Select a Service</option>
                        <option value="iaas">IAAS</option>
                        <option value="paas">PAAS</option>
                        <option value="saas">SAAS</option>
                     </select>


                  </div>

                  <div class="compare-service-div" style="display: none">

                     <div class="first-service">
                        First Service
                     </div>

                     <div class="second-service">
                        Second Service
                     </div>

                  </div>

                  <div class="compare-service-table">

                     <div style="display: none;" class="iaas-table table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">Attribute</th>
                                 <th scope="col">First Service</th>
                                 <th scope="col">Second Service</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Name</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Pricing Mode</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Establishment Year</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Version</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr class="price">
                                 <td>Price</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Compatible Browser</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Application</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr class="storage">
                                 <td>Storage</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Runtime</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>

                     <div style="display: none;" class="paas-table table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">Attribute</th>
                                 <th scope="col">First Service</th>
                                 <th scope="col">Second Service</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Name</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Pricing Mode</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Establishment Year</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Version</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr class="price">
                                 <td>Price</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Compatible Browser</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Application</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>

                     <div style="display: none" class="saas-table table-responsive">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th scope="col">Attribute</th>
                                 <th scope="col">First Service</th>
                                 <th scope="col">Second Service</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Name</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Pricing Mode</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Establishment Year</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Version</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr class="price">
                                 <td>Price</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                              <tr>
                                 <td>Compatible Browser</td>
                                 <td class="first-column"></td>
                                 <td class="second-column"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>

                  </div>

               </div>

            </div>
         </div>
      </div>

      <!-- Comparison Modal Ends -->


      <div class="modal fade" id="rankingModal" tabindex="-1" role="dialog" aria-labelledby="rankingModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="rankingModalLabel">Ranking Cloud Service</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">

                  <!-- <input type="text" placeholder="Enter Price" id="ranking-price"> -->
                  <!-- <input type="text" placeholder="Enter Storage" id="ranking-storage"> -->
                  <select id="ranking-services">
                     <option value="">Select a Service</option>
                     <option value="iaas">IAAS</option>
                     <option value="saas">SAAS</option>
                     <option value="paas">PAAS</option>
                  </select>

                  <button class="btn btn-success" id="rank-btn">Rank</button>

                  <div id="ranking-services-iaas" style="display: none">
                  <ol>
                     <?php 

$server = "localhost";
$username = "root";
$password = "";

// create a database connection
$con = mysqli_connect($server, $username, $password);

                        $qq = 'SELECT * FROM `cms` . `iaas`';
                        $r = $con->query($qq);
                        while ($row = $r->fetch_assoc()) {
                        
                           ?>

<li style="list-style: decimal; font-weight: bold; margin-left: 10px; font-size: 20px"><?php echo $row['name'] ?></li>

                           <?php

                        }

                     ?>
                     </ol>
                  </div>


                  <div id="ranking-services-saas" style="display: none">
                  <ol>
                     <?php 

$server = "localhost";
$username = "root";
$password = "";

// create a database connection
$con = mysqli_connect($server, $username, $password);

                        $qq = 'SELECT * FROM `cms` . `saas`';
                        $r = $con->query($qq);
                        while ($row = $r->fetch_assoc()) {
                        
                           ?>

                              <li style="list-style: decimal; font-weight: bold; margin-left: 10px; font-size: 20px"><?php echo $row['name'] ?></li>

                           <?php

                        }

                     ?>
                     </ol>
                  </div>

                  <div id="ranking-services-paas" style="display: none">
                  <ol>
                  
                     <?php 

$server = "localhost";
$username = "root";
$password = "";

// create a database connection
$con = mysqli_connect($server, $username, $password);

                        $qq = 'SELECT * FROM `cms` . `paas`';
                        $r = $con->query($qq);
                        while ($row = $r->fetch_assoc()) {
                        
                           ?>
                              
                              <li style="list-style: decimal; font-weight: bold; margin-left: 10px; font-size: 20px"><?php echo $row['name'] ?></li>
                        
                           <?php

                        }

                     ?>

                     </ol>
                     
                  </div>


               </div>

            </div>
         </div>
      </div>

      <script>
         
         document.addEventListener("DOMContentLoaded", function(){
            document.querySelector("#rank-btn").onclick = function() {
               
               // let rankPrice = document.querySelector("#ranking-price").value;
               // let rankStorage = document.querySelector("#ranking-storage").value;

               let service = document.querySelector('#ranking-services').value;

               if (service == 'iaas') {
                  document.querySelector('#ranking-services-iaas').style.display = 'block';
                  document.querySelector('#ranking-services-saas').style.display = 'none';
                  document.querySelector('#ranking-services-paas').style.display = 'none';
               }

               else if (service == 'saas') {
                  document.querySelector('#ranking-services-saas').style.display = 'block';
                  document.querySelector('#ranking-services-iaas').style.display = 'none';
                  document.querySelector('#ranking-services-paas').style.display = 'none';
               }

               else if (service == 'paas') {
                  document.querySelector('#ranking-services-paas').style.display = 'block';
                  document.querySelector('#ranking-services-saas').style.display = 'none';
                  document.querySelector('#ranking-services-iaas').style.display = 'none';
               }

            }
         })

      </script>


      <!-- service section -->

   <?php } else {
   ?>

      <div>
         <h1>You need to Login to access this page.</h1>
         <a href="login.php">Click Here to Login</a>
      </div>

   <?php
   }
   ?>
   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <a class="logo2" href="#"><img src="images/loogo2.png" alt="#" /></a>
               </div>
               <div class="col-lg-5 col-md-6 col-sm-6">
                  <h3>Contact Us</h3>
                  <ul class="location_icon">
                     <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> United Kingdom
                        <br> Lahore
                     </li>
                     <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>abdullahrashid059@gmail.com<br>
                        muhammadusmanawan88@gmail.com</li>
                     <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a>+92
                        3095219445<br>+92 3354013870</li>
                  </ul>
                  <ul class="social_icon">
                     <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                     <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li> <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                     <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
               </div>
               <div class="col-lg-2 col-md-6 col-sm-6">
                  <h3>Menus</h3>
                  <ul class="link_icon">
                     <li> <a href="index.html"> Home</a></li>
                     <li>
                        <a href="about.html">
                           </i>Cloud Services
                     </li>
                     <li class="active"> <a href="service.php"> </i>Services We Offer</a></li>
                     
                     <li> <a href="FAQ.php"></i>FAQ</a></li>
                     <li> <a href="contact.php"></i>Contact us</a></li>
                  </ul>
               </div>
               

            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>© 2022 All Rights Reserved.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>

   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>

   <script>
      var globalResult;

      function setServices(location, index) {
         var compService = document.getElementById('cloud-service-select').value;
         var service = globalResult[index];
         if (location == 'first') {
            var firstColumns = document.querySelectorAll('.'+compService+'-table .first-column');
            service.forEach((value, index) => {
               firstColumns[index].innerHTML = value;
            })

         } else if (location == 'second') {
            var secondColumns = document.querySelectorAll('.'+compService+'-table .second-column');
            service.forEach((value, index) => {
               secondColumns[index].innerHTML = value;
            })
         }
         var tableName = '.' + compService + "-table ";
         var firstPrice = document.querySelector(tableName + '.price .first-column').innerText;
         var secondPrice = document.querySelector(tableName + '.price .second-column').innerText;
         var firstStorage = document.querySelector('.storage .first-column').innerHTML;
         var secondStorage = document.querySelector('.storage .second-column').innerHTML;

         if (firstPrice === '' || secondPrice === '') {

         }else {
            // setTimeout(() => {

               if (firstPrice > secondPrice) {
                  alert("Second Service is better in Price.");
               }
               else if (firstPrice < secondPrice) {
                  alert("First Service is better in Price.");
               }
               else {
                  alert("Both Services have same price.");
               }

            // }, 1000);
         }

         if (firstStorage === '' || secondStorage === '' || compService !== 'iaas') {

         }else {
            if (firstStorage > secondStorage) {
               alert("Second Service is better in Storage.");
            }
            else if (firstStorage < secondStorage) {
               alert("First Service is better in Storage.");
            }
            else {
               alert("Both Services have same storage.");
            }
         }

      }

      document.getElementById('cloud-service-select').onchange = function() {
         var compService = document.getElementById('cloud-service-select').value;
         document.querySelector('.iaas-table').style.display = 'none';
         document.querySelector('.paas-table').style.display = 'none';
         document.querySelector('.saas-table').style.display = 'none';
         document.querySelector('.'+compService+'-table').style.display = 'block';
         if (compService != '') {

            var form_data = {
               service: compService
            };

            jQuery.ajax({
               type: "POST",
               url: "compare.php",
               data: form_data,
               success: function(result) {
                  result = JSON.parse(result);
                  // console.log(result);
                  globalResult = result;
                  document.querySelector('.compare-service-div').style.display = 'flex';
                  document.querySelector('.first-service').innerHTML = '';
                  document.querySelector('.second-service').innerHTML = '';

                  result.forEach((service, index) => {
                     var h3 = document.createElement('h3');
                     h3.innerHTML = service[0];
                     h3.setAttribute('style', 'cursor: pointer; color: red');
                     h3.setAttribute('onclick', 'setServices("first", "' + index + '")')

                     var h32 = document.createElement('h3');
                     h32.innerHTML = service[0];
                     h32.setAttribute('style', 'cursor: pointer; color: green');
                     h32.setAttribute('onclick', 'setServices("second", "' + index + '")')

                     document.querySelector('.first-service').append(h3);
                     document.querySelector('.second-service').append(h32);
                  })
               },
               error: function(err) {
                  console.log('err: ', err);
               }
            })

         }
      }

      document.getElementById('cloud-services').onchange = function() {
         document.getElementById('storage-div').style.display = 'none';
         if (document.getElementById('cloud-services').value == 'iaas') {
            document.getElementById('storage-div').style.display = 'block';
         }
      }

   </script>

</body>

</html>