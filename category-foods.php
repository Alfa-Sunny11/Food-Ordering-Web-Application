<?php
    include('inside/menu.php');
?>

<?php 
//Check whether the id is passed or not
if(isset($_GET['category_id']))
{
    //Category id is set and get the id
    $category_id = $_GET['category_id'];
    //Get the category title based on category id
    $sql = "SELECT title FROM category WHERE id=$category_id";
    //Execute the query
    $res = mysqli_query($conn,$sql);

    //Count the rows to check whether the id is valid or not
    $count = mysqli_num_rows($res);

        $row=mysqli_fetch_assoc($res);     
        // Get the title
        $category_title = $row['title'];

}
else
{
    //Category not passed
    //Redirect to home page
    header("location:".SITEURL);
}

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section>
        <div>
            
            <h2>Foods on <a href="#">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="wrapper">
        <div>
            <h2>Food Menu</h2>
            <?php
                $sql2 = "SELECT * FROM food WHERE category_id=$category_id";

                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);

                if($count2 > 0 )
                {
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        
                        $img_name = $row2['img_name'];
                    }     
                    // Get the title
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
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?>food_id=<?php echo $id; ?>">Order Now</a>
                            </div>
                        </div>
                    <?php
                }
                else
                {
                    //Category not passed
                    //Redirect to home page
                    echo "Food not found";
                }
                

            ?>

            

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
    include('inside/footer.php');
?>