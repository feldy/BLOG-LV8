<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include("templates.default_header")
    </head>
    <body class="c-layout-header-fixed c-layout-header-6-topbar">
        @include("templates.default_navigation_header")
        @yield('content')
        @include("templates.default_footer")
        @include("templates.default_javascript")
    </body>
</html>