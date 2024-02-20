<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Website</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    section {
        width: 100%;
        /* height: 100vh; */
        /* background-image: url(image/bg.png); */
        margin: -1%;
        background-size: cover;
        background-position: center;
    }

    section nav {
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

    section nav .logo img {
        width: 100px;
        cursor: pointer;
        margin: 8px 0;
    }

    section nav ul {
        list-style: none;
    }

    section nav li {
        display: inline-block;
        padding: 0 10px;
    }

    section nav li a {
        text-decoration: none;
        color: #000;
        font-size: medium;

    }

    section nav li a:hover {
        color: #089da1;
    }

    section nav .social_icon i {
        margin: 0 5px;
        font-size: 18px;
    }

    section nav .social_icon i:hover {
        color: #089da1;
        cursor: pointer;
    }

    section nav .social_icon .text {
        color: #089da1;
        cursor: pointer;
        border: 3px solid black;
        text-align: center;
        width: 190px;
        height: 30px;
        border-radius: 10px;


    }

    section nav .social_icon .text:hover {
        color: #089da1;
        cursor: pointer;

    }

    section .main {
        display: flex;
        align-items: center;
        justify-content: space-around;
        position: relative;
        top: 10%;

    }

    section .main h1 {
        position: relative;
        font-size: 55px;
        top: 80px;
        left: 25px;
    }

    section .main h1 span {
        color: #089da1;
    }

    section .main p {
        width: 650px;
        text-align: justify;
        line-height: 22px;
        position: relative;
        top: 125px;
        left: 25px;
    }

    section .main .main_tag .main_btn {
        background: #089da1;
        padding: 10px 20px;
        position: relative;
        top: 200px;
        left: 25px;
        color: #fff;
        text-decoration: none;
    }

    section .main .main_img img {
        width: 780px;
        position: relative;
        top: 90px;
        left: 20px;
    }
</style>

<body>

    <section class="c1">
        <nav>
            <div class="logo">
                <a href="welcome.php">
                    <img src="image/logo.png">
                </a>
            </div>
            
            <ul>
                <!-- <li><a href="welcome.php">Home</a></li> -->
                <li><a href="home1.php">products</a></li>
                <li><a href="login.php">log in </a></li>
                <li><a href="logout.php">logout </a></li>
                <li><a href="contact_us.php">contact us </a></li>
                <li><a href="about_us.php">about us</a></li>
            </ul>
            <div class="social_icon">
                <form action="searchbar.php" method="post">
                    <input type="text" class="text" name="search">
                    <button type="submit" name="searchbtn"><i class="fa fa-search"></i></button>
                    <i class="fas fa-heart"></i>
                    <!-- <i class="fas fa-search"> <input type="submit" class="" name="searchbtn"></i> -->
                </form>
            </div>
            
                
                <?php 
                // require_once('partial/dbconnect.php');
                // session_start();
                if(isset($_SESSION['loggedin2'])){
                $username_session=$_SESSION['username'];
                $select_row = mysqli_query($conn, "SELECT * FROM `addtocart` where username_cart='$username_session'") or die('query failed');
                $row_count = mysqli_num_rows($select_row);
                ?>
               <li><p style="font-size: 15px;"> <br><i class="fas fa-user">  <?php 
                echo $username_session; ?></p></i></li>        
                <li><a href="addtocart.php" class="btn-btn-outline-sucess">my cart(<span><?php echo $row_count;  ?>)</span></a></li>
                <?php 
                }
                ?>
                
            </div>
            
        </nav>
    </div>

    </section>
</body>

</html>