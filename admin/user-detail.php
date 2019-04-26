<?php
    session_start();
    if($_SESSION['logstatus'] !=TRUE OR $_SESSION['user_type'] !='ADMIN'){
        header('location: ../index.php');
    }
    require_once '../classes/mngDAO.php';
    $info = new ManageAccessO;
    $catchapp = $info->getapp();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>AdTop</title>
</head>
<body>
<div class="container">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="">
        <a class="navbar-brand" href="">OC Building</a>
        <div class="collapse navbar-collapse" id="">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li>
                <a class="nav-link js-scroll-trigger" href="top.php">Apprication</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="rooms.php">Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="users.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../log/logout.php">Logout</a>
            </li>
            </ul>
        </div>
    </nav>
</div>
    <br /><br /><br /><br />
    <!-- Here is Retrieve application.-->
    <div class="container-fluid">
        <div class="jumbotron mt-4">
            <h3>User Details</h3>
            <hr class="my-4">
            <div class="container text-right">
                <p>Resister new rooms.</p>
                <a class="btn btn-primary btn-lg" href="add-room.php" role="button">Add Rooms</a>
            </div>
        </div>
    </div>
    <!-- Body -->
    <div class="container">
        <table class="table table-storiped">
            <thead class="thead-dark">
                <th>#</th>
                <th>Castamer name</th>
                <th>Tel No.</th>
                <th>E-mail</th>
                <th>Room No.</th>
                <th>Building</th>
                <th>Desire Date</th>
                <th>Accepted Date</th>
                <th>Other</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php
                foreach($catchapp as $key=>$values){
                    echo "<tr>";
                        echo "<td>".$values['app_id']."</td>";
                        echo "<td>".$values['app_name']."</td>";
                        echo "<td>".$values['app_call_no']."</td>";
                        echo "<td>".$values['app_mail']."</td>";
                        echo "<td>".$values['app_room_no']."</td>";
                        echo "<td>".$values['app_build_name']."</td>";
                        echo "<td>".$values['app_desire_date']."</td>";
                        echo "<td>".$values['app_get_date']."</td>";
                        echo "<td>".$values['app_other']."</td>";
                        echo "<td>".$values['app_status']."</td>";
                        echo "<td><a href='edit-app.php?id=".$values['app_id']."' role='button' class='btn btn-warning'>Detail</a></td>";
                        echo "<td><a href='delete.php?id=".$values['app_id']."' role='button' class='btn btn-danger'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
        <br>
    </div>
    
</body>
</html>