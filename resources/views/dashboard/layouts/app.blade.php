<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="/assets/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | {{ $title }}</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/assets/css/app.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
    <!-- BEGIN: Notification Content -->
    @include('dashboard.layouts.notification')
    <!-- END: Notification Content -->

    <!-- BEGIN: Mobile Menu -->
    @include('dashboard.layouts.menumobile')
    <!-- END: Mobile Menu -->

    <div class="flex mt-[4.7rem] md:mt-0">

        <!-- BEGIN: Side Menu -->
        @include('dashboard.layouts.sidemenu')
        <!-- END: Side Menu -->

        <!-- BEGIN: Content -->
        <div class="content">

            <!-- BEGIN: Top Bar -->
            @include('dashboard.layouts.topbar')
            <!-- END: Top Bar -->
            @yield('container')
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->

    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/ckeditor-classic.js"></script>

    @stack('script')
    <script>
        window.onload = function() {
            @if (session()->has('success'))
                showSuccessNotification();
            @endif
            @if (session()->has('error'))
                showErrorNotification();
            @endif
        };
    </script>
    <!-- END: JS Assets-->

</body>

</html>
