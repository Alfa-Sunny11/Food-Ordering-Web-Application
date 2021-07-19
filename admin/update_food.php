<?php
    include('inside/menu.php');
?>

<div>
      <div class = "wrapper">
            <h1>Update Food</h1><br>

            <?php
                  //check id set or not
                  if(isset($_GET['id'])){
                        // echo "got it";
                        $id = $_GET['id'];

                        $sql2 = "SELECT * FROM food WHERE id=$id";

                        $res2 = mysqli_query($conn, $sql2);

                        //count the rows to check whether the id valid or not

                        $count = mysqli_num_rows($res2);
                   
                        $row2 = mysqli_fetch_assoc($res2);

                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $current_img = $row2['img_name'];
                        $current_category = $row2['category_id']; 
                        $featured = $row2['featured'];
                        $active = $row2['active'];
                       
                  }
                  else{
                        header("location:".SITEURL.'admin/food.php');
                  }
            ?>


            <form action = "" method = "POST" enctype="multipart/form-data">
            
            <table>

            <tr>
                  <td>Title</td>
                  <td>
                          <input type ="text" name = "title" value="<?php echo $title; ?>">
                  </td>
            </tr>

            <tr>
                  <td>Description:</td>
                  <td>
                        <textarea name="description" cols ="30" rows = "5"><?php echo $description; ?></textarea>
                  </td>
            </tr>

            <tr>
                  <td>Price:</td>
                  <td>
                      <input type = "number" name="price" value ="<?php echo $price; ?>">
                  </td>                       
            </tr>
            <tr>
                  <td>Current Image:</td>
                  <td>
                  <?php 
                        if($current_img != ""){
                        ?>
                        <img src="<?php echo SITEURL; ?>img/food/<?php echo $current_img; ?> " width = "150px">

                        <?php
                        }
                        else{
                        echo "Image not added";
                        }
                        ?>
                  </td>                       
            </tr> 

            <tr>
                  <td>New Image:</td>
                  <td>
                  <input type = "file" name="img">
                  </td>                       
            </tr>

            <tr>
                  <td>Category:</td>
                  <td>
                  <select name= "category">
                     <?php
                        //to display category from database
                        $sql = "SELECT * FROM category WHERE active = 'Yes'";

                        $res = mysqli_query($conn, $sql);
                         //count rows to check categories have or not
                         $count = mysqli_num_rows($res);

                         if($count > 0){
                               while($row = mysqli_fetch_assoc($res)){
                                     //get details of category
                                     $category_title = $row['title'];
                                     $category_id = $row['id'];

                                     ?>

                                     <option <?php if($current_category==$category_id){ echo "selected";} ?> value = "<?php echo $category_id; ?>"><?php echo $category_title; ?>
                                     </option>

                                     <?php
                               }
                         }
                         else{
                               ?> 

                               <option value = "0">None</option>
                               
                               <?php
                         }
                   ?>

                  </select>
                  </td>
                  
            </tr>

            <tr>
                  <td>Featured:</td>
                        
                  <td>
                  <input 
                  <?php 
                        if($featured == "Yes"){
                              echo "checked";
                        } ?> type = "radio" name = "featured" value = "Yes">Yes
                  <input  
                  <?php 
                        if($featured == "No"){
                              echo "checked";
                        } ?>
                        type = "radio" name = "featured" value = "No">No
                              
                  </td>                       
            </tr>

            <tr>
                  <td>Active: </td>
                  <td>
                  <input 
                  <?php 
                        if($active == "Yes"){
                              echo "checked";
                        } ?>
                        type = "radio" name = "active" value = "Yes">Yes
                  <input  <?php
                        if($active == "No"){
                              echo "checked";
                        } ?>
                        type = "radio" name = "active" value = "No">No
                  </td>
            </tr>

            <tr>
                  <td>
                        <input type = "hidden" name ="current_img" value ="<?php echo $current_img; ?>">
                        <input type = "hidden" name="id" value="<?php echo $id; ?>">
                        <input type ="submit" name = "submit" value = "Update Food">
                  </td>
            </tr>
                  
            </table>
            
            </form>

            <?php
            
                 if(isset($_POST['submit'])){
                       // echo "Yessss";
                       //get values from the form
                       $id = $_POST['id'];
                       $title = $_POST['title'];
                       $description = $_POST['description'];
                       $price = $_POST['price'];
                       $current_img = $_POST['current_img'];
                       $category = $_POST['category'];
                       $featured = $_POST['featured'];
                       $active = $_POST['active'];

                       //img selected or not for upload
                       if(isset($_FILES['img']['name'])){
                              $img_name = $_FILES['img']['name'];

                              //img available or not
                              if($img_name != ""){
                                    //upload img
                                    $ex = (explode('.', $img_name));
                                    $ext = end($ex);
                                    //rename
                                    $img_name = "Food_name_".rand(000,999).'.'.$ext;

                                    $source_path = $_FILES['img']['tmp_name'];

                                    $destination_path = "../img/food/".$img_name;
                                    
                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if($upload == false){
                                          $_SESSION['upload'] = "Failed to upload image";

                                          header("location:".SITEURL.'admin/food.php');

                                          die();
                                    }

                                    //remove the current img
                                    if($current_img != "")
                                    {
                                          $remove_path = "../img/food/".$current_img; 
                                          $remove = unlink($remove_path);

                                          //check the img remove or not
                                          if($remove == false){
                                                //failed to remove img
                                                $_SESSION['failed_remove'] = "Failed to remove current image";

                                                header("location:".SITEURL.'admin/food.php');
                                                die();
                                          }
                                    }
                                    
                              }
                              else{
                                    $img_name = $current_img;
                              }
                              
                       }
                       else{
                             $img_name = $current_img;
                       }

                       $sql3 = "UPDATE food SET 
                       title = '$title',
                       description = '$description',
                       price = $price,
                       img_name = '$img_name',
                       category_id =$category,
                       featured = '$featured',
                       active = '$active'
                       WHERE id = $id";

                       $res3 = mysqli_query($conn, $sql3);

                       if($res3 == true){
                              $_SESSION['update'] = "Update Successfully";
                              header("location:".SITEURL.'admin/food.php');
                       }
                       else{
                              $_SESSION['update'] = "Update Failed";
                              header("location:".SITEURL.'admin/food.php');
                       }

                 }
                 else{

                 }

            ?>

      </div>
</div>

<?php
    include('inside/footer.php');
?>