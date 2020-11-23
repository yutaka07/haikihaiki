<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body>
    <div class="p-error__page">
        <div class="p-error__page--code">
            @yield('code')
        </div>

        <div class="p-error__page--message">
            @yield('message')
        </div>
    </div>
</body>

</html>