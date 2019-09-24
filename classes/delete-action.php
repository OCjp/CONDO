<?php
    
    require_once 'connect.php';

    //Actionページは、同じクラスごとに分けないといけない。
    //今回は思い通りに表示できなかったので、このページはボツとする。
    //次回、OOPオブジェクト指向としてこの形式で書いてみることにトライ。
    //このページはSQLにインサートしたり、情報を入れたり書き換えたりする際に記述するPHP文を書いている。
    //また、フォームタグののアクションでこちらのページへリンクさせて使用する。

    // For ROOM//
    require_once '../classes/mngDAO.php';
    $addRoom = new ManageAccessO;
    //issetは空欄があったら実行しないみたいな意味。
    if(isset($_POST['resister'])){
        $roomno = $_POST['roomNo'];
        $build = $_POST['build'];
        $contDate = $_POST['contDate'];
        $finDate = $_POST['finDate'];
        $tenant = $_POST['tenant'];
        $facility = $_POST['facility'];
   
        $addRoom->addRoom($roomno,$build,$contDate,$finDate,$tenant,$facility);
        header('Location: ../admin/rooms.php');

    }


    //For Application//
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