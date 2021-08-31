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
    $draw_name = mysqli_escape_string($conn,$_POST['draw_name']);
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO draws(user_id, topLeft, topRight, bottomLeft, bottomRight, width, height, color, draw_name)
    VALUES('$user_id','$topLeft','$topRight','$bottomLeft','$bottomRight','$width','$height','$color','$draw_name')";
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
    <link rel="stylesheet" href="styles/draw.css">
    <script src="app.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Border Radius</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">RadiusDraw</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="draw.php">Draw</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Explorar
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Pesquisar Usuários</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perfil.php">Perfil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div id="container_draw">
      <form id="create_draw" action="" method="POST">
          <div style="width: 200px;
           height: 200px;
          background: black;
          display: block;
          margin: auto;"
          class="div1"></div>
          <br>
          <div class="container">
              <div>
                <label>Borda Topo Esquerdo</label>
                <input oninput="borderChangeTopLeft()" type="range" value="0" max="100" id="radiusTopLeft" name="topLeft">
                <label>Borda Topo Direito</label>
                <input oninput="borderChangeTopRight()" type="range" value="0" max="100" id="radiusTopRight" name="topRight">
              </div>
              <div>
                <label>Borda Fundo Esquerdo</label>
                <input oninput="borderChangeBottomLeft()" type="range" value="0" max="100" id="radiusBottomLeft" name="bottomLeft">
                <label>Borda Fundo Direito</label>
                <input oninput="borderChangeBottomRight()" type="range" value="0" max="100" id="radiusBottomRight" name="bottomRight">
              </div>            
                <label>Largura do Container</label>
                <input oninput="changeWidthObj()" type="range" value="200" min="30" max="1000" id="widthObj" name="width">
                <label>Altura do Container</label>
                <input oninput="changeHeightObj()" type="range" value="200" min="30" max="450" id="heightObj" name="height">
                <label>Escolha uma Cor</label>
                <input oninput="changeColor()" type="color" name="color" id="color">
                <label>Nome do Draw</label>  
                <input type="text" name="draw_name">
          </div>          
            <br>
          <button class="btn btn-primary" type="submit" name="enviar">Enviar Draw</button>
      </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>