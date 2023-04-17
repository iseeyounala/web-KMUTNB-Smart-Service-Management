<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    if (!$_SESSION['admin_level'] == 0 && !$_SESSION['admin_level'] == 2) {
        echo '<script type="text/javascript">';
        echo 'location.replace("./logout.php");';
        echo 'alert("คุณไม่มีสิทธื์เข้าถึงหน้านี้")';
        echo '</script>';
    }
} else {
    echo '<script type="text/javascript">';
    echo 'location.replace("./index.php");';
    echo 'alert("เข้าสู่ระบบก่อนเข้าถึงหน้านี้")';
    echo '</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../layouts/room/header.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php require_once '../layouts/room/js.php' ?>
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <?php require_once '../layouts/room/navbar.php' ?>
        <?php require_once '../layouts/room/sidebar.php' ?>
        <div class="content-wrapper">
            <?php
            if (isset($_REQUEST['page'])) {
                require_once($_REQUEST['page'] . '.php');
            } else {
                require_once './dash.php';
            }
            ?>
        </div>
        <?php require_once '../layouts/room/footer.php'; ?>
    </div>
</body>
<script>
    Vue.createApp({
        data() {
            return {
                admin_id: '<?php echo @$_SESSION['admin_id'] ?>',
                admin_gender: '',
                admin_fname: '',
                admin_lname: ''
            };
        },
        methods: {
            get_info_user() {
                axios.post("../action/admin/action.php", {
                    action: 'get_info_user', 
                    admin_id: this.admin_id
                }).then((res) => {
                    let {status, result} = res.data;
                    if (status) {
                        this.admin_gender = result.admin_gender == 0 ? 'นาย' : result.admin_gender == 1 ? 'นางสาว' : result.admin_gender == 2 ? 'นาง' : 'ไม่มีข้อมูล';
                        this.admin_fname = result.admin_fname;
                        this.admin_lname = result.admin_lname;
                    }
                    // console.log(res.data);
                }).catch((err) => {
                    console.log(err);
                })
            }
        },
        created() {
            // console.log("info_user")
            this.get_info_user();
        },
    }).mount("#info_user");
</script>

</html>