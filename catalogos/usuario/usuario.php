<?php  
	session_start(); 
	include 'server.php';
	include 'menu.php';


	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$fullname = $n['fullname'];
			$username = $n['username'];
			$email = $n['email'];
			$password = $n['password'];
		}
	}
?>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="icon" type="image/ico" href="../../img/book.ico" />
</head>

<section class="main-container">
    <div class="col-lg-12 page-header text-center">

  
	<?php 

		if (isset($_SESSION['message'])): 

	?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM user"); ?>

<ol class="breadcrumb">
  <li><a href="../../home.php">Home</a></li>
  <li>Catalogos</li>
  <li class="active">Usuarios</li>
</ol>

<div class="container">	
	<div class="form-group row">
	<label for="caja_busqueda" class="col-md-2 control-label">Nombre</label>
	<div class="col-md-8">
	<input type="text" class="form-control" id="caja_busqueda" placeholder="Nombre del usuario">
	</div>
	<div class="col-md-1">
	<button type="button" class="btn" id="btn_buscar">
	<span class="glyphicon glyphicon-search" ></span> Buscar</button>
	</div>
	</div>
</div>


<table class='table table-hover'>
		<tr>
			<th>Usuario</th>
			<th>Nombre completo</th>
			<th>Correo</th>
			<th>Contraseña</th>
			<th>Creado:</th>
			<th colspan="2">Acción</th>
		</tr>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['fullname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['created_at']; ?></td>
			<td>
			<a href="usuario.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Editar</a>
			</td>
			<td>
		<a href="server.php?del=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro?')" class="del_btn">Borrar</a>
			</td>
		</tr>

	<?php } ?>

	
</table>

<div class="container">
<div class="row">
<div class="col-md-12 page-header">

		<form role="form" action="server.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		  <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required="" value="<?php echo $username;?>" >
		  </div>
		  <div class="form-group">
		    <label for="fullname">Nombre completo</label>
		    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo" required="" value="<?php echo $fullname;?>">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" required="" value="<?php echo $email;?>">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a" required="" value="<?php echo $password;?>">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Confirmar contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar contrase&ntilde;a" required="">
		  </div>
		<div class="input-group">
		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Actualizar</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Guardar</button>
		<?php endif ?>
		</div>

		</form>
		</div>
		</div>
		</div>


</section>

