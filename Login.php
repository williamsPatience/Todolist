<?php
//login users
require('connection.php');
if(isset($_POST['submit'])){
  //performing form validation
  $email =htmlspecialchars(strip_tags(trim($_POST['email'])));
  $password =htmlspecialchars(strip_tags(trim($_POST['password'])));
$password = md5($password);

  $query ="SELECT * FROM `users` WHERE `email`= '$email' AND `password` = '$password'";
  $result = mysqli_query($connection,$query);
  if(mysqli_num_rows($result) == 0){
     echo mysqli_error($connection);
  }
  else{
    while($data = mysqli_fetch_assoc($result)){
      $id = $data['id'];
      $name = $data['name'];
      $email = $data['email'];
    }
    session_start();
    $url = 'Todolist.php';
    $_SEESION['logged'] = true;
    $_SESSION['userid'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    if(isset($_SESSION['userid'])){

      header('location: '.$url);
      // header("Location: Todolist.php?userid=$id");
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
     <form action="Login.php" method="post">

     <div class="myform">
       <label>Email</label>
     <input type="text" name="email" value="" placeholder="">
   </div>
   <div class="">
       <label>password</label>
     <input type="password" name="password" value="" placeholder="">
   </div>


 <div class="">
 <input type="submit" name="submit" value="Login">
 <p>Don't have an account?  <a href="Registeration.php">Click here to Register</a><p/>

 </div>
 </form>
   </body>
