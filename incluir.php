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
    <!-- Incluindo menu -->
    <?php include('menu.php'); ?>
    <!-- container principal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="container-fluid">
                    <h1 class="display-6">Incluir novo filme</h1>
                        <form action="incluir.act.php" method="POST" enctype="multipart/form-data">
                        <!-- Título em português -->
                        <div class="mb-3">
                            <label for="ptbrTitle" class="form-label">Título</label>
                            <input type="text" class="form-control" name="ptbrTitle" id="ptbrTitle" aria-describedby="Título em português">
                            <div id="textHelp" class="form-text">Título do filme em português.</div>
                        </div>
                        <!-- Título original -->
                        <div class="mb-3">
                            <label for="Title" class="form-label">Título original</label>
                            <input type="text" class="form-control" name="title" id="Title" aria-describedby="Título original">
                            <div id="textHelp" class="form-text">Título original do filme.</div>
                        </div>
                        <!-- Year -->
                        <div class="mb-3">
                            <label for="yearSelect" class="form-label">Ano de lançamento</label>
                            <select class="form-select" name="year" id="yearSelect" aria-label="Ano de lançamento" >
                                <option selected>Selecione o ano</option>
                                <script>
                                    for (ano = 1900; ano <= 2021; ano++) {
                                        document.write("<option value=" + ano + ">" + ano + "</option>");
                                    }
                                </script>
                            </select>
                        </div>
                        <!-- Enredo -->
                        <div class="mb-3">
                            <label for="storyLine" class="form-label">Enredo</label>
                            <textarea class="form-control text" name="storyLine" id="storyLine" rows="20" ></textarea>
                        </div>
                        <!--Generos -->
                        <label for="genres" class="form-label">Selecione os gêneros</label>
                        <div class="mb-3">
                            <?php
                            $generos = ['Comédia', 'Sci-Fi', 'Terror', 'Romance', 'Ação', 'Arrepiante', 'Drama', 
                            'Mistério', 'Crime', 'Animação', 'Aventura', 'Fantasia', 'Documentário', 'Família', 
                            'Musical', 'Super-Herói', 'Biografia', 'Guerra', 'Esportes', 'Curtas', 'Noir'];
                            $x = 1;

                            foreach ($generos as $genero) {

                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="genres[]" id="inlineRadio<?php echo $x; ?>" value="<?php echo $genero; ?>">
                                    <label class="form-check-label" for="inlineRadio<?php echo $x; ?>"><?php echo $genero; ?></label>
                                </div>
                            <?php

                                $x++;
                            }

                            ?>
                        </div>
                        <!-- Poster -->
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="poster" id="inputGroupFile02">
                            </div>
                        </div>
                        <!-- btn Enviar -->
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <button class="btn btn-danger" type="submit">Enviar</button>
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body> 
</html>