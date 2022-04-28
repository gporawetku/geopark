<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thailand Geoparks Network Symposium Secretariat</title>
    <meta name="description" content="Thailand Geoparks Network Symposium Secretariat">
    <meta name="keywords" content="Geopark">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> -->
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Light Gallery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.3/css/lightgallery.min.css" integrity="sha512-FULkU+3G6ZLtNKGdm9TGOLc7EgIzciwf3qlJghC5v7M694FhlGIlWzefg74V1MhJ1zXnPKN04iwFai7jkm5TNQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.3/css/lg-video.min.css" integrity="sha512-89gDQOHnYjji90NPJ7+M5tgA/0E+fjL4KuSFhi6tjH6sZ54yUEogPMmOAgbI599fW1CtCyrsJbch8k/QzuoXzw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<div class="lds-ring"><div></div><div></div><div></div><div></div></div>



    @include('layouts.header')

    <div class="master-content">

        @yield('body')
    </div>


    @include('layouts.footer')

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <!-- LightGallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.3/lightgallery.min.js" integrity="sha512-IZdEaswJctlFir3AHSz18/kp6KDqurZ/1HGygoqRiDLr9r/UQ8rLTDjb2CYZkdf3v5x2n5odiNDSl3uRwTe33A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.3/plugins/video/lg-video.min.js" integrity="sha512-+9rMJhklbU87GRMwXY1IPGjAmNRltF4ZSzLtm4XNgf7wLigObN5UMPYXAH5qpJufnhmzLlbEsnlQHvzvznlO/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    

    <script>
        const mobileLink = document.querySelector('.mobile-icon');
        const menuBar = document.querySelector('.menu-bar');
        const menuBarOverlay = document.querySelector('.menu-bar-overlay');

        function responsiveFunction(xlScreen) {
            if (xlScreen.matches) {
                document.querySelector('.news-container .swiper').classList.remove('newsSwiper');
                document.querySelector('.news-container .swiper').firstElementChild.classList.remove('swiper-wrapper');
            }
        }
        var xlScreen = window.matchMedia("(min-width: 1200px)");
        responsiveFunction(xlScreen);
        // desktopScreen.addListener(myFunction);


        mobileLink.addEventListener('click', function(e) {
            mobileLink.classList.toggle("active");
            menuBar.classList.toggle("active");
            menuBarOverlay.classList.toggle("active");

        })
        menuBarOverlay.addEventListener('click', function(e) {
            mobileLink.classList.toggle("active");
            menuBar.classList.toggle("active");
            menuBarOverlay.classList.toggle("active");
        })

    </script>
    @yield('js')

    <script>
        let loader = document.querySelector('.lds-ring');
        document.querySelector('body').style.overflowY = 'hidden';
        document.onreadystatechange = function () {
            var state = document.readyState
            if (state == 'interactive') {
                document.querySelector('.master-content').style.visibility="hidden";
            } else if (state == 'complete') {
                setTimeout(function(){
                    document.getElementById('interactive');
                    loader.style.opacity = '0';
                    loader.style.visibility="hidden";
                    document.querySelector('.master-content').style.visibility="visible";
                    document.querySelector('body').style.overflowY = 'scroll';
                    window.scrollTo(0, 0);
            },1000);
        }
        }
    </script>
</body>

</html>
