<?php 
session_start();
if(isset($_POST['price'])){

// set connection variables
$server ="localhost";
$username ="root";
$password ="";

// create a database connection
$con = mysqli_connect($server, $username, $password);

// check for connection success
if(!$con){
   die("connection to the server failed due to " . mysqli_connect_error());
}
// echo"Success connecting to the db";

$cloud_services = $_POST['cloud-services'];
$pricing_mode = $_POST['pricing-mode'];
$price = $_POST['price'];

$sql = "SELECT * FROM `cms` . `".$cloud_services."` WHERE `price` <= '".$price."' AND `pricing_mode`='".$pricing_mode."'";

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
      <th scope="col">Storage</th>
      <th scope="col">Compatible Version</th>
      <th scope="col">Run Time</th>
      <th scope="col">Application</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
      while($row = $result->fetch_assoc()) {
         
         ?>

            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["pricing_mode"] ?></td>
            <td><?php echo $row["establishment_year"] ?></td>
            <td><?php echo $row["version"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <td><?php echo $row["storage"] ?></td>
            <td><?php echo $row["compatible_browser"] ?></td>
            <td><?php echo $row["runtime"] ?></td>
            <td><?php echo $row["application"] ?></td>

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
$con->close();
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
                     <div class="col-md-6 col-sm-6">
                        <ul class="lan">
                           <li><i class="fa fa-globe" aria-hidden="true"></i> Language : <img src="images/fleg.png" alt="#"/></li>
                        </ul>
                        <form action="#" >
                           <div class="select-box">
                              <label for="select-box1" class="label select-box1"><span class="label-desc">English</span> </label>
                              <select id="select-box1" class="select">
                                 <option value="Choice 1">English</option>
                                 <option value="Choice 1">Russian</option>
                                 <option value="Choice 2">Chinese</option>
                                 <option value="Choice 3">Japanese</option>
                              </select>
                           </div>
                        </form>
                     </div>
                     <div class="col-md-6 col-sm-6 ">
                        <ul class="social_icon1">
                           <li> F0llow Us
                           </li>
                           <li> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                           </li>
                           <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li> <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4 col-sm-4 d_none">
                        <ul class="conta_icon">
                           <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Call Us : +92 3095219445</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4 col-sm-4 " >
                        <a class="logo" href="#"><img src="images/logo.png" alt="#"/></a>
                     </div>
                     <div class="col-md-4 col-sm-4 d_none">
                        <ul class="conta_icon ">
                           <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>abdullahrashid059@gmail.com</a> </li>
                        </ul>
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
                                    <a class="nav-link" href="index.html"> Home  </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="about.html">Cloud Services</a>
                                 </li>
                                 <li class="nav-item active">
                                    <a class="nav-link" href="service.html">Services We Offer</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="team.html">Team </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="FAQ.php">FAQ</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="contact.php"> Contact us </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="logout.php"> <?php if($_SESSION) { echo "Logout"; } ?> </a>
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
                     <img src="images/service_icon5.png" alt="#"/>
                     <h3 data-toggle="modal" data-target="#exampleModal" style="cursor: pointer">SEARCH FOR THE CLOUD SERVICE</h3>
                     <p>Easily search and view cloud service and the specifications of the cloud services.</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <div id="ho_color" class="service_box">
                     <img src="images/service_icon6.png" alt="#"/>
                     <h3>COMPARISON SYSTEM</h3>
                     <p>Easily compare cloud services, and decide which is best for your business.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>


<!-- Modal -->
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
    <input id="price"placeholder="Price" name="price" />
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

      </div>
      
    </div>
  </div>
</div>
      <!-- service section -->

      <?php } 
         else {
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
                  <ul class="social_icon" >
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
                     <li class="active"> <a href="service.html"> </i>Services We Offer</a></li>
                     <li> <a href="team.html"></i>Team</a></li>
                     <li> <a href="FAQ.php"></i>FAQ</a></li>
                     <li> <a href="contact.php"></i>Contact us</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <h3>Types of Cloud Services</h3>
                  <ul class="link_icon">
                     <li> <a href="#"> IaaS </a></li>
                     <li> <a href="#"> PaaS </a></li>
                     <li> <a href="#"> SaaS </a></li>
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
   </body>
</html>
