<div id="add_room">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มห้อง</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ข้อมูลห้องในระบบ</li>
                        <li class="breadcrumb-item active">เพิ่มห้อง</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">แบบฟอร์มเพิ่มห้อง</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div>
                            <div class="card-body">
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
                                            <select class="form-control col-sm-12" v-model="cpr_id">
                                                <option v-for="(data, idx) in list_check_point" :value="data.cpr_id">
                                                    {{data.cpr_name}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-primary" @click="handleSubmit()">บันทึก</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    Vue.createApp({
        data() {
            return {
                list_check_point: [],
                cpr_id: '',
                rtt_name: '',
                rtt_join_amount: '',
            };
        },
        methods: {
            handleSubmit() {
                let {
                    cpr_id,
                    rtt_name,
                    rtt_join_amount
                } = this;
                if (cpr_id != '' && rtt_name != '' && rtt_join_amount) {
                    axios.post("../action/room/action.php", {
                        action: 'add_room',
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
                                location.replace("./room_page.php?page=list_room");
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

                } else {
                    Swal.fire({
                        icon: "error",
                        text: 'กรอกข้อมูลให้ครบถ้วน',
                    });
                }
            },
            get_list_check_point() {
                axios.post("../action/room/action.php", {
                    action: 'get_list_check_point'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    // console.log(res.data);
                    status ? this.list_check_point = result : null;
                }).catch((err) => {
                    console.error(err);
                })
            }
        },
        created() {
            // console.log("add_room");
            this.get_list_check_point();
        },
    }).mount("#add_room");
</script>