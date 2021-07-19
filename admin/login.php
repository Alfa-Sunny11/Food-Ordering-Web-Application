<?php
    include('../configure/config.php');
?>

<html>
   <head>
   <title>Login - Food Order System</title>
   </head>

   <body>
      <div>
            <h1>Login</h1><br><br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no_login_msg'])){
                  echo $_SESSION['no_login_msg'];
                  unset($_SESSION['no_login_msg']);
              }
            ?> <br>   

            <form active = "" method = "POST">
                  Username:<br>
                  <input type ="text" name = "uname" placeholder = "Enter your username"><br><br>
                  
                  Password:<br>
                  <input type ="password" name = "password" placeholder = "Enter Password"><br><br>
                  
                  <input type ="submit" name = "submit" value = "login">
            </form>
            <p>Created By - <a href = "#" >Group-3</a></p>
      </div>
   </body>
</html>

<?php
      if(isset($_POST['submit'])){
            $uname = $_POST['uname'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM admin WHERE uname='$uname' AND password = '$password'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            if($count == 1){
                  $_SESSION['login'] = "Login Successfully";
                  $_SESSION['user'] = $uname;
                  header("location:".SITEURL.'admin/');
              }
              else{
                  $_SESSION['login'] = "Username or Password didn't match";
                  header("location:".SITEURL.'admin/login.php');
              }
      }
?>