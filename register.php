<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>register || register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div id="register">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-warning">
                <div class="card-header text-center">
                    <a href="index.php" class="h1"><b>KMUTNB </b>SmartService</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">สมัคร</p>
                    <div action="index3.html" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">คำนำหน้า</label>
                                    <select class="form-control col-sm-12" v-model="admin_gender">
                                        <option disabled selected></option>
                                        <option value="0">นาย</option>
                                        <option value="1">นางสาว</option>
                                        <option value="2">นาง</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่อ</label>
                                    <input type="text" class="form-control" v-model="admin_fname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">นามสกุล</label>
                                    <input type="text" class="form-control" v-model="admin_lname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" v-model="admin_username">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" class="form-control" v-model="admin_password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">บทบาท</label>
                                    <select class="form-control col-sm-12" v-model="admin_level">
                                        <option disabled selected></option>
                                        <option value="0">superadmin</option>
                                        <option value="1">รักษาความปลอดภัยหน้าประตู</option>
                                        <option value="2">ผู้ดูแลการจองห้อง</option>
                                        <option value="3">ผู้ดูแลการยืมอุปกรณ์กีฬา</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-warning btn-block" @click="register()">สมัคร</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.social-auth-links -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
    <script src="./vue/vue.global.js"></script>
    <script src="./vue/axios.min.js"></script>
    <script src="./vue/sweetalert2.all.min.js"></script>
    <script>
        Vue.createApp({
            data() {
                return {
                    admin_gender: '',
                    admin_fname: '',
                    admin_lname: '',
                    admin_username: '',
                    admin_password: '',
                    admin_level: ''
                };
            },
            methods: {
                register() {
                    axios.post("./action/admin/action.php", {
                        action: 'add_admin',
                        admin_gender: this.admin_gender,
                        admin_fname: this.admin_fname,
                        admin_lname: this.admin_lname,
                        admin_username: this.admin_username,
                        admin_password: this.admin_password,
                        admin_level: this.admin_level
                    }).then((res) => {
                        let {
                            status,
                            meg
                        } = res.data;
                        if (status) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: meg,
                                showConfirmButton: false,
                                timer: 1500,
                            }).then(() => {
                                location.replace("./index.php");
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                text: meg,
                            });
                        }
                        console.log(res.data);
                    }).catch((err) => {
                        console.log(err);
                    })
                }
            },
            created() {
                // console.log("login")
            },
        }).mount("#register");
    </script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>