
<?php
//whether user logged in or not
      if(!isset($_SESSION['user'])){
            $_SESSION['no_login_msg'] = "Please login first";
            header("location:".SITEURL.'admin/login.php');
      }
?>