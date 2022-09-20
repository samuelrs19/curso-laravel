<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body>
    <div class="container">
        <h1>
            {{ $title }}
        </h1>
        {{ $slot }}
    </div>
</body>

</html>
