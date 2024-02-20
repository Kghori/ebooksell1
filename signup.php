<?php
$showalert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'partial/dbconnect.php';
$username=$_POST["username"];
$password=$_POST["Password"];
$cpassword=$_POST["cPasssword"];

$existssql="SELECT * FROM `signup` WHERE username='$username'";
$result = mysqli_query($conn,$existssql);
$numExitsRows = mysqli_num_rows($result);
if($numExitsRows > 0){
  $showError="username Already exists";
}
else{
    if(($password==$cpassword)){
          
  $sql="INSERT INTO `signup` ( `username`, `password`, `dt`) VALUES ('$username', '$password',  current_timestamp())";
 $result=mysqli_query($conn,$sql);
 if($result){
  $showalert=true;
 }

}
else {
  $showError="password do not match";
}
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
   margin-left: 20%;
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


}
.label1{
  color: black;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size: 20px;
}
.btnsignin{
 color: black;
 font-size: 20px;
  font-size: large;
}
input[type="text"]{
  font-size: 20px;
}
input[type="password"]{

font-size: 20px;
}
.rg1{
  border: 1px solid red;
  margin-right: 75%;
}

  </style>
  <body>
  <?php include("partial/navigation.php"); ?>

  <?php
  if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucess!</strong>
    Your accunt is now created and you can login.
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

    <h1>signup page!</h1>
    <div class="container1">
        <h1 class="text-center"> signup website</h1>
        <form action="/loginsystem/signup.php" method="post">
          
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">username </label>
    <input type="text" class="form-control" id="username" name="username" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="cPassword1" name="cPasssword">
  </div>
  <div class="button1">
  <div class="d-grid gap-2 col-6 mx-auto">
   <button type="submit" name="button1" class="btn btn-primary">signUp</button>
  </div>
  </div>
  <div class="button2">
      <!-- <button type="submit" class="btn btn-primary" id="button" > Admin login</button> -->
       <label for="text-align" class="label1" >Already have an account ? </label> <a href="login.php" id="button" class="btnsignin">Sign In</a>
</form>
  </div>
</form>

   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>