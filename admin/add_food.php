<?php
    include('inside/menu.php');
?>

<div>
      <div class ="wrapper">
            <h1>Add Food</h1>
            <br>

            <?php
                  if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset ($_SESSION['upload']);
                    }
            ?>

            <form action = "" method = "POST" enctype ="multipart/form-data">
            
            <table>
                 <tr>
                        <td>Title:</td>
                        <td>
                        <input type = "text" name="title" placeholder = "Title of the food">
                        </td>                       
                 </tr> 

                 <tr>
                         <td>Description:</td>
                        <td>
                        <textarea name="description" cols ="30" rows = "5" placeholder = "Description of the food"></textarea>
                        </td>
                 </tr>

                 <tr>
                        <td>Price:</td>
                        <td>
                        <input type = "number" name="price">
                        </td>                       
                 </tr> 

                 <tr>
                        <td>Select Image:</td>
                        <td>
                        <input type = "file" name="img">
                        </td>                       
                 </tr>

                 <tr>
                        <td>Category:</td>
                        <td>
                              <select name = "category">

                              <?php
                                    //to display category from database
                                    $sql = "SELECT * FROM category WHERE active = 'Yes'";

                                    $res = mysqli_query($conn, $sql);

                                    //count rows to check categories have or not
                                    $count = mysqli_num_rows($res);

                                    if($count > 0){
                                          while($row = mysqli_fetch_assoc($res)){
                                                //get details of category
                                                $id = $row['id'];
                                                $title = $row['title'];

                                                ?>

                                                <option value = "<?php echo $id; ?>"><?php echo $title; ?>
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
                              <input type = "radio" name ="featured" value = "Yes">Yes
                              <input type = "radio" name = "featured" value = "No">No
                              
                        </td>                       
                 </tr>

                 <tr>
                        <td>Active: </td>
                        <td>
                              <input type = "radio" name = "active" value = "Yes">Yes
                              <input type = "radio" name = "active" value = "No">No
                        </td>
                  </tr>

                  <tr>
                        <td>
                              <input type ="submit" name = "submit" value = "Add Food">
                        </td>
                   </tr>

            </table>
            
            </form>

            <?php
                  //check button click or not
                  if(isset($_POST['submit'])){
                      //  echo "ok";
                      $title = $_POST['title'];
                      $description = $_POST['description'];
                      $price = $_POST['price'];
                      $category = $_POST['category'];
                      //check radio button of featured and active are checked or not
                      if(isset($_POST['featured'])){
                            $featured = $_POST['featured'];
                      }
                      else{
                            $featured = "No";
                      }

                      if(isset($_POST['active'])){
                        $active = $_POST['active'];
                       }
                      else{
                        $active = "No";
                       }

                       //check the img is click or not and upload the img if img is selected
                       if(isset($_FILES['img']['name'])){
                        $img_name = $_FILES['img']['name'];

                        if($img_name != ""){

                        
                              $ex = (explode('.', $img_name));
                          //    $tmp = explode('.', $file_name);
                              $ext = end($ex);
                              //rename
                              $img_name = "Food_food_".rand(000,999).'.'.$ext;

                              $source_path = $_FILES['img']['tmp_name'];

                              $destination_path = "../img/food/".$img_name;
                              
                              $upload = move_uploaded_file($source_path, $destination_path);

                              if($upload == false){
                                    $_SESSION['upload'] = "Failed to upload image";

                                    header("location:".SITEURL.'admin/add_food.php');

                                    die();
                              }
                        }
                  }
                       else{
                             $img_name = "";
                       }
                       //sql query
                       $sql2 = "INSERT INTO food SET
                       title = '$title',
                       description = '$description',
                       price = $price,
                       img_name = '$img_name',
                       category_id = $category,
                       featured = '$featured',
                       active = '$active'";

                       $res2 = mysqli_query($conn, $sql2);
                       //check the query work or not
                       if($res2 == true){
                        $_SESSION['add'] = "Add Successfully";
                        header("location:".SITEURL.'admin/food.php');
                        }
                       else{
                        $_SESSION['add'] = "Failed to Add";
                        header("location:".SITEURL.'admin/food.php');
                        }
                       
                  }
            ?>

      </div>
</div>

<?php
    include('inside/footer.php');
?>