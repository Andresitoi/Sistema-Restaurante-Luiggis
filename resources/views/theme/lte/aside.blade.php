<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Administración</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('permiso')}}"><i class="fa fa-circle-o"></i> Permiso</a></li>
          <li><a href="{{route('permiso_rol')}}"><i class="fa fa-circle-o"></i> Permiso Rol</a></li>
          <li><a href="{{route('rol')}}"><i class="fa fa-circle-o"></i> Rol</a></li>
          <li class="treeview menu-open">
            <a href="#"><i class="fa fa-circle-o"></i> Menus
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: block;">
              <li><a href="{{route('menu')}}"><i class="fa fa-circle-o"></i> Menu</a></li>
              <li><a href="{{route('menu_rol')}}"><i class="fa fa-circle-o"></i> Menu Rol</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Ventas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('insumo')}}"><i class="fa fa-circle-o"></i> Insumo</a></li>
            <li><a href="{{route('permiso_rol')}}"><i class="fa fa-circle-o"></i> Permiso Rol</a></li>
            <li><a href="{{route('rol')}}"><i class="fa fa-circle-o"></i> Rol</a></li>
            <li class="treeview menu-open">
              <a href="#"><i class="fa fa-circle-o"></i> Menus
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: block;">
                <li><a href="{{route('menu')}}"><i class="fa fa-circle-o"></i> Menu</a></li>
                <li><a href="{{route('menu_rol')}}"><i class="fa fa-circle-o"></i> Menu Rol</a></li>
              </ul>
            </li>
          </ul>
        </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>