<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 225px;
  position: fixed;
  height: 100%;

}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.navbar {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>




<!-- Sidebar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<div class="sidebar col-lg">
                <nav class="navbar navbar-expand-lg bg-light rounded-3 border mt-2">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 225px;">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">
                                <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                                    <li class="nav-item">
                                        <a class="nav-link ps-1 <?php echo ((isset($_GET['x']) && $_GET['x']=='home')|| !isset($_GET['x']))? 'active link-light' : 'link-dark' ;?> " aria-current="page" href="index.php?x=home"> <i class="bi bi-house-door-fill"></i> Dashboard</a>
                                    </li>

                                        <li class="nav-item">
                                            <a class="nav-link ps-1 <?php echo (isset($_GET['x']) && $_GET['x']=='menu') ? 'active link-light' : 'link-dark' ;?>" href="index.php?x=menu"><i class="bi bi-bag-dash-fill"></i> Daftar Menu</a>
                                        </li>

                                        <li class="nav-item">
                                        <a class="nav-link ps-1 <?php echo (isset($_GET['x']) && $_GET['x']=='ketmenu') ? 'active link-light' : 'link-dark' ;?>" href="index.php?x=ketmenu"><i class="bi bi-filter-square-fill"></i> Kategori Menu</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link ps-1 <?php echo (isset($_GET['x']) && $_GET['x']=='order') ? 'active link-light' : 'link-dark' ;?>" href="index.php?x=order"><i class="bi bi-cart-plus-fill"></i> Order</a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a class="nav-link ps-1 <?php echo (isset($_GET['x']) && $_GET['x']=='customer') ? 'active link-light' : 'link-dark' ;?>" href="index.php?x=customer"><i class="bi bi-people-fill"></i> Customer</a>
                                    </li> -->
                                    <?php 
                                    if($hasil['level']=='1' ){?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-1 <?php echo (isset($_GET['x']) && $_GET['x']=='user') ? 'active link-light' : 'link-dark' ;?>" href="index.php?x=user"><i class="bi bi-person-vcard-fill"></i> User</a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a class="nav-link ps-1 <?php echo (isset($_GET['x']) && $_GET['x']=='report') ? 'active link-light' : 'link-dark' ;?>" href="index.php?x=report"><i class="bi bi-exclamation-circle-fill"></i> Report</a>
                                    </li> -->
                                    <?php }?>
                                </ul>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end Sidebar  -->