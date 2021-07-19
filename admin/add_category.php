<?php
    include('inside/menu.php');
?>

<div>
      <div class = "wrapper">
            <h1>Add Category</h1><br><br>

            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])){
                  echo $_SESSION['upload'];
                  unset ($_SESSION['upload']);
              }

            ?>
            <br>


            <form action = "" method = "POST" enctype = "multipart/form-data">
                  <table>
                        <tr>
                              <td>Title</td>
                              <td>
                                    <input type ="text" name = "title" placeholder = "Category Title">
                              </td>
                        </tr>

                        <tr>
                              <td>Select Image:</td>
                              <td>
                                    <input type = "file" name = "img">
                              </td>
                        </tr>
                        <tr>
                              
                              <td>Featured: </td>
                              <td>
                                    <input type = "radio" name = "featured" value = "Yes">Yes
                                    <input type = "radio" name = "featured" value = "No">No
                              </td>
                        </tr>

                        <tr>
                              <td>Active: </td>
                              <td>
                                    <input type = "radio" name = "active" value = "Yes">Yes
                                    <input type = "radio" name = "active" value = "No">No
                              </td>
                        </tr><br>
                        <tr>
                              <td>
                                    <input type ="submit" name = "submit" value = "Add Category">
                              </td>
                        </tr>
                  </table>
            </form>

            <?php
                   if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        //for radio
                        if(isset($_POST['featured'])){
                              $featured = $_POST['featured'];
                        }
                        else{
                              $featured = "NO";
                        }
                        //for active
                        if(isset($_POST['active'])){
                              $active = $_POST['active'];
                        }
                        else{
                              $active = "NO";
                        }
                        //for image
                  //     print_r($_FILES['img']);

                  //     die();
                       if(isset($_FILES['img']['name'])){
                              $img_name = $_FILES['img']['name'];

                              if($img_name != ""){

                              
                                    $ext = end(explode('.', $img_name));
                                    //rename
                                    $img_name = "Food_Category_".rand(000,999).'.'.$ext;

                                    $source_path = $_FILES['img']['tmp_name'];

                                    $destination_path = "../img/category/".$img_name;
                                    
                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if($upload == false){
                                          $_SESSION['upload'] = "Failed to upload image";

                                          header("location:".SITEURL.'admin/add_category.php');

                                          die();
                                    }
                              }
                        }
                        else{
                              $img_name = "";

                        }
                        //sql query
                        $sql = "INSERT INTO category SET
                        title = '$title',
                        img_name = '$img_name',
                        featured = '$featured',
                        active = '$active'";

                        //excute query and save
                        $res = mysqli_query($conn, $sql);

                        //check the query work or not
                        if($res == true){
                              $_SESSION['add'] = "Add Successfully";
                              header("location:".SITEURL.'admin/category.php');
                        }
                        else{
                              $_SESSION['add'] = "Fail to Add";
                              header("location:".SITEURL.'admin/add_category.php');
                        }
                  }
            ?>

      </div>
</div>

<?php
    include('inside/footer.php');
?>