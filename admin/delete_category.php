<?php
      include('../configure/config.php');
      //echo "delete page";
      if(isset($_GET['id']) AND isset($_GET['img_name'])){
            //echo "Delete value";
            $id = $_GET['id'];
            $img_name = $_GET['img_name'];

            if($img_name != ""){
                  //img path
                  $path = "../img/category/".$img_name;
                  
                  //remove img
                  $remove = unlink($path);

                  if($remove == false){
                        $_SESSION['remove'] = "Failder to remove";
                        header('location:'.SITEURL.'admin/category.php');
                        die();
                  }
            }

            $sql = "DELETE FROM category WHERE id = $id";

            $res = mysqli_query($conn, $sql);

            if($res==true){
                  $_SESSION['delete'] = "Category Deleted";
                  header('location:'.SITEURL.'admin/category.php');
            }
            else{
                  $_SESSION['delete'] = "Category Failed to Delete";
                  header('location:'.SITEURL.'admin/category.php');
            }
      }
      else{
            header('location:'.SITEURL.'admin/category.php');
      }

?>