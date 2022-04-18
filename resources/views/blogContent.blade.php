@extends('layouts.master')

@section('body')
<div class="blog-cover-img">
  <img src="https://www.khoratgeopark.com/Data/sliders/2.jpg" alt="">
</div>
<div class="blog-section">
  <div class="blog-container">
    @yield('content')
  </div>
</div>
@stop

@section('js')
  @yield('js')
@stop