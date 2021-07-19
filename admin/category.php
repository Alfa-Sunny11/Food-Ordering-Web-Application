<?php
    include('inside/menu.php');
?>
<div>
    <div class = "wrapper">
        <h1>Category</h1>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset ($_SESSION['add']);

            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }

            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                unset ($_SESSION['remove']);
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }

            if(isset($_SESSION['no_category_found'])){
                echo $_SESSION['no_category_found'];
                unset ($_SESSION['no_category_found']);
            }

            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }

            if(isset($_SESSION['failed_remove'])){
                echo $_SESSION['failed_remove'];
                unset ($_SESSION['failed_remove']);
            }
        ?>
        <br>

        <a href = "<?php echo SITEURL; ?>/admin/add_category.php">Add Category</a><br><br>
            <table class = "tbl">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php

                    $sql = "SELECT * FROM category";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    //serial number
                    $sn = 1;

                    //check whether it have in database or not

                    if($count>0){
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $img_name = $row['img_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];;

                            ?>
                                 <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>

                                    <td><?php 
                                        //check image name is here or not
                                        if($img_name != ""){
                                            ?>


                                            <img src="<?php echo SITEURL;?>img/category/<?php echo $img_name;?>" width = "100px">
                                            <?php
                                        }
                                        else{
                                            echo "No image ";
                                        }
                                    ?></td>
                                    
                                    <td><?php echo $featured ?></td>
                                    <td><?php echo $active ?></td>
                                    <td>
                                    <a href = "<?php echo SITEURL; ?>admin/update_category.php?id=<?php echo $id; ?>">Update</a>
                                    <a href = "<?php echo SITEURL; ?>admin/delete_category.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <tr>
                            <td>No Category Add</td>
                        </tr>
                        <?php
                    }

                ?>

               

            </table> 
    </div>    
</div>
<?php
    include('inside/footer.php');
?>