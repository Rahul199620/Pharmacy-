<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
@include('layouts.header')

<div class="container">
            @yield('content')
        </div>

        @include('layouts.scripts')
        @stack('vue-components')
        @yield('script')
</body>

</html>