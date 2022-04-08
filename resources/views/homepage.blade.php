
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
                        @for($i=0; $i<3; $i++) 
                        <div class="swiper-slide">
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
                @for($i=0; $i<3; $i++) 
                <tr>
                    <td>Conference Registration</td>
                    <td>24 ส.ค. 65</td>
                </tr>
                @endfor
            </table>
        </div>
    </div>
    </div>

    <div class="test-content" id="test-content" style="height: 900px;background-color:#333;overflow:hidden;"></div>



@stop

@section('js')
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
@stop