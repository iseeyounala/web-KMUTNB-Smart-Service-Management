<div id="list_check_point">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ตั้งค่าระบบ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ตั้งค่าระบบ</li>
                        <li class="breadcrumb-item active">พิกัดที่ตั้ง</li>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal" data-backdrop="static">เพิ่มสถานที่</button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-12">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อสถานที่</th>
                                <th>latitude</th>
                                <th>longitude</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_check_point">
                                <td>{{idx + 1}}</td>
                                <td>{{data.cpr_name}}</td>
                                <td>{{data.cpr_lat}}</td>
                                <td>{{data.cpr_long}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" @click="set_edit_modal(data)">แก้ไข</button>
                                    <button type="button" class="btn btn-danger m-2" @click="handel_del(data)">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ฟอร์มเพิ่มข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear_data_modal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">ชื่อสถานที่</label>
                                        <input type="text" class="form-control" v-model="cpr_name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Latitude</label>
                                        <input type="text" class="form-control" v-model="cpr_lat">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Longitude</label>
                                        <input type="text" class="form-control" v-model="cpr_long">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clear_data_modal()">ยกเลิก</button>
                            <button type="button" class="btn btn-primary" @click="handel_add_checkPont()">เพิ่มข้อมูล</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ฟอร์มแก้ไขข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear_data_modal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">ชื่อสถานที่</label>
                                        <input type="text" class="form-control" v-model="cpr_name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Latitude</label>
                                        <input type="text" class="form-control" v-model="cpr_lat">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Longitude</label>
                                        <input type="text" class="form-control" v-model="cpr_long">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clear_data_modal()">ยกเลิก</button>
                            <button type="button" class="btn btn-warning" @click="handle_edit()">แก้ไขข้อมูล</button>
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
                list_check_point: [],
                cpr_id: '',
                cpr_name: '',
                cpr_lat: '',
                cpr_long: ''
            };
        },
        methods: {
            get_list_check_point() {
                axios.post("../action/room/action.php", {
                    action: 'get_list_check_point'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_check_point = result : null;
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            clear_data_modal() {
                this.cpr_id = '';
                this.cpr_name = '';
                this.cpr_lat = '';
                this.cpr_long = '';
            },
            handel_add_checkPont() {
                let {
                    cpr_id,
                    cpr_name,
                    cpr_lat,
                    cpr_long
                } = this;
                if (cpr_name != '' && cpr_lat != '' && cpr_long != '') {
                    axios.post("../action/room/action.php", {
                        action: 'add_check_point',
                        cpr_id: cpr_id,
                        cpr_name: cpr_name,
                        cpr_lat: cpr_lat,
                        cpr_long: cpr_long
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
                    }).catch((err) => {
                        console.err(err);
                    })
                } else {
                    Swal.fire({
                        icon: "error",
                        text: 'กรอกข้อมูลให้ครบถ้วน',
                    });
                }
            },
            set_edit_modal(data) {
                let {
                    cpr_id,
                    cpr_name,
                    cpr_lat,
                    cpr_long
                } = data;
                this.cpr_id = cpr_id;
                this.cpr_name = cpr_name;
                this.cpr_lat = cpr_lat;
                this.cpr_long = cpr_long;
            },
            handle_edit() {
                let {
                    cpr_id,
                    cpr_name,
                    cpr_lat,
                    cpr_long
                } = this;
                if (cpr_name != '' && cpr_lat != '' && cpr_long != '') {
                    axios.post("../action/room/action.php", {
                        action: 'edit_check_point',
                        cpr_id: cpr_id,
                        cpr_name: cpr_name,
                        cpr_lat: cpr_lat,
                        cpr_long: cpr_long
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
                    }).catch((err) => {
                        console.err(err);
                    })
                }
            },
            handel_del(data) {
                let {
                    cpr_id
                } = data;
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
                            .post("../action/room/action.php", {
                                action: 'del_check_point',
                                cpr_id: cpr_id,
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
            // console.log("list_check_point");
            this.get_list_check_point();
        },
    }).mount("#list_check_point");
</script>