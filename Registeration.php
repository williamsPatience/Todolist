<?php

require('connection.php');
// form to collect user info
// name,phone num,address,email.
// the field will be submitted to this same page
// validate the values the user has submitted
// check whether the user has submmited the form
// we will now store the error in an array
// if ther no errors then insert into the database

   if(isset($_POST['submit'])){
  $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
  $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
  $password = htmlspecialchars(strip_tags(trim($_POST['password'])));
  $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
  $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
  if(empty($name) || empty($email) || empty($password) ||empty($phone) || empty($address)) {
    $error[] = "Required field must not be left empty";
  }
    if(strlen($name) < 3){
      $error[] = "name is too short";
    }

    if(strlen($phone) < 11 || strlen($phone) > 14){
      $error[] = "phone number is invalid";
    }
    if(strlen($address) < 10){
      $error[] = "Address must be descriptional";
    }
    if(strlen($password) <6){
      $error[] = "password too short";
    }
// check if the error array is empty
if(!empty($error)){

   echo "Error";

  // foreach($error as $item){
  //   echo "<li>".$item."</li><br>";
  // }
 }
 else{
   //hash Password
   $password = md5($password);
   // insert data into the database
   $query = "INSERT INTO `users`(`id`,`name`,`email`, `password`,`phone`,`address`) VALUES (NULL,'$name','$email', '$password','$phone','$address')";
if(mysqli_query($connection,$query)){
	// redirect the user to select.php
	$url ='login.php';
	header('location: '.$url);
 echo "Registered successfully";
// //}
}
else {
  echo mysqli_error($connection);
}
 }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration form</title>
  </head>
  <body>
    <form action="Registeration.php" method="post">
      <div>
        <label>Name</label>
      <input type="text" name="name" value="" placeholder="Enter your name">
    </div>
    <div>
      <label>Email</label>
    <input type="email" name="email" value="" placeholder="Enter your email">
  </div>
      <label>password</label>
    <input type="password" name="password" value="" placeholder="Enter your Password">
  </div>
  <div>
    <label>Phone</label>
  <input type="text" name="phone" value="" placeholder="Enter your phone">
</div>
<div>
  <label>Address</label>
<textarea name="address" rows="8" cols="60"></textarea>
</div>
<div>
<input type="submit" name="submit" value="Register">
</div>
</form>
  </body>
