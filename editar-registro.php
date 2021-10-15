<?php 
header('Content-Type: text/html; charset=ISO-8859-1'); 
require_once("db/conexion.php");


$id = $_GET['id'];
$sqlA = $con->query("SELECT * FROM products WHERE id = $id ");
$row = mysqli_fetch_array($sqlA);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css"> 
	.col-sm-10 { padding-left: 0px; padding-right: 30px; } 
	label.col-sm-2.col-form-label { padding-left: 0px; } 
	.col-sm-10.img_coorporativa { float: left; width: 9%; padding-right: 0; } .col-sm-10.img_coorporativa img{width:90px;} 
	h2 { float: revert; margin-left: 22%; line-height: 1.5; } .modal-footer {padding-left: 0px; padding-top: 2px;}	.modal-content{margin-top: -1%;}.errorMenssIf{margin-left: 0px; margin-top: 0px; padding-bottom: 0px;} .container.form-group {width: 100%;}
	</style>
</head>
<body>
	<div class="container form-group">
		<div id="" class="quepide-producto">
			<form accept-charset="utf-8" method="POST" id="add1" name="formc1" method="post" enctype="multipart/form-data" action="">

				<div class="col-sm-10 img_coorporativa">
					<img src="<?php echo $row['image'] ?>">
				</div>
				<h2> <b><?php echo utf8_decode($row['name'])?></b> </h2>

				<div class="modal-body" style="padding-left: 0px; padding-right: 0px;">
					<div class="form-group form">

						<div class="form-group row">
							<label for="nombre" class="col-sm-2 col-form-label">Name of product <b>*</b></label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" name="name" placeholder="Nombre del establecimiento" value="<?php echo utf8_decode($row['name'])?>">
							</div>
						</div>			



						<div class="form-group row">
							<label for="fecha" class="col-sm-2 col-form-label">Image <b>*</b></label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" name="image" placeholder="" value="<?php echo $row['image']?>">
							</div>
						</div>

						<div class="form-group row">
							<label for="nombre" class="col-sm-2 col-form-label">Code of product <b>*</b></label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" name="code" placeholder="Name of producto" value="<?php echo utf8_decode($row['code'])?>">
							</div>
						</div>	


						<div class="form-group row">
							<label for="nombre" class="col-sm-2 col-form-label">Category of product <b>*</b></label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" name="category" placeholder="Category of product" value="<?php echo utf8_decode($row['category'])?>">
							</div>
						</div>


						<div class="form-group row">
							<label for="nombre" class="col-sm-2 col-form-label">Available of product? <b>*</b></label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" name="available" placeholder="Is available the product?" value="<?php echo utf8_decode($row['available'])?>">
							</div>
						</div>


						<div class="form-group row">
							<label for="nombre" class="col-sm-2 col-form-label">Price of product? <b>*</b></label>
							<div class="col-sm-10">
								<input type="text"  class="form-control" name="price" placeholder="Price of product" value="<?php echo utf8_decode($row['price'])?>">
							</div>
						</div>

						

						<div class="form-group row" style="width:100%;">
							<label for="descripcion" class="col-sm-2 col-form-label">Descripti&oacute;n <b>*</b></label>
							<div class="col-sm-10">
								<textarea id="elm1" name="description" rows="15" cols="80" style="margin: 0px; height: 116px; width: 100%;"><?php echo utf8_decode($row['description']) ?></textarea>
							</div>
						</div>

						<div class="text-center">
							<div class="errorMenssIf" id="mensaje1"></div>
						</div>

					</div> 
				</div>

				<input type="hidden" name="id" value="<?php echo $row['id']?>">

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" id="btnPublicar1" class="btn btn-warning" >Guardar</button>
				</div>

			</form>
		</div>
	</div>

	<script>
			//Guardamos el controlador del div con ID mensaje en una variable
			var mensaje1 = $("#mensaje1");
			//Ocultamos el contenedor
			mensaje1.hide();
			
			//Cuando el formulario con ID add se envï¿½e...
			$("#add1").on("submit", function(e){
				//Evitamos que se envï¿½e por defecto
				e.preventDefault();
				//Creamos un FormData con los datos del mismo formulario
				var formData1 = new FormData(document.getElementById("add1"));

				//Llamamos a la funciï¿½n AJAX de jQuery
				$.ajax({
					//Definimos la URL del archivo al cual vamos a enviar los datos
					url: "dbedicion_registro.php",
					//Definimos el tipo de mï¿½todo de envï¿½o
					type: "POST",
					//Definimos el tipo de datos que vamos a enviar y recibir
					dataType: "",
					//Definimos la informaciï¿½n que vamos a enviar
					data: formData1,
					//Deshabilitamos el cachï¿½
					cache: false,
					//No especificamos el contentType
					contentType: false,
					//No permitimos que los datos pasen como un objeto
					processData: false
				}).done(function(echo){
					//Cuando recibamos respuesta, la mostramos
					mensaje1.html(echo);
					mensaje1.slideDown(500);
					mensaje1.fadeOut(7000);
					$('#add1').trigger("reset");
				});
			});
		</script>
	</body>
	</html>
