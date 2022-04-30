@extends('layouts.master')

@section('body')


<!-- Slider main container -->
<div class="swiper slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($data['slideList'] as $slide)
        <div class="swiper-slide">
                <img style="width:100%;" src="{{asset($data['path_slide_image'].$slide['image'])}}" alt="">
            </div>
        @endforeach

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
                            {{$newsItem['name']}}
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
            @foreach ($data['scheduleList'] as $scheduleItem)
            <tr>
                <td>{{$scheduleItem['name']}}</td>
                <td>{{$scheduleItem['description']}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</div>

<!-- Fixed Image -->
<div class="fixed-img">
    <!-- <img src="{{ asset('images/background_images/unsplash1.jpg') }}" alt=""> -->
    <div class="img" style="background-image: url({{asset('images/background_images/unsplash1.jpg')}});"></div>
</div>


<!-- Gallery Preview (old highlight blog) -->
<div class="highlight-news-section">
    <div class="title-wrapper">
        <span class="camera-icon">
            <i class="fa fa-camera-retro"></i>
        </span>
        <div class="title">
            ห้องภาพ
        </div>
        <a class="more-link" href="{{route('gallery')}}"><span class="fa fa-angle-double-right"></span></a>
    </div>
    <div class="highlight-news-container swiper highlightNewsSwiper">
        <div class="news-group swiper-wrapper galleryPreview">
            <!-- Gallery  -->
            @foreach ($data['gallery'] as $galleryItem)
            <div class="news-item swiper-slide news-item-i1" 
            href="{{asset($data['path_gallery_image_type_2'].$galleryItem['link'])}}"
            style="background-image: url('{{asset($data['path_gallery_image_type_2'].$galleryItem['link'])}}');">
            </div>
            @endforeach

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
<!-- Old section highlight blogs -->
<!-- <div class="highlight-news-section">
    <div class="highlight-news-container swiper highlightNewsSwiper">
        <div class="news-group swiper-wrapper">
            @foreach ($data['blogs'] as $blogItem)
            <div class="news-item swiper-slide news-item-i{{$loop->index+1}}"
            style="background-image: url(' {{asset($blogItem['image'])}} ');">
                <div class="title">
                    {{$blogItem['name']}}
                </div>
                <div class="description">
                    {{$blogItem['description']}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div> -->


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
    lightGallery(document.querySelector('.galleryPreview'), {
        plugins: [lgVideo],
      });

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
                centeredSlides: false,
                loop: false,
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

    // GSAP ANIMATION
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".swiper.slider .swiper-slide img",
        {duration: 4, scale: 1.2, delay: 1})
    gsap.timeline()
        .from(".hero-text .title",
        {duration: 1.5, y: -100, opacity: 0, delay: 1,})
        .from(".hero-text .description",
        {duration: .5, y: -20, opacity: 0,})
        .from(".hero-text .scroll-down-btn",
        {duration: .5, y: -50, opacity: 0, rotation: 90,});

    gsap.timeline({
        scrollTrigger: {
            trigger: '.news-container',
            start: "top 90%",
        }
    })  .from('.news-container .title',
        {duration: .2, y: -50, opacity: 0,})
        .from('.news-container .swiper',
        {duration: .5, y: -50, opacity: 0,})
        .from('.schedule-container .title',
        {duration: .3, y: -50, opacity: 0,})
        .from('.schedule-container .schedule-table',
        {duration: .7, y: -50, opacity: 0,})

    gsap.from('.fixed-img', {
        scrollTrigger: {
            trigger: '.fixed-img',
            start: "top 90%",
        },
        duration: .8, opacity: 0,
    });
    gsap.to('.fixed-img .img', {
        backgroundPosition: `50% 20%`,
        ease: "none",
        scrollTrigger: {
            trigger: '.fixed-img',
            scrub: true
        }
    });

    gsap.timeline({
        scrollTrigger: {
            trigger: '.highlight-news-section',
            start: "top 90%",
        }
    })
    .from('.highlight-news-container .news-group .news-item-i1',
        {duration: .5, y: -20, opacity: 0})
    .from('.highlight-news-container .news-group .news-item-i2',
        {duration: .5, y: -20, opacity: 0})
    .from('.highlight-news-container .news-group .news-item-i3',
        {duration: .5, y: -20, opacity: 0});



    gsap.from('.map-section', {
        scrollTrigger: {
            trigger: '.map-section',
            start: "top 85%",
        },
        duration: 2, y: -0, opacity: 0,
    });

    gsap.from('.banner-group-section', {
        scrollTrigger: {
            trigger: '.banner-group-section',
            start: "top 85%",
        },
        duration: 2, y: -0, opacity: 0,
    });


</script>
@stop
