<header class="header">

   <div class="flex">

      <a href="#" class="logo">foodies</a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products.php">view products</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>



<!-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

section{
    width: 100%;
    height: 100vh;
    /* background-image: url(image/bg.png); */
    background-size: cover;
    background-position: center;
}

section nav{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    box-shadow: 0 0 10px #089da1;
    background: #fff;
    position: fixed;
    left: 0;
    z-index: 100;
}

section nav .logo img{
    width: 100px;
    cursor: pointer;
    margin: 8px 0;
}

section nav ul{
    list-style: none;
}

section nav li{
    display: inline-block;
    padding: 0 10px;
}

section nav li a{
    text-decoration: none;
    color: #000;
}

section nav li a:hover{
    color: #089da1;
}

section nav .social_icon i{
    margin: 0 5px;
    font-size: 18px;
}

section nav .social_icon i:hover{
    color: #089da1;
    cursor: pointer;
}

section .main{
    display: flex;
    align-items: center;
    justify-content: space-around;
    position: relative;
    top: 10%;
}

section .main h1{
    position: relative;
    font-size: 55px;
    top: 80px;
    left: 25px;
}

section .main h1 span{
    color: #089da1;
}

section .main p{
    width: 650px;
    text-align: justify;
    line-height: 22px;
    position: relative;
    top: 125px;
    left: 25px;
}

section .main .main_tag .main_btn{
    background: #089da1;
    padding: 10px 20px;
    position: relative;
    top: 200px;
    left: 25px;
    color: #fff;
    text-decoration: none;
}

section .main .main_img img{
    width: 780px;
    position: relative;
    top: 90px;
    left: 20px;
}

</style>
<body>
<nav>

<!-- <div class="logo">
    <img src="image/logo.png">
</div> -->

<ul>
    <li><a href="#Home">Home</a></li>
    <li><a href="#About">About</a></li>
    <li><a href="#Featured">Featured</a></li>
    <li><a href="#Arrivals">Arrivals</a></li>
    <li><a href="#Reviews">Reviews</a></li>
    <li><a href="#Blog">Blog</a></li>
</ul>

<div class="social_icon">
    <i class="fa-solid fa-magnifying-glass"></i>
    <i class="fa-solid fa-heart"></i>
</div>

</nav>    
</body>
</html> -->
