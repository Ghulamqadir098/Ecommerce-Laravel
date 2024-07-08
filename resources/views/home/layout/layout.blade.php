<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MY Store</title>
    @include('home.components.css')
</head>
<body>
    <div class="hero_area">
       @include('home.components.header') 
       @include('home.components.slider')
    </div>
       @include('home.components.why')
       @include('home.components.arrival')
       @include('home.components.product')
       @include('home.components.subscribe')
       @include('home.components.footer')
       @include('home.components.credit')
       @include('home.components.links')
</body>
</html>