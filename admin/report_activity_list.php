<div id="list_activity">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">กิจกรรม</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item active">รายงานกิจกรรมในระบบ</li>
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
                                <th>ชื่อกิจกรรม</th>
                                <th>รายละเอียดกิจกรรม</th>
                                <th>จำนวนผู้เข้ารวม</th>
                                <th>วันที่เริ่ม</th>
                                <th>วันที่สิ้นสุด</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_activity">
                                <td>{{idx + 1}}</td>
                                <td>{{data.event_name}}</td>
                                <td>{{data.event_detail}}</td>
                                <td>{{data.amount_join}}</td>
                                <td>{{data.event_start_date}}</td>
                                <td>{{data.event_end_date}}</td>
                                <td>
                                    <button type="button" class="btn btn-success m-2" @click="get_data_join_std(data.event_id)">ข้อมูล</button>
                                    <!-- <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static">แก้ไข</button> -->
                                    <!-- <button type="button" class="btn btn-danger m-2">ลบ</button> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-5">
                <h3>รายชื่อนักศึกษาที่เข้าร่วม</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <table id="table_id_2" class="display">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>คณะ</th>
                                <th>สาขาวิชา</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_join_std">
                                <td>{{idx + 1}}</td>
                                <td>{{data.std_number_id}}</td>
                                <td>{{data.std_fname}}</td>
                                <td>{{data.std_lname}}</td>
                                <td>{{data.fct_name}}</td>
                                <td>{{data.dpm_name}}</td>
                                <td>
                                    <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#info_modal" data-backdrop="static" @click="get_report_std(data.ev_join_id)">ดูรายงาน</button>
                                    <!-- <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static">แก้ไข</button> -->
                                    <!-- <button type="button" class="btn btn-danger m-2">ลบ</button> -->
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
                            <h5 class="modal-title" id="exampleModalLabel">รายงานผล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear_data_modal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">รูป</th>
                                            <th scope="col">รายละเอียด</th>
                                            <th scope="col">เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(data, idx) in list_report">
                                            <th scope="row">{{idx + 1}}</th>
                                            <td>
                                                <img :src="'data:image/jpeg;base64,'+data.rp_event_img" class="img-fluid" width="200" height="200" alt="...">
                                            </td>
                                            <td>{{data.rp_event_detail}}</td>
                                            <td>{{data.rp_event_created_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clear_data_modal()">ยกเลิก</button> -->
                            <!-- <button type="button" class="btn btn-warning" @click="edit_announcement()">แก้ไขข้อมูล</button> -->
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
                list_activity: [],
                list_join_std: [],
                list_report: [],
            };
        },
        methods: {
            get_data_activity() {
                axios.post("../action/admin/action.php", {
                    action: 'get_activity'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_activity = result : null;
                    console.log(res.data);
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                })
            },
            get_data_join_std(event_id) {
                // console.log(event_id)
                axios.post("../action/admin/action.php", {
                    action: 'get_join_std',
                    event_id: event_id
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    $(document).ready(function() {
                        $('#table_id_2').DataTable().destroy();
                    });
                    status ? this.list_join_std = result : null;
                    $(document).ready(function() {
                        $('#table_id_2').DataTable();
                    });
                    console.log(res.data);
                })
            },
            get_report_std(ev_join_id) {
                // console.log(ev_join_id);
                axios.post("../action/admin/action.php", {
                    action: 'get_report_std',
                    ev_join_id: ev_join_id
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    status ? this.list_report = result : null;
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            }
        },
        created() {
            // console.log("list_admin");
            this.get_data_activity();
        },
    }).mount("#list_activity");
</script>