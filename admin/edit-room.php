<?php
    session_start();
    if($_SESSION['logstatus'] !=TRUE OR $_SESSION['user_type'] !='ADMIN'){
        header('location: ../index.php');
    }
    require_once '../classes/mngDAO.php';
    $roomdao = new ManageAccessO;
    $id = $_GET['id'];
    $getroom = $roomdao->getOneRoom($id);

    if(isset($_POST['resister'])){

       
        $roomno = $_POST['roomNo'];
        $build = $_POST['build'];
        $vacancy = $_POST['vacancy'];
        $contdate = $_POST['contDate'];
        $findate = $_POST['finDate'];
        $tenant = $_POST['tenant'];
        $facility = $_POST['facility'];

        $roomdao->roomUpdate($id,$roomno,$build,$vacancy,$contdate,$findate,$tenant,$facility);
        
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
                    <a class="nav-link js-scroll-trigger" href="users.php">Users</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <br><br>
    <!-- Here is Search and Add Rooms.-->
    <div class="container-fluid">
        <div class="jumbotron mt-4">
            <h3>*Edit Room's detail..</h3>
            <hr class="my-4">
            <div class="container text-right">
            <p>Go back to the page of rooms.</p>
            <a class="btn btn-danger btn-lg" href="rooms.php" role="button">Back</a>
            </div>
        </div>
    </div>
    <!-- Body -->
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="roomNo">Room No. : </label>
                <input type="text" name="roomNo" class="form-control" value="<?php echo $getroom['room_no'];?>">
            </div>
            <div class="form-group">
                <label for="build">Building : </label>
                <input type="text" name="build" class="form-control" value="<?php echo $getroom['building'];?>">
            </div>
            <div class="form-group">
                <label for="build">vacancy : </label>
                <select name="vacancy" class="form-control" id="" value="<?php echo $getroom['vacancy'];?>">
                    <?php
                        switch($getroom['vacancy']){
                            case "V":
                                echo "<option value='V' selected>Vacant</option>";
                                echo "<option value='I'>tenant IN </option>";
                                break;
                            case "I":
                                echo "<option value='V'>Vacant</option>";
                                echo "<option value='I' selected>tenant IN </option>";
                                break;
                            default:
                                echo "No options";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="contDate">Contract Date : </label>
                <input type="date" name="contDate" class="form-control" value="<?php echo $getroom['contract_date'];?>">
            </div>
            <div class="form-group">
                <label for="finDate">Contract Finish Date : </label>
                <input type="date" name="finDate" class="form-control" value="<?php echo $getroom['contract_fin_date'];?>">
            </div>
            <div class="form-group">
                <label for="tenant">Tenant : </label>
                <input type="text" name="tenant" class="form-control" value="<?php echo $getroom['tenant'];?>">
            </div>
            <div class="form-group">
                <label for="facility">Facilities : </label>
                <textarea name="facility" id="" cols="30" rows="10" class="form-control"><?php echo $getroom['facility'];?></textarea>
            </div>
            <input type="submit" value="Update" name="resister" class="form-control btn btn-warning">
        </form>
        
    </div>
  
</body>
</html>