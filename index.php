<?php
    include('inside/menu.php');
?>
    <section class="wrapper">
        <div>
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

    <!-- CAtegories Section Starts Here -->
    <section class = "wrapper">
        <div>
            <h2>Explore Foods</h2>

            <?php
                $sql = "SELECT * FROM category WHERE active = 'Yes' AND featured = 'YES'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                          //get details of category
                          $id = $row['id'];
                          $title = $row['title'];
                          $img_name = $row['img_name'];

                          ?>

                          <a href = "<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
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
                    ?> 

                    echo "Food not Added";
                    
                    <?php
              }
            ?>

            

            <div></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section  class = "wrapper">
        <div>
            <h2>Food Menu</h2>

            <?php

                $sql2 = "SELECT * FROM food WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);
                if($count2 > 0){
                    while($row = mysqli_fetch_assoc($res2)){
                          //get details of category
                          $id = $row['id'];
                          $title = $row['title'];
                          $price = $row['price'];
                          $description = $row['description'];
                          $img_name = $row['img_name'];

                          ?>
                        <div>
                            <div>
                            <?php
                                    if($img_name==""){
                                        echo "Image not available";
                                    }
                                    else{
                                        ?>
                                            <img src="<?php echo SITEURL; ?>img/food/<?php 
                                            echo $img_name; ?>" width = "200px" >
                                        <?php
                                        
                                    }
                                ?>
                                
                            </div>

                            <div>
                                <h4><?php echo $title; ?></h4>
                                <p><?php echo $price; ?></p>
                                <p>
                                     <?php echo $description; ?>.
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?>food_id=<?php echo $id; ?>">Order Now</a>
                            </div>
                        </div>

                         

                          <?php
                    }
              }
              else{
                    

                    echo "Food not available";
                    
                    
              }
            

            ?>



            <div></div>

            

        </div>

        <p >
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include('inside/footer.php');
?>  