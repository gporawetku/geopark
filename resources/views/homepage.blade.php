@extends('layouts.master')

@section('body')


<!-- Slider main container -->
<div class="swiper slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($data['slideList'] as $slide)
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

<!-- Underhero (News, Schedule) -->
<div class="section-container">
    <div class="underhero-container" id="underhero-section">

        <!-- Latest News -->
        <div class="news-container">
            <div class="title">
                <span class="news-icon">
                    <i class="fa fa-bullhorn"></i>
                </span>
                ข่าวสาร
            </div>
            <div class="news-mobile-icon">
                <i class="fa fa-bullhorn"></i>
            </div>
            <div class="swiper newsSwiper">
                <div class="swiper-wrapper">
                    @foreach($data['blogList'] as $newsItem)
                    <div class="swiper-slide">
                        <div class="news-item">
                            [{{date('d/m/Y', strtotime($newsItem['created_at']))}}]
                            {{$newsItem['description']}}
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

    <!-- Schedule -->
    <div class="schedule-container">
        <div class="title">
            <span class="schedule-icon">
                <i class="fa fa-calendar"></i>
            </span>
            กำหนดการ
        </div>
        <table class="schedule-table">
            <tr>
                <td>ลงทะเบียน</td>
                <td>10 - 24 เมษายน 2565</td>
            </tr>
            <tr>
                <td>ส่งบทความวิชาการ</td>
                <td>1 - 18 เมษายน 2565</td>
            </tr>
            <tr>
                <td>ประกวดคลิป ภาพถ่ายเรียงความ</td>
                <td>20 - 25 เมษายน 2565</td>
            </tr>
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
    <iframe class="map-content" src="https://maps.google.com/maps?q=14.9874706,102.1179648&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>


<!-- Banner Group -->
<div class="banner-group-section">
    <div class="banner-group-container swiper bannerGroupSwiper">
        <div class="banner-group swiper-wrapper">
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/1.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/2.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/3.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/4.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/5.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/6.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/7.jpg')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/8.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/9.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/10.jpg')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/11.jpeg')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/12.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/13.png')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/14.jpg')}}" alt="">
            </div>
            <div class="banner-item swiper-slide">
                <img src="{{asset('images/sponsor_logo/15.jpg')}}" alt="">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>



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
        spaceBetween: 60,
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
                slidesPerView: "9",
            },
        },
    });
</script>
@stop