@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>



          <!-- Companies -->
          <li class="treeview">
            <a href="#"><i class="fa fa-building"></i> <span>Companies</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/company') }}"><i class="fa fa-list"></i> <span>View All</span></a></li>
              <li><a href="{{ url('admin/teammember') }}"><i class="fa fa-user-circle"></i> <span>Team Members</span></a></li>
              <li><a href="{{ url('admin/documents') }}"><i class="fa fa-user-circle"></i> <span>Documents</span></a></li>
            </ul>
          </li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/position') }}"><i class="fa fa-handshake-o"></i> <span>Positions</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/application') }}"><i class="fa fa-file-text-o"></i> <span>Applications</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/payment') }}"><i class="fa fa-credit-card"></i> <span>Payments</span></a></li>


          <!-- Core Data -->
          <li class="treeview">
            <a href="#"><i class="fa fa-database"></i> <span>Categories Data</span> <i class="fa fa-angle-left pull-right"></i></a>

            <ul class="treeview-menu">
              <li><a href="{{ url('admin/agebracket') }}"><i class="fa fa-th"></i> <span>Age Brackets</span></a></li>
              <li><a href="{{ url('admin/attitudinalfactor') }}"><i class="fa fa-th"></i> <span>Attitudinal Factors</span></a></li>
              <li><a href="{{ url('admin/attitudinalranking') }}"><i class="fa fa-th"></i> <span>Attitudinal Ranking</span></a></li>
              <li><a href="{{ url('admin/businessstage') }}"><i class="fa fa-th"></i> <span>Business Stages</span></a></li>
              <li><a href="{{ url('admin/companyratingattribute') }}"><i class="fa fa-th"></i> <span>Company Rating Attributes</span></a></li>
              <li><a href="{{ url('admin/educationlevel') }}"><i class="fa fa-th"></i> <span>Education Levels</span></a></li>
              <li><a href="{{ url('admin/employmenttype') }}"><i class="fa fa-th"></i> <span>Employment Types</span></a></li>
              <li><a href="{{ url('admin/expertisearea') }}"><i class="fa fa-th"></i> <span>Expertise Areas</span></a></li>
              <li><a href="{{ url('admin/importanceranking') }}"><i class="fa fa-th"></i> <span>Importance Ranking</span></a></li>
              <li><a href="{{ url('admin/industry') }}"><i class="fa fa-th"></i> <span>Industries</span></a></li>
              <li><a href="{{ url('admin/location') }}"><i class="fa fa-th"></i> <span>Locations</span></a></li>
              <li><a href="{{ url('admin/marketcapitalisation') }}"><i class="fa fa-th"></i> <span>Market Capitalisation</span></a></li>
              <li><a href="{{ url('admin/offerstatus') }}"><i class="fa fa-th"></i> <span>Offer Statuses</span></a></li>
              <li><a href="{{ url('admin/organisationtype') }}"><i class="fa fa-th"></i> <span>Organisation Types</span></a></li>
              <li><a href="{{ url('admin/positionlevel') }}"><i class="fa fa-th"></i> <span>Position Levels</span></a></li>
              <li><a href="{{ url('admin/remunerationrange') }}"><i class="fa fa-th"></i> <span>Remuneration Ranges</span></a></li>
              <li><a href="{{ url('admin/remunerationtype') }}"><i class="fa fa-th"></i> <span>Remuneration Types</span></a></li>
              <li><a href="{{ url('admin/skill') }}"><i class="fa fa-th"></i> <span>Skills</span></a></li>
              <li><a href="{{ url('admin/skillrating') }}"><i class="fa fa-th"></i> <span>Skills Rating</span></a></li>
            </ul>
          </li>


          <!-- File Manager -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>

          <!-- Users, Roles Permissions -->
          <li class="treeview">
            <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>

            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
            </ul>
          </li>

          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
