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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> -->
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <!-- <div class="fade-in-welcome" style="position: absolute;z-index:9999;top:0;background-color:white; height: 100vh;width: 100vw;"></div> -->


    <!-- Header -->
    <div class="welcome-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center ">
                <a href="#">
                    <img class="logo" src="{{asset('images/logo1.png')}}" alt="">
                </a>
                <a class="title" href="#">
                    การประชุมทางวิชาการเครือข่ายอุทยานธรณีประเทศไทย ครั้งที่ 1
                </a>
            </div>
            <!-- Mobile Navigation Icon -->
            <div class="mobile-icon">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div>
        <img class="top-banners" src="{{asset('images/top-banners.png')}}" alt="">
    </div>

    <!-- Line break -->
    <div class="bg-dark w-100" style="height:1px;"></div>

    <!-- Sub Header -->
    <!-- <div class="py-2" style="font-size: 12px;">
        December 12-16, 2021/ Jeju Island UNESCO Global Geopark, Republic of Korea
    </div> -->





    <!-- Menu bar (responsive) -->
    <div class="menu-bar-overlay"></div>
    <ul class="menu-bar">
        <li><a href="#">Home</a></li>
        <li>
            <a href="#">Programme <i class="fa fa-caret-down"></i></a>
            <ul>
                <a href="#">
                    <li>Schedule / Floor Plan</li>
                </a>
                <a href="#">
                    <li>Special Programme</li>
                </a>
            </ul>
        </li>

        <li><a href="#">Registration</a></li>

        <li>
            <a href="#">Abstract <i class="fa fa-caret-down"></i></a>
            <ul>
                <a href="#">
                    <li>Poster Session</li>
                </a>
                <a href="#">
                    <li>Special Session Description</li>
                </a>
            </ul>
        </li>

        <li><a href="#">Geofair</a></li>

        <li>
            <a href="#">Board <i class="fa fa-caret-down"></i></a>
            <ul>
                <a href="#">
                    <li>News</li>
                </a>
                <a href="#">
                    <li>Photo Gallery</li>
                </a>
            </ul>
        </li>

        <li>
            <a href="#">Information <i class="fa fa-caret-down"></i></a>
            <ul>
                <a href="#">
                    <li>JEJU Island</li>
                </a>
                <a href="#">
                    <li>General Information</li>
                </a>
                <a href="#">
                    <li>Visa Information</li>
                </a>
                <a href="#">
                    <li>Conference Venue</li>
                </a>
                <a href="#">
                    <li>Geotrials on JEJU Island</li>
                </a>
                <a href="#">
                    <li>Getting to JEJU</li>
                </a>
                <a href="#">
                    <li>Partnership</li>
                </a>
            </ul>
        </li>
    </ul>



    <!-- Slider main container -->
    <div class="swiper slider">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($slideList as $slide)
            <!-- <div class="swiper-slide">
                <img style="width:100%;" src="{{asset($slide['image'])}}" alt="">
            </div> -->
            @endforeach

            <div class="swiper-slide">
                <img style="width:100%;" src="{{asset('images/bg_1.png')}}" alt="">
            </div>
            <div class="swiper-slide">
                <img style="width:100%;" src="https://www.khoratgeopark.com/Data/sliders/2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img style="width:100%;" src="https://images.unsplash.com/photo-1519451241324-20b4ea2c4220?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1280&q=80" alt="">
            </div>
            <div class="swiper-slide">
                <img style="width:100%;" src="http://www.satun-geopark.com/wp-content/uploads/2017/01/news02-11.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img style="width:100%;" src="http://www.satun-geopark.com/wp-content/uploads/2017/06/1-1-1300x560.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img style="width:100%;" src="https://www.khoratgeopark.com/Data/sliders/1.jpg" alt="">
            </div>

        </div>
        <!-- <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        <div class="hero-text">
            <div class="title">
                Thailand Geoparks Network Symposium
            </div>
            <div class="description">
                April 25-26, 2022 / The 1<sup>st</sup> Thailand Geoparks Network Symposium
            </div>
            <a href="#test-content">
                <div class="scroll-down-btn fa fa-chevron-down"></div>
            </a>
        </div>
    </div>


    <div class="underhero-section">
        <!-- Latest News -->
        <div class="news-container">
            <div class="news-icon">
                <i class="fa fa-bullhorn"></i>
            </div>
            <div class="swiper newsSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="news-item">[12/12/2012] 1 Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-item">[11/12/2012] 2 Lorem ipsum dolor sit amet. Lorem, ipsum dolor.</div>
                    </div>
                    <div class="swiper-slide">
                        <div class="news-item">[10/12/2012] 3 Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule -->

    </div>

    <div class="test-content" id="test-content" style="height: 900px;background-color:#333;overflow:hidden;"></div>










    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const mobileLink = document.querySelector('.mobile-icon');
        const menuBar = document.querySelector('.menu-bar');
        const menuBarOverlay = document.querySelector('.menu-bar-overlay');

        setTimeout(function() {
            document.querySelector('.fade-in-welcome').style.display = "none";
        }, 3000);
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
        // ----- Sample code if click outside will hide menu ----
        // if (!menuBar.contains(event.target)) {
        //     mobileLink.classList.toggle("active");
        //     menuBar.classList.toggle("active");
        // }

        const swiper = new Swiper('.slider', {
            // pagination: {
            //     el: '.swiper-pagination',
            // },
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
            loop: true,
            autoplay: {
                delay: 4500,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
        });
        var newsSwiper = new Swiper(".newsSwiper", {
            direction: "vertical",
            loop: true,
            autoplay: {
                delay: 3000
            }
        });
    </script>

</body>

</html>