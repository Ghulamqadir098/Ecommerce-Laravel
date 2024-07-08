{{-- <x-app-layout>
    
</x-app-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dash</title>
    @include('admin.components.css')
</head>

<body>
    <div class="container-scroller">

        @include('admin.components.side_bar')

        <div class="container-fluid page-body-wrapper">
            @include('admin.components.nav_bar')

            {{-- @include('admin.components.body') --}}

         @yield('content')

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('admin.components.script')
</body>

</html>
