<?php

$server = "localhost";
$username = "root";
$password = "";


$con = mysqli_connect($server, $username, $password);


if (!$con) {
    die("connection to the server failed due to " . mysqli_connect_error());
}

$sql = "SELECT * FROM `cms` . `iaas`";

$result = $con->query($sql);

$iaas_names = array();
$iaas_pricing = array();
$iaas_storage = array();

$paas_names = array();
$paas_pricing = array();
$paas_storage = array();

$saas_names = array();
$saas_pricing = array();
$saas_storage = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($iaas_names, $row['name']);
        array_push($iaas_pricing, $row['price']);
        array_push($iaas_storage, $row['version']);
    }
}

$sql = "SELECT * FROM `cms` . `paas`";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($paas_names, $row['name']);
        array_push($paas_pricing, $row['price']);
        array_push($paas_storage, $row['version']);
    }
}

$sql = "SELECT * FROM `cms` . `saas`";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($saas_names, $row['name']);
        array_push($saas_pricing, $row['price']);
        array_push($saas_storage, $row['version']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/dashboard-design.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="app-icon">
                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z" />
                    </svg>
                </div>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="./dashboard.php">
                        <span>Messages</span>
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="./FAQDash.php">
                        <span>FAQ</span>
                    </a>
                </li>
                <li class="sidebar-list-item active">
                    <a href="#">
                        <span>Services</span>
                    </a>
                </li>
            </ul>

        </div>
        <div class="app-content">

            <h1 style="color: white;">Services</h1>

            <h3 style="color: white">IAAS</h3>

            <button style="width: fit-content; margin-bottom: 10px" class="btn btn-success"  data-toggle="modal" data-target="#IAASModal">ADD IAAS Service</button>

            <div class="table-responsive">
                <table class="table" style="width: 100%; text-align: center; color: white">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Version</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        for ($i=0; $i<count($iaas_names); $i++) {
                            ?>

                            <tr>
                                <td><?php echo $iaas_names[$i] ?></td>
                                <td><?php echo $iaas_pricing[$i] ?></td>
                                <td><?php echo $iaas_storage[$i] ?></td>
                            </tr>

                            <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>

            <h3 style="color: white">PAAS</h3>

            <button style="width: fit-content; margin-bottom: 10px" class="btn btn-success">ADD PAAS Service</button>

            <div class="table-responsive">
                <table class="table" style="width: 100%; text-align: center; color: white">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Version</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        for ($i=0; $i<count($paas_names); $i++) {
                            ?>

                            <tr>
                                <td><?php echo $paas_names[$i] ?></td>
                                <td><?php echo $paas_pricing[$i] ?></td>
                                <td><?php echo $paas_storage[$i] ?></td>
                            </tr>

                            <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>

            <h3 style="color: white;">SAAS</h3>

            <button style="width: fit-content; margin-bottom: 10px" class="btn btn-success">ADD SAAS Service</button>

            <div class="table-responsive">
                <table class="table" style="width: 100%; text-align: center; color: white">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Version</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        for ($i=0; $i<count($saas_names); $i++) {
                            ?>

                            <tr>
                                <td><?php echo $saas_names[$i] ?></td>
                                <td><?php echo $saas_pricing[$i] ?></td>
                                <td><?php echo $saas_storage[$i] ?></td>
                            </tr>

                            <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <!-- IAAS Modal -->
    <div class="modal fade" id="IAASModal" tabindex="-1" role="dialog" aria-labelledby="IAASModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="IAASModalLabel">ADD IAAS Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="iaas-name">Name</label>
                            <input type="text" class="form-control" id="iaas-name" aria-describedby="IAASNameHelp" placeholder="Enter Service Name" name="iaas-name">
                        </div>
                        <div class="form-group">
                            <label for="iaas-year">Establishment Year</label>
                            <input type="text" class="form-control" id="iaas-year" placeholder="Enter Establishment Year" name="iaas-year">
                        </div>
                        <input type="submit" id="add-iaas-btn" class="btn btn-primary" value="Submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>