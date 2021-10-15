<?php


require_once("db/conexion.php");



if(isset($_POST['activo'])){
	$id = $_POST['id'];
	$sql = $con->query("SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($sql);
    
    $name = $row['name'];
	$sql_del = $con->query("DELETE FROM products WHERE id = '$id'");
    if ($sql_del){
    	echo 'Enhorabuena :), te informamos que el producto <b>', $name, '</b>, ha sido eliminado. <br/>';
    	echo '<font color="orange">Para que vea el producto eliminado, actualice el panel.</font>';
		echo "<META HTTP-EQUIV='Refresh' CONTENT='04; URL=index-DanielVega.php'>";
    }
}
else{
	$id = $_GET['id'];
	$sql = $con->query("SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($sql);
    $name = $row['name'];
	echo '
	<head>
	<style type="text/css">
		.h3_eli{margin-left: 13px;}
	</style>
	</head>
	<form accept-charset="utf-8" method="POST" id="add" name="formc" method="post" enctype="multipart/form-data" action="">
		<input type="hidden" name="activo">
        <input type="hidden" name="id" value="', $id, '">

		<h3 class="h3_eli"> <b>¿Est&aacute; seguro de Eliminar el producto ', $name, '</b> ? </h3>
		<div class="text-center">
			<div class="errorMenssIf" id="mensaje"></div>
		</div>
		<div class="modal-footer" style="padding-left: 13px;">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-warning btn-ok">Eliminar</button>
		</div>

		</form>
		<script>
					//Guardamos el controlador del div con ID mensaje en una variable
					var mensaje = $("#mensaje");
					//Ocultamos el contenedor
					mensaje.hide();
					
					//Cuando el formulario con ID add se envï¿½e...
					$("#add").on("submit", function(e){
						//Evitamos que se envï¿½e por defecto
						e.preventDefault();
						//Creamos un FormData con los datos del mismo formulario
						var formData = new FormData(document.getElementById("add"));
					
						//Llamamos a la funciï¿½n AJAX de jQuery
						$.ajax({
							//Definimos la URL del archivo al cual vamos a enviar los datos
							url: "eliminar-registro.php",
							//Definimos el tipo de mï¿½todo de envï¿½o
							type: "POST",
							//Definimos el tipo de datos que vamos a enviar y recibir
							dataType: "",
							//Definimos la informaciï¿½n que vamos a enviar
							data: formData,
							//Deshabilitamos el cachï¿½
							cache: false,
							//No especificamos el contentType
							contentType: false,
							//No permitimos que los datos pasen como un objeto
							processData: false
						}).done(function(echo){
							//Cuando recibamos respuesta, la mostramos
							mensaje.html(echo);
							mensaje.slideDown(500);
							mensaje.fadeOut(15000);
							$("#add").trigger("reset");
						});
					});
		</script>
	';
}

	
?>

