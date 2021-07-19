<?php
    include('inside/menu.php');
?>
    <section class = "wrapper">
        <?php
            $search = $_POST['search'];
        ?>
        <h2>Food on your Search<a href = "#">"<?php echo $search; ?>"</a></h2>
    </section>



    <!-- fOOD MEnu Section Starts Here -->
    <section class="wrapper">
        <div>
            <h2>Food Menu</h2>

            <?php

                
                $sql = "SELECT * FROM food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);
                if($count > 0){
                    while($row = mysqli_fetch_assoc($res)){
                          //get details of category
                          $id = $row['id'];
                          $title = $row['title'];
                          $price = $row['price'];
                          $description = $row['description'];
                          $img_name = $row['img_name'];

                          ?>

                        
                        <div>
                            <?php
                                    if($img_name==""){
                                        echo "Image not found";
                                    }
                                    else{
                                        ?>
                                            <img src="<?php echo SITEURL; ?>img/food/<?php 
                                            echo $img_name; ?>" width = "200px" >
                                        <?php
                                        
                                    }
                                ?>
                          
                            <div>
                                <h3><?php echo $title; ?></h3>
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
                     

                    echo "Category not Added";
                                       
              }

            ?>


            <div class="clear"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->



<?php
    include('inside/footer.php');
?>