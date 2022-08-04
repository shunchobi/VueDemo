<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div id="components-game"></div>
    </body>
</html>

{{-- <script type="module" src="http://localhost:5173/@vite/client"></script>
<link rel="stylesheet" href="http://localhost:5173/resources/css/app.css" />
<script type="module" src="http://localhost:5173/resources/js/app.js"></script>     --}}
