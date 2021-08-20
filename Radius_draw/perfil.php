<?php
include_once 'db_connect.php';
if(isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM usuarios WHERE user_id = '$id'";
    $query_user = mysqli_query($conn,$sql);
    $row_user = mysqli_fetch_array($query_user);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draw - Perfil</title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM draws WHERE user_id = '$id'";
        $query_draw = mysqli_query($conn,$sql);
    ?>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
        </ul>
    </nav>
    <div>
        <h1><?php echo $row_user['username']?></h1>
        <p><?php echo $row_user['email']?></p>
    </div>
    <?php
        while($row_draw = mysqli_fetch_array($query_draw)) {?>
            <div style="border-top-left-radius: <?php echo $row_draw['topLeft'].'px'?>;
             border-top-right-radius: <?php echo $row_draw['topRight'].'px'?>;
             border-bottom-left-radius: <?php echo $row_draw['bottomLeft'].'px'?>;
            border-bottom-right-radius: <?php echo $row_draw['bottomRight'].'px'?> ;
            width: <?php echo $row_draw['width'].'px'?>;
            height: <?php echo $row_draw['height'].'px'?>;
            background: <?php echo $row_draw['color']?>;"></div>
    <?php }
    ?>
    
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>