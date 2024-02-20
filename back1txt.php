<?php
require_once('partial/dbconnect.php');
if (isset($_POST['Add_To_Cart'])) {
    $b_name = $_POST['bookname'];
    $b_price = $_POST['bookprice'];
    $b_images = $_POST['bookimages'];
    $b_quantity = 1;
    $select_cart = mysqli_query($conn, "SELECT * FROM  `addtocart` WHERE name='$b_name'");
    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product all ready exit';
    } else {
        $insertquery = mysqli_query($conn, "INSERT INTO `addtocart`(name,price,image,quatity)
         VALUES('$b_name','$b_price','$b_images','$b_quantity')");
        $message[] = 'product added to cart to sucessfully';
    }
}
?>



<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("locaiton: login.php");
    exit;
}


$query = "SELECT * FROM testimage";
$results = mysqli_query($conn, $query);


?>
<?php

if (isset($message)) {
    foreach ($message as $message) {
        echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style1.css">

    <title>Ecommerce Website</title>
</head>
<style>
    main .container {}

    .row {
        background-color: #fff;
        margin-top: 10%;
        margin-left: 50%;
    }
</style>

<body>
    <?php include("partial/navigation.php"); ?>
    <!-- ?php include("partial/_nav.php");?> -->
    <div class="row">
        <p>
        <form method="post" action="home1.php">
            <label for="category">Select a category:</label>
            <select name="category" id="category">
                <option value="">select categories</option>

                <?php
                require_once('partial/dbconnect.php');



                $sql = "SELECT DISTINCT bookcategories FROM testimage";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $category = $row['bookcategories'];
                        echo "<option value=\"$category\">$category</option>";
                    }
                } else {
                    echo "<option value=\"\">No categories found</option>";
                }

                ?>
                <input type="submit" value="Show Products">
            </select>


        </form>


        <?php
        if (isset($_POST["category"])) {
            $selectedCategory = $_POST["category"];
            $sql = "SELECT 	* FROM testimage WHERE bookcategories='$selectedCategory'";
            $result = $conn->query($sql);

            echo "<h2>Products in Category: $selectedCategory</h2>";

            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $productName = $row['bookname'];
                    $image1 = $row['images1'];
                   }
            }
        }
        ?>
        
        </p>
    </div>
    <main>
        <?php
        while ($row = mysqli_fetch_assoc($results)) {
        ?>
            <form action="" method="post">
                <div class="container">

                    <div class="card">
                        <div class="image">
                            <img src="Admin/adminupload/<?php echo $row['images1']; ?>" alt="">
                        </div>
                        <div class="caption">
                            <p class="book_name">
                                <?php echo $row["bookname"]; ?>
                            </p>
                            <p class="book_desc">
                                <?php echo $row["bookdesc"]; ?>
                            </p>
                            <p class="book_price"><b>$
                                    <?php echo $row["bookprice"]; ?>
                                </b></p>
                            <p class="bookcate"><b><del>$
                                        <?php echo $row["bookcategories"]; ?>
                                    </del></b></p>
                        </div>
                        <input type="hidden" name="bookname" value="<?php echo $row["bookname"]; ?>">
                        <input type="hidden" name="bookprice" value="<?php echo $row["bookprice"]; ?>">
                        <input type="hidden" name="bookimages" value="Admin/adminupload/<?php echo $row["images1"]; ?>">
                        <input type="submit" class="btn" name="Add_To_Cart" class="btn btn-info" value="Add To Cart">
                        <!-- <input type="submit" class="btn" name="Check Out" value="Proceed To Pay" onclick=""> -->
                    </div>
                </div>
            </form>

        <?php

        }
        ?>

    </main>
</body>

</html>