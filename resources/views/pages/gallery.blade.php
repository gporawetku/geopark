@extends('../blogContent')

@section('content')
    <h3 class="text-dark-color">
        ห้องภาพ
    </h3>
<hr class="text-base-color">


<div class="gallery-container">
  <ul>
    <li class="filter active" data-filter="1">ภาพจากงาน</li>
    <li class="filter " data-filter="2">ภาพจากการประกวด</li>
    <li class="filter " data-filter="3">วีดีโอ</li>
    <li>
        <a style="color:black;" href="https://drive.google.com/file/d/1jj6WzXVj-lsS-z9o82QnfydJSo9CGFfR/view?usp=sharing" target="_blank">รูปภาพเพิ่มเติม</a>
    </li>

  </ul>
  <div class="gallery-box active" id="lightgallery1" data-box="1" >
      @foreach($data['gallery']['type_1'] as $galleryItem)
        <a href="{{asset($data['path_image_type_1'].$galleryItem['link'])}}" class="item">
          <img src="{{asset($data['path_image_type_1'].$galleryItem['link'])}}">
        </a>
      @endforeach
  </div>


  <div class="gallery-box" id="lightgallery2" data-box="2" >
    @foreach($data['gallery']['type_2'] as $galleryItem)
    <a href="{{asset($data['path_image_type_2'].$galleryItem['link'])}}" class="item">
      <img src="{{asset($data['path_image_type_2'].$galleryItem['link'])}}">
    </a>
    @endforeach
  </div>

  <div class="gallery-box" id="lightgallery3" data-box="3" >
    @foreach($data['gallery']['type_3'] as $galleryItem)
      <a href="https://youtu.be/{{$galleryItem['link']}}" class="item">
        <img src="http://img.youtube.com/vi/{{$galleryItem['link']}}/0.jpg">
      </a>
    @endforeach
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
