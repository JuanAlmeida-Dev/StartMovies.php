<?php

include('connect.php');

extract($_POST);
extract($_FILES);

$genres = implode(' ', $genres);

move_uploaded_file($poster['tmp_name'], $poster_atual);

$updatedAt = date('Y-m-d H:i:s');

mysqli_query($con, "UPDATE `tb_movies` SET 
`ptbrTitle` = '$ptbrTitle', 
`title` = '$title', 
`year` = '$year', 
`storyLine` = '$storyLine', 
`genres` = '$genres', 
`poster` = '$poster_atual', 
`updated_at` = '$updatedAt'
WHERE 
`tb_movies`.`id` = '$id';");

header('location:listar.php');