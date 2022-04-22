@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">อุทยานธรณีในประเทศไทย</h3>
<hr class="text-base-color">

<div class="geofair-grid">

  <!-- Satun -->
  <div class="geofair-item">
    <div class="text-group">
      <div class="title">
        <span class="fas fa-map-marker-alt"></span>
        อุธยานธรณีโลกสตูล
      </div>
      <div class="link-group">
        <a href="https://www.facebook.com/SatunUGG" target="_blank">
          <span class="fab fa-facebook"></span>
        </a>
        <a href="http://www.satun-geopark.com/" target="_blank">
          <span class="fas fa-external-link-alt"></span>
        </a>
      </div>
    </div>
    <div class="geofairSlide swiper geofair1">
      <div class="swiper-wrapper">
        @for($i=1; $i <= 9; $i++)
        <div class="swiper-slide">
          <img class="swiper-lazy" src="{{asset('images/geofair/1Satun/'.$i.'.jpg')}}" alt="">
          <div class="swiper-lazy-preloader"></div>
        </div>
        @endfor
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- Khorat -->
  <div class="geofair-item">
    <div class="text-group">
      <div class="title">
        <span class="fas fa-map-marker-alt"></span>
        อุธยานธรณีโคราช
      </div>
      <div class="link-group">
        <a href="https://khoratgeopark.com/" target="_blank">
          <span class="fas fa-external-link-alt"></span>
        </a>
      </div>
    </div>
    <div class="geofairSlide swiper geofair2">
      <div class="swiper-wrapper">
        @for($i=1; $i <= 9; $i++)
        <div class="swiper-slide">
          <img class="swiper-lazy" src="{{asset('images/geofair/2Khorat/'.$i.'.jpg')}}" alt="">
          <div class="swiper-lazy-preloader"></div>
        </div>
        @endfor
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- PhachanSamphanbok -->
  <div class="geofair-item">
    <div class="text-group">
      <div class="title">
        <span class="fas fa-map-marker-alt"></span>
        อุทยานธรณีผาชันสามพันโบก
      </div>
      <div class="link-group">
        <a href="#" target="_blank">
          <span class="fas fa-external-link-alt"></span>
        </a>
      </div>
    </div>
    <div class="geofairSlide swiper geofair3">
      <div class="swiper-wrapper">
        
        @for($i=1; $i <= 4; $i++)
        <div class="swiper-slide">
          <img class="swiper-lazy" src="{{asset('images/geofair/3PhaChanSamPhanBok/'.$i.'.jpg')}}" alt="">
          <div class="swiper-lazy-preloader"></div>
        </div>
        @endfor
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- KhonKaen -->
  <div class="geofair-item">
    <div class="text-group">
      <div class="title">
        <span class="fas fa-map-marker-alt"></span>
        อุทยานธรณีขอนแก่น
      </div>
      <div class="link-group">
        <a href="https://www.khonkaen-geopark.com/" target="_blank">
          <span class="fas fa-external-link-alt"></span>
        </a>
      </div>
    </div>
    <div class="geofairSlide swiper geofair5">
      <div class="swiper-wrapper">
        
        @for($i=1; $i <= 10; $i++)
        <div class="swiper-slide">
          <img class="swiper-lazy" src="{{asset('images/geofair/5KhonKaen/'.$i.'.jpg')}}" alt="">
          <div class="swiper-lazy-preloader"></div>
        </div>
        @endfor
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- Tak -->
  <div class="geofair-item">
    <div class="text-group">
      <div class="title">
        <span class="fas fa-map-marker-alt"></span>
        อุทยานธรณีไม้กลายเป็นหินตาก
      </div>
      <div class="link-group">
        <a href="#" target="_blank">
          <span class="fas fa-external-link-alt"></span>
        </a>
      </div>
    </div>
    <div class="geofairSlide swiper geofair6">
      <div class="swiper-wrapper">
        
        @for($i=1; $i <= 9; $i++)
        <div class="swiper-slide">
          <img class="swiper-lazy" src="{{asset('images/geofair/6Tak/'.$i.'.jpg')}}" alt="">
          <div class="swiper-lazy-preloader"></div>
        </div>
        @endfor
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <!-- Chaiyaphum -->
  <div class="geofair-item">
    <div class="text-group">
      <div class="title">
        <span class="fas fa-map-marker-alt"></span>
        อุทยานธรณีชัยภูมิ
      </div>
      <div class="link-group">
        <a href="#" target="_blank">
          <span class="fas fa-external-link-alt"></span>
        </a>
      </div>
    </div>
    <div class="geofairSlide swiper geofair7">
      <div class="swiper-wrapper">
        
        @for($i=1; $i <= 13; $i++)
        <div class="swiper-slide">
          <img class="swiper-lazy" src="{{asset('images/geofair/7Chaiyaphum/'.$i.'.jpg')}}" alt="">
          <div class="swiper-lazy-preloader"></div>
        </div>
        @endfor
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


</div>

@stop

@section('js')
  <script>
    var swiper = new Swiper(".geofairSlide", {
      preloadImages: false,
      lazy: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      loop: true,
      effect: "fade",
    });

  </script>
@stop