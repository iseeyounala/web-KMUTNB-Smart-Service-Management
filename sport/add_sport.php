<div id="add_sport">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">เพิ่มอุปกรณ์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">หนัาหลัก</a></li>
                        <li class="breadcrumb-item">ข้อมูลอุปกรณ์ในระบบ</li>
                        <li class="breadcrumb-item active">เพิ่มอุปกรณ์</li>
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
                            <h3 class="card-title">แบบฟอร์มเพิ่มอุปกรณ์</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ชื่ออุปกรณ์</label>
                                            <input type="text" class="form-control" v-model="eq_sport_name">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">จำนวน</label>
                                            <input type="number" class="form-control" v-model="eq_sport_amount">
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
            eq_sport_name: '',
            eq_sport_amount: '',
        };
    },
    methods: {
        handleSubmit() {
            let {
                eq_sport_name,
                eq_sport_amount
            } = this;
            if (eq_sport_name != '' && eq_sport_amount) {
                axios.post("../action/sport/action.php", {
                    action: 'add_sport',
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
                            location.replace("./sport_page.php?page=list_sport");
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
    },
}).mount("#add_sport");
</script>