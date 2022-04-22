@extends('layouts.master')

@section('body')
<div class="blog-cover-img">
  <img src="https://www.khoratgeopark.com/Data/sliders/2.jpg" alt="">
</div>
<div class="blog-section">
  <div class="blog-container">
    <div class="bc">
      <span class="fa fa-home text-dark-color"></span>
      หน้าหลัก
      /
      @if(Route::current()->getName() === 'programme')
      โปรแกรม
      @elseif(Route::current()->getName() === 'registration')
      ลงทะเบียน
      @elseif(Route::current()->getName() === 'abstract')
      บทความวิชาการ
      @elseif(Route::current()->getName() === 'geofair')
      จีโอพาร์คในไทย
      @endif
    </div>
    @yield('content')
  </div>
</div>
@stop

@section('js')
  @yield('js')
@stop