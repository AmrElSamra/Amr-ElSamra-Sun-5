<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Search</title>
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <form method="get">
        <input type="text" name="search_keyword" placeholder="Search Keyword" class="form-control w-50">
        <br>
        <input type="submit" value="submit" name="submit" class="btn btn-info my-4">
    </form>
    <br> <hr>
    <?php
         if (isset($_GET['submit'])){
            // print_r($_GET['search_keyword']);
            $keyword = $_GET['search_keyword'];
            $conn = mysqli_connect("localhost", "root", "", "route_c34");
            $query = "SELECT customerName FROM customers
            WHERE customerName LIKE '%$keyword%'";
            $result = mysqli_query($conn, $query);
            $customerSearch = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // print_r($customerSearch);
            // if (empty($customerSearch)){
            //     echo "Not found";
            // }
            // else{
            //     foreach ($customerSearch as $customerSearchItem){
            //         echo $customerSearchItem['customerName'];
            //         echo "<br>";
            //     }
            // }
        }
    ?>
     
     <?php if ( empty($customerSearch) and ! empty($_GET['search_keyword'])){ ?>
        <h1> <?php echo "Not Found"; ?> </h1>
    <?php } elseif (! empty($_GET['search_keyword'])){ ?>
        <ul class="ml-4 font-weight-bold">
         <?php foreach ($customerSearch as $customerSearchItem){ ?>
             <li> <?php echo $customerSearchItem['customerName']; } ?></li>
         </ul>
    <?php } ?>
  









    <script src="JS/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>


</body>
</html>





<br>
<button class="btn btn-warning"><a class="text-white" href="search-customers.php">Refresh</a></button>

