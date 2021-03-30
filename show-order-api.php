<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders API</title>
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <form method="get">
        <input type="number" name="orderNumber" placeholder="Order Number" class="form-control w-50">
        <br>
        <input type="submit" value="submit" name="submit" class="btn btn-info my-4">
    </form>
    <br>
    <hr>
    <?php
    if (isset($_GET['submit'])) {
        // print_r($_GET['orderNumber']);
        $orderNumber = $_GET['orderNumber'];
        if ($orderNumber) {
            $conn = mysqli_connect("localhost", "root", "", "route_c34");
            $query = "SELECT * FROM orders WHERE orderNumber = $orderNumber";
            $result = mysqli_query($conn, $query);
            $orderDetails = mysqli_fetch_assoc($result);
        }
        // print_r($orderDetails);
        // echo json_encode($orderDetails);


        if (empty($orderDetails) and !empty($_GET['orderNumber'])) {
            echo "Not found";
        } elseif (!empty($_GET['orderNumber'])) { ?>
            <h4 class="text-center"> <?php echo json_encode($orderDetails); }?> </h4>
            
        <?php } ?>

    












    <script src="JS/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>


</body>

</html>





<br>
<button class="btn btn-warning"><a class="text-white" href="show-order-api.php">Refresh</a></button>