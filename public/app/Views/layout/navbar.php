 <!-- Main Content -->
 <div id="content">

     <!-- Topbar -->
     <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

         <!-- Sidebar Toggle (Topbar) -->
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
             <i class="fa fa-bars"></i>
         </button>

         <!-- Topbar Search -->
         <!-- <?php if (session()->get('role_id') == 1) : ?>
             <button type="button" class="btn baiu" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">ADD Periode</button>
         <?php endif; ?> -->
         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">

             <!-- Nav Item - Search Dropdown (Visible Only XS) -->
             <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                 <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-search fa-fw"></i>
                 </a> -->
             <!-- Dropdown - Messages -->
             <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                 <form class="form-inline mr-auto w-100 navbar-search">
                     <div class="input-group">
                         <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                         <div class="input-group-append">
                             <button class="btn btn-primary" type="button">
                                 <i class="fas fa-search fa-sm"></i>
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
             </li> -->




             <div class="topbar-divider d-none d-sm-block"></div>

             <!-- Nav Item - User Information -->
             <li class="nav-item dropdown no-arrow">
                 <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('name'); ?></span>
                     <img class="img-profile rounded-circle" src="../img/<?= session()->get('image') ?>">
                 </a>
                 <!-- Dropdown - User Information -->
                 <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                     <a class="dropdown-item" href="/user/updateprof">
                         <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                         Profile
                     </a>
                     <?php if (session()->get('role_id') == 1) : ?>


                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal">
                             <i class=" fas fa-bullhorn" style="color:silver;" aria-hidden="true"></i> Information
                         </a>


                         <!-- Button to Open the Modal -->

                     <?php endif; ?>
                     <?php if (session()->get('role_id') == 1) : ?>
                         <a class="dropdown-item" href="/admin/report">
                             <i class="fa fa-download" style="color:silver;" aria-hidden="true"></i>
                             Download Report
                         </a>
                     <?php endif; ?>
                     <?php if (session()->get('role_id') == 1) : ?>
                         <a class="dropdown-item" href="/admin/certificate">
                             <i class="fa fa-upload" style="color:silver;" aria-hidden="true"></i>
                             Upload Certificate
                         </a>
                     <?php endif; ?>
                     <a class="dropdown-item" href="/user/changepassword">
                         <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                         Change Password
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                         <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                         Logout
                     </a>
                 </div>
             </li>

         </ul>


         <!-- Modal information -->
         <form action="/admin/addinfo" method="post">
             <?= csrf_field(); ?>
             <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Add Information</h5>
                             <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <form>
                                 <div class="mb-3">
                                     <label for="recipient-name" class="col-form-label">Judul</label>
                                     <input type="text" name="judul" class="form-control" id="recipient-name">
                                 </div>
                                 <div class="mb-3">
                                     <label for="message-text" class="col-form-label">Information:</label>
                                     <textarea name="isi" class="form-control" id="message-text"></textarea>
                                 </div>
                             </form>
                         </div>
                         <div class="modal-footer">

                             <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                     </div>
                 </div>
             </div>
         </form>
         <!-- end modal info -->

     </nav>

     <?= $this->renderSection('content'); ?>
     <!-- End of Topbar -->