<?php
require('connection.php');

//define sesion variable
if(isset($_GET['id'])){
  $_SESSION['id'] = $_GET['id'];
  // $id = $_SESSION['id'];

// else {
   $id = $_GET['id'];
// }
// get the data of the user using id
// $query = "SELECT * FROM `users` WHERE `ID`= '$id'";
$query = "SELECT * FROM `todoitems` WHERE `id`= '$id'";
$result = mysqli_query($connection,$query);
if(mysqli_num_rows($result) >  0){
  while ($data = mysqli_fetch_assoc($result)){

    $id = $data['id'];
    $List = $data['List'];
    $userid = $data['userid'];
    // $name = $data['name'];
    // $email = $data['email'];
    // $phone = $data['phone'];
    // $address = $data['address'];
  }

}

  else {
    echo "record not found";
  }

//performing the update task
//check if the update button has been set
if(isset($_POST['update'])){

  // $id = htmlspecialchars(strip_tags(trim($_POST['id'])));
  @$new_List = htmlspecialchars(strip_tags(trim($_POST['List'])));
  // $userid = htmlspecialchars(strip_tags(trim($_POST['userid'])));
  if(empty($new_List)) {

  // $id = htmlspecialchars(strip_tags(trim($_POST['name'])));
  // $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
  // $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
  // $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
  // if(empty($name) || empty($email) || empty($phone) || empty($address)) {
    $error[] = "Required field must not be left empty";
  }
    if(strlen($new_List) < 3){
      $error[] = "List is too short";
    }

    // if(strlen($phone) < 11 || strlen($phone) > 14){
    //   $error[] = "phone number is invalid";
    // }
    // if(strlen($address) < 10){
    //   $error[] = "Address must be descriptional";
    // }
// check if the error array is empty
if(!empty($error)){

   echo "Error";
 }
 else{
   // insert data into the database
  $update ="UPDATE todoitems SET List='$new_List' WHERE id= '$id'";

if(mysqli_query($connection,$update)){

	$url ='Todolist.php';
	header('location:'.$url);
  // echo "<script>alert('Uploaded successfully')</script>";
}
else{
  echo "<script>alert('Failed to update')</script>";
 }
}
}
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      ID: <input type="text"  name="id" value= "<?php echo $id ?>" ><br>
      List: <input type="text"  name="List" value= "<?php echo $List ?>" tittle="Edit"><br>
      <input type="submit" name="update" value="update">
    </form>
</body>
</html>
