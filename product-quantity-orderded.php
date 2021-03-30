<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantity Product Orders</title>
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <form method="get">
        <input type="text" name="product_name" placeholder="Product Name" class="form-control w-50">
        <br>
        <input type="submit" value="submit" name="submit" class="btn btn-info my-4">
    </form>
    <br> <hr>
    <?php
         if (isset($_GET['submit'])){
            // print_r($_GET['product_name']);
            $name = $_GET['product_name'];
            $conn = mysqli_connect("localhost", "root", "", "route_c34");
            $query = "SELECT SUM(quantityOrdered) AS Total_Orders FROM `orderdetails` WHERE productCode = (
                SELECT productCode FROM products
                WHERE productName = '$name'
            )";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // print_r($data);
        }
    ?>
     
     <?php if ( ! empty($data) and ! empty($_GET['product_name'])){ ?>
        <?php foreach ($data as $dataItem){ ?>
         <h1>
             The Total Number of Pieces Ordered of This Product is <?php echo $dataItem['Total_Orders']; }?>
         </h1>
    <?php } ?>
  









    <script src="JS/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>



</body>
</html>





<br>
<button class="btn btn-warning"><a class="text-white" href="product-quantity-orderded.php">Refresh</a></button>

