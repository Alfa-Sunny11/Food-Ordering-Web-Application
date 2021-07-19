<?php
    include('inside/menu.php');
?>
    <div>
        <div class = "wrapper">
            <h1>Manage Admin</h1>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found'])){
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['user-not-match'])){
                    echo $_SESSION['user-not-match'];
                    unset($_SESSION['user-not-match']);
                }

                if(isset($_SESSION['change_password'])){
                    echo $_SESSION['change_password'];
                    unset($_SESSION['change_password']);
                }
            ?>

            <a href = "add_admin.php">Add Admin</a><br>
            <table class = "tbl">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM admin";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE){
                        $count = mysqli_num_rows($res);

                        $sn = 1; // create a variable and assign the value

                        if($count > 0){
                            while($rows = mysqli_fetch_assoc($res)){
                                //while loop run unstill the database
                                //get individual data
                                $id = $rows['id'];
                                $name = $rows['name'];
                                $uname = $rows['uname'];

                                //display value into the table
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $uname; ?></td>
                                    <td>
                                    <a href = "<?php echo SITEURL; ?>admin/update_pass.php?id=<?php echo $id;?>">Change Password</a>
                                    <a href = "<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id;?>">Update Admin</a>
                                    <a href = "<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id;?>">Delete Admin</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else{

                        }
                    }
                ?>

            </table>    

        </div>
    </div>
      
<?php
    include('inside/footer.php');
?>