<?php
require ('connection.php');

$id = $_GET['id'];

$PatienceDelete = "DELETE FROM todoitems WHERE id = '$id' ";
$PatienceConDB = $connection->query($PatienceDelete);

if($PatienceConDB){

$url = 'Todolist.php';

header('location: '.$url.' ');
      echo "delete successfully";
}else{

	echo "E no Delete Hoooo!!!!";
}
?>
