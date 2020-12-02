<?php
session_start();

include_once './connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['btnLogin'])) {
   //  echo 'working btn Login!';

//    $username = stripslashes($username);
//    $password = stripslashes($password);

//    $sql = "SELECT * FROM user WHERE username='$username' AND password=md5('$password') AND takeExam=0";
   
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         $fullname = $row["user_fullname"];
         $id = $row["id"];
      }
       //for logs
       $currdate = date('m-d-Y h:ia');
       $sql2 = "INSERT INTO logs(date,action,user)VALUES('$currdate','Logged in','$fullname')";
 
       if(mysqli_query($conn, $sql2)){
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['user_fullname'] = $fullname;
          header("location: ./home.php?id=$id");
       }
       //for logs

   } else {
      header("location: ./index.php");
      $_SESSION['message'] = 'Wrong Username or Password';
   }
   mysqli_close($conn);
  
}