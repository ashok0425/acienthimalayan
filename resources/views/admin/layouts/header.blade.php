 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>

     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
    
         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
         <!-- Profile Dropdown Menu -->
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="fas fa-user"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                 <div class="dropdown-divider"></div>
                 <a href="{{ route('admin.profile') }}" class="dropdown-item">
                     <i class="fas fa-user-circle mr-2"></i> Profile
                 </a>
                 <div class="dropdown-divider"></div>

                 <a href="{{ route('admin.password') }}" class="dropdown-item">
                     <i class="fas fa-lock mr-2"></i> Change password
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="{{ route('logout') }}" class="dropdown-item">
                     <i class="fas fa-sign-out-alt mr-2"></i> Logout
                 </a>

             </div>
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->
