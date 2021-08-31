<?php
include_once 'db_connect.php';
if($_GET['user_id'] === $_SESSION['user_id']) {
    header("Location: perfil.php");
}
    if(isset($_GET['user_id'])) {
        $id = htmlspecialchars(mysqli_escape_string($conn,$_GET['user_id']));
        $sql = "SELECT username FROM usuarios WHERE user_id = '$id'";
        $query = mysqli_query($conn,$sql);
        $row_user = mysqli_fetch_array($query);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/visit_perfil.css">
    <title>Draw - <?php echo $row_user['username']?></title>
</head>
<body>
<nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">RadiusDraw</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
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
          <a class="nav-link" href="perfil.php">Perfil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
        <h1>Perfil de: <?php echo $row_user['username']?></h1>
        <hr>
        <h4>Draws de <?php echo $row_user['username']?></h4>
        <hr>
        <div class="view">
            <?php
                if(isset($_GET['user_id'])) {
                    $id = htmlspecialchars(mysqli_escape_string($conn,$_GET['user_id']));
                    $sql = "SELECT * FROM draws WHERE user_id = '$id'";
                    $query_draw = mysqli_query($conn,$sql);
                }
                while($row_draw = mysqli_fetch_array($query_draw)) {?>
                    <div id="draw_con" style="border-top-left-radius: <?php echo $row_draw['topLeft'].'px'?>;
                     border-top-right-radius: <?php echo $row_draw['topRight'].'px'?>;
                     border-bottom-left-radius: <?php echo $row_draw['bottomLeft'].'px'?>;
                    border-bottom-right-radius: <?php echo $row_draw['bottomRight'].'px'?> ;
                    width: 200px;
                    height: 200px;
                    background: <?php echo $row_draw['color']?>;">
                     <a href="viewdraw.php?draw_id=<?php echo $row_draw['draw_id']?>&user_id=<?php echo $row_draw['user_id']?>"><button class="btn btn-primary">Ver Draw</button></a>
                    </div>
            <?php }
            ?>
        </div>
    </div>
    <script>

    </script>
</body>
</html>