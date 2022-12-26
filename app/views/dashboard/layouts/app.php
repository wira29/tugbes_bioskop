<?php
require_once __DIR__ . "/../../../core/Helper.php";

$uriHelper = new Helper();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="<?= $uriHelper->baseUrl('assets/css/style.css') ?>">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>

  <link rel="stylesheet" href="<?= $uriHelper->baseUrl('assets/css/bootstrap.min.css') ?>">

  <script src="https://kit.fontawesome.com/75fbb137eb.js" crossorigin="anonymous"></script>
  <script src="<?= $uriHelper->baseUrl('assets/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body class="bg">