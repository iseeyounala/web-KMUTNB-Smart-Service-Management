<div id="list_announcement">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ประกาศ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item active">รายการ</li>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal" data-backdrop="static">เพิ่มประกาศ</button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-12">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>หัวข้อ</th>
                                <th>รายละเอียด</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_announcement">
                                <td>{{idx + 1}}</td>
                                <td>{{data.announcement_name}}</td>
                                <td>{{data.announcement_detail}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" @click="set_edit_modal(data)">แก้ไข</button>
                                    <button type="button" class="btn btn-danger m-2" @click="del_announcement(data)">ลบ</button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear_data_modal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">หัวข้อ</label>
                                    <input type="text" class="form-control" v-model="announcement_name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">รายละเอียด</label>
                                    <input type="text" class="form-control" v-model="announcement_detail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clear_data_modal()">ยกเลิก</button>
                        <button type="button" class="btn btn-primary" @click="add_announcement()">เพิ่มข้อมูล</button>
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">หัวข้อ</label>
                                    <input type="text" class="form-control" v-model="announcement_name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">รายละเอียด</label>
                                    <input type="text" class="form-control" v-model="announcement_detail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clear_data_modal()">ยกเลิก</button>
                        <button type="button" class="btn btn-warning" @click="edit_announcement()">แก้ไขข้อมูล</button>
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
                list_announcement: [],
                announcement_id: '',
                announcement_name: '',
                announcement_detail: ''
            };
        },
        methods: {
            getlist_announcement() {
                axios.post("../action/admin/action.php", {
                    action: 'getlist_announcement'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_announcement = result : null;
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            add_announcement() {
                axios.post("../action/admin/action.php", {
                    action: 'add_announcement',
                    announcement_name: this.announcement_name,
                    announcement_detail: this.announcement_detail
                }).then((res) => {
                    let {
                        status,
                        meg
                    } = res.data;
                    if (status) {
                        socket.emit("announcement_new");
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
                    }
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            set_edit_modal(data){
                this.announcement_id = data.announcement_id;
                this.announcement_name = data.announcement_name;
                this.announcement_detail = data.announcement_detail;
            },
            edit_announcement(){
                axios.post("../action/admin/action.php", {
                    action: 'edit_announcement',
                    announcement_id: this.announcement_id,
                    announcement_name: this.announcement_name,
                    announcement_detail: this.announcement_detail
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
                    }
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            del_announcement(data){
                axios.post("../action/admin/action.php", {
                    action: 'del_announcement',
                    announcement_id: data.announcement_id,
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
                    }
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            }
        },
        created() {
            // console.log("list_admin");
            this.getlist_announcement();
        },
    }).mount("#list_announcement");
</script>