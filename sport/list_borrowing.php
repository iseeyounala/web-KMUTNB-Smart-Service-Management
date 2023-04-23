<div id="list_borrowing">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ข้อมูลการยืมอุปกรณ์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ข้อมูลการยืมอุปกรณ์ในระบบ</li>
                        <li class="breadcrumb-item active">ข้อมูลการยืมอุปกรณ์</li>
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
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เวลาที่ยืม</th>
                                <th>เวลาที่คืน</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_borrowing">
                                <td>{{idx + 1}}</td>
                                <td>{{data.std_number_id}}</td>
                                <td>{{data.std_fname}}</td>
                                <td>{{data.std_lname}}</td>
                                <td>
                                    <p class="text-danger">{{data.eq_br_created_at}}</p>
                                </td>
                                <td>
                                    <p class="text-success">{{data.eq_br_give_back_at}}</p>
                                </td>
                                <td>
                                    <div v-if="data.eq_br_status == 0">
                                        <span class="badge badge-danger">ยืมอยู่</span>
                                    </div>
                                    <div v-else-if="data.eq_br_status == 1">
                                        <span class="badge badge-success">คืนอุปกรณ์แล้ว</span>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#qr_modal" data-backdrop="static" @click="set_qr_code(data)">
                                        <i class="nav-icon fa fa-qrcode"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger m-2" @click="handle_del(data)">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="qr_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">QRCODE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear_qr_code()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div id="qrcode"></div>
                            </center>
                            <div class="row mt-5">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">รหัสนักศึกษา</label>
                                        <input type="text" class="form-control" disabled v-model="std_number_id">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่อ</label>
                                        <input type="text" class="form-control" disabled v-model="std_fname">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">นามสกุล</label>
                                        <input type="text" class="form-control" disabled v-model="std_lname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">เวลาที่ยืม</label>
                                        <input type="text" class="form-control" disabled v-model="eq_br_created_at">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">เวลาที่คืน</label>
                                        <input type="text" class="form-control" disabled v-model="eq_br_give_back_at">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ชื่ออุปกรณ์</th>
                                            <th scope="col">จำนวน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(data, idx) in list_br_table">
                                            <th scope="row">{{idx + 1}}</th>
                                            <td>{{data.eq_sport_name}}</td>
                                            <td>{{data.borrow_list_amount}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clear_qr_code()">ปิด</button>
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
                list_borrowing: [],
                list_br_table: [],
                std_number_id: '',
                std_fname: '',
                std_lname: '',
                eq_br_created_at: '',
                eq_br_give_back_at: ''
            };
        },
        methods: {
            get_list_borrowing() {
                axios.post("../action/sport/action.php", {
                    action: 'get_list_borrowing'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    if (status) {
                        if (result.length > 0) {
                            result.map((val, idx) => {
                                val.eq_br_created_at = moment(val.eq_br_created_at).format('LLL');
                                val.eq_br_give_back_at = moment(val.eq_br_give_back_at).format(
                                    'LLL');
                                if (idx == result.length - 1) {
                                    this.list_borrowing = result;
                                }
                            })
                        }
                    }
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                    // console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            },
            set_qr_code(data) {
                let a = {
                    type: 'sport',
                    std_id: data.std_id,
                    eq_br_id: data.eq_br_id,
                }
                new QRCode(document.getElementById("qrcode"), `${JSON.stringify(a)}`);
                axios.post("../action/sport/action.php", {
                    action: 'list_br_table',
                    eq_br_id: data.eq_br_id
                }).then((res) => {
                    this.list_br_table = res.data.result;
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
                this.std_number_id = data.std_number_id;
                this.std_fname = data.std_fname;
                this.std_lname = data.std_lname;
                this.eq_br_created_at = data.eq_br_created_at;
                this.eq_br_give_back_at = data.eq_br_give_back_at;
            },
            clear_qr_code() {
                let ID = document.getElementById("qrcode");
                ID.innerHTML = "";
                // this.std_number_id = '';
                // this.std_fname = '';
                // this.std_lname = '';
                // this.rtt_id = '';
                // this.rtt_name = '';
                // this.booking_date = '';
                // this.booking_start_time = '';
                // this.booking_end_time = '';
            },
        },
        created() {
            this.get_list_borrowing();
            moment.locale('th');
            socket.on("borrowing_sport_new", () => {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "มีรายการยืมเข้ามาใหม่",
                    text: "โปรดตรวจสอบข้อมูล",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    $(document).ready(function() {
                        $('#table_id').DataTable().destroy();
                    });
                    this.get_list_borrowing();
                })
            })
        },
    }).mount("#list_borrowing");
</script>