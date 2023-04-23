<div id="list_student">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายชื่อนักศึกษา</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item active">รายชื่อนักศึกษา</li>
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
                                <th>คำนำหน้า</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>คณะ</th>
                                <th>สาขาวิชา</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_student">
                                <td>{{idx + 1}}</td>
                                <td>{{data.std_number_id}}</td>
                                <td>
                                    <div v-if="data.std_gender == 0">
                                        นาย
                                    </div>
                                    <div v-else-if="data.std_gender == 1">
                                        นางสาว
                                    </div>
                                    <div v-else-if="data.std_gender == 2">
                                        นาง
                                    </div>
                                </td>
                                <td>{{data.std_fname}}</td>
                                <td>{{data.std_lname}}</td>
                                <td>{{data.fct_name}}</td>
                                <td>{{data.dpm_name}}</td>
                                <td>
                                    <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#info_modal" data-backdrop="static">ข้อมูล</button>
                                    <button type="button" class="btn btn-warning m-2" data-toggle="modal" data-target="#edit_modal" data-backdrop="static">แก้ไข</button>
                                    <button type="button" class="btn btn-danger m-2">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    Vue.createApp({
        data() {
            return {
                list_student: []
            };
        },
        methods: {
            get_student() {
                axios.post("../action/admin/action.php", {
                    action: 'get_student'
                }).then((res) => {
                    let {status, result} = res.data;
                    status ? this.list_student = result : null;
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                    console.log(res.data);
                }).catch((err) => {
                    console.error(err);
                })
            }
        },
        created() {
            // console.log("list_admin");
            this.get_student();
        },
    }).mount("#list_student");
</script>