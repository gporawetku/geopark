@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">
  ห้องภาพ
</h3>
<hr class="text-base-color">


<div class="gallery-container">
  <ul>
    @for($i = 0; $i < 3; $i++)
    <li class="filter {{$i === 0?'active':''}}" data-filter="{{$i+1}}">ฟิลเตอร์ {{$i+1}}</li>
    @endfor
  </ul>

  <div class="gallery-box active" id="lightgallery1" data-box="1" >
    <a href="{{asset('images/slides/slide-2.jpg')}}" class="item">
      <img src="{{asset('images/slides/slide-2.jpg')}}">
    </a>
    <a href="{{asset('images/slides/slide-3.jpg')}}" class="item">
      <img src="{{asset('images/slides/slide-3.jpg')}}">
    </a>
  </div>

  <div class="gallery-box" id="lightgallery2" data-box="2" >
    <a href="{{asset('images/slides/slide-1.jpg')}}" class="item">
      <img src="{{asset('images/slides/slide-1.jpg')}}">
    </a>
  </div>

  <div class="gallery-box" id="lightgallery3" data-box="3" >
    <a href="https://youtu.be/XxDTDCfXgEw" class="item"
        >
      <img src="http://img.youtube.com/vi/XxDTDCfXgEw/0.jpg">
    </a>
  </div>


</div>
@stop


@section('js')
<script>
  
  let filter = document.querySelectorAll('.filter');
  let galleryBox = document.querySelectorAll('.gallery-box');
  
  // create lightGallery by type
  for(let i = 0; i < galleryBox.length; i++) {
    if(i !== 2){
      lightGallery(galleryBox[i]);
    }else {
      lightGallery(galleryBox[i], {
        plugins: [lgVideo],
      }); 
    }
    
  }
  
  // Filter Gallery
  for (let i = 0; i < filter.length; i++) {
    filter[i].addEventListener('click', function() {

      for (let j = 0; j < filter.length; j++) {
        filter[j].classList.remove('active');
      }
      this.classList.add('active');

      let dataFilter = this.getAttribute('data-filter');

      for (let k = 0; k < galleryBox.length; k++) {
        galleryBox[k].classList.remove('active');
        if (galleryBox[k].getAttribute('data-box') == dataFilter ) {
          galleryBox[k].classList.add('active');
        }
      }

    })
  }

</script>

@stop