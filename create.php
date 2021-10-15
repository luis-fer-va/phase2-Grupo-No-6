<link rel="stylesheet" href="main.css">

<!-- Animate.css -->
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<?php 
/* conection DataBase */
require_once "conexion-DB.php";
/* Recopilation data inputs from index.php */
$name=$_POST['name'];
$description=$_POST['description'];
$category=$_POST['category'];
$price=$_POST['price'];
$image=$_POST['image'];
$available=$_POST['available'];
$code=$_POST['code'];

if(isset($_POST['submit'])){
try{
    /* Query for insert products into the table products */
$query="INSERT INTO `products`(`id`, `code`,`name`, `description`, `category`, `available`, `price`, `image`) VALUES (null,:code,:name,:description,:category,:available,:price,:image)";
$result=$conexion->prepare($query);
$result->execute(array(":code"=>$code,":name"=>$name,":description"=>$description,":category"=>$category,":available"=>$available,":price"=>$price,":image"=>$image));

    /* Show table with data insert */
    echo "<button class='btn'>Successful Registration!!</button>";
    echo "   <a href='homepage.php' class='return'>Return⬅</a><br>";
    echo"
<table>
    <tr>
        <h2 class='Insert'>Data Insert</h2>
    </tr>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Category</th>
    <th>Available</th>
    <th>Price</th>
    <th>Image</th>
  </tr>
  <tr>
    <td>$name</td>
    <td>$description</td>
    <td>$category</td>
    <td>$available</td>
    <td>".number_format($price)."</td>
    <td>". '<img src="'.$image.'" width="250" height="250" />'."</td>
  </tr>

</table>";
 
      
$result->closeCursor(); 

}catch(Exception $e){
    echo "Error: " . $e->getLine();
}

}
?>

<tr colspan="5"></tr>
