<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siya Collection</title>
    
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/category-form.css')}}">
    <link rel="stylesheet" href="{{asset('css/product-form.css')}}">
    <link rel="stylesheet" href="{{asset('css/category-table.css')}}">
    <link rel="stylesheet" href="{{asset('css/heroes.css')}}">
    <link rel="stylesheet" href="{{asset('css/order-index.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

@include('admin.partials.sidebar')
@yield('content')

    
</body>
</html>