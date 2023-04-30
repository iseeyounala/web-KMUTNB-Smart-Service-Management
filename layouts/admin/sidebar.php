 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="#" class="brand-link">
     <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Admin</span>
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
         <!-- <li class="nav-item">
           <a href="./admin_page.php?page=dash" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li> -->
         <li class="nav-header">ผู้ดูแลระบบ</li>
         <li class="nav-item">
           <a href="./admin_page.php?page=add_admin" class="nav-link">
             <i class="nav-icon fa fa-archive"></i>
             <p>
               เพิ่มผู้ดูแล
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="./admin_page.php?page=list_admin" class="nav-link">
             <i class="nav-icon fa fa-archive"></i>
             <p>
               รายชื่อผู้ดูแล
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-header">นักศึกษา</li>
         <li class="nav-item">
           <a href="./admin_page.php?page=list_student" class="nav-link">
             <i class="nav-icon fa fa-archive"></i>
             <p>
               รายชื่อนักศึกษา
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-header">ประกาศ</li>
         <li class="nav-item">
           <a href="./admin_page.php?page=announcement_list" class="nav-link">
             <i class="nav-icon fa fa-archive"></i>
             <p>
               รายการ
               <!-- <span class="badge badge-info right">2</span> -->
             </p>
           </a>
         </li>
         <li class="nav-header">กิจกรรม</li>
         <li class="nav-item">
           <a href="./admin_page.php?page=report_activity_list" class="nav-link">
             <i class="nav-icon fa fa-archive"></i>
             <p>
               รายงานกิจกรรมในระบบ
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