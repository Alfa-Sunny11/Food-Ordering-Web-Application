<?php
        session_start();

        define('SITEURL', 'http://localhost/Food_Order/');
        define('LOCALHOST', 'localhost');
        define('DB_UNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'food_order');

//save into database
        $conn = mysqli_connect(LOCALHOST, DB_UNAME, DB_PASSWORD) or die(mysqli_error());
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>