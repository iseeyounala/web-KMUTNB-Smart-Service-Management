<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

  <nav id="sidebar">

    <div class="navbar-nav theme-brand flex-row  text-center">
      <div class="nav-logo">
        <div class="nav-item theme-logo">
          <a href="./index.html">
            <img src="../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
          </a>
        </div>
        <div class="nav-item theme-text">
          <a href="./index.html" class="nav-link"> CORK </a>
        </div>
      </div>
      <div class="nav-item sidebar-toggle">
        <div class="btn-toggle sidebarCollapse">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left">
            <polyline points="11 17 6 12 11 7"></polyline>
            <polyline points="18 17 13 12 18 7"></polyline>
          </svg>
        </div>
      </div>
    </div>
    <div class="shadow-bottom"></div>
    <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu active">
        <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-superadmin">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
              <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <span>Dashboard</span>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled show" id="dashboard" data-bs-parent="#accordionExample">
          <li class="active">
            <a href="./index.html"> Analytics </a>
          </li>
          <li>
            <a href="./index2.html"> Sales </a>
          </li>
        </ul>
      </li>

      <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg><span>APPLICATIONS</span></div>
      </li>

      <li class="menu">
        <a href="#student" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i data-feather="users"></i>
            <span>นักศึกษา</span>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="student" data-bs-parent="#accordionExample">
          <li>
            <a href="./index.php?p=list_student"> ข้อมูลนักศึกษา </a>
          </li>
        </ul>
      </li>

      <li class="menu">
        <a href="#truck" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i data-feather="truck"></i>
            <span>รถรับส่ง</span>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="truck" data-bs-parent="#accordionExample">
          <li>
            <a href="./#"> ข้อมูลคนขับ </a>
          </li>
          <li>
            <a href="./#"> ตั้งค่า Check Point </a>
          </li>
        </ul>
      </li>

      <li class="menu">
        <a href="#booking_room" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i data-feather="bookmark"></i>
            <span>ห้องติว</span>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="booking_room" data-bs-parent="#accordionExample">
          <li>
            <a href="./#"> ข้อมูลห้อง </a>
          </li>
          <li>
            <a href="./#"> ตั้งค่า Marker </a>
          </li>
        </ul>
      </li>

      <li class="menu">
        <a href="#announce" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i data-feather="bell"></i>
            <span>แจ้ง/ประกาศ</span>
          </div>
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="announce" data-bs-parent="#accordionExample">
          <li>
            <a href="./#"> ข้อมูลห้อง </a>
          </li>
          <li>
            <a href="./#"> ตั้งค่า Marker </a>
          </li>
        </ul>
      </li>



      <li class="menu menu-heading">
        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
            <line x1="5" y1="12" x2="19" y2="12"></line>
          </svg><span>USER INTERFACE</span></div>
      </li>

      <li class="menu">
        <a href="./map-leaflet.html" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map">
              <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
              <line x1="8" y1="2" x2="8" y2="18"></line>
              <line x1="16" y1="6" x2="16" y2="22"></line>
            </svg>
            <span>Maps</span>
          </div>
        </a>
      </li>
    </ul>
  </nav>

</div>
<!--  END SIDEBAR  -->