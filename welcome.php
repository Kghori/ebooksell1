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

.main p{
    width: 750px;
    text-align: justify;
    line-height: 22px;
    position: relative;
    top: 125px;
    left: 25px;
}

.main .main_tag .main_btn{
    background: #089da1;
    padding: 10px 20px;
    position: relative;
    top: 200px;
    left: 25px;
    color: #fff;
    text-decoration: none;
}

.main .main_img img{
    width: 780px;
    position: relative;
    top: 90px;
    left: 20px;
}




/*services*/

.services{
    width: 100%;
    height: auto;
    margin: 215px 0;

}

.services .services_box{
    width: 95%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.services .services_box .services_card{
    text-align: center;
    width: 310px;
    height: auto;
    box-shadow: 0 0 8px #089da1;
    padding: 15px 10px;
}

.services .services_box .services_card i{
    color: #089da1;
    font-size: 45px;
    margin-bottom: 15px;
    cursor: pointer;
}

.services .services_box .services_card h3{
    margin-bottom: 10px;
}




/*about*/

.about{
    width: 100%;
    height: auto;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.about .about_image img{
    width: 800px;
}

.about .about_tag h1{
    font-size: 50px;
    position: relative;
    bottom: 35px;
}

.about .about_tag p{
    line-height: 22px;
    width: 650px;
    text-align: justify;
    margin-bottom: 15px;
}

.about .about_tag .about_btn{
    padding: 10px 20px;
    background: #089da1;
    color: #fff;
    text-decoration: none;
    position: relative;
    top: 50px;
}


    </style>
<body>
    
 
        <section>

<nav>


    <ul>
        <?php include("partial/navigation.php"); ?>
    </ul>

    <div class="social_icon">
        <i class="fa-solid fa-magnifying-glass">
            
        </i>
        <i class="fa-solid fa-heart">

        </i>
    </div>

</nav>

<div class="main">

    <div class="main_tag">
        <h1>WELCOME TO<br><span>BOOK STORE</span></h1>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda molestias atque laborum 
            non fuga ex deserunt. Exercitationem velit ducimus praesentium, obcaecati hic voluptate id 
            tenetur fuga illum quidem omnis? Rerum?
        </p>
        <a href="#" class="main_btn">Learn More</a>

    </div>

    <div class="main_img">
        <img src="image/table.png">
    </div>

</div>

</section>




<!--Services-->

<div class="services">

<div class="services_box">

    <div class="services_card">
        <i class="fa-solid fa-truck-fast"></i>
        <h3>Fast Delivery</h3>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        </p>
    </div>

    <div class="services_card">
        <i class="fa-solid fa-headset"></i>
        <h3>24 x 7 Services</h3>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        </p>
    </div>

    <div class="services_card">
        <i class="fa-solid fa-tag"></i>
        <h3>Best Deal</h3>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        </p>
    </div>

    <div class="services_card">
        <i class="fa-solid fa-lock"></i>
        <h3>Secure Payment</h3>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        </p>
    </div>

</div>

</div>




<!--About-->

<div class="about">

<div class="about_image">
    <img src="image/about.png">
</div>
<div class="about_tag">
    <h1>About Us</h1>
    <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae cumque atque dolor corporis 
        architecto. Voluptate expedita molestias maxime officia natus consectetur dolor quisquam illo? 
        Quis illum nostrum perspiciatis laboriosam perferendis? Lorem ipsum dolor sit amet consectetur 
        adipisicing elit. Minus ad eius saepe architecto aperiam laboriosam voluptas nobis voluptates 
        id amet eos repellat corrupti harum consectetur, dolorum dolore blanditiis quam quo.
    </p>
    <a href="#" class="about_btn">Learn More</a>
</div>

</div>







    
</body>
</html>