<?php
    include('inside/menu.php');
?>
<div>
    <div class = "wrapper">
        <h1>Update Admin</h1><br><br>

        <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM admin WHERE id=$id";

            $res =mysqli_query($conn, $sql); 

            if($res==true){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $row = mysqli_fetch_assoc($res);

                    $name = $row['name'];
                    $uname = $row['uname'];
                }
                else{
                    header("location:".SITEURL.'admin/manage.php');
                }
            }
        ?>

        <form action = "" method = "POST">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type ="text" name = "name" value ="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type ="text" name = "uname" value = "<?php echo $uname; ?>"></td>
                </tr>
                <tr>
                    <td>
                    <input type = "hidden" name = "id" value ="<?php echo $id; ?>">
                    <input type = "submit" name = "submit" value ="Update">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
//check whether the submit button click or not;
        if(isset($_POST['update'])){
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $uname = $_POST['uname'];

            $sql = "UPDATE admin SET 
            name = '$name',
            uname = '$uname' 
            WHERE id = '$id'";

            
            $res = mysqli_query($conn, $sql);

            if($res == true){
                $_SESSION['update'] = "Admin Updated Successfully";
                header("location:".SITEURL.'admin/manage.php');
            }
            else{
                $_SESSION['update'] = "Admin Updated Failed";
                header("location:".SITEURL.'admin/manage.php');
            }
        }
?>

<?php
    include('inside/footer.php');
?>