<!DOCTYPE html>
<html lang="sk" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- begin::DELETE on Production and use local fonts from public folder -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- begin::DELETE on Production and use local fonts from public folder -->
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    @yield('content')
</body>
</html>
