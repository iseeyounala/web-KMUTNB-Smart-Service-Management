<div id="list_sport">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ข้อมูลอุปกรณ์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ข้อมูลอุปกรณ์ในระบบ</li>
                        <li class="breadcrumb-item active">ข้อมูลอุปกรณ์</li>
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
                                <th>ชื่ออุปกรณ์</th>
                                <th>จำนวน</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data, idx) in list_sport">
                                <td>{{idx + 1}}</td>
                                <td>{{data.eq_sport_name}}</td>
                                <td>{{data.eq_sport_amount}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning m-2" data-toggle="modal"
                                        data-target="#edit_modal" data-backdrop="static"
                                        @click="set_edit_modal(data)">แก้ไข</button>
                                    <button type="button" class="btn btn-danger m-2"
                                        @click="handle_del(data)">ลบ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ฟอร์มแก้ไขข้อมูล</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                @click="clear_data_modal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ชื่ออุปกรณ์</label>
                                        <input type="text" class="form-control" v-model="eq_sport_name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">จำนวนที่รับได้</label>
                                        <input type="number" class="form-control" v-model="eq_sport_amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                @click="clear_data_modal()">ยกเลิก</button>
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
            list_sport: [],
            eq_id: '',
            eq_sport_name: '',
            eq_sport_amount: ''
        };
    },
    methods: {
        get_list_sport() {
            axios.post("../action/sport/action.php", {
                action: 'get_list_sport'
            }).then((res) => {
                let {
                    status,
                    result
                } = res.data;
                status ? this.list_sport = result : null;
                $(document).ready(function() {
                    $('#table_id').DataTable();
                });
                console.log(res.data);
            }).catch((err) => {
                console.error(err);
            })
        },
        set_edit_modal(data) {
            let {
                eq_id,
                eq_sport_name,
                eq_sport_amount
            } = data;
            this.eq_id = eq_id;
            this.eq_sport_name = eq_sport_name;
            this.eq_sport_amount = eq_sport_amount;
        },
        //handel_check_point(e) {
        //    let cpr_id = e.target.value;
        //    this.cpr_id = cpr_id;
        //},
        clear_data_modal() {
            this.eq_id = '';
            this.eq_sport_name = '';
            this.eq_sport_amount = '';
        },
        handle_edit() {
            let {
                eq_sport_name,
                eq_sport_amount,
                eq_id
            } = this;
            if (eq_sport_name != '' && eq_sport_amount != '') {
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
                        axios.post("../action/sport/action.php", {
                            action: 'edit_sport',
                            eq_id: eq_id,
                            eq_sport_name: eq_sport_name,
                            eq_sport_amount: eq_sport_amount
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
            let eq_id = data.eq_id;
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
                    axios.post("../action/sport/action.php", {
                        action: 'del_sport',
                        eq_id: eq_id,
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
        // console.log("list_sport");
        this.get_list_sport();
    },
}).mount("#list_sport");
</script>