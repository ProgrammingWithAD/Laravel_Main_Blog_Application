
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
<title>{{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layout.style')
</head>

<body>

@include('layout.header')
@yield('content')
@include('layout.footer')
@include('layout.script')
</body>
</html>