<!doctype html>
<html lang={{ app()->getLocale() }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<body>
<menu>
    <x-header></x-header>
</menu>
<main>
    {{$slot}}
</main>
<footer>
    <x-footer></x-footer>
</footer>
</body>
</html>
