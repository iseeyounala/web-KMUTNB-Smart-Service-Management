 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="#" class="brand-link">
     <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">User</span>
   </a>

   <!-- Sidebar -->
   <div id="info_user" class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">{{m_gender + ' ' + m_fname + ' ' + m_lname}}</a>
         <!-- <a href="./user_page.php?page=edit_profile" class="btn btn-warning">
           <i class="fa fa-cog"></i>
         </a>
         <button class="btn btn-danger">
           <i class="fa fa-minus-square"></i>
         </button> -->
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item menu-open">
           <ul class="nav nav-treeview">
           <li class="nav-item">
               <a href="./user_page.php?page=from_petition" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>กรอกคำร้อง</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="./user_page.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>รายงานสถานะ</p>
               </a>
             </li>
           </ul>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>