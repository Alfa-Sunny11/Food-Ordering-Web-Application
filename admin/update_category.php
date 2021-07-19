<?php
    include('inside/menu.php');
?>
<div>
      <div class = "wrapper">
            <h1>Update Category</h1><br>

            <?php
                  //check id set or not
                  if(isset($_GET['id'])){
                       // echo "got it";
                       $id = $_GET['id'];

                       $sql = "SELECT * FROM category WHERE id=$id";

                       $res = mysqli_query($conn, $sql);

                       //count the rows to check whether the id valid or not

                       $count = mysqli_num_rows($res);
                       if($count==1){
                              $row = mysqli_fetch_assoc($res);
                              $title = $row['title'];
                              $current_img = $row['img_name']; 
                              $featured = $row['featured'];
                              $active = $row['active'];
                       }
                       else{
                             $_SESSION['no_category_found'] = "Category not found";
                             header("location:".SITEURL.'admin/category.php'); 
                       }
                  }
                  else{
                        header("location:".SITEURL.'admin/category.php');
                  }
            ?>
            
            <form action = "" method = "POST" enctype = "multipart/form-data">
                  <table>
                  <tr>
                                    <td>Title</td>
                                    <td>
                                          <input type ="text" name = "title" value="<?php echo $title; ?>">
                                    </td>
                              </tr>

                              <tr>
                                    <td>Current Image:</td>
                                    <td>
                                          <?php 
                                                if($current_img != ""){
                                                      ?>
                                                      <img src="<?php echo SITEURL; ?>img/category/<?php echo $current_img; ?> " width = "200px">

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
                                          <input type ="file" name = "img">
                                    </td>
                              </tr>

                              <tr>
                                    
                                    <td>Featured: </td>
                                    <td>
                                          <input <?php if($featured == "Yes"){
                                                echo "checked";
                                          } ?> type = "radio" name = "featured" value = "Yes">Yes
                                          <input  
                                          <?php if($featured == "No"){
                                                echo "checked";
                                          } ?>
                                          type = "radio" name = "featured" value = "No">No
                                    </td>
                              </tr>

                              <tr>
                                    <td>Active: </td>
                                    <td>
                                          <input 
                                          <?php if($active == "Yes"){
                                                echo "checked";
                                          } ?>
                                          type = "radio" name = "active" value = "Yes">Yes
                                          <input  <?php
                                          if($active == "No"){
                                                echo "checked";
                                          } ?>
                                          type = "radio" name = "active" value = "No">No
                                    </td>
                              </tr><br>
                              <tr>
                                    <td>
                                          <input type = "hidden" name ="current_img" value ="<?php echo $current_img; ?>">
                                          <input type = "hidden" name="id" value="<?php echo $id; ?>">
                                          <input type ="submit" name = "submit" value = "Update Category">
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
                       $current_img = $_POST['current_img'];
                       $featured = $_POST['featured'];
                       $active = $_POST['active'];

                       //img selected or not for upload
                       if(isset($_FILES['img']['name'])){
                              $img_name = $_FILES['img']['name'];

                              //img available or not
                              if($img_name != ""){
                                    //upload img
                                    $ext = end(explode('.', $img_name));
                                    //rename
                                    $img_name = "Food_Category_".rand(000,999).'.'.$ext;

                                    $source_path = $_FILES['img']['tmp_name'];

                                    $destination_path = "../img/category/".$img_name;
                                    
                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if($upload == false){
                                          $_SESSION['upload'] = "Failed to upload image";

                                          header("location:".SITEURL.'admin/category.php');

                                          die();
                                    }

                                    //remove the current img
                                    if($current_img != "")
                                    {
                                          $remove_path = "../img/category/".$current_img; 
                                          $remove = unlink($remove_path);

                                          //check the img remove or not
                                          if($remove == false){
                                                //failed to remove img
                                                $_SESSION['failed_remove'] = "Failed to remove current image";

                                                header("location:".SITEURL.'admin/category.php');
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

                       $sql2 = "UPDATE category SET 
                       title = '$title',
                       img_name = '$img_name',
                       featured = '$featured',
                       active = '$active'
                       WHERE id = $id";

                       $res2 = mysqli_query($conn, $sql2);

                       if($res2 == true){
                              $_SESSION['update'] = "Update Successfully";
                              header("location:".SITEURL.'admin/category.php');
                       }
                       else{
                              $_SESSION['update'] = "Update Failed";
                              header("location:".SITEURL.'admin/category.php');
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