<?php
include_once 'db_connect.php';
if(!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

if(isset($_GET['search'])) {
  $search = $_GET['search'];
  $sql = "SELECT * FROM draws WHERE draw_name LIKE '%$search%' ORDER BY draw_id DESC LIMIT 30";
  $query = mysqli_query($conn,$sql);
}else {
    $sql = "SELECT * FROM draws ORDER BY draw_id DESC LIMIT 30";
    $query = mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="app.js"></script>
    <title>DrawRadius</title>
</head>
<body>
<style>
  #container {
    display: flex;
    justify-content: center;
  }
  #view {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    width: 70%;
  }
  #draw {
    display: flex; 
    justify-content: center; 
    align-items:center; 
  }
  #draw_con {
    border: 1px solid black;
    display: block;
    margin: auto;
    margin-top: 50px;
    margin-left: 50px;
    padding: 10px;
  }
  #link {
    display: none;
  }
</style>
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
      <form class="d-flex" action="" method="GET">
        <input name="search" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<br>
    <div id="container">
      <div id="view">
            <?php
                while($row = mysqli_fetch_array($query)) {
                    $sql = "SELECT username,user_id FROM usuarios WHERE user_id = '$row[user_id]'";
                    $query_u = mysqli_query($conn,$sql);
                    $row_u = mysqli_fetch_array($query_u);
                    ?>
                    <div style="cursor: pointer;" id="draw_con">
                      <div id="draw" class="col-6" style="
                      border-top-left-radius: <?php echo $row['topLeft'].'px'?>;
                      border-top-right-radius: <?php echo $row['topRight'].'px'?>;
                      border-bottom-left-radius: <?php echo $row['bottomLeft'].'px'?>;
                      border-bottom-right-radius: <?php echo $row['bottomRight'].'px'?> ;
                      width: 200px;
                      height: 200px;
                      background: <?php echo $row['color']?>;">
                      <a id="link" class="btn btn-primary" href="viewdraw.php?draw_id=<?php echo $row['draw_id']?>&user_id=<?php echo $row['user_id']?>">Ver Draw</a>
                      </div>
                      <p style="text-align: center;"><?php echo $row['draw_name']? $row['draw_name'] : "Sem Nome"?></p>
                    </div>
                    <br>
            <?php }
            ?>
      </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>
<script>
  const div = document.getElementById('view')
  div.addEventListener('click', event => {
    const btn = event.srcElement.children.link
    btn.style.display == 'block'? btn.style.display = 'none' : btn.style.display = 'block'
  })
</script>