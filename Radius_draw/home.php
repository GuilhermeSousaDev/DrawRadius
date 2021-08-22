<?php
include_once 'db_connect.php';
if(!isset($_SESSION['logado'])) {
    header("Location: index.php");
}else{
    $sql = "SELECT * FROM draws";
    $query = mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DrawRadius</title>
</head>
<body>
    <nav>
        <h1>Draw</h1>
        <a href="home.php">Home</a>
        <a href="draw.php">Desenhar</a>
        <a href="perfil.php">Perfil</a>
    </nav>
    <?php
        echo $_SESSION['user_id'];
        while($row = mysqli_fetch_array($query)) {
            $sql = "SELECT username,user_id FROM usuarios WHERE user_id = '$row[user_id]'";
            $query_u = mysqli_query($conn,$sql);
            $row_u = mysqli_fetch_array($query_u);
            ?>
            <div style="border-top-left-radius: <?php echo $row['topLeft'].'px'?>;
             border-top-right-radius: <?php echo $row['topRight'].'px'?>;
             border-bottom-left-radius: <?php echo $row['bottomLeft'].'px'?>;
            border-bottom-right-radius: <?php echo $row['bottomRight'].'px'?> ;
            width: 200px;
            height: 200px;
            background: <?php echo $row['color']?>;"></div>
            <a href="visit_perfil.php?user_id=<?php echo $row_u['user_id']?>"><?php echo $row_u['username']?></a>
            <a href="viewdraw.php?draw_id=<?php echo $row['draw_id']?>&user_id=<?php echo $row['user_id']?>">Ver Draw</a>
            <br>
    <?php }
    ?>
</body>
</html>