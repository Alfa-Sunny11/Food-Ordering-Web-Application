<?php
    include('inside/menu.php');
?>
<div>
    <div class = "wrapper">
        <h1>Add Admin</h1><br><br>
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset ($_SESSION['add']);

            }
        ?>

        <form action = "" method = "POST">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type ="text" name = "name" placeholder = "Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type ="text" name = "uname" placeholder = "Enter your username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type ="password" name = "password" placeholder = "Enter Password"></td>
                </tr>
                <tr>
                    <td><input type ="submit" name = "submit" value = "Add Admin"></td>
                </tr>
            </table>
    </div>
</div>

<?php
    include('inside/footer.php')
?>

<?php
    if(isset($_POST['submit'])){
        //get data from form
        $name = $_POST['name'];
        $uname = $_POST['uname'];
        $password = md5($_POST['password']); //password emcryption with md5

        //sql query
        $sql = "INSERT INtO admin SET
                name = '$name',
                uname = '$uname',
                password = '$password'";
        


        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==TRUE){
           // echo "Data Save Successfully";
           $_SESSION['add'] = "Admin Add Successfully";
           header("location:".SITEURL.'admin/manage.php');
        }
        else{
           // echo "Failed to save";
           $_SESSION['add'] = "failed to Add Admin";
           header("location:".SITEURL.'admin/add_admin.php');
        }

    }


?>