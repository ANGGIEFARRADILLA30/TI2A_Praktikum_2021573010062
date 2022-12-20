            <!-- Content -->
            <?php
            session_start();

            if (isset($_GET['x']) && $_GET['x'] == 'home') {
                $page = "home.php";
                include "main.php";
            } else            if (isset($_GET['x']) && $_GET['x'] == 'order') {
                $page = "order.php";
                include "main.php";
            }  else            if (isset($_GET['x']) && $_GET['x'] == 'user') {
                if ($_SESSION['level_decafe'] == 1) {
                    $page = "user.php";
                    include "main.php";
                } else {
                    $page = "home.php";
                    include "main.php";
                }
            }  else            if (isset($_GET['x']) && $_GET['x'] == 'menu') {
                $page = "menu.php";
                include "main.php";
            } else            if (isset($_GET['x']) && $_GET['x'] == 'login') {
                include "login.php";
            } else            if (isset($_GET['x']) && $_GET['x'] == 'ketmenu') {
                $page = "ketmenu.php";
                include "main.php";
            } else            if (isset($_GET['x']) && $_GET['x'] == 'logout') {
                $page = "proses/proses_logout.php";
                include "proses/proses_logout.php";
            } else {
                include "home.php";
                $page = "main.php";
            }
            ?>
            <!-- end Content -->