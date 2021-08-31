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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/viewdraw.css">
    <title>View - Draw</title>
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
        <div class="container">
            <?php
                if($_GET['user_id']) {
                    $id = htmlspecialchars(mysqli_escape_string($conn,$_GET['user_id']));
                    $sql = "SELECT username FROM usuarios WHERE user_id = '$id'";
                    $query_u = mysqli_query($conn,$sql);
                    $user = mysqli_fetch_array($query_u);
                } ?>
                    <div id="draw" style="border-top-left-radius: <?php echo $row['topLeft'].'px'?>;
                    border-top-right-radius: <?php echo $row['topRight'].'px'?>;
                    border-bottom-left-radius: <?php echo $row['bottomLeft'].'px'?>;
                    border-bottom-right-radius: <?php echo $row['bottomRight'].'px'?> ;
                    width: <?php echo $row['width'].'px'?>;
                    height: <?php echo $row['height'].'px'?>;
                    background: <?php echo $row['color']?>;"></div>
                    <p><?php echo $row['draw_name'] ? $row['draw_name'] : "Sem Nome"?></p>
                    <a href="visit_perfil.php?user_id=<?php echo $_GET['user_id']?>">Desenhado Por: <?php echo $user['username']?></a>
        </div>
</body>
</html>