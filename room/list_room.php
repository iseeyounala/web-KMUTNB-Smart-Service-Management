<div id="list_room">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ข้อมูลห้อง</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ข้อมูลห้องในระบบ</li>
                        <li class="breadcrumb-item active">ข้อมูลห้อง</li>
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
                                <th>ชื่อห้อง</th>
                                <th>ชื่อสถานที่</th>
                                <th>จำนวนที่รับได้</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_room">
                                <td>{{idx + 1}}</td>
                                <td>{{data.rtt_name}}</td>
                                <td>{{data.cpr_name}}</td>
                                <td>{{data.rtt_join_amount}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" @click="set_edit_modal(data)">แก้ไข</button>
                                    <button type="button" class="btn btn-danger m-2" @click="handle_del(data)">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อห้อง</label>
                                        <input type="text" class="form-control" v-model="rtt_name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">จำนวนที่รับได้</label>
                                        <input type="number" class="form-control" v-model="rtt_join_amount">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">สถานที่</label>
                                        <select class="form-control col-sm-12" @change="handel_check_point($event)">
                                            <option selected :value="cpr_id">{{cpr_name}}</option>
                                            <option v-for="(data, idx) in list_check_point" :value="data.cpr_id">
                                                {{data.cpr_name}}
                                            </option>
                                        </select>
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
                list_room: [],
                list_check_point: [],
                rtt_id: '',
                cpr_id: '',
                cpr_name: '',
                rtt_name: '',
                rtt_join_amount: ''
            };
        },
        methods: {
            get_list_room() {
                axios.post("../action/room/action.php", {
                    action: 'get_list_room'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_room = result : null;
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            get_check_point_list() {
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
                    // console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            set_edit_modal(data) {
                let {
                    rtt_id,
                    cpr_id,
                    cpr_name,
                    rtt_name,
                    rtt_join_amount
                } = data;
                this.rtt_id = rtt_id;
                this.cpr_id = cpr_id;
                this.cpr_name = cpr_name;
                this.rtt_name = rtt_name;
                this.rtt_join_amount = rtt_join_amount;
            },
            handel_check_point(e) {
                let cpr_id = e.target.value;
                this.cpr_id = cpr_id;
            },
            clear_data_modal() {
                this.rtt_id = '';
                this.cpr_id = '';
                this.cpr_name = '';
                this.rtt_name = '';
                this.rtt_join_amount = '';
            },
            handle_edit() {
                let {
                    cpr_id,
                    rtt_name,
                    rtt_join_amount,
                    rtt_id
                } = this;
                if (cpr_id != '' && rtt_name != '' && rtt_join_amount != '') {
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
                            axios.post("../action/room/action.php", {
                                action: 'edit_room',
                                rtt_id: rtt_id,
                                cpr_id: cpr_id,
                                rtt_name: rtt_name,
                                rtt_join_amount: rtt_join_amount
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
                                console.error(err)
                            })
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: 'กรอกข้อมูลให้ครบถ้วน',
                    });
                }
            },
            handle_del(data) {
                let rtt_id = data.rtt_id;
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
                        axios.post("../action/room/action.php", {
                            action: 'del_room',
                            rtt_id: rtt_id,
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
                            console.error(err)
                        })
                    }
                });
            }
        },
        created() {
            // console.log("list_room");
            this.get_list_room();
            this.get_check_point_list();
        },
    }).mount("#list_room");
</script>