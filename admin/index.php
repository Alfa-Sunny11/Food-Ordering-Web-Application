<?php
    include('inside/menu.php');
?>
    <div>
        <div class = "wrapper">
            <h1>Dashboard</h1>
            <br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br>
            <div class = "dashboard">
                <?php
                    $sql = "SELECT * FROM category";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count; ?></h1>
                Categories
            </div>
            <div class = "dashboard">

                <?php
                    $sql2 = "SELECT * FROM food";

                    $res2 = mysqli_query($conn, $sql2);

                    $count2 = mysqli_num_rows($res2);
                ?>

                <h1><?php echo $count2; ?></h1>
                Foods
            </div>
            <div class = "dashboard">
            
                <?php
                    $sql3 = "SELECT * FROM food";

                    $res3 = mysqli_query($conn, $sql3);

                    $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3; ?></h1>
                Total Orders
            </div>
        <?php /*
            <div class = "dashboard">

               <?php
                    $sql4= "SELECT SUM(total) AS Total FROM order WHERE status = 'Delivered'";

                    $res4 = mysqli_query($conn, $sql4);

                    $row4 = mysqli_fetch_assoc($res4);
                    //total revenue
                    $total_rev = $row4['Total'];
                    
                ?>

                <h1><?php echo $total_rev; ?></h1>
                Revenue
            </div>
*/
?>
            <div class = "clear"></div>

        </div>
    </div>

<?php
    include('inside/footer.php');
?>
 
