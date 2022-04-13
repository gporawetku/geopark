@extends('layouts.master')

@section('body')


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
        <a href="#underhero-section">
            <div class="scroll-down-btn fa fa-chevron-down"></div>
        </a>
    </div>
</div>

<div class="section-container">
    <div class="underhero-container" id="underhero-section">
        <!-- Latest News -->
        <div class="news-container">
            <div class="title">
                <span class="news-icon">
                    <i class="fa fa-bullhorn"></i>
                </span>
                Latest News
            </div>
            <div class="news-mobile-icon">
                <i class="fa fa-bullhorn"></i>
            </div>
            <div class="swiper newsSwiper">
                <div class="swiper-wrapper">
                    @for($i=0; $i<3; $i++) <div class="swiper-slide">
                        <div class="news-item">[12/12/2012] 1 Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Schedule -->

    <div class="schedule-container">
        <div class="title">
            <span class="schedule-icon">
                <i class="fa fa-calendar"></i>
            </span>
            Schedule
        </div>
        <table class="schedule-table">
            @for($i=0; $i<3; $i++) <tr>
                <td>Conference Registration</td>
                <td>24 ส.ค. 65</td>
                </tr>
                @endfor
        </table>
    </div>
</div>
</div>

<!-- Fixed Image -->
<div class="fixed-img">
    <img src="https://images.unsplash.com/photo-1520961810802-7f0a32de665a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1591&q=80" alt="">
</div>


<!-- Highligh News Section (3 Box) -->
<div class="highlight-news-section">
    <div class="highlight-news-container swiper highlightNewsSwiper">
        <div class="news-group swiper-wrapper">
            <div class="news-item swiper-slide" style="background-image: url('https://www.khoratgeopark.com/Data/sliders/1.jpg');">
                <div class="title">
                    News Title
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, dolorum!
                </div>
            </div>
            <div class="news-item swiper-slide" style="background-image: url('http://www.satun-geopark.com/wp-content/uploads/2017/06/1-1-1300x560.jpg');">
                <div class="title">
                    News Title
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing 
                </div>
            </div>
            <div class="news-item swiper-slide" style="background-image: url('http://www.satun-geopark.com/wp-content/uploads/2017/01/news02-11.jpg');">
                <div class="title">
                    News Title
                </div>
                <div class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, dolorum!
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Google Map -->
<div class="map-section">
    <iframe class="map-content"  src="https://maps.google.com/maps?q=14.9874706,102.1179648&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>

<!-- Banner Group -->
<div class="banner-group-section">
    <div class="banner-group-container swiper bannerGroupSwiper">
        <div class="banner-group swiper-wrapper">
            <div class="banner-item swiper-slide">
                <img src="https://www.geoparc.cat/wp-content/uploads/2021/07/geopark_blue_eng-400x302.png" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://i2.wp.com/thebamboocode.com/wp-content/uploads/2016/03/js-logo.png?fit=500%2C500" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/1200px-CSS3_logo_and_wordmark.svg.png" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/512px-HTML5_logo_and_wordmark.svg.png" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://www.geoparc.cat/wp-content/uploads/2021/07/geopark_blue_eng-400x302.png" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://i2.wp.com/thebamboocode.com/wp-content/uploads/2016/03/js-logo.png?fit=500%2C500" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/1200px-CSS3_logo_and_wordmark.svg.png" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/512px-HTML5_logo_and_wordmark.svg.png" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" alt="">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Footer -->
<div class="footer-section">
    <div class="footer-container">
        <div class="contact-container">

        </div>
        <div class="copyright"></div>
    </div>
</div>

<div class="test-content" id="test-content" style="height: 300px;background-color:#fff;overflow:hidden;"></div>



@stop

@section('js')
<script>
    const swiper = new Swiper('.slider', {
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
    var highlightNewsSwiper = new Swiper(".highlightNewsSwiper", {
        slidesPerView: "auto",
        centeredSlides: true,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                spaceBetween: 20,
            },
            768: {
                spaceBetween: 20,
            },
            1000: {
                slidesPerView: "3",
                spaceBetween: 20,
                navigation: false,
            },
        },
    });
    var bannerGroupSwiper = new Swiper(".bannerGroupSwiper", {
        slidesPerView: "5",
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2000,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: "6",
                navigation: false,
            },
            1000: {
                slidesPerView: "8",
            },
        },
    });
</script>
@stop