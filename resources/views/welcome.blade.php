<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>

    <h1 class="text-danger">
        App.vue のコード
    </h1>
    <div id="app"></div>

    <h1 class="text-danger">
        Test.vue のコード
    </h1>
    <div id="test"></div>

</body>

</html>
