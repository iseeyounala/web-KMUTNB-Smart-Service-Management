<div id="list_booking">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ข้อมูลการจองห้อง</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ข้อมูลการจองห้องในระบบ</li>
                        <li class="breadcrumb-item active">ข้อมูลการจองห้อง</li>
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
                                <th>ห้อง</th>
                                <th>วันที่</th>
                                <th>เวลาเข้า</th>
                                <th>เวลาออก</th>
                                <th>สถานะ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_booking">
                                <td>{{idx + 1}}</td>
                                <td>{{data.std_number_id}}</td>
                                <td>{{data.std_fname}}</td>
                                <td>{{data.std_lname}}</td>
                                <td>{{data.rtt_name}}</td>
                                <td>{{data.booking_date}}</td>
                                <td>
                                    <p class="text-success">{{data.booking_start_time}}</p>
                                </td>
                                <td>
                                    <p class="text-danger">{{data.booking_end_time}}</p>
                                </td>
                                <td>
                                    <div v-if="data.booking_status == 0">
                                        <span class="badge badge-success">รอ Check In</span>
                                    </div>
                                    <div v-else-if="data.booking_status == 1">
                                        <span class="badge badge-danger">รอ Check Out</span>
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
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">ห้อง</label>
                                        <input type="text" class="form-control" disabled v-model="rtt_name">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="col-form-label pt-0" for="exampleInputEmail1">วันที่</label>
                                        <input type="text" class="form-control" disabled v-model="booking_date">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">เวลาเข้า</label>
                                        <input type="text" class="form-control" disabled v-model="booking_start_time">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">เวลาออก</label>
                                        <input type="text" class="form-control" disabled v-model="booking_end_time">
                                    </div>
                                </div>
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

<script type="text/javascript">
    // new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
</script>

<script>
    Vue.createApp({
        data() {
            return {
                list_booking: [],
                booking_rtt_id: '',
                std_number_id: '',
                std_gender: '',
                std_fname: '',
                std_lname: '',
                rtt_name: '',
                booking_date: '',
                booking_start_time: '',
                booking_end_time: '',
            };
        },
        methods: {
            get_list_booking() {
                axios.post("../action/room/action.php", {
                    action: 'get_list_booking'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    if (status) {
                        result.map((val, idx) => {
                            val.booking_date = moment(val.booking_date).format('LL');
                            if (idx == result.length - 1) {
                                this.list_booking = result;
                            }
                        })
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
                // console.log(data);
                let a = {
                    type: 'room',
                    std_id: data.std_id,
                    booking_rtt_id: data.booking_rtt_id,
                    booking_status: data.booking_status
                }
                new QRCode(document.getElementById("qrcode"), `${JSON.stringify(a)}`);
                this.std_number_id = data.std_number_id;
                this.std_fname = data.std_fname;
                this.std_lname = data.std_lname;
                this.rtt_id = data.rtt_id;
                this.rtt_name = data.rtt_name;
                this.booking_date = data.booking_date;
                this.booking_start_time = data.booking_start_time;
                this.booking_end_time = data.booking_end_time;
            },
            clear_qr_code() {
                let ID = document.getElementById("qrcode");
                ID.innerHTML = "";
                this.std_number_id = '';
                this.std_fname = '';
                this.std_lname = '';
                this.rtt_id = '';
                this.rtt_name = '';
                this.booking_date = '';
                this.booking_start_time = '';
                this.booking_end_time = '';
            }
        },
        created() {
            this.get_list_booking();
            moment.locale('th');

        },
    }).mount("#list_booking");
</script>