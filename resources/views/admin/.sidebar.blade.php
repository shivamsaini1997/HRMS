  <?php

  $userid = Session::get('ad_id');

  $getuser_details = DB::table('tbl_admin')->where('admin_id', $userid)->where('status', 'A')->first();

  ?>

  <!-- Main Sidebar Container -->

  <style>
    .brand-link .brand-image {

      display: flex;

      justify-content: center;

      max-height: 104px;

      width: auto;

    }

    a.brand-link {

      padding: 0;

      display: flex;

      justify-content: center;

    }

    p.brand-text.font-weight-light {

      width: 100%;

      display: flex;

      justify-content: center;

      display: none;

    }

    .sidebar-mini.sidebar-collapse .main-sidebar,
    .sidebar-mini.sidebar-collapse .main-sidebar::before {

      width: 0px;

    }
  </style>

  <aside class="main-sidebar sidebar-dark-primary elevation-4  spc_width_class">

    <!-- Brand Logo -->

    <div class="d-block ">

      <a href="/dashboard" class="brand-link">

        <img src="{{asset('public/images/adminlte.png')}}" alt="ELARNING" class="brand-image" style="opacity: .8">

        <p class="brand-text font-weight-light">Admin</p>

      </a>

    </div>

    <!-- Sidebar -->

    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

          @if($getuser_details->type == 1)

          <li class="nav-item">

            <a href="#" class="nav-link">

              <p>

                Site Info

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="" class="nav-link">

                  <i class="fas fa-plus nav-icon"></i>

                  <p>Add Site Info</p>

                </a>

              </li>



              <li class="nav-item">

                <a href="" class="nav-link">

                  <i class="far fa-edit nav-icon"></i>

                  <p>Manage SIte Info</p>

                </a>

              </li>

            </ul>

          </li>

          <li class="nav-item">

            <a href="#" class="nav-link">

              <p>

              Use It Btn Page

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="{{route('admin/useIt/add')}}" class="nav-link">

                  <i class="fas fa-plus nav-icon"></i>

                  <p>Add Use It Btn Page</p>

                </a>

              </li>



              <li class="nav-item">

                <a href="" class="nav-link">

                  <i class="far fa-edit nav-icon"></i>

                  <p>Manage Use It Btn Page</p>

                </a>

              </li>

            </ul>

          </li>

          @else

          <li class="nav-item">

            <a href="#" class="nav-link">

              <p>

                You are Judge

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>



          </li>

          @endif





        </ul>

      </nav>

      <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

  </aside>