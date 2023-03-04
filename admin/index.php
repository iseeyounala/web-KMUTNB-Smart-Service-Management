<!DOCTYPE html>
<html lang="en">
<?php require_once './layouts/header.php'; ?>

<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    <?php require_once './layouts/navbar.php'; ?>
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <?php require_once './layouts/sidebar.php'; ?>
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">
                    <?php
                    if (isset($_REQUEST['p'])) {
                        require_once($_REQUEST['p'] . ".php");
                    } else {
                        require_once './dashboard.php';
                    }
                    ?>
                </div>
            </div>
            <?php require_once './layouts/footer.php'; ?>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <?php require_once './layouts/js.php' ?>
</body>

</html>