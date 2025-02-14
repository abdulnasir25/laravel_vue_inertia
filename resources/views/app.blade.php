<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- @vite('resouces/js/app.js') --}}
    @vite(['resources/js/app.js'])

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
