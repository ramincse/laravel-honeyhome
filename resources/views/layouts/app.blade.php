<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head')
    </head>
    <body>
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <!-- Header -->
            @include('layouts.header')
            <!-- /Header -->
            <!-- Sidebar -->
            @include('layouts.menu')
            <!-- /Sidebar -->
            <!-- Page Wrapper -->
            @section('main-content')
            @show
            <!-- /Page Wrapper -->
        </div>
        <!-- /Main Wrapper -->
        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
        <!-- jQuery -->
        @include('layouts.partials.scripts')
    </body>
</html>
