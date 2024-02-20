  <?php
      session_start();
    session_unset();
    session_destroy();
    print_r($_SESSION['username']);
    $flag=false;
    header("location:login.php");
   
    // header('location:login.php?id');

    
?>
