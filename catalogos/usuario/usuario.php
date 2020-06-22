<?php  
	session_start(); 
	include 'server.php';
	include 'menu.php';


	if (isset($_GET['edit'])) {
		$id_usuario = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM SfrUsuario WHERE id_usuario=$id_usuario");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$vNombre = $n['vNombre'];
			$vApellido = $n['vApellido'];
			$username = $n['username'];
			$vCorreo = $n['vCorreo'];
			$vContraseña = $n['vContraseña'];
			$vConfirmarContraseña = $n['vConfirmarContraseña'];
			$dtFechaCreacion = $n['dtFechaCreacion'];
			$tiPermiso = $n['tiPermiso'];
			$iCelular = $n['iCelular'];
			$vCedula = $n['vCedula'];
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

<?php $results = mysqli_query($db, "SELECT * FROM SfrUsuario"); ?>

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
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Contraseña</th>
			<th>Permiso</th>
			<th>Celular</th>
			<th>Cédula</th>
			<th>Fecha creación:</th>
			<th colspan="2">Acción</th>
		</tr>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['vNombre']; ?></td>
			<td><?php echo $row['vApellido']; ?></td>
			<td><?php echo $row['vCorreo']; ?></td>
			<td><?php echo $row['vContraseña']; ?></td>
			<td><?php $tiPermiso = $row['tiPermiso'];

			switch ($tiPermiso) {
   				case 1:
         			echo "Admin";
         			break;
   				case 2:
         			echo "Vendedor";
         			break;
   				case 3:
         			echo "Reportes";
         			break;
			}

			?></td>
			<td><?php echo $row['iCelular']; ?></td>
			<td><?php echo $row['vCedula']; ?></td>
			<td><?php echo $row['dtFechaCreacion']; ?></td>
			<td>
			<a href="usuario.php?edit=<?php echo $row['id_usuario']; ?>" class="edit_btn">Editar</a>
			</td>
			<td>
		<a href="server.php?del=<?php echo $row['id_usuario']; ?>" onclick="return confirm('¿Seguro?')" class="del_btn">Borrar</a>
			</td>
		</tr>

	<?php } ?>
</table>

<div class="container">
<div class="row">
<div class="col-md-12 page-header">

		<form role="form" action="server.php" method="post">
		<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
		  <div class="form-group">
		    <label for="username">Usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required="" value="<?php echo $username;?>" >
		  </div>
		  <div class="form-group">
		    <label for="vNombre">Nombre</label>
		    <input type="text" class="form-control" id="vNombre" name="vNombre" placeholder="Primer nombre" required="" value="<?php echo $vNombre;?>">
		  </div>
		  <div class="form-group">
		    <label for="vApellido">Apellido</label>
		    <input type="text" class="form-control" id="vApellido" name="vApellido" placeholder="Primer apellido" required="" value="<?php echo $vApellido;?>">
		  </div>
		  <div class="form-group">
		    <label for="vCorreo">Correo electronico</label>
		    <input type="email" class="form-control" id="vCorreo" name="vCorreo" placeholder="Correo electronico" required="" value="<?php echo $vCorreo;?>">

		  <div class="form-group">
		    <label for="vContraseña">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="vContraseña" name="vContraseña" placeholder="Contrase&ntilde;a" required="" value="<?php echo $vContraseña;?>">
		  </div>
		  <div class="form-group">
		    <label for="vConfirmarContraseña">Confirmar contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="vConfirmarContraseña" name="vConfirmarContraseña" placeholder="Confirmar contrase&ntilde;a" required="" value="<?php echo $vConfirmarContraseña;?>">
		  </div>
		  <div class="form-group">
		    <label for="vCedula">Cedula</label>
		    <input type="text" class="form-control" id="vCedula" name="vCedula" placeholder="Confirmar contrase&ntilde;a" required="" value="<?php echo $vCedula;?>">
		  </div>
		  <div class="form-group">
		    <label for="iCelular">Celular</label>
		    <input type="text" class="form-control" id="iCelular" name="iCelular" placeholder="Confirmar contrase&ntilde;a" required="" value="<?php echo $iCelular;?>">
		  </div>

		  	</div class="form-group">
				<label for="tiPermiso">Permiso</label>
				 <select class="form-control" id="tiPermiso" name="tiPermiso" required>
				 	<option value="">~ SELECCIONAR ~</option>
					<option value="1">Admin</option>
					<option value="2">Vendedor</option>
					<option value="2">Reportes</option>
				  </select>
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

