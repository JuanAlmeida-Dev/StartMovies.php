<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Start Movies</title>
</head>
<body class="bg-dark bg-gradient">

    <?php include('menu.php'); ?>

    <?php
    include('connect.php');
    $id = $_GET['id'];
    $filmes = mysqli_query($con, "SELECT * FROM `tb_movies` WHERE `id` = '$id'");
    $filme = mysqli_fetch_array($filmes);
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="container-fluid">
                    <h1 class="display-6">Alterar filme</h1>
                        <form action="alterar.act.php" method="POST" enctype="multipart/form-data">
                        <!-- Título em português -->
                        <div class="mb-3">
                            <label for="ptbrTitle" class="form-label">Título</label>
                            <input type="text" class="form-control" name="ptbrTitle" id="ptbrTitle" value="<?php echo $filme['ptbrTitle']; ?>" aria-describedby="Título em português">
                            <div id="textHelp" class="form-text">Título do filme em português.</div>
                        </div>
                        <!-- Título original -->
                        <div class="mb-3">
                            <label for="Title" class="form-label">Título original</label>
                            <input type="text" class="form-control" name="title" id="Title" value="<?php echo $filme['title']; ?>" aria-describedby="Título original">
                            <div id="textHelp" class="form-text">Título original do filme.</div>
                        </div>
                        <!-- Year -->
                        <div class="mb-3">
                            <label for="yearSelect" class="form-label">Ano de lançamento</label>
                            <select class="form-select" name="year" id="yearSelect" aria-label="Ano de lançamento" name="year">
                            <option selected>Selecione o ano</option>
                                <?php
                                for ($ano = 1900; $ano <= date('Y'); $ano++) {
                                    $print = "<option value=$ano";
                                    if ($ano == $filme['year']) {
                                        $print .= " selected";
                                    }
                                    $print .= ">$ano</option>";
                                    echo $print;
                                }
                                ?>
                            </select>
                            </div>
                            <!-- Enredo -->
                            <div class="mb-3">
                                <label for="storyLine" class="form-label">Enredo</label>
                                <textarea class="form-control" id="storyLine" name="storyLine" rows="4" ><?php echo $filme['storyLine']; ?></textarea>
                            </div>
                            <!--Generos -->
                            <label for="genres" class="form-label">Selecione os gêneros</label>
                            <div class="mb-3">
                                <?php
                                $generos = ['Comédia', 'Sci-Fi', 'Terror', 'Romance', 'Ação', 'Arrepiante', 'Drama', 
                                'Mistério', 'Crime', 'Animação', 'Aventura', 'Fantasia', 'Documentário', 'Família', 
                                'Musical', 'Super-Herói', 'Biografia', 'Guerra', 'Esportes', 'Curtas', 'Noir'];
                                $x = 1;

                                $listaGeneros = explode(' ', $filme['genres']);

                                foreach ($generos as $genero) {

                                ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="genres[]" id="inlineRadio<?php echo $x; ?>" value="<?php echo $genero; ?>"
                                        <?php
                                        if (in_array($genero, $listaGeneros)) {
                                        echo "checked";
                                        }?>>                                          
                                        <label class="form-check-label" for="inlineRadio<?php echo $x; ?>"><?php echo $genero; ?></label>
                                    </div>
                                <?php

                                    $x++;
                                }

                                ?>
                            </div>
                            <!-- Poster_atual -->
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <input type="hidden" value="<?php echo $filme['poster']; ?>" name="poster_atual">
                                    <input type="hidden" name="id" value="<?php echo $filme['id']; ?> ">
                                    <input type="file" class="form-control" name="poster" id="inputGroupFile02">
                                </div>
                            </div>
                            <!-- btn Enviar e Voltar -->
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <button class="btn btn-danger" type="submit">Enviar</button>
                                    <a href="listar.php" class="btn btn-warning">Voltar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- poster -->
                <div class="col-4">
                    <img src="<?php echo $filme['poster']; ?>" id="divPoster">
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>