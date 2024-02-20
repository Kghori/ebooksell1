<!-- ?php require("partial/navigation.php"); ?> -->

<?php 
include 'partial/dbconnect.php';

$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST["usernamee"];
$password=$_POST["Password"];

$sql="select * from  signup where username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);

$num=mysqli_num_rows($result);

if($num==1){
  $login=true;
  $flag=true;
  session_start();
  $_SESSION['loggedin2']=true;
  $_SESSION['username']=$username;
  // $_SESSION['sno']=$sno;
  header("location: home1.php");
  }
else{
  $showError="Invalid username";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: black;
}



.container1{
    background-color:  bisque;
   border: 5px solid transparent;
   margin-top: 10%;
   margin-left: 10%;
   margin-right: 10%;
   border-radius: 20px;

 }
 .submit{
   margin-top: 10px;
   margin-left: 30%;
   margin-left: 5%;
 }
 .form-group{
   padding-left: 18%;
   padding-right: -10%;
   padding-top:1%;
   margin-right: 25%;
   margin-left: 8%;
   border: 1px solid transparent;
   padding-bottom: 2%;
 }
 .button1{
  border: 1px solid transparent;
  margin-left: 1%;

 }
.button2{
  border: 1px solid transparent;
 margin-top: 10px;
 text-align: center;
 font-size: large;
 color: black;


}
input[type="text"]{
  font-size: 20px;
}
input[type="password"]{

font-size: 20px;
}
 
  </style>
  <body>

  <?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucess!</strong>
    You are logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span aria-hidden="true">&times;</span>
  </div>';
  }
  if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'.$showError.'
    Your accunt is now created and you can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <span aria-hidden="true">&times;</span>
  </div>';
  }
?>
   
<?php include("partial/navigation.php"); ?>
 
    <div class="container1">
        <h1 class="text-center"> login website</h1>
        <form action="/loginsystem/login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">username </label>
    <input type="text" class="form-control" id="usernamee" name="usernamee" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
   <div class="button1">
      <div class="d-grid gap-2 col-6 mx-auto">
  <button class="btn btn-primary" type="submit" id="button">login</button>
  <div class="button2">
        <a href="signup.php" id="button" class="button2">Create Account</a>
       
      </div>
      </div>
 </form>
   </div>

    </body>
</html>
<!-- ?php include ('partial/footer.php');?> -->