<div id="list_detail_room">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ข้อมูลรายละเอียดห้อง</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลรายละเอียดห้อง</li>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal" data-backdrop="static">เพิ่ม</button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-12">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อห้อง</th>
                                <th>ชื่อรายละเอียด</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_detail_room">
                                <td>{{idx + 1}}</td>
                                <td>{{data.rtt_name}}</td>
                                <td>{{data.detail_room_name}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" @click="set_data_edit(data)">แก้ไข</button>
                                    <button type="button" class="btn btn-danger m-2" @click="del_detail_room(data)">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ฟอร์มเพิ่มข้อมูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">ห้อง</label>
                                <select class="form-control col-sm-12" @change="handel_set_room($event)">
                                    <option selected></option>
                                    <option v-for="(data, idx) in list_room" :value="data.rtt_id">
                                        {{data.rtt_name}}
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">รายละเอียด</label>
                                    <input type="text" class="form-control" v-model="detail_room_name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-primary" @click="add_detail_room()">เพิ่มข้อมูล</button>
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
                                <label class="col-form-label pt-0" for="exampleInputEmail1">ห้อง</label>
                                <input type="text" class="form-control" disabled v-model="rtt_name">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">รายละเอียด</label>
                                    <input type="text" class="form-control" v-model="detail_room_name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-warning" @click="edit_detail_room()">แก้ไขข้อมูล</button>
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
                list_detail_room: [],
                list_room: [],
                detail_room_id: '',
                rtt_name: '',
                rtt_id: '',
                detail_room_name: ''
            };
        },
        methods: {
            get_list_detail_room() {
                axios.post("../action/room/action.php", {
                    action: 'get_list_detail_room'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_detail_room = result : null;
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                }).catch((err) => {
                    console.log(err);
                });
            },
            get_list_room() {
                axios.post("../action/room/action.php", {
                    action: 'get_list_room'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_room = result : null;
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            handel_set_room(e) {
                let rtt_id_ = e.target.value;
                this.rtt_id = rtt_id_;
                // console.log(rtt_id_)
            },
            add_detail_room() {
                axios.post("../action/room/action.php", {
                    action: 'add_detail_room',
                    rtt_id: this.rtt_id,
                    detail_room_name: this.detail_room_name
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
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: meg,
                        });
                    }
                }).catch((err) => {
                    console.error(err);
                })
            },
            set_data_edit(data) {
                this.detail_room_id = data.detail_room_id;
                this.detail_room_name = data.detail_room_name;
                this.rtt_name = data.rtt_name;
            },
            edit_detail_room() {
                axios.post("../action/room/action.php", {
                    action: 'edit_detail_room',
                    detail_room_id: this.detail_room_id,
                    detail_room_name: this.detail_room_name
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
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: meg,
                        });
                    }
                }).catch((err) => {
                    console.error(err);
                })
            },
            del_detail_room(data){
                axios.post("../action/room/action.php", {
                    action: 'del_detail_room',
                    detail_room_id: data.detail_room_id,
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
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: meg,
                        });
                    }
                }).catch((err) => {
                    console.error(err);
                })
            }
        },
        created() {
            // console.log("list_admin");
            this.get_list_detail_room();
            this.get_list_room();
        },
    }).mount("#list_detail_room");
</script>