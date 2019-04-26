<?php
   session_start();
   if($_SESSION['logstatus'] !=TRUE OR $_SESSION['user_type'] !='USER'){
       header('location: ../index.php');
   }
   require_once '../classes/userDAO.php';
   $form = new UserAccessO;
    //issetは空欄があったら実行しないみたいな意味。
    if(isset($_POST['resister'])){
        $uname = $_POST['name'];
        $call = $_POST['call'];
        $mail = $_POST['mail'];
        $roomno = $_POST['roomno'];
        $build = $_POST['build'];
        $date = $_POST['date'];
        $other = $_POST['question'];
       
        $form->addForm($uname,$call,$mail,$roomno,$build,$date,$other);
        header('Location: form-fin.php');
        //ここのヘッダーが多分上のを読み込んでる。
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>OC Building</title>

  <!-- Font Awesome Icons -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="../css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="user-index.php">OC Building</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
        
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#form">Apply to meet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../log/logout.php"><i class="fas fa-sign-in-alt"></i>Logout **</a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- form to Action Section -->
  <section class="page-section bg-dark text-white" id="form">
    <div class="container text-center">
      <h3 class="mb-4">-Apprication form-</h3><br><br>
      <p>*Please confirm your writing.</p>
      <br><br>
        <form action="form.php" method="post">
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" name="name" class="form-control" value="<?php echo $_POST['name'];?>">
            </div>
            <div class="form-group">
                <label for="call">Telephone No. : </label>
                <input type="text" name="call" class="form-control"  value="<?php echo $_POST['call'];?>">
            </div>
            <div class="form-group">
                <label for="mail">Mail Address : </label>
                <input type="email" name="mail" class="form-control" value="<?php echo $_POST['mail'];?>">
            </div>
            <div class="form-group">
                <label for="roomno">Room No. you're interested in : </label>
                <input type="text" name="roomno" class="form-control" value="<?php echo $_POST['roomno'];?>">
            </div>
            <div class="form-group">
                <label for="build">Name of Building : </label>
                <input type="text" name="build" class="form-control" value="<?php echo $_POST['build'];?>">
            </div>
            <div class="form-group">
                <label for="date">Desire Date : </label>
                <input type="date" name="date" class="form-control" value="<?php echo $_POST['date'];?>">
            </div>
            <div class="form-group">
                <label for="question">Question If You Have : </label>
                <textarea name="question" id="" cols="30" rows="10" class="form-control"><?php echo $_POST['question'];?>"</textarea>
            </div>
            <input type="submit" value="Apply" name="resister" class="form-control btn btn-danger">
        </form>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/creative.min.js"></script>

</body>

</html>