<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('layout.header')
</head>
<body>
    <main>
    @include('layout.menu')

    @yield('content')
    </main>
</body>
</html>