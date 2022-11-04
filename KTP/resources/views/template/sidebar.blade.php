<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        @if (auth()->user()->is_admin)
            <ul class="nav" id="main-menu">
                <li>
                    <a class="@if(request()->routeis('admin.dashboard')) active-menu @endif" href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a class="@if(request()->routeis('admin.reporting.*')) active-menu @endif" href="{{route('admin.reporting.index')}}"><i class="fa fa-credit-card"></i> Pelaporan KTP</a>
                </li>
                <li>
                    <a class="@if(request()->routeis('operator.search.*')) active-menu @endif" href="{{route('operator.search.index')}}"><i class="fa fa-credit-card"></i> Pencarian Data</a>
                </li>
                <li>
                    <a class="@if(request()->routeis('admin.report.*')) active-menu @endif" href="{{route('admin.report.dailyreport')}}"><i class="fa fa-files-o"></i> Laporan harian</a>
                </li>
                <li>
                    <a class="@if(request()->routeis('admin.operator.*')) active-menu @endif" href="{{route('admin.operator.index')}}"><i class="fa fa-dashboard"></i> Manajemen Operator</a>
                </li>
                <li class="">
                    <a href="#"><i class="fa fa-sitemap"></i> Master Data<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="@if(request()->routeis('admin.reportingtypes.*')) active-menu @endif" href="{{route('admin.reportingtypes.index')}}">Jenis Pelaporan</a>
                        </li>
                        <li>
                            <a class="@if(request()->routeis('admin.submissiontypes.*')) active-menu @endif" href="{{route('admin.submissiontypes.index')}}">Jenis Keterangan</a>
                        </li>
                        <li>
                            <a class="@if(request()->routeis('admin.explanationtypes.*')) active-menu @endif" href="{{route('admin.explanationtypes.index')}}">Jenis Pengajuan</a>
                        </li>
                    </ul>
                </li>
            </ul>
        @else
            <ul class="nav" id="main-menu">
                <li>
                    <a class="@if(request()->routeis('operator.dashboard')) active-menu @endif" href="{{route('operator.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a class="@if(request()->routeis('operator.reporting.*')) active-menu @endif" href="{{route('operator.reporting.index')}}"><i class="fa fa-credit-card"></i> Pelaporan KTP</a>
                </li>
                <li>
                    <a class="@if(request()->routeis('operator.search.*')) active-menu @endif" href="{{route('operator.search.index')}}"><i class="fa fa-credit-card"></i> Pencarian Data</a>
                </li>
            </ul>
        @endif


    </div>

</nav>
