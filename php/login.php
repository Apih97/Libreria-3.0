<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "../connect-db.php";
			
			$id_usuario=null;
			$sql1= "select * from SfrUsuario where (username=\"$_POST[username]\" or vCorreo=\"$_POST[username]\") and vContraseña=\"$_POST[password]\" ";
			$query = $connection->query($sql1);
			while ($r=$query->fetch_array()) {
				$id_usuario=$r["id_usuario"];
				break;
			}
			if($id_usuario==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["id_usuario"]=$id_usuario;
				print "<script>window.location='../home.php';</script>";				
			}
		}
	}
}



?>