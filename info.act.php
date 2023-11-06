<?php

include('connect.php');

$id = $_GET['id'];

$busca = mysqli_query($con, "SELECT * FROM `tb_movies` WHERE `id` = '$id';");
$busca = mysqli_fetch_array($busca);

echo $busca['storyLine'] . "@#$@" . $busca['poster'];