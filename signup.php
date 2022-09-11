<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        // save to database
        // $user_id = random_num(20);
        $query = "insert into users (user_name, password) values ('$user_name', '$password')";

        mysqli_query($con, $query);
        header("Location: login.php");
        die;
    }else{
        echo "Please enter valid information";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
</head>
<body>
    <style type="text/css">
        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
        }
        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }
        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>

        <!-- header -->
        <header>
         <!-- header inner -->
         <div class="header" style="margin-bottom: 20px;">
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
                                    <a class="nav-link" href="service.php">Services We Offer</a>
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

        <?php 
            if (!$_SESSION) {
                
                ?>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Signup</div>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>
            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>

    <?php
            }
            else {
                echo "Already Logged In";
            }
        ?>

    

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

</body>
</html>