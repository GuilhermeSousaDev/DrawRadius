<?php
include_once 'db_connect.php';
if(isset($_GET['draw_id'])) {
    $id = htmlspecialchars(mysqli_escape_string($conn,$_GET['draw_id'])); 
    $sql = "SELECT * FROM draws WHERE draw_id = '$id'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View - Draw</title>
</head>
<body>
    <?php
        if($_GET['user_id']) {
            $id = htmlspecialchars(mysqli_escape_string($conn,$_GET['user_id']));
            $sql = "SELECT username FROM usuarios WHERE user_id = '$id'";
            $query_u = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($query_u);
        } ?>
            <div style="border-top-left-radius: <?php echo $row['topLeft'].'px'?>;
            border-top-right-radius: <?php echo $row['topRight'].'px'?>;
            border-bottom-left-radius: <?php echo $row['bottomLeft'].'px'?>;
            border-bottom-right-radius: <?php echo $row['bottomRight'].'px'?> ;
            width: <?php echo $row['width'].'px'?>;
            height: <?php echo $row['height'].'px'?>;
            background: <?php echo $row['color']?>;"></div>
            <a href="">Desenhado Por: <?php echo $user['username']?></a>
</body>
</html>