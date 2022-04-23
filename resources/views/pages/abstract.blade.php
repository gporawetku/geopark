@extends('../blogContent')

@section('content')
<h3 class="text-dark-color">
  บทความทางวิชาการ
</h3>
<hr class="text-base-color">


<div class="abstract-grid">
  @foreach ($data['abstract'] as $abstractItem)
  <div class="abstract-container">
    <div class="abstract-item">
      <div class="img" onclick="imgNewTab(this)">
        <img src="{{asset($abstractItem['image'])}}" alt="">
      </div>
      <div class="text-group">
        <div class="title">
          {{$abstractItem['name']}}
        </div>
        <div class="author">
          {{$abstractItem['author']}}
        </div>
        <div class="date">
          {{$abstractItem['description']}}
        </div>
        <div class="download-btn">
          <i class="fa fa-download muted"></i>
        </div>
      </div>
    </div>
  </div>
  @endforeach
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