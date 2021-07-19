<?php
    include('inside/menu.php');
?>




    <!-- fOOD MEnu Section Starts Here -->
    <section class="wrapper">
        <div>
            <h2 class="text-center">Food Menu</h2>

            <?php

                $sql = "SELECT * FROM food WHERE active = 'Yes'";

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

        


            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include('inside/footer.php');
?>