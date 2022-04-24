@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">
  เส้นทางท่องเที่ยว
</h3>
<hr class="text-base-color">

<!-- Tabs -->
<div class="geotrail-tabs">
@for($i=1; $i <= 7; $i++) 
  <button class="tab-item" 
  onclick="showGeotrail('geotrail{{$i}}')">
    เส้นทางท่องเที่ยวที่ {{$i}}
  </button>
  @endfor
</div>

<!-- Images -->
<div class="geotrail-items">

  @for($i=1; $i <= 7; $i++) 
  <div class="geotrail-item" id="geotrail{{$i}}" style="{{$i != 1?'display: none;':''}}" >
    <img src="{{asset('images/geotrail/0'.$i.'.jpg')}}" alt="">
  </div>
  @endfor
  
</div>

@stop

@section('js')
<script>
  
  function showGeotrail(geoNo) {
    let geoItem = document.getElementsByClassName("geotrail-item");
    for (let i = 0; i < geoItem.length; i++) {
      geoItem[i].style.display = "none";
      // geoItem[i].style.opacity = "0";
    }
    // document.getElementById(geoNo).style.opacity = "1";
    document.getElementById(geoNo).style.display = "block";

  }
</script>
@stop