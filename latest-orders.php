<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Orders</title>
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <form method="get">
        <input type="number" name="number" placeholder="num" class="form-control w-50">
        <br>
        <input type="submit" value="submit" name="submit" class="btn btn-info my-4">
    </form>
    <br>
    <hr>
    <?php
    if (isset($_GET['submit'])) {
        // print_r($_GET['number']);
        $num = $_GET['number'];
        if ($num > 0) {
            $conn = mysqli_connect("localhost", "root", "", "route_c34");
            $query = "SELECT orderNumber, orderDate, customerNumber FROM `orders` ORDER BY orderDate DESC LIMIT $num";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // print_r($data);
        }
    }
    ?>

    <?php if (!empty($data)) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Order Date</th>
                    <th>Customer Number</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) {
                    foreach ($data as $dataItems) { ?>
                        <tr>
                            <td><?php echo $dataItems['orderNumber']; ?></td>
                            <td><?php echo $dataItems['orderDate']; ?></td>
                            <td><?php echo $dataItems['customerNumber'];
                            }
                        } ?></td>
                        </tr>
            </tbody>
        </table>
    <?php } ?>








    <script src="JS/jquery-3.5.1.slim.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>

</body>

</html>





<br>
<button class="btn btn-warning"><a href="latest-orders.php" class="text-white">Refresh</a></button>