<?php
  session_start();
  require_once '../classes/DAO.php';
  $dao = new UserAccessOJT;
  $msg = null;
  // $url = null;
  // if(isset($_SESSION['url'])){
  //     $url = $_SESSION['url'];
  // }
  //  header('Location:'.$url);

  if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $credential = $dao->login($uname, $pass);
    print_r($credential);
      if(!empty($credential)){
        $_SESSION['user_id'] = $credential['user_id'];
        $_SESSION['user_name'] = $credential['user_name'];
        $_SESSION['logstatus'] = TRUE;
        $_SESSION['user_type'] = $credential['user_type'];
        if($_SESSION['user_type'] == 'ADMIN'){
            header('Location: ../admin/top.php');
        }else{
            header('Location: ../user/user-index.php');
        }
    }else{
        $msg = "User not Found";
    }
  }

  

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <!-- Theme CSS -->
        <link href="../css/log.css" rel="stylesheet"> 
        <title>OC Building</title>
    </head>
    <body>
  <div class="container">
  <?php echo $msg; ?>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Log In</h5>
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="text" name="uname" class="form-control" placeholder="Username" required autofocus>
                <label for="uname">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
                <label for="Pass">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login" type="submit">Log in</button>
              <hr class="my-4">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>