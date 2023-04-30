<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>เข้าสู่ระบบ || Admin</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div id="login">
		<div class="login-box">
			<!-- /.login-logo -->
			<div class="card card-outline card-warning">
				<div class="card-header text-center">
					<a href="index.php" class="h1"><b>KMUTNB </b>SmartService</a>
				</div>
				<div class="card-body">
					<p class="login-box-msg">เข้าสู่ระบบก่อนเข้าใช้งาน</p>
					<div action="index3.html" method="post">
						<div class="input-group mb-3">
							<input v-model="admin_username" type="text" class="form-control" placeholder="Username">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input v-model="admin_password" type="password" class="form-control" placeholder="Password">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div v-if="admin_username != '' && admin_password != '' ">
									<button type="submit" class="btn btn-primary btn-block" @click="login()">เข้าสู่ระบบ</button>
								</div>
								<div v-else="admin_username == '' && admin_password == '' ">
									<button disabled type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<div class="row mt-2">
							<div class="col-12">
								<button type="submit" class="btn btn-warning btn-block">สมัคร</button>
							</div>
							<!-- /.col -->
						</div>
					</div>
					<!-- /.social-auth-links -->
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.login-box -->
	</div>
	<script src="./vue/vue.global.js"></script>
	<script src="./vue/axios.min.js"></script>
	<script src="./vue/sweetalert2.all.min.js"></script>
	<script>
		Vue.createApp({
			data() {
				return {
					admin_username: '',
					admin_password: '',
				};
			},
			methods: {
				login() {
					axios.post("./action/api_login.php", {
						// action: 'login',
						admin_username: this.admin_username,
						admin_password: this.admin_password
					}).then((res) => {
						let {
							status,
							admin_level,
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
								if (admin_level == 0) {
									location.replace("./admin/admin_page.php");
								} else if (admin_level == 2) {
									location.replace("./room/room_page.php");
								} else if (admin_level == 3) {
									location.replace("./sport/sport_page.php");
								}
							});
						} else {
							Swal.fire({
								icon: "error",
								text: meg,
							});
						}
						console.log(res.data);
					}).catch((err) => {
						console.error(err);
					})
				}
			},
			created() {
				// console.log("login")
			},
		}).mount("#login");
	</script>
	<!-- jQuery -->
	<script src="../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>
</body>

</html>