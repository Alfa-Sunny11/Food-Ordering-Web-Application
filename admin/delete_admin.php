<?php
//include config.php file here
include('../configure/config.php');
$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE id=$id";
$res = mysqli_query($conn, $sql);

if($res == TRUE){
    //echo "Admin Deleted";
    $_SESSION['delete'] =  "Admin Deleted Successfully";
    header('location:'.SITEURL.'admin/manage.php');
}
else{
    $_SESSION['delete'] = "Failed to delete";
    header('location:'.SITEURL.'admin/manage.php');
}   

?>