@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">อุทยานธรณีในประเทศไทย</h3>
<hr class="text-base-color">

<div class="geofair-grid">
  @for($j=1; $j <= 7; $j++)

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
        <!-- <div class="swiper-slide">
          <img src="{{asset('images/geofair-frame.png')}}" alt="">
        </div> -->
        @for($i=1; $i <= 9; $i++)
        <div class="swiper-slide">
          <img src="{{asset('images/geofair/1Satun/'.$i.'.jpg')}}" alt="">
        </div>
        @endfor
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  @endfor
</div>

@stop

@section('js')
  <script>
    var swiper = new Swiper(".geofair1", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
      loop: true,
      effect: "fade",
    });

  </script>
@stop