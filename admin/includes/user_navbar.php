   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user_home.php">

           <div class="sidebar-brand-text mx-3">BiT Save & Credit</div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
           <a class="nav-link" href="user_home.php">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>User Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <li class="nav-item">
           <a class="nav-link" href="request_loan.php">
               <i class="fas fa-fw fa-cog"></i>
               <span>Request for Loan </span></a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="loan_details.php">
               <i class="fas fa-fw fa-cog"></i>
               <span> Loan Details</span></a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="payment_detail.php">
               <i class="fas fa-fw fa-cog"></i>
               <span>Payment Detail</span></a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="check_balnce.php">
               <i class="fas fa-fw fa-cog"></i>
               <span>Check Balance </span></a>
       </li>


       <li class="nav-item">
           <a class="nav-link" href="Withdraw.php">
               <i class="fas fa-fw fa-cog"></i>
               <span>Withdraw Money</span></a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="feedback.php">
               <i class="fas fa-fw fa-cog"></i>
               <span>Send Feedback </span></a>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="update_user.php">
               <i class="fas fa-user-cog"></i>
               <span> Update Profile </span></a>
       </li>


       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>

   </ul>
   <!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

       <!-- Main Content -->
       <div id="content">

           <!-- Topbar -->
           <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                   <i class="fa fa-bars"></i>
               </button>

               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">

                   <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                   <li class="nav-item dropdown no-arrow d-sm-none">
                       <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-search fa-fw"></i>
                       </a>
                       <!-- Dropdown - Messages -->
                       <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                           aria-labelledby="searchDropdown">
                           <form class="form-inline mr-auto w-100 navbar-search">
                               <div class="input-group">
                                   <input type="text" class="form-control bg-light border-0 small"
                                       placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                   <div class="input-group-append">
                                       <button class="btn btn-primary" type="button">
                                           <i class="fas fa-search fa-sm"></i>
                                       </button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </li>

                   <!-- Nav Item - User Information -->
                   <li class="nav-item dropdown no-arrow">
                       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                               <?php echo $_SESSION['username']; ?>

                           </span>
                       </a>

                       <!-- Dropdown - User Information -->
                       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                           aria-labelledby="userDropdown">

                           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                               Logout
                           </a>
                       </div>
                   </li>

               </ul>

           </nav>
           <!-- End of Topbar -->


           <!-- Scroll to Top Button-->
           <a class="scroll-to-top rounded" href="#page-top">
               <i class="fas fa-angle-up"></i>
           </a>


           <!-- Logout Modal-->
           <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">??</span>
                           </button>
                       </div>
                       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                       <div class="modal-footer">
                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                           <form action="code.php" method="POST">

                               <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                           </form>


                       </div>
                   </div>
               </div>
           </div>