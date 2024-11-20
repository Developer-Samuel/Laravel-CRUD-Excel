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
<div class="error-card">
    <div class="error-container">
        <div class="error-content">
            <h1 class="error-code">404</h1>
            <p class="error-message">Something's missing.</p>
            <p class="error-description">Sorry, we can't find that page. You'll find lots to explore on the home page.</p>
            <a href="/users" class="back-button">Back to Home</a>
        </div>
    </div>
</div>
</body>
</html>
