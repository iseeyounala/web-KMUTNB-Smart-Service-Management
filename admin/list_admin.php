<div id="list_admin">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายชื่อผู้ดูแลระบบ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item active">รายชื่อผู้ดูแล</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12 col-12">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>บทบาท</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_admin">
                                <td>{{idx + 1}}</td>
                                <td>
                                    <div v-if="data.admin_gender == 0">
                                        นาย
                                    </div>
                                    <div v-else-if="data.admin_gender == 1">
                                        นางสาว
                                    </div>
                                    <div v-else-if="data.admin_gender == 2">
                                        นาง
                                    </div>
                                </td>
                                <td>{{data.admin_fname}}</td>
                                <td>{{data.admin_lname}}</td>
                                <td>
                                    <div v-if="data.admin_level == 0">
                                        <span class="badge badge-danger">Superadmin</span>
                                    </div>
                                    <div v-if="data.admin_level == 1">
                                        <span class="badge badge-info">รักษาความปลอดภัยหน้าประตู</span>
                                    </div>
                                    <div v-if="data.admin_level == 2">
                                        <span class="badge badge-warning">ผู้ดูแลการจองห้อง</span>
                                    </div>
                                    <div v-if="data.admin_level == 3">
                                        <span class="badge badge-primary">ผู้ดูแลการยืมอุปกรณ์กีฬา</span>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#info_modal" data-backdrop="static" @click="set_info_modal(data)">ข้อมูล</button>
                                    <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" @click="set_edit_modal(data)">แก้ไข</button>
                                    <button type="button" class="btn btn-danger m-2" @click="handel_del(data)">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">รายละเอียด</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">คำนำหน้า</label>
                                        <input type="text" class="form-control" v-model="admin_gender" disabled>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อ</label>
                                        <input type="text" class="form-control" v-model="admin_fname" disabled>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">นามสกุล</label>
                                        <input type="text" class="form-control" v-model="admin_lname" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">username</label>
                                        <input type="text" class="form-control" v-model="admin_username" disabled>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">password</label>
                                        <input type="text" class="form-control" v-model="admin_password" disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">บทบาท</label>
                                        <input type="text" class="form-control" v-model="admin_level" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ฟอร์มแก้ไขข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">คำนำหน้า</label>
                                        <select class="form-control col-sm-12" @change="handel_gender($event)">
                                            <option selected :value="admin_gender">{{admin_gender_edit}}</option>
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
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">username</label>
                                        <input type="text" class="form-control" v-model="admin_username">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">password</label>
                                        <input type="text" class="form-control" v-model="admin_password">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">บทบาท</label>
                                        <select class="form-control col-sm-12" @change="handel_level($event)">
                                            <option selected :value="admin_level">{{admin_level_edit}}</option>
                                            <option value="0">superadmin</option>
                                            <option value="1">รักษาความปลอดภัยหน้าประตู</option>
                                            <option value="2">ผู้ดูแลการจองห้อง</option>
                                            <option value="3">ผู้ดูแลการยืมอุปกรณ์กีฬา</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-warning" @click="handle_edit()">แก้ไข</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    Vue.createApp({
        data() {
            return {
                list_admin: [],
                admin_id: '',
                admin_gender: '',
                admin_gender_edit: '',
                admin_fname: '',
                admin_lname: '',
                admin_username: '',
                admin_password: '',
                admin_level: '',
                admin_level_edit: ''
            };
        },
        methods: {
            get_list_admin() {
                axios.post("../action/admin/action.php", {
                    action: 'get_list_admin'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_admin = result : null;
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                }).catch((err) => {
                    console.error(err);
                })
            },
            set_info_modal(data) {
                let {
                    admin_gender,
                    admin_fname,
                    admin_lname,
                    admin_username,
                    admin_password,
                    admin_level
                } = data;
                this.admin_gender = admin_gender == 0 ? 'นาย' : admin_gender == 1 ? 'นางสาว' : admin_gender == 2 ? 'นาง' : null;
                this.admin_fname = admin_fname;
                this.admin_lname = admin_lname;
                this.admin_username = admin_username;
                this.admin_password = admin_password;
                this.admin_level = admin_level == 0 ? 'Superadmin' : admin_level == 1 ? 'รักษาความปลอดภัยหน้าประตู' : admin_level == 2 ? 'ผู้ดูแลการจองห้อง' : admin_level == 3 ? 'ผู้ดูแลการยืมอุปกรณ์กีฬา' : null
            },
            set_edit_modal(data) {
                let {
                    admin_id,
                    admin_gender,
                    admin_fname,
                    admin_lname,
                    admin_username,
                    admin_password,
                    admin_level
                } = data;
                this.admin_id = admin_id;
                this.admin_gender = admin_gender;
                this.admin_gender_edit = admin_gender == 0 ? 'นาย' : admin_gender == 1 ? 'นางสาว' : admin_gender == 2 ? 'นาง' : null;
                this.admin_fname = admin_fname;
                this.admin_lname = admin_lname;
                this.admin_username = admin_username;
                this.admin_password = admin_password;
                this.admin_level = admin_level;
                this.admin_level_edit = admin_level == 0 ? 'Superadmin' : admin_level == 1 ? 'รักษาความปลอดภัยหน้าประตู' : admin_level == 2 ? 'ผู้ดูแลการจองห้อง' : admin_level == 3 ? 'ผู้ดูแลการยืมอุปกรณ์กีฬา' : null;
            },
            handel_gender(e) {
                let admin_gender = e.target.value;
                this.admin_gender = admin_gender;
            },
            handel_level(e) {
                let admin_level = e.target.value;
                this.admin_level = admin_level;
            },
            handle_edit() {
                Swal.fire({
                    title: "ต้องการแก้ไขข้อมูล?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ยืนยัน",
                    cancelButtonText: "ยกเลิก",
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios
                            .post("../action/admin/action.php", {
                                action: 'edit_admin',
                                admin_id: this.admin_id,
                                admin_gender: this.admin_gender,
                                admin_fname: this.admin_fname,
                                admin_lname: this.admin_lname,
                                admin_username: this.admin_username,
                                admin_password: this.admin_password,
                                admin_level: this.admin_level,
                            })
                            .then((res) => {
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
                                    });
                                    setTimeout(() => {
                                        location.reload();
                                    }, 2000);
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        text: meg,
                                    });
                                }
                                console.log(res.data);
                            })
                            .catch((err) => {
                                console.log(err);
                            });
                    }
                });
            },
            handel_del(data) {
                Swal.fire({
                    title: "ต้องการลบข้อมูล?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "ยืนยัน",
                    cancelButtonText: "ยกเลิก",
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios
                            .post("../action/admin/action.php", {
                                action: 'del_admin',
                                admin_id: data.admin_id,
                            })
                            .then((res) => {
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
                                    });
                                    setTimeout(() => {
                                        location.reload();
                                    }, 2000);
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        text: meg,
                                    });
                                }
                                console.log(res.data);
                            })
                            .catch((err) => {
                                console.log(err);
                            });
                    }
                });
            }
        },
        created() {
            // console.log("list_admin");
            this.get_list_admin();
        },
    }).mount("#list_admin");
</script>