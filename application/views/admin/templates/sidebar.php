<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
      <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-briefcase"></i>
      </div>
      <div class="sidebar-brand-text mx-3">MOU APPS</div>
   </a>

   <hr class="sidebar-divider my-0">
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
         <i class="fas fa-fw fa-tachometer-alt"></i>
         <span>Dashboard</span>
      </a>
   </li>

   <hr class="sidebar-divider my-0">         
   <!-- <li class="nav-item">
      <a class="nav-link" href="<?= base_url('admin/user'); ?>">
         <i class="fas fa-fw fa-user"></i>
         <span>Manage User</span>
      </a>
   </li> -->

   <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         <i class="fas fa-fw fa-user"></i>
         <span>Manage User</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('admin/user');  ?>">Data Users</a>
            <!-- <a class="collapse-item" href="#">Tipe Admin</a> -->
            <a class="collapse-item" href="<?= base_url('admin/dinas'); ?>">Data Dinas</a>
         </div>
      </div>
   </li>

   <hr class="sidebar-divider my-0">         
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('mou'); ?>">
         <i class="far fa-fw fa-calendar-check"></i>
         <span>Data MOU</span>
      </a>
   </li>

   <hr class="sidebar-divider my-0">         
   <li class="nav-item">
      <a class="nav-link" href="<?= base_url('pks'); ?>">
         <i class="fas fa-fw fa-calendar-check"></i>
         <span>Data PKS</span>
      </a>
   </li>

   <hr class="sidebar-divider my-0">         
   <li class="nav-item"> 
      <a class="nav-link" href="<?= base_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
         <i class="fas fa-fw fa-sign-out-alt"></i>
         <span>Logout</span>
      </a>
   </li>         
   <hr class="sidebar-divider d-none d-md-block">   
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>
</ul>