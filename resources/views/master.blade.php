<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
@include('layouts.header')


            @yield('content')
        

        @include('layouts.scripts')
        @stack('vue-components')
        @yield('script')
</body>

</html>
