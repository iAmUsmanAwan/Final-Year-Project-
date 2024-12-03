<?php

if (isset($_POST['service'])) {
   
   $server = "localhost";
   $username = "root";
   $password = "";

   
   $con = mysqli_connect($server, $username, $password);
   
   
   if (!$con) {
      die("connection to the server failed due to " . mysqli_connect_error());
   }

   $cloud_service = $_POST['service'];
   
   $sql = "SELECT * FROM `cms` . `" . $cloud_service . "`";

   $result = $con->query($sql);

   $services = array();

   if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {


        $service = array();

        array_push($service, $row['name']);
        array_push($service, $row['pricing_mode']);
        array_push($service, $row['establishment_year']);
        array_push($service, $row['version']);
        array_push($service, $row['price']);
        array_push($service, $row['compatible_browser']);

        if ($cloud_service == 'iaas' || $cloud_service == 'paas') {
            array_push($service, $row['application']);
        }

        if ($cloud_service == 'iaas') {
            array_push($service, $row['storage'] . ' GB');
            array_push($service, $row['runtime']);
        }

        array_push($services, $service);

    }

   }


   echo json_encode($services);
   $con->close();
   die();
    
}