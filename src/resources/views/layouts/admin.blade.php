<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.admin.head')
</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        @include('includes.admin.header')
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @include('includes.admin.navbar')
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                @include('includes.admin.footer')
            </footer>
        </div>
    </div>
    @include('includes.admin.lib-js')
</body>
@include('includes.admin.notification.notification-order-js')
