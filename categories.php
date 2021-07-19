<?php
    include('inside/menu.php');
?>


    <!-- CAtegories Section Starts Here -->
    <section class="wrapper">
        <div>
            <h2>Explore Foods</h2>

            <?php
                $sql = "SELECT * FROM category WHERE active = 'Yes'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                          //get details of category
                          $id = $row['id'];
                          $title = $row['title'];
                          $img_name = $row['img_name'];

                          ?>

                        <a href ="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div>
                            <?php
                                    if($img_name==""){
                                        echo "Image not found";
                                    }
                                    else{
                                        ?>
                                            <img src="<?php echo SITEURL; ?>img/category/<?php 
                                            echo $img_name; ?>" width = "200px" >
                                        <?php
                                        
                                    }
                                ?>
                          

                            <h3><?php echo $title; ?></h3>
                        </div>
                        </a>

                        <?php
                    }
              }
              else{
                     

                    echo "Category not Added";
                    
                    
              }
            ?>



            

            
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php
    include('inside/footer.php');
?>