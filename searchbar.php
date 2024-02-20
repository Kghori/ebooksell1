<?php include("partial/navigation.php");  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

    <title>Ecommerce Website</title>
</head>
<style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: black;
}

html{
    font-size: 62.5%;
}

main{
    max-width: 1500px;
    width: 95%;
    margin: 30px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: auto;
}

main .card{
    max-width: 300px;
    flex: 1 1 210px;
    text-align: center;
    height: 420px;
    border: 1px solid lightgray;
    margin: 20px;
}

main .card .image{
    height: 50%;
    margin-bottom: 20px;
}

main .card .image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

main .card .caption{
    padding-left: 1em;
    text-align: left;
    line-height: 3em;
    height: 25%;
}

main .card .caption p{
    font-size: 1.5rem;
}

del{
    text-decoration: line-through;
}

main .card .caption .rate{
    display: flex;
}

main .card .caption .rate i{
    color: gold;
    margin-left: 2px;
}

main .card a{
    width: 50%;
}

main .card button{
    border: 2px solid black;
    padding: 1em;
    width: 80%;
    cursor: pointer;
    margin-top: 2em;
    font-weight: bold;
    position: relative;
}

main .card button:before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
    margin: 0;
}

main .card button::after{
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
}

main .card button:hover::before{
    width: 30%;
}

main .card button:hover::after{
    width: 30%;
}    
.r1 {
        background-color: #fff;
        margin-top: 10%;
        margin-left: 50%;
    }
    .search{
        background-color: #fff;
        margin-top: 10%;
        margin-left: 50%;   
        
    }

    .search{
        background-color: #fff;
        margin-top: 10%;
    }
    
</style>

<body>
    <div class="search">
<?php

  if (isset($_POST['searchbtn'])) {
    $search = $_POST['search'];
    require_once('partial/dbconnect.php');
    echo $search;
    $sql = "SELECT * FROM `testimage` WHERE id='$search' OR bookname='$search'";
    $results = mysqli_query($conn, $sql);
    if ($results) {
      if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_assoc($results);
        $BookID = $row['id'];
        echo $bookname = $row['bookname'];
        echo $bookcate = $row['bookcategories'];
        echo $bookimage = $row['images1'];
        echo $bookdesc = $row['bookdesc'];
        echo $bookprice = $row['bookprice'];
        echo '
        <main>';
        
      
            echo '
            <form action="" method="post">
                <div class="container">
                    <div class="card">
                        <div class="image">
                            <img src="Admin/adminupload/' . $row['images1'] . '" alt="">
                        </div>
                        <div class="caption">
                            <p class="book_name">' . $row["bookname"] . '</p>
                            <p class="book_desc">' . $row["bookdesc"] . '</p>
                            <p class="book_price"><b>$' . $row["bookprice"] . '</b></p>
                            <p class="bookcate"><b><del>$' . $row["bookcategories"] . '</del></b></p>
                        </div>
                        <input type="hidden" name="bookname" value="' . $row["bookname"] . '">
                        <input type="hidden" name="bookprice" value="' . $row["bookprice"] . '">
                        <input type="hidden" name="bookimages" value="Admin/adminupload/' . $row["images1"] . '">
                        <input type="submit" class="btn btn-info" name="Add_To_Cart" value="Add To Cart">
                    </div>
                </div>
            </form>';
        
        
        echo '
        </main>';
        
        // Uncomment the following lines if you want to include thead section
        /*
            echo '<thead>
                     <tr>
                        <th>Userid</th>
                        <th>Bookimage</th>
                        <th>Bookname</th>
                        <th>Book category</th>
                        <th>Book Description</th>
                        <th>Book Price</th>
                        <th>book pdf</th>
                     </tr>
                  </thead>';
            */

//         echo '<tbody>
//             <tr>
//                 <td>' . $row['id'] . '</td> 
//                 <td><img src="adminupload/' . $row['images1'] . '" alt="Image" style="width:100px"></td> 
//                 <td>' . $row['bookname'] . '</td>
//                 <td>' . $row['bookcategories'] . '</td>
//                 <td>' . $row['bookdesc'] . '</td>
//                 <td>' . $row['bookprice'] . '</td>
//                 <td>' . $row['pdfname'] . '</td>
//                 <th>
//         <form action="admin_image_update.php" method="post">
//             <input type="hidden" name="id" value="' . $row['id'] . '">
//             <a href="admin_image_update.php?id=' . $row['id'] . '" class="btn btn-primary">update</a>
//         </form>
//     </th>
//     <td>
//     <form action="delete_product.php" method="post">
//         <input type="hidden" name="id1" value="' . $row['id'] . '">
//         <input type="hidden" name="imgname" value="' . $row['images1'] . '">
//         <input type="hidden" name="pdfname" value="' . $row['pdfname'] . '">
//         <th> <input type="submit" name="delete" value="delete"></th>
//     </form>
// </td>
// <th>
// <form action="adminview_pdf.php" method="post">
//     <input type="hidden" name="id" value="' . $row['id'] . '">
//     <button type="submit" name="viewPdf" class="btn btn-primary">View PDF</button>
//     <input type="hidden" name="pdfname1" value="' . $row['pdfname'] . '">
// </form>
// </th>
//             </tr>
//         </tbody>';
      } else {
        echo "no data found";
      }
    }
  }
  ?>
</div>
</body>
</html>
