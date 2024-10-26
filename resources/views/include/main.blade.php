<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nagar Palika</title>
    {{-- JS --}}
    @include('include.script')
    {{-- @stack('custom-script') --}}
    @include('include.style')
</head>

<body>
    <div id="main-content" class="main-content shifted">

        <?php //$user = getUserSession();
        ?>
        {{-- Sidebar --}}
        @include('include.sidebar')
        {{-- Header --}}
        @include('include.header' /*,['user' => $user]*/)
        {{-- Main Section --}}
        <section class="page_container">
            @yield('content')
        </section>
    </div>
</body>

</html>
