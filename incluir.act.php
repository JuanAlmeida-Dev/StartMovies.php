<?php

include('connect.php');

extract($_POST);
extract($_FILES);

$genres = implode(' ', $genres);

$image = "public/images/" . md5(time()) . ".jpg";
move_uploaded_file($poster['tmp_name'], $image);

$createdAt = date('Y-m-d H:i:s');


mysqli_query($con,"INSERT INTO `bd_movies`.`tb_movies` 
(`id`, `ptbrTitle`,`title`,`year`,`storyLine`,`genres`,`poster`,`created_at`) 
VALUES 
(NULL, '$ptbrTitle','$title','$year','$storyLine','$genres','$image','$createdAt');");

header('location:listar.php');
