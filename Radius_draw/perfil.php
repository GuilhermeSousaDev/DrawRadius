<?php
include_once 'db_connect.php';
if(isset($_SESSION['user_id'])) {
    $id = htmlspecialchars(mysqli_escape_string($conn,$_SESSION['user_id']));
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/perfil.css">
    <title>Draw - Perfil</title>
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
          <a class="nav-link" href="draw.php">Draw</a>
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
          <a class="nav-link active" href="perfil.php">Perfil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
    $sql = "SELECT * FROM draws WHERE user_id = '$id' ORDER BY draw_id DESC";
    $query_draw = mysqli_query($conn,$sql);
?>
    <div class="info">
      <h1><?php echo $row_user['username']?></h1>
      <p><?php echo $row_user['email']?></p>
    </div>
    <hr>
    <h1 style="text-align: center;">Todos Seus Draws</h1>
    <div class="perfil">  
        <?php 
          while($row_draw = mysqli_fetch_array($query_draw)) {?>
            <div class="view">
              <div class="draw" style="display: flex; justify-content: center; align-items: center; border-top-left-radius: <?php echo $row_draw['topLeft'].'px'?>;
               border-top-right-radius: <?php echo $row_draw['topRight'].'px'?>;
               border-bottom-left-radius: <?php echo $row_draw['bottomLeft'].'px'?>;
              border-bottom-right-radius: <?php echo $row_draw['bottomRight'].'px'?> ;
              width: 200px;
              height: 200px;
              background: <?php echo $row_draw['color']?>;">
                 <a class="btn btn-primary" href="viewdraw.php?draw_id=<?php echo $row_draw['draw_id']?>&user_id=<?php echo $row_draw['user_id']?>">Ver Draw</a>
              </div>
              <p> <?php echo $row_draw['draw_name']? $row_draw['draw_name'] : "Sem Nome"?> </p>
            </div>
      <?php }
      ?>
    </div>
    <a style="width: 50px; display: block; margin: auto;" class="logout" href="logout.php"><button class="btn btn-danger">Sair</button></a>
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>