<script type="text/javascript">
    feather.replace();
</script>
<!--  BEGIN BREADCRUMBS  -->
<div class="secondary-nav">
    <div class="breadcrumbs-container" data-page-heading="Analytics">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>
            <div class="d-flex breadcrumb-content">
                <div class="page-header">

                    <div class="page-title">
                    </div>

                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">นักศึกษา</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ข้อมูลนักศึกษา</li>
                        </ol>
                    </nav>

                </div>
            </div>
        </header>
    </div>
</div>
<div id="list_student">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="myTable" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>คณะ</th>
                            <th>สาขาวิชา</th>
                            <th class="no-content">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(data, idx) in data_list_student">
                            <td>{{idx + 1}}</td>
                            <td>
                                <div v-if="data.std_gender == 1">
                                    นาย
                                </div>
                                <div v-else-if="data.std_gender == 2">
                                    นาง
                                </div>
                                <div v-else-if="data.std_gender == 3">
                                    นางสาว
                                </div>
                            </td>
                            <td>{{data.std_fname}}</td>
                            <td>{{data.std_lname}}</td>
                            <td>
                                <div v-if="data.dpm_name == null">
                                    <span class="text-danger">ไม่มีข้อมูล</span>
                                </div>
                                <div v-else>
                                    {{data.dpm_name}}
                                </div>
                            </td>
                            <td>
                                <div v-if="data.fct_name == null">
                                    <span class="text-danger">ไม่มีข้อมูล</span>
                                </div>
                                <div v-else>
                                    {{data.fct_name}}
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-info m-1">
                                    <i class="fa-regular fa-id-card"></i>
                                </button>
                                <button class="btn btn-warning m-1">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button class="btn btn-danger m-1">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--  END BREADCRUMBS  -->


<script>
    // $('#table').DataTable({
    //     "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    //         "<'table-responsive'tr>" +
    //         "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    //     "oLanguage": {
    //         "oPaginate": {
    //             "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
    //             "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
    //         },
    //         "sInfo": "Showing page _PAGE_ of _PAGES_",
    //         "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
    //         "sSearchPlaceholder": "Search...",
    //         "sLengthMenu": "Results :  _MENU_",
    //     },
    //     "stripeClasses": [],
    //     "lengthMenu": [7, 10, 20, 50],
    //     "pageLength": 10
    // });
</script>

<script>
    Vue.createApp({
        data() {
            return {
                data_list_student: []
            };
        },
        methods: {
            get_data_list_student() {
                axios.post("../api/admin/api_student.php", {
                    action: 'get_list_student'
                }).then((res) => {
                    let {
                        status,
                        result
                    } = res.data;
                    // console.log(res.data);
                    status ? this.data_list_student = result : null;
                    $(document).ready(function() {
                        $('#myTable').DataTable({
                            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                                "<'table-responsive'tr>" +
                                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                            "oLanguage": {
                                "oPaginate": {
                                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                                },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                                "sLengthMenu": "Results :  _MENU_",
                            },
                            "stripeClasses": [],
                            "lengthMenu": [7, 10, 20, 50],
                            "pageLength": 10
                        });
                    });
                })
            }
        },
        created() {
            this.get_data_list_student();
            // console.log("list_student")
        },
    }).mount("#list_student");
</script>