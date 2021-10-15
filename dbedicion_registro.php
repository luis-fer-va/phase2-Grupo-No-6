<?php 

header('Content-Type: text/html; charset=iso-8859-1');

require_once("db/conexion.php");

$con->set_charset('iso-8859-1');


$id = $_POST['id'];
$sql = $con->query("SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($sql);

$name = $_POST['name'];
$code = $_POST['code'];
$category = $_POST['category'];
$description = $_POST['description'];
$available = $_POST['available'];
$price = $_POST['price'];
$image = $_POST['image'];



	// if no error occured, continue ....
	$stmt = $con->query("UPDATE products SET image = '$image', 
		name = '$name', description = '$description', category = '$category', code = '$code', available = '$available', price = '$price'  WHERE id= $id");

	if($stmt){
		echo 'Enhorabuena :), te informamos que la informaci&oacute;n del producto <b>', utf8_decode($name), '</b>, ha sido actualizada. <br/>';
		echo '<font color="orange">Para que vea el producto actualizado, actualice el formulario.</font>';
		echo "<META HTTP-EQUIV='Refresh' CONTENT='04; URL=index-DanielVega-Stiven.php'>";
	}

	else{
		echo "Sorry Data Could Not Updated !";  
	}

?>