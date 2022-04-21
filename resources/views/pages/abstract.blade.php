@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">
  บทความทางวิชาการ
</h3>
<hr class="text-base-color">


<div class="abstract-grid">
  @for($i=1; $i<=5; $i++)
  <div class="abstract-container">
    <div class="abstract-item">
      <div class="img" onclick="imgNewTab(this)">
        <img src="{{asset('images/abstracts/abstract-1.jpg')}}" alt="">
      </div>
      <div class="text-group">
        <div class="title">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, saepe.
        </div>
        <div class="author">
          Stephen Curry
        </div>
        <div class="date">
          25/04/2022
        </div>
      </div>
    </div>
  </div>
  @endfor
</div>
@stop

@section('js')
<script>
  function imgNewTab (e) {
    let url = e.firstElementChild.getAttribute('src');
    window.open(url);
  }

</script>
@stop