<div id="add_admin">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มผู้ดูแล</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ผู้ดูแลระบบ</li>
                        <li class="breadcrumb-item active">เพิ่มผู้ดูแล</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">แบบฟอร์มกรอกเพิ่มผู้ดูแล</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
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
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ชื่อ</label>
                                            <input type="text" class="form-control" v-model="admin_fname">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">นามสกุล</label>
                                            <input type="text" class="form-control" v-model="admin_lname">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" v-model="admin_username">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="text" class="form-control" v-model="admin_password">
                                        </div>
                                    </div>
                                    <div class="col-3">
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
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-primary" @click="handleSubmit()">บันทึก</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
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
            handleSubmit() {
                if (this.admin_gender != '' && this.admin_fname != '' && this.admin_lname != '' && this.admin_username != '' && this.admin_password != '' && this.admin_level != '') {
                    axios.post("../action/admin/action.php", {
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
                                location.replace("./admin_page.php?page=list_admin");
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
                } else {
                    Swal.fire({
                        icon: "error",
                        text: 'กรอกข้อมูลให้ครบถ้วนก่อนบันทึก',
                    });
                }
            }
        },
        created() {
            // console.log("add_admin");
        },
    }).mount("#add_admin");
</script>