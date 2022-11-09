@extends('template.index')

@push('style')
<!-- TABLE STYLES-->
<link href="{{ asset('assets/js/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('script')
<!-- Metis Menu Js -->
<script src="{{ asset('assets/js/jquery.metisMenu.js') }}"></script>

<!-- Morris Chart Js -->
<script src="{{ asset('assets/js/morris/raphael-2.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/morris/morris.js') }}"></script>


<script src="{{ asset('assets/js/easypiechart.js') }}"></script>
<script src="{{ asset('assets/js/easypiechart-data.js') }}"></script>

<script src="{{ asset('assets/js/Lightweight-Chart/jquery.chart.js') }}"></script>

<script src="{{ asset('assets/js/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('assets/js/custom-scripts.js') }}"></script>

@stack('admin-script')

@endpush

@section('body')
    @include('template.topbar')
    @include('template.sidebar')
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                @if(!empty($title)) {{$title}} @else Selamat datang {{Auth::user()->username}} @endif<small>@if(!empty($subtitle)) {{$subtitle}}. @endif</small>
            </h1>
            @if ($breadcrumb)
            <ol class="breadcrumb">
                @foreach ($breadcrumb as $key => $item)
                    <li class="@if($loop->last) active @endif">
                        @if($item)
                            <a href="{{$item}}">{{$key}}</a>
                        @else
                            {{$key}}
                        @endif
                    </li>
                @endforeach
            </ol>
            @endif
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-xs-12">
                    @yield('content')
                </div>
            </div>
            @yield('chart')
            <footer><p>All right reserved. Copyright: <a href="http://dispendukcapil.malangkota.go.id/">Dispendukcapil2022</a></p></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
@endsection
