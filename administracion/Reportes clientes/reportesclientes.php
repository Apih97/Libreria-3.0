<?php 
	session_start(); 
	include 'menu.php';
?>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="image/ico" href="../../img/book.ico" />
</head>

<section class="main-container">
    <div class="col-lg-12 page-header text-center">

<p>&nbsp;</p>
<ol class="breadcrumb">
  <li><a href="../../home.php">Home</a></li>
  <li>Administración</li>
  <li class="active">Reportes de clientes</li>
</ol>

<div class="container">	
	<div class="form-group row">
	<label for="caja_busqueda" class="col-md-2 control-label">Nombre</label>
	<div class="col-md-8">
	<input type="text" class="form-control" id="caja_busqueda">
	</div>
	<div class="col-md-1">
	<button type="button" class="btn" id="btn_buscar">
	<span class="glyphicon glyphicon-search" ></span> Buscar</button>
	</div>
	</div>
</div>

</section>