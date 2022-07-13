<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('dashboard') }}"><i class
                            ="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">BERITA</li><!-- /.menu-title -->
                    <li class="">
                        <a href="{{ route('berita.index') }}"> <i class="menu-icon fa fa-list"></i>List Berita</a>
                    </li>
                    <li class="">
                        <a href="{{ route('berita.create') }}"> <i class="menu-icon fa fa-plus"></i>Tambah Berita</a>
                    </li>

                    <li class="menu-title">nvoice</li><!-- /.menu-title -->
                    <li class="">
                        <a href="#"> <i class="menu-icon fa fa-list"></i>List Invoice</a>
                    </li>

                    <li class="menu-title">Nota</li><!-- /.menu-title -->
                    <li class="">
                        <a href="#"> <i class="menu-icon fa fa-list"></i>List Nota</a>
                    </li>
                                        <li class="">
                        <a href="#"> <i class="menu-icon fa fa-plus"></i>Tambah Nota</a>
                    </li>
                    <li class="menu-title">User</li><!-- /.menu-title -->
                    <li class="">
                        <a href="#"> <i class="menu-icon fa fa-list"></i>List User</a>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
