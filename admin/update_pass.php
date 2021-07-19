<?php
    include('inside/menu.php');
?>

<div>
    <div class = "wrapper">
        <h1>Change Password</h1><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
        ?>

        <form action = "" method = "POST">
        <table>
                <tr>
                    <td>Current Password:</td>
                    <td><input type ="password" name = "current_password" placeholder = "Current password"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type ="password" name = "new_ password" placeholder = "New password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type ="password" name = "con_ password" placeholder = "Confirm password">
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type = "hidden" name = "id" value ="<?php echo $id; ?>">
                    <input type = "submit" name = "submit" value ="Change Password">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $con_password = md5($_POST['con_password']);

        $sql = "SELECT * FROM admin WHERE id = $id AND password = 'current_password'";

        $res = mysqli_query($conn, $sql);

        if($res == true){
            $count = mysqli_num_rows($res);
                if($count == 1){
                    if($new_password == $con_password){
                        $sql2 = "UPDATE admin SET
                        password = '$new_password'
                        WHERE id = $id";

                        $res2 = mysqli_query($conn, $sql);
                        if($res2 == true){
                            $_SESSION['change_password'] = "Change Successfully";
                            header("location:".SITEURL.'admin/manage.php');
                        }
                        else{
                            $_SESSION['change_password'] = "Failed to Change";
                            header("location:".SITEURL.'admin/manage.php');
                        }

                    }
                    else{
                        $_SESSION['user-not-match'] = "User Didn't Match";
                    header("location:".SITEURL.'admin/manage.php');
                    }
                }
                else{
                    $_SESSION['user-not-found'] = "User Not Found";
                    header("location:".SITEURL.'admin/manage.php');
                }
        }
    }
?>

<?php
    include('inside/footer.php');
?>