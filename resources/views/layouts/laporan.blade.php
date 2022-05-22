<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('includes.style')
    @stack('custom-style')
</head>

<body>
    <div class="main">
        @yield('content')
    </div>
        
        @include('includes.scripts')
        @stack('after-script')
</body>

</html>