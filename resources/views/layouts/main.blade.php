<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maerifa {{ $pageTitle }}</title>
    {{-- vite tailwind --}}
    @vite('resources/css/app.css')
    {{-- link favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/img/gebildet.png') }}" type="image/x-icon">
    {{-- alpine js --}}
    <script src="{{ asset('assets/js/alpine.min.js') }}"></script>
</head>

<body>

    {{-- main content --}}

    @yield('main')

    {{-- day js --}}
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/id.js"></script>

</body>

</html>
