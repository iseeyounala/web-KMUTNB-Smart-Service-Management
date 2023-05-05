 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="#" class="brand-link">
     <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Room</span>
   </a>

   <!-- Sidebar -->
   <div id="info_user" class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">{{admin_gender + ' ' + admin_fname + ' ' + admin_lname}}</a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
           <a href="./admin_page.php?page=dash" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-header">ข้อมูลห้องในระบบ</li>
         <li class="nav-item">
           <a href="./room_page.php?page=add_room" class="nav-link">
             <i class="nav-icon fa fa-tag"></i>
             <p>
               เพิ่มห้อง
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="./room_page.php?page=list_room" class="nav-link">
             <i class="nav-icon fa fa-tags"></i>
             <p>
               ข้อมูลห้อง
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-header">ข้อมูลการจองห้องในระบบ</li>
         <li class="nav-item">
           <a href="./room_page.php?page=list_booking" class="nav-link">
             <i class="nav-icon fa fa-tags"></i>
             <p>
               ข้อมูลการจองห้อง
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="./room_page.php?page=list_detail_room" class="nav-link">
             <i class="nav-icon fa fa-tags"></i>
             <p>
               ข้อมูลรายละเอียดห้อง
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-header">ตั้งค่าระบบ</li>
         <li class="nav-item">
           <a href="./room_page.php?page=list_check_point" class="nav-link">
             <i class="nav-icon fa fa-cog"></i>
             <p>
               พิกัดที่ตั้ง
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>