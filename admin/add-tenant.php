<?php
    session_start();
    if($_SESSION['logstatus'] !=TRUE OR $_SESSION['user_type'] !='ADMIN'){
        header('location: ../index.php');
    }
    require_once '../classes/mngDAO.php';
    $addtenant = new ManageAccessO;

    //issetは空欄があったら実行しないみたいな意味。
    if(isset($_POST['resister'])){
        $name = $_POST['name'];
        $call = $_POST['call'];
        $mail = $_POST['mail'];
        $room = $_POST['room'];
        $build = $_POST['build'];
        $age = $_POST['age'];
        $start = $_POST['startDate'];
        $fin = $_POST['finDate'];
   
        $addtenant->addTenant($name,$call,$mail,$room,$build,$age,$start,$fin);
        //header('Location: form-fin.php');
    }
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
    <!-- Navigation -->
    <div class="container fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light py-3" id="">
        <div class="container">
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
                    <a class="nav-link js-scroll-trigger" href="tenant.php">tenants</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    </div>
    <!-- Here is Search and Add Rooms.-->
    <div class="container-fluid">
        <div class="jumbotron mt-4">
            <h3>*Resister a New Tenant*</h3>
            <hr class="my-4">
            <div class="container text-right">
            <p>Go back to the page of Tenants.</p>
            <a class="btn btn-danger btn-lg" href="rooms.php" role="button">Back</a>
            </div>
        </div>
    </div>
    <!-- Body -->
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age : </label>
                <input type="text" name="age" class="form-control">
            </div>
            <div class="form-group">
                <label for="call">Call No. : </label>
                <input type="text" name="call" class="form-control">
            </div>
            <div class="form-group">
                <label for="mail">E-mail : </label>
                <input type="email" name="mail" class="form-control">
            </div>
            <div class="form-group">
                <label for="room">Room No. : </label>
                <input type="text" name="room" class="form-control">
            </div>
            <div class="form-group">
                <label for="build">Building : </label>
                <input type="text" name="build" class="form-control">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <h6>Contract Date</h6>
                    <label for="startDate">Start Date ~</label>
                    <input type="date" name="startDate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="finDate">~Expire Date </label>
                    <input type="date" name="finDate" class="form-control">
                </div>
            </div>
            <input type="submit" value="New Resistration" name="resister" class="form-control btn btn-warning">
        </form>
        
    </div>
  
</body>
</html>