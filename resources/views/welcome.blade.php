<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geopark</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
</head>

<body class="welcome-body">
    <!-- Header -->
    <div class="welcome-header">
        <div class="logo">
            <div class="img">
                <img src="https://scontent.fnak4-1.fna.fbcdn.net/v/t39.30808-6/272925602_240603594904077_4660761821876637428_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=I0jGwycXviAAX_Wq9-Y&_nc_oc=AQm7uWlhyzOli7bnqauHV47RbQgXX8A48KOXmuzGM96errfGwq26FvzOyr0YiL9lKec037Gxh6ypcXrqIHTAVs0c&_nc_ht=scontent.fnak4-1.fna&oh=00_AT8WfSbZlPfSLlyBmmsFtRj9ljyBlQS3dVz7u-o2OUbbxg&oe=623B5A65" alt="">
            </div>
            <div class="title">
                การประชุมทางวิชาการเครือข่ายอุทยานธรณีประเทศไทย ครั้งที่ 1
            </div>
        </div>
        <div class="banner">
            <div class="img">
                <img src="https://www.geoparc.cat/wp-content/uploads/2021/07/geopark_blue_eng-400x302.png" alt="">
            </div>
            <div class="img">
                <img src="https://upload.wikimedia.org/wikipedia/en/a/a6/Global_Geoparks_Network_logo.jpg" alt="">
            </div>
            <div class="img">
                <img src="https://pbs.twimg.com/profile_images/1029248583332069376/89O4pUxX_400x400.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Sub Header -->
    <div class="welcome-sub-header">
        The 1st Thailand Geopark Network Symposium
    </div>

    <!-- Menu Bar -->
    <div class="welcome-menu">
        @for ($i = 0; $i < 7; $i++) <a href="#">
            <div class="menu-link">Link {{$i+1}}</div>
            </a>
            @endfor
    </div>


    <!-- Slider main container -->
    <div class="swiper" >
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper" style="height:500px;">
            <!-- Slides -->
            <div class="swiper-slide">
                <img style="object-position: 0px -350px;width:100%;" 
                src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1774&q=80" alt="">
            </div>
            <div class="swiper-slide">
                <img style="object-position: 0px -160px;width:100%;" 
                src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2174&q=80" alt="">
            </div>
            
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>


    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 4000,
            },

        });
    </script>
</body>

</html>