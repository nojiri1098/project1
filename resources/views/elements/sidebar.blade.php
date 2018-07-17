<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">odyssey</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -------------------------------------------------------------------------------------------------------->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('index') }}" class="nav-link {{ isActiveUrl('index') }}">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Top Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('pulse') }}" class="nav-link {{ isActiveUrl('pulse') }}">
                        <i class="nav-icon fa fa-play"></i>
                        <p>pulse</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('data') }}" class="nav-link {{ isActiveUrl('data') }}">
                        <i class="nav-icon fa fa-list"></i>
                        <p>Datalist</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
