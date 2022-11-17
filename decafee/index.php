<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body style="height: 3000px">

    <!-- Header -->
    <?php include "header.php"; ?>
    <!-- End Header -->

    <div class="container-lg">
        <div class="row">

            <!-- Sidebar -->
            <?php include "sidebar.php" ?>
            <!-- End Sidebar -->

            <!-- Content -->
            <?php 
            if(isset($_GET['x']) && $_GET['x']=='home'){
                include "home.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='order'){
                include "order.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='costumer'){
                include "costumer.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='product'){
                include "product.php";
            }elseif(isset($_GET['x']) && $_GET['x']=='report')
                include "report.php";
            ?>
            <!-- End Content -->

        </div>

        <!-- Footer -->
        <div class="fixed-bottom text-center mb-2">
            Copyright 2022 Anggie farradilla
        </div>
        <!-- End Footer -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>