<?php
// session_start();
$server_name ="localhost";
$username ="root";
$password ="";
$dbname = "registeration";   //"favour";

$connection = mysqli_connect($server_name,$username,$password,$dbname);
// if ($connection->connect_error) {
//   // code...
//   echo "error in connection";
// }
//   else {
//     echo "database connected successfull";
//
//  }

//query into the Database
//mysqli_query (it must be in quote)
//$query ="INSERT INTO `student` (`id`,`first name`,`last name`) VALUES (NULL,'williams','linda')";
//if(mysqli_query($connection,$query)){
  //echo "insert successfull";
//}
//else{
 // echo "insert not successfull";
//}

// $query = "INSERT INTO `student` (`id`, `first name`,`lat name` ) VALUES (NULL,'favour','idibong')";
// if(mysqli_query($connection,$query)){
    // echo "insert successfull";
// }
// else {
  // echo "insert not successfull";
// }





// mysql_close($connection);

 ?>
