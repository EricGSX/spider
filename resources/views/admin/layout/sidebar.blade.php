<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('image/user.jpeg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{\Auth::guard('admin')->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        {{--@can('system')--}}
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>系统管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/permissions"><i class="fa fa-circle-o"></i> 权限管理</a></li>
            <li><a href="/admin/users"><i class="fa fa-circle-o"></i> 用户管理</a></li>
            <li><a href="/admin/roles"><i class="fa fa-circle-o"></i> 角色管理</a></li>
          </ul>
        </li>
      {{--@endcan--}}
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>文章管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/posts"><i class="fa fa-circle-o"></i> 文章列表</a></li>
            <li><a href="/admin/posts/trash"><i class="fa fa-circle-o"></i> 回收站</a></li>
          </ul>
        </li>
        <li class="treeview">
              <a href="#">
                  <i class="fa fa-map"></i>
                  <span>专题管理</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="/admin/topics"><i class="fa fa-circle-o"></i>专题列表</a></li>
                  <li><a href="/admin/topics/create"><i class="fa fa-circle-o"></i>添加专题</a></li>
              </ul>
          </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bullhorn"></i>
            <span>通知管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/notices"><i class="fa fa-circle-o"></i>通知列表</a></li>
            <li><a href="/admin/notices/create"><i class="fa fa-circle-o"></i>添加通知</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>网站布局</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/flinks"><i class="fa fa-circle-o"></i> Friend Link</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-microphone"></i>
            <span>吐槽&建议</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/feedbacks"><i class="fa fa-circle-o"></i>Feedback list</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>

        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
