<?php 


$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url()?>admin/dashboard" class="brand-link bg-primary">
    <img src="<?= base_url($this->general_settings['favicon']); ?>" alt="Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $this->general_settings['application_name']; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url()?>assets/login/nai.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Welcome <?= ucwords($this->session->userdata('username')); ?></a>
      </div>
    </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url()?>admin/dashboard" class="nav-link active">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
                
              </p>
            </a>
            
          </li>

        

    

  

 
                       <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
              Master List
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/kinerja/admin/karyawan" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Employees</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/departemen/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Organization</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/jabatan" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Job position</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/golongan/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Job level</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/pertanyaan/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Question</p>
                  </a>
              </li>
              
            </ul>
          </li>
  
      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-globe"></i>
              <p>
              360 Degree Feedback
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/kinerja/admin/tigaenampuluh/kirim" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Send Form</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/tigaenampuluh/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Form</p>
                  </a>
              </li>
            </ul>
          </li>
 

         
                 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Self Performance review
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/kinerja/admin/Self_appraisal/kirim" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Send Form</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/Self_appraisal/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Form</p>
                  </a>
              </li>
            </ul>
          </li>

     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-free-code-camp"></i>
              <p>
              Performance Review
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              
              <li class="nav-item">
                <a href="/kinerja/admin/Final_appraisal/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Send Form To Supervisor</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/Spv_appraisal/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Supervisor Review List</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/Final_appraisal/add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Results</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/Final_appraisal/list_index" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Performance Review List</p>
                  </a>
              </li>
           
            </ul>
          </li>

       <!-- Data Laporan -->
     <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file-text-o"></i>
              <p>
                Data Laporan
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/kinerja/admin/laporan/periodik" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> Laporan Periodik</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/laporan/executive" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Laporan Executive</p>
                  </a>
              </li>
            </ul>
          </li>-->
      <!-- Akhir Data Laporan -->


        <!-- Contoh menu Drop Down -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
               HR Menu
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/kinerja/admin/hrd" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Appraisal Data</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/hrd/notif" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Notification</p>
                  </a>
              </li>
            </ul>
          </li>
      <!-- Akhir Contoh menu Drop Down -->

                    <!-- Contoh menu Drop Down -->
       <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Login Management
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="/kinerja/admin/admin" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List User</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/kinerja/admin/admin/add" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add User</p>
                  </a>
              </li>
            </ul>
          </li>
      <!-- Akhir Contoh menu Drop Down -->
                   
    <!--  <li class="nav-item">
            <a href="<?= base_url('admin/profile') ?>" class="nav-link">
            <i class="nav-icon fa fa-address-book"></i>
              <p>Profile</p>
            </a>
          </li>-->
     
          <li class="nav-item">
            <a href="<?= base_url('admin/auth/logout') ?>" class="nav-link">
            <i class="nav-icon fa fa-sign-out"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
  
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>


