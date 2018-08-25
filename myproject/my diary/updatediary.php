
<?php

    session_start();

    include("connection.php");

    $query = "UPDATE users SET diary = '".$_POST['diary']."' WHERE id = '".$_SESSION['id']."' LIMIT 1";

    mysqli_query($link,$query);

?>

