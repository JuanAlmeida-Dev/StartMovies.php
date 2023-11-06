<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Start Movies</title>
</head>
<body class="bg-dark bg-gradient">
    <!-- Incluindo o menu -->
    <?php include('menu.php'); ?>
        <!-- Container principal -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 scroll" >
                    <!-- Card filmes -->
                    <?php
                    include('connect.php');
                    $filmes = mysqli_query($con, "SELECT * FROM `tb_movies`");
                    while ($filme = mysqli_fetch_array($filmes)) {
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card mt-2">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $filme['ptbrTitle']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $filme['title']; ?> - <?php echo $filme['year']; ?></h6>
                            <p class="card-text">Gêneros: <?php echo $filme['genres']; ?></p>
                            <a href="javascript:moreInfo(<?php echo $filme['id']; ?>)" class="btn btn-danger">+Info</a>
                            <a href="alterar.php?id=<?php echo $filme['id']; ?>" class="btn btn-warning">Alterar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- StoryLine -->
                <div class="col-4" id="divStory" >
                 
                </div>
                <!-- Poster -->
                <div class="col-4">
                    <img src="#" id="divPoster">
                </div>
            </div>
        </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
      
    <script>
        function moreInfo(id) {
        $.ajax({
        type: "get",
        url: "info.act.php?id=" + id,
        success: function(response) {
          var dados = response.split('@#$@');
          $('#divStory').html(dados[0]);
          $('#divPoster').attr('src', dados[1]);
        }
      });
    }
    </script>
    
</body> 
</html>