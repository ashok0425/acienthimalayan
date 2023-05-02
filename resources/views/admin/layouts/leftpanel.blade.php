  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Brand Logo -->
      <a href="{{ route('/') }}" class="brand-link">
          {{-- <img src="{{asset($logo)}}" alt="Baratodeal Logo" class="" width="200"> --}}
          NepalVision
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">


                  {{-- dashboard section --}}
                  <li class="nav-item ">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  {{-- Destination --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'destinations' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'destinations' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-mountain"></i>
                          <p>
                              Manage Destinations
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.destinations.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All </p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.destinations.create') }}" class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Destination </p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Category Package --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'categories-packages' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'categories-packages' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-box"></i>
                          <p>
                              Manage Packages
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.categories-packages.index') }}"
                                  class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Packages</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.categories-packages.create') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Packages </p>
                              </a>
                          </li>

                      </ul>
                  </li>


                  {{-- Testimonial --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'testimonials' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'testimonials' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-star"></i>
                          <p>
                              Testimonial Data
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.testimonials.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>View Testimonials</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.testimonials.create') }}"
                                  class="nav-link <?php echo Request::segment(3) == 'create' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Testimonial </p>
                              </a>
                          </li>

                      </ul>
                  </li>


                  {{-- dashboard section --}}
                  <li class="nav-item ">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                  {{-- setting --}}
                  <li class="nav-item <?php echo Request::segment(2) == 'websites' ? 'menu-open' : ''; ?>">
                      <a href="#" class="nav-link <?php echo Request::segment(2) == 'websites' ? 'active' : ''; ?> ">
                          <i class="nav-icon fas fa-wrench"></i>
                          <p>
                              Setting
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ route('admin.websites.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Website Setting </p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.banners.index') }}" class="nav-link <?php echo Request::segment(3) == '' ? 'active' : ''; ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Banner </p>
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
