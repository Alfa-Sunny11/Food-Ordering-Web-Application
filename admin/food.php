<?php
    include('inside/menu.php');
?>
<div>
    <div class = "wrapper">
        <h1>Food</h1>

        <a href = "<?php echo SITEURL; ?>admin/add_food.php">Add Food</a><br>
            <table class = "tbl">
            <br>

            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset ($_SESSION['add']);
    
                }

                if(isset($_SESSION['remove'])){
                    echo $_SESSION['remove'];
                    unset ($_SESSION['remove']);
    
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset ($_SESSION['delete']);
    
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
    
                }
            ?>
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM food";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    //serial number
                    $sn = 1;

                    //check whether it have in database or not

                    if($count>0){
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $img_name = $row['img_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];;

                            ?>
                            <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?></td>

                                    <td><?php 
                                        //check image name is here or not
                                        if($img_name != ""){
                                            ?>
                                            <img src="<?php echo SITEURL;?>img/food/<?php echo $img_name;?>" width = "100px">
                                            <?php
                                        }
                                        else{
                                            echo "No image ";
                                        }
                                    ?></td>
                                    
                                    <td><?php echo $featured ?></td>
                                    <td><?php echo $active ?></td>
                                    <td>
                                    <a href = "<?php echo SITEURL; ?>admin/update_food.php?id=<?php echo $id; ?>">Update Food</a>
                                    <a href = "<?php echo SITEURL; ?>admin/delete_food.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name; ?>">Delete Food</a>
                                     </td>
                                    
                            </tr>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <tr>
                            <td>No Food Add</td>
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