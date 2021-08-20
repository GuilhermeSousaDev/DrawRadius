<?php
include_once 'db_connect.php';
if(isset($_POST['enviar'])) {
    $topLeft = mysqli_escape_string($conn,$_POST['topLeft']);
    $topRight = mysqli_escape_string($conn,$_POST['topRight']);
    $bottomLeft = mysqli_escape_string($conn,$_POST['bottomLeft']);
    $bottomRight = mysqli_escape_string($conn,$_POST['bottomRight']);
    $width = mysqli_escape_string($conn,$_POST['width']);
    $height = mysqli_escape_string($conn,$_POST['height']);
    $color = mysqli_escape_string($conn,$_POST['color']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO draws(user_id, topLeft, topRight, bottomLeft, bottomRight, width, height, color)
    VALUES('$user_id','$topLeft','$topRight','$bottomLeft','$bottomRight','$width','$height','$color')";
    mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn) > 0) {
        echo "Cadastrado com Sucesso";
    }else {
        echo "Erro ao Cadastrar";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="app.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Border Radius</title>
</head>
<body>
    <form action="" method="POST">
        <?php echo $_SESSION['user_id']?>
        <div class="div1"></div>
        <div class="container">
            <label>Borda Topo Esquerdo</label>
            <input oninput="borderChangeTopLeft()" type="range" value="0" max="100" id="radiusTopLeft" name="topLeft">
            <label>Borda Topo Direito</label>
            <input oninput="borderChangeTopRight()" type="range" value="0" max="100" id="radiusTopRight" name="topRight">
            <label>Borda Fundo Esquerdo</label>
            <input oninput="borderChangeBottomLeft()" type="range" value="0" max="100" id="radiusBottomLeft" name="bottomLeft">
            <label>Borda Fundo Direito</label>
            <input oninput="borderChangeBottomRight()" type="range" value="0" max="100" id="radiusBottomRight" name="bottomRight">
        </div>
        <div class="container2">
            <label>Largura do Container</label>
            <input oninput="changeWidthObj()" type="range" value="200" min="30" max="500" id="widthObj" name="width">
            <label>Altura do Container</label>
            <input oninput="changeHeightObj()" type="range" value="200" min="30" max="350" id="heightObj" name="height">
            <input oninput="changeColor()" type="color" name="color" id="color">
        </div>
        <button type="submit" name="enviar">Enviar Draw</button>
    </form>
</body>
</html>