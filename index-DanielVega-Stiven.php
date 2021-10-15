<?php 

	require_once("db/conexion.php");

	function CortarTexto($texto, $idIf){

		if($idIf == 1){
			echo substr($texto, 0, 15), "...";
		}

		if($idIf == 2){
			echo substr($texto, 0, 25), "...";
		}

		if($idIf == 3){
			echo substr($texto, 0, 35), "...";
		}

		if($idIf == 4){
			echo substr($texto, 0, 5), "...";
		}

	};
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Documentación de Software</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="contenedor_dashboard">
		<div id="dashboard_flex">
			<div id="dashboard_menu">
				<div id="menu_user_rol">
					<div id="image_profile">
						
					</div>

					<div id="text_profile">
						Dashboard
					</div>
				</div>

				<div id="menu_nav">
					<div id="item">
						Productos
					</div>
				</div>
			</div>

			<div id="dashboard_table">
				<div id="table_padding">
					<div id="table_tile">
						Productos
					</div>

					<div id="table_contenido_exp">
						<div id="table_CE_title">
							Todos los productos
						</div>

						<div id="table_all_products" class="overflow-auto" style="height: 50vh; overflow: auto;">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Imagen</th>
										<th>Código</th>
										<th>Nombre</th>
										<th>Descripci&oacute;n</th>
										<th>Categoria</th>
										<th>Precio</th>
										<th>Disponible</th>
										<th>Acci&oacute;n</th>
									</tr>
								</thead>

								<tbody>
									<?php 

									$sql = $con->query("SELECT * FROM products ORDER BY id ASC");
									while($row = mysqli_fetch_assoc($sql)){ 
									$id = $row['id']; 
									?>
									<tr>
										<td> 
											<img class="img_registro" src="<?php echo $row['image'];  ?>"> 
										</td>

										<td class="weigh"> 
											<?php echo $row["code"];  ?> 
										</td>

										<td class="weigh"> 
											<div title="<?php echo $row["name"]; ?>">
												<?php echo CortarTexto($row["name"], 1); ?>
											</div> 
										</td>

										<td> 
											<div title="<?php echo $row["description"]; ?>">
												<?php echo CortarTexto($row["description"], 2);  ?> 
											</div>
										</td>

										<td class="category"> 
											<div title="<?php echo $row["category"]; ?>">
												<?php echo CortarTexto($row["category"], 4);  ?> 
											</div> 
										</td>

										<td class="weigh"> 
											$<?php echo number_format($row["price"]);  ?> 
										</td>

										<td class="<?php echo $row['available']; ?>"> 
											<font>
												<?php echo $row["available"];  ?> 
											</font>
										</td>

										<td style="vertical-align: middle;">

											<button type="button" class="btn btn-danger openBtnEli<?php echo $id; ?>" id="div-eli">Elimar</button>

											<button type="button" class="btn openBtnEdit<?php echo $id; ?>" id="div-edi">Editar</button>
											
										</td>
									</tr>
									<?php }; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="myModaldos" role="dialog">
	    <div class="modal-dialog" id="edicion-est">
	        <!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">x</button>
	                <h3 class="modal-title">Eliminaci&oacute;n de producto</h4>
	            </div>
	            <div class="modal-body eli">
	            </div>
	        </div>
	    </div>
	</div>


	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog" id="edicion-est">
	        <!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">x</button>
	                <h3 class="modal-title">Edici&oacute;n de este establecimiento</h4>
	            </div>
	            <div class="modal-body edit">

	            </div>
	        </div>
	    </div>
	</div>

	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

	 <?php
			$sqlA = $con->query("SELECT * FROM `products` ");
			 while ($row2 = mysqli_fetch_assoc($sqlA)) 
				{   $id = $row2['id']; 
		?>

			<script>
				$('.openBtnEli<?php echo $id;?>').on('click',function(){
    				$('.modal-body.eli').load('eliminar-registro.php?id=<?php echo $id?>',function(){
    				$('#myModaldos').modal({show:true});
    				});
    			});
			</script>

			<script>
			$('.openBtnEdit<?php echo $id;?>').on('click',function(){
			    $('.modal-body.edit').load('editar-registro.php?id=<?php echo $id?>',function(){
			    $('#myModal').modal({show:true});
			    });
			});
	   </script>
		<?php } ?>

	<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>

</body>
</html>

