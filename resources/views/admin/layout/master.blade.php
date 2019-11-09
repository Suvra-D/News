<!doctype html>

<html class="no-js" lang="">

<head>

@include('admin.layout.admin')

</head>

<body>


<!-- Left Panel -->

@include('admin.layout.nav')

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

@include('admin.layout.header')

@yield('content')

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

@include('admin.layout.bottom')

</body>
</html>
