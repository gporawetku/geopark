@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">
  เส้นทางท่องเที่ยว
</h3>
<hr class="text-base-color">

<div class="geotrail-container">
  <!-- Tabs -->
  <div class="geotrail-tabs">
    @for($i=1; $i <= 7; $i++) 
    <button class="tab-item {{$i === 1?'active':''}}"  data-geotrail="{{$i}}">
      เส้นทางที่ {{$i}}
    </button>
    @endfor
  </div>

  <!-- Images -->
  <div class="geotrail-items">

    @for($i=1; $i <= 7; $i++) 
    <a class="geotrail-item {{$i === 1?'active':''}}" id="geotrail{{$i}}"  
      href="{{asset('images/geotrail/0'.$i.'.jpg')}}" target="_blank">
      <img src="{{asset('images/geotrail/0'.$i.'.jpg')}}" alt="">
    </a>
    @endfor
    
  </div>
</div>


@stop

@section('js')
<script>
  document.querySelectorAll('.tab-item').forEach(item => {
    item.addEventListener('click', e => {
      // change active button
      document.querySelectorAll('.tab-item').forEach(x => x.classList.remove('active'));
      e.target.classList.add('active');
      // change active img
      document.querySelectorAll('.geotrail-item').forEach(x => x.classList.remove('active'));
      document.querySelector(`#geotrail${e.target.dataset.geotrail}`).classList.add('active');
      console.log(e.target.dataset.geotrail);
    });
  });

</script>
@stop