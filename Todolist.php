 <?php
require('connection.php');
session_start();
echo "welcome".$_SESSION['name'];
// if ( $_SEESION["loggedin"] !== true) {
//   header("Location: logout.php");
// }else {

$userid = $_SESSION["userid"];
// $userid = $_GET["userid"];
  if(isset($_POST['Add'])){
    $List = htmlspecialchars(strip_tags(trim($_POST['List'])));

  if(empty($List)){
    $error[]= "list cannot be empty";
  }
  if(strlen($List)<3){
    $error[]= "your input is too short";
  }
  // if(!empty($error)){
    // echo "Error";
  // }
  else{
    if (empty($_SESSION["userid"]) ) {
        echo "<script>alert('cant add please kindly Register or login') </script>";
    }else {
      $query = "INSERT INTO `todoitems` (`List`, `userid`) VALUES ('$List', '$userid')";
      $Patience = $connection->query($query);
      if($Patience){
         echo "insert don work ooo";
      $url ='Todolist.php';
      header('location: '. $url .'');
      echo "Registered successfully";
    }
      else{
        echo "eno work";
      }
    }

  }
  }



?>
<!DOCTYPE!>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="Todolist.css">
<img src="img/system.JPG" alt="system.JPG" style="height:inherit; width:50px;">
                 <!-- <ul class="fav">
    <a href="Registeration.php"></i>Register|</a>
    <!-- <li class="divider"></li> -->
    <!--  -->

<?php if($_SESSION['userid']): ?>
  <?php echo "<a href='logout.php'></i>logout|</a>" ?>
  <?php echo "<a href='edit.php'></i>Update|</a>" ?>

<?php else: ?>
     <a href="Login.php"></i> sign in|</a>
     <a href="Login.php"></i> register|</a>
                      <!-- <li class="divider"></li> -->
                      <!-- <li class="divider"></li> -->

                   </ul> -->
  <?php endif ?>

<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
</head>
<body>

    <div id="myDIV" class="header">
      <marquee><h2 style="margin:5px">My To Do List</h2></marquee>
      <form action="" method="POST">
      <input type="text" name="List" id="myInput" placeholder="Title...">
      <input type='submit' name='Add' value='Add'  class='addBtn'>


  </form>
</div>
<table id="table">
  <?php
  $Patience = "SELECT * FROM todoitems WHERE userid = '$userid'";
  $PatienceConDB1 = $connection->query($Patience);
  if ($PatienceConDB1->num_rows > 0) {
    while ($i = $PatienceConDB1->fetch_assoc()) {
  ?>
  <tr>
  <ul id="myUL">
  <td><?php echo $i['id']?></td>
  <td><li style="list-style: none;"><?php echo $i['List']?></li></td>
  <td><li style="list-style:;"><span><a href="delete.php?id=<?php echo $i['id']?>">Delete</a></span></li></td>
  <td><li style="list-style:;"><span><a href="edit.php?id=<?php echo $i['id']?>">Edit</a></span></li></td>
</div>
  </ul>
</tr>
<?php }}?>
</table>
<script src="jquery.js" type="text/javascript"></script>
<script>


$(document).ready(function(){
  setInterval(funtion(){
      $('table').load('Todolist.php')
  }, 2000);
});

</script>
</body>
</html>
