<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicuciin</title>
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ asset ('template/css/login.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="banner">
        <div class="gambar">
        <img class="layer-1" src="{{ asset ('template/images/bg.jpg')}}">
        <img class="layer-6" src="{{ asset ('template/images/kanan.png')}}">
        <img class="layer-7" src="{{ asset ('template/images/kiri.png')}}"></div>
        <img class="leaf" src="{{ asset ('template/images/leaf.png')}}">
        <img class="layer-5" src="{{ asset ('template/images/hill5.png')}}">
        <img src="{{ asset ('template/images/plant.png')}}">
        <div class="layer-3">
            <h1>Selamat Datang</h1>
            <!-- <p>Laundry bersih.</p> -->
            <a href="#formMasuk">Mulai</a>
        </div>
    </div>
    @yield('content')

    <script type="text/javascript" src="{{ asset ('template/js/login.js')}}"></script>
    <script type="text/javascript">
        let layer_1 = document.querySelector('.layer-1');
        let layer_3 = document.querySelector('.layer-3');
        let leaf = document.querySelector('.leaf');
        let layer_5 = document.querySelector('.layer-5');
        let layer_6 = document.querySelector('.layer-6');
        let layer_7 = document.querySelector('.layer-7');
        window.onload = function () {
            let Y = window.innerHeight;
            leaf.style.top = Y * -0.3 + 'px';
        };

        window.onscroll = function () {
            let Y = window.scrollY;
            leaf.style.transform = 'translateY(' + Y / -2 + 'px)';
            leaf.style.right = Y * 0.3 + 'px';
            layer_6.style.transform = 'translateY(' + Y / 9 + 'px)';
            layer_7.style.transform = 'translateY(' + Y / 9 + 'px)';
            layer_6.style.left = Y * 0.22 + 'px';
            layer_7.style.left = Y * -0.22 + 'px';
            layer_1.style.transform = 'translateY(' + Y / 9 + 'px)';
            layer_3.style.transform = 'translateY(' + Y / 12 + 'px)';
            layer_5.style.transform = 'translateY(' + Y / 2 + 'px)';
        }
    </script>
</body>
</html>