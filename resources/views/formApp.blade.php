<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div id="form-app"></div>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
